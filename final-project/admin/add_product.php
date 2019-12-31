<?php
require('session_stuff.php');

require('../library/header_sec.html');

require('../library/head.html');

require('library/admin_nav.php');

require('functions/functions.php');

/*echo '<br><h4> Hello '.$_SESSION['name'].'</h4><br>';

echo $_SESSION['user']; */

?>
   
 <!-- Simple Log in form here --> 
       <div id="container">
          <form action="upload_product.php" method="post" enctype="multipart/form-data" style="margin: 20px auto; border: 1px solid #ccc; padding: 30px;">
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
            <label for="product_price">Product Price</label>
            <br>
              <span>$<input type="number" name="product_price" class="form-control-sm" id="product_price"></span>
          </div>
          
          <div class="form-group">
            <label for="product_special">Product Special</label>
            <br>
	        <input type="text" name="product_special" class="form-control-sm" id="product_special">
          </div>
          
           <div class="form-group">
            <label for="fileToUpload">Product Image Upload</label>
            <br>
	        <input type="file" name="image" class="form-control-sm" id="image">
          </div>
          
          <div class="form-group">
              <label for="image_name">Product Image Name</label>
              <br>
              <input type="text" name="image_name" class="form-control-sm" id="image_name">
        </div>
  
      <div class="form-group">
            <label for="image_description">Product Image Description</label>
            <br>
	        <input type="text" name="image_description" class="form-control-sm" id="image_description">
          </div>
  
          <button type="submit" name = "submit" value="submit" class="btn btn-secondary btn-sm">Submit</button>
          </form>
  
</div>
<?php 

require('../library/footer.html');

?>
        
   