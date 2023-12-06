<!DOCTYPE html>
<html>

<head>
    <title> Mainpage</title>
    <h1>Welcome to school libary</h1>
</head>
<body>
    <a href="users.php">Add a user</a><br>
    <a href="books.php">Add a book to the Library</a><br>
    <a href="searchbytitle.php">Search for book by title</a><br>
    <a href="searchbyauthor.php">Search for book by author</a><br>
    <a href="">Find a book by genre</a><br>
    <?php
    session_start();
    echo( $_SESSION['name'])
    ?>
</body>

</html>