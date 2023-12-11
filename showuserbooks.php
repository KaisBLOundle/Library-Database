<!DOCTYPE html>
<html>
<?php

    session_start();
    include_once("connection.php");
    
    $stmt = $conn->prepare("SELECT * FROM Tbluserbooks WHERE UserID like :userID  ");
    $stmt->bindParam(':userID', $_SESSION['ID']);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $num1 = $row['UserID'];
        $num2 =$row['BookID'] ;
    
        $stmt2 = $conn->prepare("SELECT*FROM TblUsers where UserID like :userID ");
        $stmt2->bindParam(':userID', $num1);
        $stmt2->execute();
        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){

            $Forename = $row2['Forename'];
            $Surname=  $row2['Surname'];
            echo(' '.$Forename.' '.$Surname.':    ');
        
        }
        
       
        $stmt3 = $conn->prepare("SELECT*FROM TblBooks where BookID like :bookID");
        $stmt3->bindParam(':bookID', $num2);
        $stmt3->execute();
        while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
        
            $book = $row3['Title'];
            echo('  '.'  '.$book);
        }
        echo("<br>");
        echo("<br>");
    }
    
    
?>
</html>