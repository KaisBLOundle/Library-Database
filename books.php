<!DOCTYPE html>
<html>
   

<head>
    
    <title>Books</title>
    
</head>
<body>
    <form action="addbooks.php" method="post">
        Author:<input type="text" name="author"><br>
        Title:<input type="text" name="title"><br>
        Genre:<input type="text" name="genre"><br>
        <input type="submit" value="Add book">
    </form>
    
    <?php
        include_once('connection.php'); 
        $stmt = $conn->prepare("SELECT * FROM TblUsers");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
       
        ?>
        <a href="mainpage.php"> return to mainpage</a>
</body>
</html>