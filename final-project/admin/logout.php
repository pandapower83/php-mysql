<?php

session_start();


require('../library/header_sec.html');

require('../library/head.html');

require('library/admin_nav.html');


//store to test to see if logged in 

$old_user = $_SESSION['user'];
unset($_SESSION['user']);
session_destroy();

echo "<br><h4>Log Out of Admin Page</h4><br>";

if (!empty($old_user)) {
    echo '<p>You have been logged out.</p>';
} else {
    //if they were never logged in but got here by accident
    
    echo '<p> You were not logged in and cannot be logged out</p>';
} 
header('location: ../index.php');



?>