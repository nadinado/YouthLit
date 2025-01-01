<?php
// Database connection settings
$servername = "localhost";    // Your MySQL server, typically 'localhost'
$username = "root";           // Your MySQL username, typically 'root'
$password = "";               // Your MySQL password (if any, otherwise leave it empty)
$dbname = "youthlit"; // Replace with your actual database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully"; // Optional: to confirm the connection
?>
