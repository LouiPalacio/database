<?php
// Include the database connection file
include('db.php');

// Check if the book ID is passed via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing book details from the database
    $result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
    $book = mysqli_fetch_assoc($result);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the updated values from the form
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $year_published = mysqli_real_escape_string($conn, $_POST['year_published']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    // SQL query to update the book in the database
    $sql = "UPDATE books SET 
            title = '$title',
            author = '$author',
            genre = '$genre',
            year_published = '$year_published',
            quantity = '$quantity'
            WHERE id = $id";
    
    // If the update is successful, redirect to index.php
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php"); // Redirect to index.php
        exit(); // Stop further code execution
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style3.css"> <!-- Link to the CSS file -->
</head>
<body>
    <!-- Edit Book Container -->
    <div class="edit-book-container">
        <!-- Edit Book Form -->
        <div class="edit-book-form">
            <h2>Edit Book Details</h2>
            <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                <input type="text" name="title" value="<?php echo $book['title']; ?>" required>
                <input type="text" name="author" value="<?php echo $book['author']; ?>" required>
                <input type="text" name="genre" value="<?php echo $book['genre']; ?>">
                <input type="number" name="year_published" value="<?php echo $book['year_published']; ?>">
                <input type="number" name="quantity" value="<?php echo $book['quantity']; ?>" required>
                <button type="submit" name="submit">Update Book</button>
            </form>
        </div>
    </div>
</body>
</html>
