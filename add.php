<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="style2.css"> <!-- Link to the CSS file -->
</head>
<body>
    <!-- Add Book Container -->
    <div class="add-book-container">
        <!-- Add Book Form -->
        <div class="add-book-form">
            <h2>Add a New Book</h2>
            <form action="add.php" method="POST">
                <input type="text" name="title" placeholder="Book Title" required>
                <input type="text" name="author" placeholder="Author" required>
                <input type="text" name="genre" placeholder="Genre">
                <input type="number" name="year_published" placeholder="Year Published">
                <input type="number" name="quantity" placeholder="Quantity" required>
                <button type="submit" name="submit">Add Book</button>
            </form>
        </div>
    </div>

    <?php
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Include the database connection file
        include('db.php');
        
        // Retrieve the form data
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $genre = mysqli_real_escape_string($conn, $_POST['genre']);
        $year_published = mysqli_real_escape_string($conn, $_POST['year_published']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

        // SQL query to insert the book into the database
        $sql = "INSERT INTO books (title, author, genre, year_published, quantity) 
                VALUES ('$title', '$author', '$genre', '$year_published', '$quantity')";
        
        if (mysqli_query($conn, $sql)) {
            // Redirect to the index.php page after the book is added
            header("Location: index.php");
            exit(); // Make sure to call exit after header redirection
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
</body>
</html>
