<?php

$connect = mysqli_connect('localhost', 'root' , 'root');


 if(!$connect) {
        echo "unable to connect to the database <br> ".mysqli_errno;
    } else {
        echo "connection made to database! <br>";
    }

if (!mysqli_select_db($connect, 'simple_farms')) {
		
		$make_db = 'CREATE DATABASE simple_farms';
		
		if (!mysqli_query($connect, $make_db)) {
			
			echo 'Something bad happened'. mysqli_error($connect);
		
			
		} else {
		
			echo 'Database Created';
		} else {
    
    echo 'Database Already Exists';

	} 


 
}
   
?>
