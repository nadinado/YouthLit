<?php
session_start();
include('db_connect.php'); // Sambungkan dengan pangkalan data

if (isset($_POST['book_id']) && isset($_SESSION['user_id'])) {
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];

    // Periksa jika buku wujud
    $check_book_query = "SELECT * FROM books WHERE id = '$book_id'";
    $check_result = mysqli_query($conn, $check_book_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Buku wujud, masukkan ke dalam senarai kegemaran
        $insert_query = "INSERT INTO favorites (book_id, user_id) VALUES ('$book_id', '$user_id')";
        
        if (mysqli_query($conn, $insert_query)) {
            // Jika berjaya menambah buku, kirim respons untuk membuka profile.php
            echo "<script>
        alert('Book added to favorites!');
        window.location.href = 'profile.php'; // This keeps it in the same tab
      </script>";

        } else {
            echo "Error adding to favorites: " . mysqli_error($conn);
        }
    } else {
        echo "The specified book does not exist.";
    }
}
?>
