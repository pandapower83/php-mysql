<?php


$address = 'localhost';
$user = 'root';
$password = 'root';

//create connection 

$connect = mysqli_connect($address, $user , $password);
	
//check connection

	if(!$connect) {
		echo 'Nope. Connection not successful. <br>';
	} else {
		echo 'Yup. Connection is good. <br>';
	}

//create database

if (!mysqli_select_db($connect, 'simple_farms')) {
		
		$make_db = 'CREATE DATABASE simple_farms';
		
		if (!mysqli_query($connect, $make_db)) {
			
			echo 'Something bad happened. Database not created <br>'. mysqli_error($connect);
		
			
		} else {
		
			echo 'Database Created <br>';
		}		
		
	} else {
	
		echo 'Database Already Exists <br>';

	}

$dbconn = mysqli_connect('localhost', 'root' , 'root', 'simple_farms');

$users_table = "CREATE TABLE users (
user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
f_name VARCHAR(60),
l_name VARCHAR(60),
email VARCHAR(100), 
password VARCHAR(200)
)";

if (mysqli_query($dbconn, $users_table) === TRUE) {
    
    echo "Users Table created successfully <br>";
} else {
    echo "Error creating users table:  ".mysqli_error($dbconn);
}

$products_table = "CREATE TABLE products (
product_id INT(11) AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(25),
product_description VARCHAR(250),
product_price VARCHAR(10),
product_quantity INT, 
product_special VARCHAR(1),
product_img VARCHAR(300),
product_img_desc VARCHAR(100)
)";

if (mysqli_query($dbconn, $products_table) === TRUE) {
    
    echo "Products Table created successfully <br>";
    
} else {
    echo "Error creating products table: " .mysqli_error($dbconn);
}


?>