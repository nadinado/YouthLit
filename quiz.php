
<?php
session_start(); // Start session at the beginning
include('db_connect.php');
// Initialize an associative array to store genre points
$genres = [
    "Mystery" => 0,
    "Thriller" => 0,
    "Romance" => 0,
    "Contemporary Fiction" => 0,
    "Adventure" => 0,
    "Fantasy" => 0,
    "Historical Fiction" => 0,
    "Literary Fiction" => 0,
    "Science Fiction" => 0,
    "Dystopian" => 0
];

// Map each question's options to genres
$question_genre_map = [
    "question1" => [
        "Mystery" => ["Mystery", "Thriller"],
        "Romance" => ["Romance", "Contemporary Fiction"],
        "Adventure" => ["Adventure", "Fantasy", "Historical Fiction"],
        "Philosophical" => ["Literary Fiction", "Science Fiction"]
    ],
    "question2" => [
        "Puzzles" => ["Mystery", "Thriller"],
        "Relationships" => ["Romance", "Contemporary Fiction"],
        "Exploration" => ["Adventure", "Fantasy", "Historical Fiction"],
        "Reflection" => ["Literary Fiction", "Science Fiction"]
    ],
    "question3" => [
        "Beach" => ["Romance", "Contemporary Fiction"],
        "City" => ["Mystery", "Contemporary Fiction"],
        "Mountain" => ["Adventure", "Fantasy"],
        "Countryside" => ["Romance", "Contemporary Fiction"]
    ],
    "question4" => [
        "Detective" => ["Mystery", "Thriller"],
        "Hero" => ["Adventure", "Fantasy"],
        "Explorer" => ["Adventure", "Fantasy"],
        "Philosopher" => ["Literary Fiction", "Science Fiction"]
    ],
    "question5" => [
        "Justice" => ["Mystery", "Thriller"],
        "Love" => ["Romance", "Contemporary Fiction"],
        "Discovery" => ["Adventure", "Fantasy", "Historical Fiction"],
        "Meaning" => ["Literary Fiction", "Science Fiction"]
    ],
    "question6" => [
        "Urban" => ["Mystery", "Contemporary Fiction"],
        "Romantic" => ["Romance", "Contemporary Fiction"],
        "Wilderness" => ["Adventure", "Fantasy"],
        "Ancient" => ["Fantasy", "Historical Fiction"]
    ],
    "question7" => [
        "Happy" => ["Romance", "Contemporary Fiction"],
        "Tragic" => ["Literary Fiction", "Contemporary Fiction"],
        "Open" => ["Literary Fiction", "Science Fiction"],
        "Suspenseful" => ["Mystery", "Thriller"]
    ],
    "question8" => [
        "Analytical" => ["Mystery", "Thriller"],
        "Romantic" => ["Romance", "Contemporary Fiction"],
        "Adventurous" => ["Adventure", "Fantasy"],
        "Reflective" => ["Literary Fiction", "Science Fiction"]
    ],
    "question9" => [
        "DetectiveStory" => ["Mystery", "Thriller"],
        "EpicAdventure" => ["Adventure", "Fantasy", "Historical Fiction"],
        "Romantic" => ["Romance", "Contemporary Fiction"],
        "ThoughtProvoking" => ["Literary Fiction", "Science Fiction"]
    ]
];

// Processing the form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the answers and calculate genre preferences
    foreach ($_POST as $key => $answer) {
        if (isset($question_genre_map[$key])) {
            $options = $question_genre_map[$key];
            if (isset($options[$answer])) {
                foreach ($options[$answer] as $genre) {
                    $genres[$genre]++;
                }
            }
        }
    }

    // Determine the most preferred genre
    arsort($genres);
    // Retrieve the top 3 genres
    $topGenres = array_keys(array_slice($genres, 0, 3));

    $topGenresJson = json_encode($topGenres);

    // Correction: aku tambah masuk database

    $user_id = $_SESSION['user_id'];

    $update_top_genre = "UPDATE users SET top_genres = '$topGenresJson' WHERE id = '$user_id'";

    $result = mysqli_query($conn, $update_top_genre);

    // Save the top genres in the session for display on result page
    $_SESSION['topGenres'] = $topGenres;

    // Redirect to the results page
    header("Location: result.php");
    exit();
}

