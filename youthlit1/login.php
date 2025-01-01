<?php
// Include the database connection
include('db_connect.php');
session_start();

$username_error = '';
$password_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input (basic check)
    if (empty($username)) {
        $username_error = 'Username is required!';
    }
    if (empty($password)) {
        $password_error = 'Password is required!';
    }

    if (empty($username_error) && empty($password_error)) {
        // Prepare SQL query to get user by username
        $sql = "SELECT id, username, password, top_genres FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username); // Bind the username parameter

            // Execute query and fetch result
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($id, $username_db, $password_db, $top_genres);

            if ($stmt->fetch()) {
                // If user is found, verify the password
                if (password_verify($password, $password_db)) {
                    // Password is correct, create session
                    $_SESSION['user_id'] = $id;
                    $_SESSION['username'] = $username_db;
                    $_SESSION['topGenres'] = json_decode($top_genres, true); // Correction: Ni aku ubah set untuk topGenres
                    header("Location: welcome.php"); // Redirect to a welcome page
                    exit();
                } else {
                    $password_error = 'Incorrect password!';
                }
            } else {
                $username_error = 'No user found with that username!';
            }

            $stmt->close();
        }
    }
}
?>

<!-- Include the HTML form -->
<?php include('login_form.php'); ?>