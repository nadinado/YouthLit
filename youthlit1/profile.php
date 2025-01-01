<?php include 'header.php'; ?>
<?php
// session_start(); // Takyah session_start dah sebab dah start kat header
include 'db_connect.php'; // Database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if not logged in
    header("Location: login.php");
    exit();
}

// Check if top genres are available 
// Correction: aku tambah kalau topGenres tu null user kena jawab quiz
if (!isset($_SESSION['topGenres']) || empty($_SESSION['topGenres'])) {
    // Redirect to quiz.php with an alert message
    echo "<script>
        alert('Please answer the quiz first in order to get top genre for recommendation!');
        window.location.href = 'quiz.php';
    </script>";
    exit();
}


// For debugging purposes:
$userId = $_SESSION['user_id']; // User ID from the session
$topGenres = $_SESSION['topGenres']; // Top genres from the session

// Fetch user's favorite books
$favoritesQuery = "SELECT books.*, books.goodreads_link FROM books
                   JOIN favorites ON books.id = favorites.book_id
                   WHERE favorites.user_id = ?";
$favoritesStmt = $conn->prepare($favoritesQuery);

if ($favoritesStmt) {
    $favoritesStmt->bind_param("i", $userId);
    $favoritesStmt->execute();
    $favoritesResult = $favoritesStmt->get_result();
} else {
    die("Error preparing the favorites query: " . $conn->error);
}

// Fetch recommended books based on top genres
$placeholders = implode(',', array_fill(0, count($topGenres), '?'));
$recommendationsQuery = "SELECT b.id, b.title, b.author, b.image, b.goodreads_link, g.genre_name
                         FROM books b
                         JOIN book_genres bg ON b.id = bg.book_id
                         JOIN genres g ON bg.genre_id = g.id
                         WHERE g.genre_name IN ($placeholders)
                         GROUP BY b.id";

$recommendationsStmt = $conn->prepare($recommendationsQuery);

if ($recommendationsStmt) {
    $recommendationsStmt->bind_param(str_repeat('s', count($topGenres)), ...$topGenres);
    $recommendationsStmt->execute();
    $recommendationsResult = $recommendationsStmt->get_result();
} else {
    die("Error preparing the recommendations query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="templatemo-softy.css?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Header Section -->
    <?php include('header.php'); ?>

    <section class="section colored">
        <section class="profile-section">
            <br><br><br>
            <h1>Your Favorite Books</h1><br><br><br>
            
            <div class="book-item-container">
                <?php
                if (isset($favoritesResult) && $favoritesResult->num_rows > 0) {
                    while ($row = $favoritesResult->fetch_assoc()) {
                        echo '<div class="book-item">';
                        echo '<div class="blog-post-thumb">';
                        echo '<img src="' . $row['image'] . '" alt="' . $row['title'] . '">';
                        echo '</div>';
                        echo '<h3>' . $row['title'] . '</h3>';
                        echo '<p>' . $row['author'] . '</p>';
                        echo '<a href="' . $row['goodreads_link'] . '" class="main-button">Read More</a>';
                        echo '<button class="main-button delete-button" onclick="deleteBook(' . $row['id'] . ')">Delete</button>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>You have no favorite books yet.</p>';
                }
                ?>
            </div>

            <br><br><br>
            <h1>Your Top Genres</h1>
            <div class="container" style="text-align: center; display: flex; flex-direction: column; align-items: center;">
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
            </div>

            <div style="text-align: center;">
                <form action="quiz.php" method="GET">
                    <button type="submit" class="main-button">Retake Quiz</button>
                </form>
            </div>

            <br><br>
            <h1>Your Recommended Books</h1><br><br>
            
            <div class="book-item-container">
                <?php
                if (isset($recommendationsResult) && $recommendationsResult->num_rows > 0) {
                    while ($row = $recommendationsResult->fetch_assoc()) {
                        echo '<div class="book-item">';
                        echo '<div class="blog-post-thumb">';
                        echo '<img src="' . $row['image'] . '" alt="' . $row['title'] . '">';
                        echo '</div>';
                        echo '<h3>' . $row['title'] . '</h3>';
                        echo '<p>' . $row['author'] . '</p>';
                        echo '<a href="' . $row['goodreads_link'] . '" class="main-button">Read More</a>';
                        echo '<form action="add_favorite.php" method="POST">';
                        echo '<input type="hidden" name="book_id" value="' . $row['id'] . '">';
                        echo '<button type="submit" class="main-button">Add to Favorites</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No recommended books available based on your genres.</p>';
                }
                ?>
            </div>
        </section>
    </section>

    <!-- Footer Section -->
    <?php include('footer.php'); ?>

    <script>
        // Function to delete a book from favorites
        function deleteBook(favoriteId) {
            if (confirm('Are you sure you want to delete this book from your favorites?')) {
                window.location.href = 'delete.php?id=' + favoriteId;
            }
        }
    </script>
</body>
</html>

<?php
// Close the database connections
$favoritesStmt->close();
$recommendationsStmt->close();
$conn->close();
?>