<?php
    session_start();
    
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");
    
    
			
    $stmt = $conn->prepare("INSERT INTO tbluserbooks(BookID, UserID, Date) VALUES (:bookID,:userID,:date)");
    $stmt->bindParam(':userID', $_SESSION['ID']);
    $stmt->bindParam(':bookID', $_SESSION['bID']);
    $stmt->bindParam(':date', $_POST['Date']);
    $stmt->execute();

   
        
    

  
   
    
    echo("You have Successfully Borrowed the book")

?>
<?php
 if(isset($_SESSION['bID']))
    {
        unset($_SESSION['bID']);
    }
?>



<a href="mainpage.php">Return to home page</a>