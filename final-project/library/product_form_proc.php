<div class="row">
    <div class = "col-4">
       <div style= "float:left; width: 30%;">
    
 <!-- Simple Log in form here -->
        
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" 
method="post" enctype="multipart/form-data" style="margin= 20px auto; border: 1px solid #ccc; padding: 30px";>
              <h3>Product Form</h3>
              <div class="form-group">
            <label for="product_name">Product Name</label>
            <br>
	        <input type="text" name="product_name" class="form-control-sm" id="product_name" >
          </div>
 
          <div class="form-group">
            <label for="product_description">Product Description</label>
            <br>
	        <input type="text" name="product_description" class="form-control-sm" id="product_description">
          </div>
          
           <div class="form-group">
            <label for="product_quantity">Product Quantity</label>
            <br>
	        <input type="number" name="product_quantity" class="form-control-sm" id="product_quantity">
          </div>
          
           <div class="form-group">
            <label for="product_img">Product Image Upload</label>
            <br>
	        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control-sm">         </div>
  
      <div class="form-group">
            <label for="product_img_desc">Product Image Description</label>
            <br>
	        <input type="text" name="product_img_desc" class="form-control-sm" id="product_img_desc">
          </div>
  
          <button type="submit" name = "submit" value="product_submit" class="btn btn-secondary btn-sm">Submit</button>
          </form>
  
        </div>
    </div>  
        
   <?php /*upload_proc is the processor for product_form.php */

/* get variables from the post */
    
    

if(isset($_POST['submit'])) {
    if ($_POST['submit'] == 'product_submit') {
        $product_name= trim(htmlspecialchars($_POST['product_name']));
        $product_description = trim($_POST['product_description']);
        $product_quantity = $_POST['product_quantity'];
        $img_desc = trim(htmlspecialchars($_POST['product_img_desc']));
        
        /*file upload verfication- is it an image? */
        
        $target_dir ="uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "file is an image - ".$check["mime"].".";
                uploadOk = 1;
            } else {
                echo "file is not an image." ;
                $uploadOk = 0;
            }
        /*check to see if file already exists */
        if (file_exists($target_file)) {
            echo "sorry, file already exists.";
            $uploadOk = 0;
            
        }
        
        /*check file size */
        if ($_FILES["fileToUpload"]["size"] >500000) {
            echo "sorry your file is too large.";
            $uploadOk = 0;
        }
        
        /* Allow certain file formats */
        
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != 
          "gif") {
            echo "Sorry, only .jpg, .png, .jpeg and .gif files are allowed";
        $uploadOk = 0;
        
        }        
        
        /* Check if $uploadOk is set to 0 by an error */
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            
            /* if everything is good lets do this */
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
    }
}
        
        
/*connect to the server */


connect(); 


/*connect to database */

create_db();

/* going to delete this after testing 
https://www.php.net/manual/en/mysqli.select-db.php
should use mysqli_connect and put db name as 4th parameter

if (!mysqli_select_db($connect, 'simple_farms')) {
		
		$make_db = 'CREATE DATABASE simple_farms';
		
		if (!mysqli_query($connect, $make_db)) {
			
			echo 'Someting bad happened'. mysqli_error($connect);
		
			
		} else {
		
			echo 'Database Created';
		}		
		
	} else {
    
    echo 'Database Already Exists';

	} */

/* don't think I need this we are already connected to the db $dbconn = mysqli_connect('localhost', 'root', 'root', 'simple_farms')
    
    if(!dbconn) {
        echo "unable to connect to the database ".mysqli_errno;
    } else {
        echo "connection made to database!";
    }
    */
/* need to get variable and data from product_form.php */
        
/*create tables */
    
    /*opening the doc for products table */
    
    $products_table = 'make_products_table.txt';
    $fopen = fopen($products_table, 'r');
    /*storing what is in the table in a variable */
        
    $product_data = fread($fopen, filesize($products_table));
    
    /*checking to see if there is a table in there, if not make it */
        
    $running_products = mysqli_query($connect, $product_data);
    
    if (mysqli_query($connect, "DESCRIBE 'products'")) {
        /* put something in here */
    } elseif(!$running_products) {
        echo 'isnt running cannot make products table';
    } else {
        echo 'products table is running ';
    }
    
    fclose($fopen);
    echo 'adding products to the products table ';
        
    $query_products = "INSERT INTO products (product_id, product_name, product_description, product_price, product_quantity, product_special, product_img, product_img_desc)
    VALUES ('$product_id', '$product_name', '$product_description', '$produc_price', '$product_quantity', '$product_special', '$product_img', '$product_img_desc')";
        
    $add_products = mysqli_query($connect, $query_products);

        if (!$add_users) {
    
        echo '<br>something went wrong no users added';
    
        } else {
    
            echo '<br>new products have been added';
            header('location:../index.php');
}
    
    








?>