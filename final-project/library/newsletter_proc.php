

<?php

require('head.html');

require('header_sec.html');
    
require('nav.html');






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
               $fp = fopen("/newsletters/newsletter_recipients_list.txt" , 'ab');
               
               if (!$fp) {
                   echo "<p> Your newsletter form could not be submitted at this time.  Please try again later</p>";
                   
                   exit;
               }
               
               //file lock so two entries cant be mixed if happening at the same time
               flock($fp, LOCK_EX);
               
               // write data to the file
               fwrite($fp, $outputstring, strlen($outputstring));
               flock($fp, LOCK_UN);
               //close file
               fclose($fp);
               
               echo "<p>Newsletter Signup Successful!";

require('footer.html');

    ?>



























