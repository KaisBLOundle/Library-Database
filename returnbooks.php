<?php
    session_start();
	include_once("connection.php");
    $stmt = $conn->prepare("DELETE * FROM Tbluserbooks WHERE UserID like :userID and BookID like :bookID ");
    $stmt->bindParam(':userID', $_SESSION['ID']);
    $stmt->bindParam(':bookID', $_SESSION['bID']);
    $stmt->execute();
    echo("You have successfully returned your book")
    ?>