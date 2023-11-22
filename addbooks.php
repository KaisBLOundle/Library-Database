<?php

//header('Location:subjects.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
print_r($_POST);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);

	
	$stmt = $conn->prepare("INSERT INTO Tblbooks (BookID,Author,Title,Genre)VALUES (null,:author,:title,:genre)");
	$stmt->bindParam(':author', $_POST["author"]);
	$stmt->bindParam(':title', $_POST["title"]);
    $stmt->bindParam(':genre', $_POST["genre"]);
	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>
<?php
    echo("Submitted");
    ?>
<form action="adduser.php" method = "post">