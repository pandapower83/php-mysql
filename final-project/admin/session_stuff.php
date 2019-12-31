<?php



session_start();

if(!isset($_SESSION['user'])) {
    
/* echo 'Hello '.$_SESSION['name'];

echo $_SESSION['user']; */


    header('location: ../index.php');
}







?>