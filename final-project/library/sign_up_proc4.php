<?php

/*the goal for this processor is to check the username and password matching, then move on to connecting to the database. once signed up session is started and user goes straight to admin side. no need to log in after signing up. */

/*print_r($_POST); */

$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$street_address = trim($_POST['street_address']);
$city = trim($_POST['city']);
$state = trim($_POST['state']);
$zip = trim($_POST['zip']);
$user_name1 = trim($_POST['user_name1']);           
$user_name2 = trim($_POST['user_name2']);
        
$password1 = md5($_POST['password1']);
$password2 = md5($_POST['password2']);


        
        /* running functions to check for username, password, and both match . my require statements and opening files just don't work right now.
       require('functions/functions.php');      
        user_name_match();
        password_match();
        username_password_match(); */
        
if ($user_name1 !== $user_name2) {
	

    echo 'Username does not match. Please try again. <br>';
	
} elseif ($password1 !== $password2) {
        
    echo 'Passwords do not match. Please try again. <br>';
        
} elseif ($user_name1 === $user_name2 and $password1 === $password2) {
        
    echo 'Thank you ' .$fname. ' ' .$lname. '. Your signup was successful.';

        require('connect.php');
	
    
        if (!mysqli_select_db($connect, 'simple_farms')) {
		
		$make_db = 'CREATE DATABASE simple_farms';
		
		if (!mysqli_query($connect, $make_db)) {
			
            echo 'Something bad happened'.   mysqli_error($connect);
		
			
		} else {
		
			/*echo 'Database Created'; */
		}		
		
	} else {
	
		/*echo '<br>Database Already There'; */

	}
    
}


/*echo 'you are here table time<br>';*/
/*opening the doc where your table is at */
/*storing the table as a variable so we dont have to type its name */

/*$connect1= mysqli_connect('localhost', 'root', 'root', 'simple_farms'); */
$table = 'make_users_table.txt';
$fopen = fopen($table, 'r');
/*storing what is in the table in a variable */
$data = fread($fopen, filesize($table));


/*checking to see if there is a table in there, if not make it */
$running = mysqli_query($connect, $data);

if (mysqli_query($connect, "DESCRIBE 'users'")) {
    /*put something here */
} elseif(!$running) {
    /*echo 'oh man isnt running and cant make the table '; */
        
    } else {
        /*echo 'table is running'; */
    }
    
fclose($fopen);
/*echo 'adding stuff to the table '; */

$query = "INSERT INTO users (fname, lname, address, city, state, zip, email, password) 
VALUES ('$fname', '$lname', '$street_address', '$city', '$state', '$zip', '$user_name1', '$password1')";

/*these may need to match what is on sign_in.php */

$add_users = mysqli_query($connect, $query);

if (!$add_users) {
    
    /*echo '<br>something went wrong no users added'; */
    
} else {
    
  
    $query = "SELECT * FROM users WHERE email = '$user_name1' AND password = '$password1'";
    
    /*find the user */
    
    $find_user = mysqli_query($connect, $query);
    
    /*did it return a row? */
    
        if(mysqli_num_rows($find_user) === 1) {
        
           /* echo 'Found the user <br>'; */
        
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
        }
}




    
   
 ?>
        