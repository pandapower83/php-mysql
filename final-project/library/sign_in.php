<?php

print_r($_POST);

/*when you use a header function to move people around, you cant have php build a page at the same time. once something displays, then php will build */

$username = trim($_POST['username']);
$password = md5($_POST['password']);
/*md5 converts it to a set of values hashing it */

/* this could be a function. it validates it is an email */
if(filter_var($username, FILTER_SANITIZE_EMAIL)) {
    echo 'Email';
}   else {
    echo 'Not Email';
}


/*this username should already be in the db, so we need to conenct to it. */

require('connect.php');

$query = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";

$db = mysqli_select_db($connect, 'simple_farms');

if($db) {
    
    echo 'Found your database<br>';
    
    /*find the user */
    
    $find_user = mysqli_query($connect, $query);
    
    /*did it return a row? */
    
        if(mysqli_num_rows($find_user) === 1) {
        
            echo 'Found the user <br>';
        
        /*fetches the row and stores it */
            
           while ($row = mysqli_fetch_assoc($find_user)) {
               
               /*this is error checking to see if there is a user */
               
               echo $row['fname'].' '.$row['lname'];
               
               /*set up a session here https://www.w3schools.com/php/php_sessions.asp every doc that you want to involve in the session must have session start first.*/
               
               session_start();
               /*varaible to check to see if session is legit */
            
               $_SESSION['user'] = $row['email'];
               
               /*variable to refer to the person */
               
               $_SESSION['name'] = $row['fname'];
               
               /*sending user to admin part of website */
               header('location: ../admin/index.php');                
           }
               
        } else{
            session_start();
            $_SESSION['casual'] = "Guest";
            header('location: ../index.php');
        } 
    
} else {
    
            header('location: ../index.php');
        echo 'database not found <br>';
}




echo '<br><br>';
echo $password;

echo  $_SESSION['user'].' '.$_SESSION['name'];


?>















?>