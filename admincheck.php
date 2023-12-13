<!DOCTYPE html>
<html>
    <?php
    session_start();
    include_once("connection.php");
    $stmt = $conn->prepare("SELECT * FROM Tblusers WHERE UserID like :userID  ");
    $stmt->bindParam(':userID', $_SESSION['ID']);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    if($row['Role'] == 1 ){
        header('Location: adminhome.php');

    }
    else{
        echo("you are not an admin");
        echo("<br>");
        echo('<a href="mainpage.php">return to mainpage</a>');
    }
}
    ?>
</html>