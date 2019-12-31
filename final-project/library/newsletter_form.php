<div id="container">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                   
                   <h3>Newsletter Signup</h3>
              <div class="form-group">
            <label for="first_name">First name:</label>
            <br>
	        <input type="text" name="first_name" class="form-control-sm" id="first_name" >
          </div>
                   <div class="form-group">
            <label for="last_name">Last name:</label>
            <br>
	        <input type="text" name="last_name" class="form-control-sm" id="last_name" >
          </div>
                   <div class="form-group">
            <label for="street_address">Street Address:</label>
            <br>
	        <input type="text" name="street_address" class="form-control-sm" id="street_address" >
          </div>
                   <div class="form-group">
            <label for="City">City:</label>
            <br>
	        <input type="text" name="city" class="form-control-sm" id="city" >
          </div>
                   <div class="form-group">
            <label for="state">State:</label>
            <br>
	        <input type="text" name="state" class="form-control-sm" id="state" >
          </div>
                   <div class="form-group">
            <label for="zip_code">Zip code:</label>
            <br>
	        <input type="number"  min="5" name="zip_code" class="form-control-sm" id="zip_code" >
          </div>
                   <div class="form-group">
            <label for="email">Email:</label>
            <br>
	        <input type="email" name="email" class="form-control-sm" id="email">
          </div>
               
                    <td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Sign up!" /></td>
           </form>

</div>
<?php
if(isset($_POST['submit'])) {
    //create short variable names
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $streetaddress = $_POST['street_address'];
    $city1 = $_POST['city'];
    $state1 = $_POST['state'];
    $zipcode = $_POST['zip_code'];
    $email3 = $_POST['email'];
      

               $outputstring = htmlspecialchars($firstname)."\t" .htmlspecialchars($lastname). "\t" .htmlspecialchars($streetaddress). "\t" .htmlspecialchars($city1). "\t" .htmlspecialchars($state1). "\t" .htmlspecialchars($zipcode). "\t" .htmlspecialchars($email3).   "\n";
               // open file for appending
               $fp = fopen("newsletters/newsletter_recipients_list.txt" , 'ab');
               
               if (!$fp) {
                   echo "<p> Your newsletter form could not be submitted at this time.  Please try again later</p>";
                   
                   exit;
               }
               else {
               //file lock so two entries cant be mixed if happening at the same time
               flock($fp, LOCK_EX);
               
               // write data to the file
               fwrite($fp, $outputstring, strlen($outputstring));
               flock($fp, LOCK_UN);
               //close file
               fclose($fp);
               
               echo "<p>Newsletter Signup Successful!";


               }



}
?>














