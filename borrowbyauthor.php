<!DOCTYPE html>
<html>
	
	<?php
	session_start();
	include_once("connection.php");
	$searchErr = '';

	print_r($_POST);
	$search="%".$_POST["search"]."%";	
		if(!empty($_POST['search']))
		{
			$stmt = $conn->prepare("SELECT * FROM TblBooks WHERE Author like :search ");
			
			$stmt->bindParam(':search', $search);
			$stmt->execute();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			
			echo("<br>");
			echo("<br>". " Your book is:");
			echo(' '.$row["Title"].' by '. $row["Author"].'/  Genre: '.$row["Genre"]."<br>");
			$_SESSION['bID']=$row["BookID"];
			echo( $_SESSION['bID']);

			}

		}
		else
		{
			$searchErr = "Please enter valid information";
			echo($searchErr);
		}

		
	?>
	<p>If you would like to borrow this book you have a month to return it!!!!</p>
	<form action="borrow.php" method="post">
        Date Borrowed<input type="date" name=" Date"><br>
        <input type="submit" value="Borrow Book">
    </form>
	<a href="mainpage.php">Return to Main Page</a>

</html>


