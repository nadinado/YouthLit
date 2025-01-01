<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login if the session does not have a username
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username']; // Fetch the logged-in user's username

// Check if top genres exist in the session
if (!isset($_SESSION['topGenres']) || empty($_SESSION['topGenres'])) {
    echo "<h1>No results available. Please complete the quiz first.</h1>";
    exit();
}

$topGenres = $_SESSION['topGenres']; // Get the top genres from session

// Database connection (assuming you have already included db_connect.php)
include('db_connect.php');

// Prepare the query to get recommended books based on the top genres
$placeholders = implode(',', array_fill(0, count($topGenres), '?')); // Create placeholders for the query

// Query to find books matching the top genres
$sql = "SELECT b.id, b.title, b.author, b.image, b.goodreads_link, g.genre_name
        FROM books b 
        JOIN book_genres bg ON b.id = bg.book_id
        JOIN genres g ON bg.genre_id = g.id
        WHERE g.genre_name IN ($placeholders)
        GROUP BY b.id";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters dynamically based on the top genres array
$stmt->bind_param(str_repeat('s', count($topGenres)), ...$topGenres); // 's' for each genre (string)

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if we have any books to recommend
if ($result->num_rows > 0):
    ?>

    <?php include('header.php'); ?>

    <!-- ***** Results Section Start ***** -->
    <section class="section colored">
    <section class="results-section" style="padding: 50px 0;">
    <div class="container" style="text-align: center; display: flex; flex-direction: column; align-items: center;">
            <h1>Your Top Genres:</h1>
            <p>Based on your quiz responses, we have identified your top genres:</p>
            <ul class="list-group" style="text-align: center; width: 80%; max-width: 500px; list-style-type: none; padding: 0;">
                <?php
                // Define colors and sizes for the top 3 genres
                $colors = ['#88029e', '#be38d4', '#e778f9']; // Gold, Silver, Bronze
                $sizes = ['1.7em', '1.5em', '1.2em']; // Font sizes for top 1, 2, and 3
                foreach ($topGenres as $index => $genre) {
                    $color = $colors[$index] ?? '#000'; // Default to black for additional genres
                    $size = $sizes[$index] ?? '1em';   // Default to normal size for additional genres
                    echo "<li class='list-group-item' style='font-size: {$size}; color: {$color}; font-weight: bold; margin-bottom: 10px;'>" 
                        . htmlspecialchars($genre) . 
                        "</li>";
                }
                ?>
            </ul>
            <br><br>

            <h2>Your Recommended Books:</h2>
            <p>We recommend the following books based on your preferences:</p>
            <br><br>
            <div class="row" id="book-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="<?= htmlspecialchars($row['genre_name']) ?>">
                        <div class="blog-post-thumb">
                            <div class="img">
                                <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>" style="width: 150px; height: 210px;">
                            </div>
                            <div class="blog-content">
                                <h3>
                                    <a href="#"><?= htmlspecialchars($row['title']) ?></a>
                                    <br><a href="#"><?= htmlspecialchars($row['author']) ?></a>
                                </h3>
                                
                                <a href="<?= htmlspecialchars($row['goodreads_link']) ?>" class="main-button" style="margin: 10px 0;">Read More</a>
                                
                                <!-- Add to Favorites Button -->
                                <form action="add_favorite.php" method="POST">
                                    <input type="hidden" name="book_id" value="<?= $row['id'] ?>"> <!-- Replace 1 with the actual book id -->
                                    <button type="submit" class="main-button" style="margin-top: 10px;">Add to Favorites</button>
                                </form>
                                <br><br>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div style="display: flex; justify-content: center; gap: 20px;">
                <a href="book.php" class="main-button">Find More Books Here</a>
                <a href="profile.php" class="main-button">Your Favorited Book(s)</a><br><br>
            </div>
        </div>
    </section>
    </section>
    <!-- ***** Results Section End ***** -->

    <?php 
else: 
    echo "<p>No books found for the selected genres.</p>";
endif;

// Close the statement and connection
$stmt->close();
$conn->close();

?>

<?php include('footer.php'); ?>
