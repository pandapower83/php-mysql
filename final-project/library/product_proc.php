<?php /*product_proc is the processor for product_form.php */

/* session_start(); */

/*print r to see the array */

print_r($_POST);

/* get variables from the post */


/*if(isset($_POST['submit'])) {
    if ($_POST['submit'] == 'product_submit') { */
        $product_name= trim(htmlspecialchars($_POST['product_name']));
        $product_description = trim($_POST['product_description']);
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_special = htmlspecialchars($_POST['product_special']);
        $product_img_desc = trim(htmlspecialchars($_POST['product_img_desc']));
      /*  $product_img = $_FILES['fileToUpload']; */


/*file upload verfication- is it an image? */
      
        $target_dir ='uploads/';
        $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
        $uploadOk = 1;
        $imageFileType =    strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        
        
        // Check if image file is a actual image or fake image
        
            $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
            if($check !== false) {
             echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
        $uploadOk = 0;
            }
        
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
    $uploadOk = 0;
}
    // Check file size
    if ($_FILES['fileToUpload']['size'] > 500000) {
        echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'uploads')) {
        echo "The file ". basename($_FILES['fileToUpload']['tmp_name'])." has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} 
        
    
        
        
/*connect to the server*/


require('connect.php'); 



if (!mysqli_select_db($connect, 'simple_farms')) {
		
		$make_db = 'CREATE DATABASE simple_farms';
		
		if (!mysqli_query($connect, $make_db)) {
			
			echo 'Something bad happened'. mysqli_error($connect);
		
			
		} else {
		
			echo 'Database Created<br>';
		}		
		
	} else {
    
    echo 'Database Already Exists <br>';

	} 
    
    
    
    /*opening the doc for products table */
    
    $products_table = 'make_products_table.txt';
    $fopen = fopen($products_table, 'r');
    /*storing what is in the table in a variable */
        
    $product_data = fread($fopen, filesize($products_table));
    
    /*checking to see if there is a table in there, if not make it */
        
    /*$running_products = mysqli_query($connect, $product_data);
    
    if (mysqli_query($connect, "DESCRIBE 'products'")) {
        
    } elseif(!$running_products) {
        echo '<br>isnt running cannot make products table';
    } else {
        echo '<br>products table is running ';
    } */
    
    fclose($fopen);
    /*adding products to the products table */

        
    $query_products = "INSERT INTO products (product_name, product_description, product_price, product_quantity, product_special, product_img_desc, product_img) 
    VALUES ('$product_name', '$product_description', '$product_price', '$product_quantity', '$product_special', '$product_img_desc', '$target_file')";
    
if (mysqli_query($connect, $query_products)) {
    echo "New record created successfully";
    /* header('location:../index.php'); */ 
} else {
    echo "Error: " . $query_products . "<br>" . mysqli_error($connect);
} 
    /*$add_products = mysqli_query($connect, $query_products);

        if (!$add_products) {
    
        echo '<br>something went wrong no products added'; 
    
        } else {
    
            echo '<br>new products have been added';
            header('location:../index.php'); 
} */
     

    



/*this code is adding the product twice. need to figure that mess out */

    


?>