?>

<?php include 'header.php'; ?>
<section class="section colored">   
<br><br><br>
<h1 class="text-center mt-4">Let's Get to Know Your Preferences!</h1>
<form id="quizForm" action="quiz.php" method="post">
    <div id="questionContainer" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: justify; margin-bottom: 20px;">
    <div class="form-check" style="justify-content: center;">
        <!-- Question 1 -->
        <div class="question-container">
<main class="container mt-5">
    <form id="quizForm" action="quiz.php" method="post">
        <div id="questionContainer">
            <!-- Question 1 -->
            <div class="question" id="question1">
                <label style="font-size: 1.5em;">1. What type of story captivates you the most?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question1" value="Mystery" required>
                    <label class="form-check-label"> A thrilling mystery that keeps me guessing</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question1" value="Romance">
                    <label class="form-check-label"> An emotional romance that tugs at my heartstrings</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question1" value="Adventure">
                    <label class="form-check-label"> An epic adventure with heroes and quests</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question1" value="Philosophical">
                    <label class="form-check-label"> A thought-provoking tale that challenges my perspective</label>
                </div>
            </div>
</div>

           <!-- Question 2 -->
           <div class="question" id="question2" style="display:none;">
                <label style="font-size: 1.5em;">2. Which setting do you find most appealing?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question2" value="Puzzles" required>
                    <label class="form-check-label"> A bustling city full of secrets</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question2" value="Relationships">
                    <label class="form-check-label"> A quiet countryside or small town</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question2" value="Exploration">
                    <label class="form-check-label"> A fantastical world filled with magic</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question2" value="Reflection">
                    <label class="form-check-label"> A futuristic or dystopian society</label>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="question" id="question3" style="display:none;">
                <label style="font-size: 1.5em;">3. How do you prefer the characters in your stories?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question3" value="Beach" required>
                    <label class="form-check-label"> Flawed heroes who grow through their experiences</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question3" value="City">
                    <label class="form-check-label"> Relatable everyday people facing challenges</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question3" value="Mountain">
                    <label class="form-check-label"> Strong, independent protagonists with a mission</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question3" value="Countryside">
                    <label class="form-check-label"> Complex antagonists with rich backstories</label>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="question" id="question4" style="display:none;">
                <label style="font-size: 1.5em;">4. What kind of story pacing do you enjoy?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question4" value="Detective" required>
                    <label class="form-check-label"> Fast-paced with lots of action and excitement</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question4" value="Hero">
                    <label class="form-check-label"> Slow and steady, allowing for deep character exploration</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question4" value="Explorer">
                    <label class="form-check-label"> A mix of both, with intense moments and quieter scenes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question4" value="Philosopher">
                    <label class="form-check-label"> Episodic, with each chapter offering a new perspective</label>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="question" id="question5" style="display:none;">
                <label style="font-size: 1.5em;">5. Which themes resonate with you the most?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question5" value="Justice" required>
                    <label class="form-check-label"> Friendship and loyalty</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question5" value="Love">
                    <label class="form-check-label"> Love and relationships</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question5" value="Discovery">
                    <label class="form-check-label"> Adventure and exploration</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question5" value="Meaning">
                    <label class="form-check-label"> Moral dilemmas and ethical questions</label>
                </div>
            </div>

            <!-- Question 6 -->
            <div class="question" id="question6" style="display:none;">
                <label style="font-size: 1.5em;">6. What tone do you prefer in your books?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question6" value="Urban" required>
                    <label class="form-check-label"> Light-hearted and humorous</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question6" value="Romantic">
                    <label class="form-check-label"> Dark and suspenseful</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question6" value="Wilderness">
                    <label class="form-check-label"> Inspirational and uplifting</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question6" value="Ancient">
                    <label class="form-check-label"> Gritty and realistic</label>
                </div>
            </div>

            <!-- Question 7 -->
            <div class="question" id="question7" style="display:none;">
                <label style="font-size: 1.5em;">7. How do you feel about fantasy elements in stories</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question7" value="Happy" required>
                    <label class="form-check-label"> I love them—magic and mythical creatures are my favorites!</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question7" value="Tragic">
                    <label class="form-check-label"> I prefer stories grounded in reality with minimal fantasy</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question7" value="Open">
                    <label class="form-check-label"> I enjoy a little fantasy mixed in with real-life situations</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question7" value="Suspenseful">
                    <label class="form-check-label"> I’m open to fantasy if it’s well-integrated into the plot</label>
                </div>
            </div>

            <!-- Question 8 -->
            <div class="question" id="question8" style="display:none;">
                <label style="font-size: 1.5em;">8. What is your preferred book format?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question8" value="Analytical" required>
                    <label class="form-check-label"> Novels (full-length stories)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question8" value="Romantic">
                    <label class="form-check-label"> Short stories or novellas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question8" value="Adventurous">
                    <label class="form-check-label"> Graphic novels or illustrated books</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question8" value="Reflective">
                    <label class="form-check-label"> Non-fiction and biographies</label>
                </div>
            </div>

            <!-- Question 9 -->
            <div class="question" id="question9" style="display:none;">
                <label style="font-size: 1.5em;">9. How important are character relationships in the books you read??</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question9" value="DetectiveStory" required>
                    <label class="form-check-label"> Very important—character development is key for me!</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question9" value="EpicAdventure">
                    <label class="form-check-label"> Somewhat important—I enjoy them but don’t need them to be the main focus.</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question9" value="Romantic">
                    <label class="form-check-label"> Not very important—I’m more interested in the plot or themes.</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question9" value="ThoughtProvoking">
                    <label class="form-check-label"> It depends on the genre; some genres require strong relationships.</label>
                </div>
            </div>

            <!-- Question 10 -->
            <div class="question" id="question10" style="display:none;">
                <label style="font-size: 1.5em;">10. What is your preferred ending style?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question10" value="Mysteries" required>
                    <label class="form-check-label"> A happy or satisfying conclusion</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question10" value="TrueLove">
                    <label class="form-check-label"> An open-ended or thought-provoking ending</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question10" value="Adventures">
                    <label class="form-check-label"> A twist or surprise ending that changes everything</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question10" value="PhilosophicalQuestions">
                    <label class="form-check-label"> A bittersweet conclusion that feels realistic</label>
                </div>
            </div>
<br><br>
            <div class="text-center">
        <button type="button" id="nextButton" class="main-button">Next</button><br><br>
    </div>
    </form>
</main>
</section>

<script>
// Handle the next button functionality
let currentQuestion = 1;
const totalQuestions = 10;
const nextButton = document.getElementById('nextButton');

nextButton.addEventListener('click', function() {
    const currentQuestionDiv = document.getElementById('question' + currentQuestion);
    // Validate that a radio button is selected
    const selectedOption = currentQuestionDiv.querySelector('input[type="radio"]:checked');
    if (!selectedOption) {
        alert('Please select an answer.');
        return;
    }

    // Hide current question
    currentQuestionDiv.style.display = 'none';

    // Show the next question
    currentQuestion++;
    if (currentQuestion <= totalQuestions) {
        const nextQuestionDiv = document.getElementById('question' + currentQuestion);
        nextQuestionDiv.style.display = 'block';
    }

    // If last question, change button to submit
    if (currentQuestion === totalQuestions) {
        nextButton.textContent = 'Submit';
        nextButton.type = 'submit';
        nextButton.form = 'quizForm';
    }
});
</script>
<?php include 'footer.php'; ?>