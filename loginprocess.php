<?php
session_start(); 
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE UserID =:userid ;" );
$stmt->bindParam(':userid', $_POST['userID']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    if($row['Password']== $_POST['Pword']){
        $_SESSION['ID']=$row["UserID"];
        header('Location: mainpage.php');
    }else{

        header('Location: login.php');
        echo("Please try again");
    }
}
$conn=null;
?>
