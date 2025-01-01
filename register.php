<?php
// Include the database connection
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate input
    if (empty($username) || empty($password) || empty($email)) {
        echo "All fields are required!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL to insert a new user into the database
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $username, $hashed_password, $email);

            // Execute and check if the query was successful
            if ($stmt->execute()) {
                echo "Registration successful!";
                // Optionally, redirect to login page
                header("Location: login.php");
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>

<!-- HTML Form (This can be in a separate file, e.g., register_form.html) -->
<?php include('register_form.php'); ?>
