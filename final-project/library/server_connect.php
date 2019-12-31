<?php

$address = 'localhost';
$user = 'root';
$password = 'root';

$connect = mysqli_connect('localhost', 'root' , 'root');
	
	if(!$connect) {
		echo 'Nope. Connection not successful';
	} else {
		echo 'Yup. Connection is good.';
	}
	

?>