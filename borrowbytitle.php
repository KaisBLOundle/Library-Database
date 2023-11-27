<!DOCTYPE html>
<html>

	<?php

	include_once("connection.php");
	$searchErr = '';

	print_r($_POST);
	$search="%".$_POST["search"]."%";
		if(!empty($_POST['search']))
		{
			$stmt = $conn->prepare("SELECT * FROM TblBooks WHERE Title like :search ");
			
			$stmt->bindParam(':search', $search);
			$stmt->execute();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			
			echo("<br>".' '.$row["Title"].' '. $row["Author"].' '.$row["Genre"]."<br>");
			
			}

		}
		else
		{
			$searchErr = "Please enter valid information";
			echo($searchErr);
		}


	?>
	<form action="borrow.php">
		<input type="submit" value="Add book">
	</form>

</html>


