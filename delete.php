<?php
// Include database connection
include('db.php');

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Delete the book from the database
    $sql = "DELETE FROM books WHERE id = $book_id";
    if (mysqli_query($conn, $sql)) {
        echo "Book deleted successfully!";
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
