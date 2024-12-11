<?php
// Include database connection
include('db.php');

// Fetch all books from the database
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Library Management System</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Header Section with Background Image -->
<div class="header">
    <h1>Library Management System</h1>
</div>

<!-- Container to display books -->
<div class="container">
    <a href="add.php" class="btn">Add New Book</a>
    <h2>Available Books</h2>

    <!-- Books Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year Published</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($book = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['genre']; ?></td>
                    <td><?php echo $book['year_published']; ?></td>
                    <td><?php echo $book['quantity']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $book['id']; ?>" class="btn">Edit</a>
                        <a href="delete.php?id=<?php echo $book['id']; ?>" class="btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
