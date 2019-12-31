
<div class="row">
    <div class = "col-4">
       <div style= "float:left; width: 30%;">
    
 <!-- Simple Log in form here -->
        
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" 
 style="margin= 20px auto; border: 1px solid #ccc; padding: 30px";>
              <h3>Member Log In</h3>
         <div class="form-group">
            <label for="exampleInputEmail1">Username (email address)</label>
            <br>
	        <input type="email" name="username" class="form-control-sm" id="exampleInputEmail1" >
          </div>
 
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <br>
	        <input type="password" name="password" class="form-control-sm" id="exampleInputPassword1">
          </div>
  
  
          <button type="submit" name = "submit" value="login" class="btn btn-secondary btn-sm">Submit</button>
          </form>
  
        </div>
    </div>  

<!-- signup form here -->
     
   <div class="col-8">
        <div style= "float:left; width: 70%;">
   
        <form action="library/sign_up_proc.php" method="post" enctype="multipart/form-data" style="margin= 20px auto; border: 1px solid #ccc; padding: 30px";>
        <h3>Not A Member? Please sign up to join us!</h3>
        
        <div class="form-group">
            <label for="exampleInputFName">First Name</label>
            <input type="text" name="fname" class="form-control" id="exampleInputFName" placeholder="Enter first name" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
        </div>
       
    
        <div class="form-group">
            <label for="exampleInputLName">Last Name</label>
            <input type="text" name="lname" class="form-control" id="exampleInputFName" placeholder="Enter first name" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>">
         </div>
       
    
        <div class="form-group">
            <label for="exampleInputAddress">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputaddress" placeholder="Enter address"value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
         </div>
    
    
        <div class="form-group">
            <label for="exampleInputCity">City</label>
            <input type="text" name="city" class="form-control" id="exampleInputcity" placeholder="Enter city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>">
        </div>
    
        <div class="form-group">
            <label for="exampleInputState">State</label>
            <input type="text" name="state" class="form-control" id="exampleInputstate" placeholder="Enter state" value="<?php if(isset($_POST['state'])) echo $_POST['state']; ?>">
        </div>
    
    
        <div class="form-group">
            <label for="exampleInputZip">Zip</label>
            <input type="number" name="zip" class="form-control" id="exampleInputzip" placeholder="Enter zip" value="<?php if(isset($_POST['zip'])) echo $_POST['zip']; ?>">
        </div>
    
        <div class="form-group">
            <label for="exampleInputEmail1">Email address (User Name)</label>
            <input type="email" name="user_name1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
    
  
        <div class="form-group">
            <label for="exampleInputEmail1"> Verify Email address (User Name)</label>
            <input type="email" name="user_name2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
         
       <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password1" class="form-control" id="exampleInputPassword1">
        </div>
 
        <div class="form-group">
            <label for="exampleInputPassword1">Verify Password</label>
            <input type="password" name="password2" class="form-control" id="exampleInputPassword1">
        </div>
 
         

        <button type="submit" name = "submit" value="register" class="btn btn-primary">Submit</button>
        </form>
        </div>
</div>
</div>  
        
<?php

<!-- php to store variables -->
if(isset($_POST['submit'])) {
    if ($_POST['submit'] == 'register') {
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $address = trim($_POST['address']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);
        $zip = trim($_POST['zip']);
        $user_name1 = trim($_POST['user_name1']);           $user_name2 = trim($_POST['user_name2']);
            
        $password1 = md5($_POST['password1']);
        $password2 = md5($_POST['password2']);
                
        /* running functions to check for username, password, and both match */
                
        user_name_match();
        password_match();
        username_password_match();
            
            }
    /*checking to see if the login info is an email */
     elseif ($_POST['submit'] == 'login') {
         $username = trim($_POST['username']);
         $password = md5($_POST['password']);

         if (filter_var($username, FILTER_SANITIZE_EMAIL)) {
	
	     echo 'Email';
	
         } else {
	
	    echo 'Not Email';
     }

     }
    
  
    
}
    
/* will delete after testing
    
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
*/

/* calling connect function */

connect();

/*create database function */
create_db();


/*create database will delete after testing

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

/*might not be neeeded- we are already connected and already made the db

$dbconn = mysqli_connect('localhost', 'root' , 'root', 'simple_farms'); */

    /*opening the doc where your table is at */
/*storing the table as a variable so we dont have to type its name */
$table = 'make_user_table.txt';
$fopen = fopen($table, 'r');
/*storing what is in the table in a variable */
$data = fread($fopen, filesize($table));


/*checking to see if there is a table in there, if not make it */
$running = mysqli_query($connect, $data);

if (mysqli_query($connect, "DESCRIBE 'users'")) {
    /*put something here */
} elseif(!$running) {
    echo 'oh man isnt running and cant make the table '; 
        
    } else {
        echo 'table is running';
    }
    
fclose($fopen);
echo 'adding stuff to the table ';

$query = "INSERT INTO users (fname, lname, user_name, password) 
VALUES ('$fname', '$lname', '$user_name1', '$password1')";

$add_users = mysqli_query($connect, $query);

if (!$add_users) {
    
    echo '<br>something went wrong no users added';
    
} else {
    
    echo '<br>new users have been added';
    header('location:../index.php');
}
    
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
    echo 'adding products to the products table ';
    
    /* Data needs to come from html form and store those in variables. Need to create form. FOrm shouldn't be here, because this is showing up in a require statement on sign_up.php 
    $query1 = "INSERT INTO products (product_id, product_name, product_description, product_price, product_quantity, product_special, product_img, product_img_desc)
    VALUES ('$product_id', '$product_name', '$product_description', '$produc_price', '$product_quantity', '$product_special', '$product_img', '$product_img_desc')"; 
        
    } */
 ?>