
<div class="row">
    <div class = "col-4">
       <div style= "float:left; width: 30%;">
    
 <!-- Simple Log in form here -->
        
          <form method="post" action="library/sign_in.php" style="margin= 20px auto; border: 1px solid #ccc; padding: 30px";>
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
   
        <form action="library/sign_up_proc4.php" method="post" enctype="multipart/form-data" style="margin= 20px auto; border: 1px solid #ccc; padding: 30px";>
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
            <input type="text" name="street_address" class="form-control" id="exampleInputaddress" placeholder="Enter address"value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
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
        
