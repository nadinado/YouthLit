<?php
session_start();
include 'db_connect.php';  // Include the database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];  // Assuming the user ID is stored in the session

// Check if the book ID is provided in the URL
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];  // This is the book_id to delete from the favorites table

    // Debugging: Check if bookId and userId are set
    echo "Book ID: $bookId, User ID: $userId";  // This will print the values being used in the query for debugging

    // Query to delete the book from the favorites table
    $query = "DELETE FROM favorites WHERE user_id = ? AND book_id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ii", $userId, $bookId);  // Bind user_id and book_id parameters
        $stmt->execute();

        // Debugging: Check if the query affected any rows
        if ($stmt->affected_rows > 0) {
            // Successfully deleted, redirect back to profile page
            header("Location: profile.php?message=Book deleted successfully.");
        } else {
            // Debugging: If no rows were affected, it means the record was not found
            echo "No record found with the provided user ID and book ID.";
        }
    } else {
        // Handle query preparation error
        echo "Error preparing the query: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // If the book ID is not provided, redirect to the profile page
    header("Location: profile.php");
}

// Close the database connection
$conn->close();
?>
