<?php


$address = 'localhost';
$user = 'root';
$password = 'root';

//create connection 

$connect = mysqli_connect($address, $user , $password);
	
//check connection

	if(!$connect) {
		echo 'Nope. Connection not successful';
	} else {
		echo 'Yup. Connection is good.';
	}

//create database

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


$users_table = "CREATE TABLE users(
user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(60),
lname VARCHAR(60),
email VARCHAR(100),
password VARCHAR(200)
)";

if (mysqli_query($connect, $users_table) === TRUE) {
    
    echo "Users Table created successfully";
} else {
    echo "Error creating users table: ".mysqli_error($connect);
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


if (mysqli_query($connect, $products_table) === TRUE) {
    
    echo "Products Table created successfully";
    
} else {
    echo "Error creating products table: " .mysqli_error($connect);
}


?>