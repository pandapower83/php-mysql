<?php
 /* this script connects to the server, creates a database and then creates two tables.  
 Later scripts will populate those tables based on two forms*/


/* connect to server */
require('server_connect.php');
	

/*connect to database */

require('db_connect.php');


/*Opening user table document */

$table = 'make_users_table.txt';

/* reading the document */
$fopen = fopen($table, 'r');

/*storing what is in the table in a variable */
$data = fread($fopen, filesize($table));


/*checking to see if there is a table in the database, if not make it */
$running = mysqli_query($connect, $data);

if (mysqli_query($connect, "DESCRIBE 'users'")) {
    /*put something here */
} elseif(!$running) {
    echo 'Database not running. Cannot create table. '; 
        
    } else {
        echo 'Database running with table created.';
    }

/* in my next scripts I have this all connected for the proper table using separate scripts. 
echo 'adding stuff to the table ';

$query = "INSERT INTO users (fname, lname, user_name, password) 
VALUES ('$fname', '$lname', '$user_name1', '$password1')";

$add_users = mysqli_query($connect, $query);

if (!$add_users) {
    
    echo '<br>something went wrong no users added';
    
} else {
    
    echo '<br>new users have been added';
    header('location:../index.php');
} */
    
    /*opening the doc for products table */
    
    $products_table = 'make_products_table.txt';
    $fopen = fopen($products_table, 'r');
    /*storing what is in the table in a variable */
    $product_data = fread($fopen, filesize($products_table));
    
    /*checking to see if there is a table in there, if not make it */
    $running1 = mysqli_query($connect, $product_data);
    
    if (mysqli_query($connect, "DESCRIBE 'products'")) {
        /* put something in here */
    } elseif(!$running1) {
        echo 'isnt running cannot make products table';
    } else {
        echo 'products table is running ';
    }
    
    fclose($fopen);
   



















?>