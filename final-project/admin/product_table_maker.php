<?php

require('library/connect.php');

$db = mysqli_select_db($connect, 'simple_farms');

$products_table = "
CREATE TABLE IF NOT EXISTS products (

	product_id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY, 
	product_name VARCHAR(25) NOT NULL,
	product_description VARCHAR(256) NOT NULL,
	product_price DECIMAL(8, 2) NOT NULL,
    product_quantity INT(15) NOT NULL,  product_special VARCHAR(50) NOT NULL,
     	
	INDEX(product_id)
)";

$images_table =" 
CREATE TABLE IF NOT EXISTS images (

	image_id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
	product_id INT(11),
	image_name VARCHAR(25) NOT NULL,
	image_description VARCHAR(256) NOT NULL,
	image_path VARCHAR(70) NOT NULL,
	
	INDEX(product_id),
	
	FOREIGN KEY(product_id) REFERENCES products(product_id) ON UPDATE CASCADE ON DELETE CASCADE
	
)";

if (!$db) {
	
	echo 'Stop Here - No DB';
	
} else {
	
	$query = mysqli_query($connect, $products_table);
	
	if (!$query) {
		
		echo 'Stop here - No Table 1';
	} 
	
	$query2 = mysqli_query($connect, $images_table);
	
	if (!$query2) {
		
		
		echo 'Stop Here - No Table 2';
	}
	
	echo 'We have tables';
}



?>