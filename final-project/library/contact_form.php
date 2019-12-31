

<div id="container">
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="margin= 20px auto; border: 1px solid #ccc; padding: 30px";>
    <h3>Send us an email!
    <div class="form-group">
        <label for="exampleInputEmail1">First name</label>
        <br>
	   <input type="text" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"> 
        </div>
            
             <div class="form-group">
        <label for="exampleInputEmail1">Last name</label>
        <br>
	   <input type="text" name="lname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>"> 
        </div>
               
                <div class="form-group">
        <label for="exampleInputEmail1">Phone number:</label>
        <br>
	   <input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"> 
        </div>
               
             <div class="form-group">
        <label for="exampleInputEmail1">Email address:</label>
        <br>
	   <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"> 
        </div>
               <div class="form-group">
            <label for="exampleInputEmail1">Email department:</label>
             
               <select name="department">
                   <option value= "" <?php if(isset($_POST['department']) && $_POST['department'] == "") echo 'selected="selected"'; ?>>Select..</option>
                   <option value="tech_support" <?php if(isset($_POST['department']) && $_POST['department'] == "tech_support") echo 'selected="selected"'; ?>>Tech Support</option>
                   <option value="billing" <?php if(isset($_POST['department']) && $_POST['department'] == "billing") echo 'selected="selected"'; ?>>Billing</option>
                   <option value="product_support" <?php if(isset($_POST['department']) && $_POST['department'] == "product_support") echo 'selected="selected"'; ?>>Product Support</option>
                   <option value="sales" <?php if(isset($_POST['department']) && $_POST['department'] == "sales") echo 'selected="selected"'; ?>>Sales</option>
               </select>
               <br>
               
               
               <div class="form-group">
        <label for="exampleInputEmail1">Email subject:</label>
        <br>
	   <input type="text" name="emailsubject" value="<?php if(isset($_POST['emailsubject'])) echo $_POST['emailsubject']; ?>">  
        </div>
              
              <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Comments:</span>
  </div>
  <textarea class="form-control" name= "feedback" aria-label="With textarea" value="" rows="5" cols="40"></textarea>
</div>
               
               
               
               <button type="submit" name = "submit" value="login" class="btn btn-secondary btn-sm">Submit</button>
        </div>
           </form>
           
        
       <?php
                if(isset($_POST['submit'])) {
                    
                    /*setting up variables*/
                    $toaddress = "rachelwinchel1983@gmail.com";
                    $subject = "Customer Feedback";
                    $fname = trim($_POST['fname']);
                    $lname = trim($_POST['lname']);
                    $email = trim($_POST['email']);
                    $phone = $_POST['phone'];
                    
                    /* symbols are all the characters to replace in the phone */
                    $symbols = array('-', '(', ')', '+', '/');
                    $fixed_phone = str_replace($symbols,'', $phone);
                    /* echo the number to make sure the slashes got removed 
                    echo $fixed_phone;
                    echo '<br><br>'; */
                   
                    $feedback = addslashes($_POST['feedback']);
                 
                            
                   
                   
                    /* email form setup */
                    $emailsubject = $_POST['emailsubject'];
                
                    $department = $_POST['department'];
                    $mailcontent = "Customer first Name: " .$fname. "\n". "Customer last name: " .$lname. "\n". "Customer phone: " .$fixed_phone. "\n". "Email subject: " .$emailsubject. "\n". "Department: " .$department. "\n". "Customer Email: " .$email. "\n". "Customer Comments: " .$feedback. "\n";
                    $fromaddress = "From: destination@server.com";
                    
                    /*validating if user left a field blank */
                    
                    if ($fname == "" || $lname == "" || $email== "" || $phone =="" || $feedback =="" || $emailsubject =="" || $department =="") {
                    echo 'Some fields have been left blank. Please fill all fields';
                   
                    }
                    
                    /* validating phone number. this works because $fixed_phone got the dashes and other phone characters removed from it.  this is concerned if user enters something other than a number or something other than one of the characters that are removed from $fixed_phone*/
                    
                    elseif (!preg_match('/^[0-9]{10}+$/',  $fixed_phone)) {
                        echo $phone.' is an invalid phone number. Please try again.';
                    }    
                    
                    /* if the length of feedback comments is over 100, then it prints off the string at 100 characters and tells user to limit comments. */
                   elseif 
                         (strlen($feedback) > 100) {
                        /* echo just to see that it is counting characters and showing slashes 
                         echo substr($feedback, 0, 100); */
                         echo '<br><br> Please limit comment to 100 characters. Your email has NOT been sent. Please try again.';
                    }
                   
                    
                    
                    /* Here is my filter_validate_email another option besides the regex
                    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo ' The email you entered is invalid. Please double check it.';
                    }
                    */
                    
                   /* validating my email addresses */
                   elseif (!preg_match('/^[a-zA-Z0-9\_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)) {
                        echo $email.' is not a valid email address. Please try again <br><br>';
                    } 
                        
                    /*mail sending */
                    elseif (mail($toaddress, $subject, $mailcontent, $fromaddress)){
                        echo 'Thank you ' .$fname. ' ' .$lname. '. Your email has been sent.';
                       /*just to see if it is saving the mailcontent echo $mailcontent;  
                        echo nl2br($mailcontent); */
                    }
                
                    
                
                }
       
             

?>



























