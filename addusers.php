

<?php
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");
    
    switch($_POST["role"]){
        case "Pupil":
            $role=0;
            break;
        case "Admin":
            $role=1;
            $_POST["house"]="";
            $_POST["year"]="";
            break; 
        }
    $stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Surname,Forename,Password,Year ,Role)VALUES (null,:surname,:forename,:password,:year,:role)");

    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':year', $_POST["year"]);
    $stmt->bindParam(':password', $_POST["passwd"]);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
$conn=null;
            
?>
<?php
    echo("Submitted");
    ?>
<form action="adduser.php" method = "post">
<?php
echo $_POST["forename"]."<br>";
echo $_POST["surname"]."<br>";
echo $_POST["year"]."<br>";
echo $_POST["passwd"]."<br>";
echo $_POST["role"]."<br>";
?>
<a href="users.php" ></a>
