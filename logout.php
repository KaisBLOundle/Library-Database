<?php
session_start();
if(isset($_SESSION['ID']))
{
    unset($_SESSION['ID']);
}

?>
<a href="mainpage.php">return to home page</a>