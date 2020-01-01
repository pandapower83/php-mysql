  <?php
    //create short variable names
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $streetaddress = $_POST['street_address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zip_code'];
    $email = $_POST['email'];
      
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sunflower Farms- Order Form</title>
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="stylesheet" href="styles/normalize.css">
        <link rel="stylesheet" href="styles/main.css">
    </head>
    <body>
      <header>
       <img src="images/logo.png" alt="Sunflower Farms Logo" height="80">
       <h2>Sunflower Farms</h2>
       </header>   
       <main>
           <section>
               <h1>Sunflower Farms Newsletter Club</h1>
               <h2>Signup Successful!</h2>
               <?php 
               
               $outputstring = htmlspecialchars($firstname)."\t" .htmlspecialchars($lastname). "\t" .htmlspecialchars($streetaddress). "\t" .htmlspecialchars($city). "\t" .htmlspecialchars($state). "\t" .htmlspecialchars($zipcode). "\t" .htmlspecialchars($email).   "\n";
               // open file for appending
               $fp = fopen("newsletters/newsletter_recipients_list.txt" , 'ab');
               
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
               
               ?>
        
           </section>
       </main>
    </body>
</html>