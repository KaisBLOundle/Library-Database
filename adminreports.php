<!DOCTYPE html>
<html>
<?php

    session_start();
    include_once("connection.php");
    
    $stmt = $conn->prepare("SELECT * FROM Tbluserbooks");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $num1 = $row['UserID'];
        $num2 =$row['BookID'] ;
        $Date=$row['Date'];
        echo($row['Date']);
        $timezone = date('Y-m-d H:i:s');
        $Date30 = date('Y-m-d', strtotime($Date. ' + 30 days'));
        if($Date30 < $timezone){
            echo("(Overdue)");
        }

    
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
<a href="adminhome.php">Return to admin page</a><br><br>
<a href="mainpage.php">Return to Main Page</a>
</html>