<?php 



require('session_stuff.php');

require('../library/header_sec.html');

require('../library/head.html');

require('library/admin_nav.php');

require('functions/functions.php');



/*upload_product is the processor for add_product.php */

/* session_start(); */

/*print r to see the array */

/*print_r($_POST); */

/* get variables from the post */


        $product_name= addslashes(htmlspecialchars($_POST['product_name']));
        $product_description = addslashes(trim($_POST['product_description']));
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_special = addslashes(htmlspecialchars($_POST['product_special']));
        $image_description = $_POST['image_description'];
        $image_name = $_POST['image_name'];
        
      /*  $product_img = $_FILES['fileToUpload']; */

 
/*file upload verfication- is it an image?  */
      
       /* $target_dir ='uploads/';
        $target_file = $target_dir.basename($_FILES['image']['name']);
        $uploadOk = 1;
        $imageFileType =    strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $file_tmp = $_FILES['image']['tmp_name'];  */

       $image_path= 'uploads/'.$_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $uploadOk = 1; 
$imageFileType =    strtolower(pathinfo($image_path,PATHINFO_EXTENSION)); 
        
        
/*creating the tables is done with product_table_maker.php*/

        
  $query_products = "INSERT INTO products (product_name, product_description, product_price, product_quantity, product_special) VALUES ('$product_name', '$product_description', '$product_price', '$product_quantity', '$product_special')";
    
        
    
        
        
/*connect to the server*/


require('library/connect.php'); 
mysqli_select_db($connect, 'simple_farms');
   
 
 /*connect to the products table and insert variables and data in it */   

$sql1 = mysqli_query($connect, $query_products);

if (!$sql1) {
    /*echo 'no connection' ; */
} else {
    
    if ($image_size == 0) {
        
        echo 'No image file'; 
    /*check the image stuff */
    
        } 
    // Allow certain file formats
   else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
    // Check if file already exists
    else if (file_exists($image_path)) {
        echo "Sorry, file already exists. Please upload a different file";
    $uploadOk = 0;
} 
    
    
    else {
		
		move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        echo '<br><h4>Thank you '.$_SESSION['name'].'<br> your image was uploaded.</h4><br>';
        /*echo '<br><h4>Click <a href="add_product.php"> here </a></h4><br>';*/
	}	
} 
   
   
$query_select_products = "SELECT product_id FROM products ORDER BY product_id DESC LIMIT 1";

$sql2 = mysqli_query($connect, $query_select_products);


/* I now run the query to get the number */

if (!$sql2) {
	//echo 'Last Record Didnt make it';

} else {
	
	/* 
		This loop separates the particular 
		portions of the returned array by
		using a loop.
	*/
	
	while ($row = mysqli_fetch_assoc($sql2)) {
        
        /*echo "<p>You uploaded the following product information: <br/>";
            echo "<table><thead>Produce Available</thead>";
            echo '<th>Product Id</th>'.$row['product_id'];
            echo '<th>Product Name</th>'.$row['product_name'];
        echo '<th>Product Price</th>'.$row['product_price'];
        echo '<th>Product Description</th>'.$row['product_description'];
        echo '<</table>'; */
       
        /* not sure if this table goes here. */
        /*echo "<table><tr><th>Produce Available</th></tr>";
        echo "<tr>Product ID<td>". $row['product_id']."</td>Product Name<td>". $row['product_name']."</td>Product Price<td>".$row['product_price']."</td>Product Desription<td>". $row['product_description']."</td>Image<td>".$row['image']."</td>Image Name<td>".$row['image_name']."</td>Image Description<td>".$row['image_description']."</td></tr></table>"; */
        
    
		
	/* 
		Now I run the second query to insert 
		the data images table, along with the 
		primary key from the products table.
		
		Here you can echo it, to see if it is 
		working. 
		echo $row['product_id']; */
	
	
	$product_id = $row['product_id'];
	
	/* The query below */
    
/*$image_query = mysqli_query($connect, $images_table); */
	
	$query3 = "INSERT INTO images (product_id, image_name, image_description, image_path)
	VALUE ('$product_id', '$image_name', '$image_description', '$image_path')";	
		
		$sql3 = mysqli_query($connect, $query3);
		
		if(!$sql3) {
			//echo 'Something went wrong';
		}
        else {
            
            /*
            this is me trying a million times to display the data the user just uploaded.
            echo $row['product_id'];
            echo $row['product_name'];
            echo $row['product_description']; */
            
         /*while ($row = mysqli_fetch_assoc($sql3)) {
             
             $image_id = $row['image_id']; */
            // show what was uploaded
            /*echo '<p>You uploaded the following product information: <br/>';
            echo '<table><tr><th>Produce Available</th></tr>';
        echo '<tr>Product ID<td>'. $row['product_id'].'</td>Product Name<td>'. $row['product_name'].'</td>Product Price<td>'.$row['product_price'].'</td>Product Desription<td>'. $row['product_description'].'</td></tr></table>'; */
            echo '<p>You uploaded the following image: <br/>';
            /*echo '<table><tr><th>Image Data </th></tr>';
            echo '<tr>Image ID<td>'. $row['image_id'].'</td>Image Name<td>'.$row['image_name'].'</td>Image Description<td>'.$row['image_description'].'</td>Image Path<td>'.$row['image_path'].'</td></tr></table>'; */
            echo '<img src="uploads/'.$_FILES['image']['name'].'"/>';
            //echo 'End of script';
        }
    }
}

        

	
    
   /* $query4 = "SELECT * FROM products INNER JOIN images ON product.product_id = images.product_id";
    
    $super_result= mysqli_query($connect, $query4);
    
    while($row = mysqli_fetch_array($super_result)    {
        
        echo $row['product_id'];
            echo $row['product_name'];
        echo $row['product_price'];
        echo '$row['product_description']; */
        
        
   
    




//echo 'End of script';

/* Kill the Connection */
mysqli_close($connect);

/*header('location: index.php'); */


    /*next job is to add in the table so people can see what they uploaded */


?>