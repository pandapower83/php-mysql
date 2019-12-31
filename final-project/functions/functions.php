
<?php

function connect() {
   

$address = 'localhost';
$user = 'root';
$password = 'root';

$connect = mysqli_connect($address, $user , $password);
	
	if(!$connect) {
		echo 'Nope. Connection not successful';
	} else {
		echo 'Yup. Connection is good.';
	}
	

}

function create_db() {
    
    if (!mysqli_select_db($connect, 'simple_farms')) {
		
		$make_db = 'CREATE DATABASE simple_farms';
		
		if (!mysqli_query($connect, $make_db)) {
			
			echo 'Someting bad happened'. mysqli_error($connect);
		
			
		} else {
		
			echo 'Database Created';
		}		
		
	} else {
    
    echo 'Database Already Exists';

	} 
}


function user_name_match() {
    
    $user_name1 = trim($_POST['user_name1']);
    $user_name2 = trim($_POST['user_name2']);
    
     if ($user_name1 !== $user_name2) {
	
	echo 'Username does not match. Please try again. <br>';
	
} else {
         echo 'Usernames match <br>';
     }

}




function password_match() {
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    
    if ($password1 !== $password2) {
        
        echo 'Passwords do not match. Please try again. <br>';
        
    } else {
        echo 'Passwords match <br>';
    }
}

function username_password_match() {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $user_name1 = trim($_POST['user_name1']);
    $user_name2 = trim($_POST['user_name2']);
    
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    if ($user_name1 === $user_name2 and $password1 === $password2) {
        
        echo 'Thank you ' .$fname. ' ' .$lname. '. Your signup was successful.';
    }
}


function database_connect() {
    if ($user_name1 === $user_name2 and $password1 === $password2) {
   
	/* Once its made it though any checking */
	
	require('connect.php');
	
	if (!mysqli_select_db($connect, 'simple_farms_signup')) {
		
		$make_db = 'CREATE DATABASE simple_farms_signup';
		
		if (!mysqli_query($connect, $make_db)) {
			
			echo 'Someting bad happened'. mysqli_error($connect);
		
			
		} else {
		
			echo 'Database Created';
            echo 'Thank you for signing up';
		}		
		
	} else {
	
		echo 'Already There';

	}
}
    }


?>