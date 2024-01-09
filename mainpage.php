<!DOCTYPE html>
<html>

<head>
    <title> Mainpage</title>
<?php
    session_start();
    include_once("connection.php");

    $stmt = $conn->prepare("SELECT * FROM Tblusers WHERE UserID like :userID  ");
    $stmt->bindParam(':userID', $_SESSION['ID']);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        echo('<h1>Welcome to school library</h1>'.''.$row["Forename"]);
    }
?>
    
</head>
<body>
    <br>

    <a href="login.php">Login</a><br>
    <a href="searchbytitle.php">Search for book by title to borrow or return</a><br>
    <a href="searchbyauthor.php">Search for book by author to borrow or return</a><br>
    <a href="">Find a book by genre</a><br>
    <a href="showuserbooks.php">Show all the books you borrowed</a><br>
    <?php
    echo( $_SESSION['ID'])
    ?>
</body>

</html>