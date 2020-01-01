<?php
    //create short variable name
    //$document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sunflower Farms-Newsletter</title>
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
       <h2>Newsletter Signups</h2>
       <?php 
            $fp = fopen("newsletters/newsletter_recipients_list.txt" , 'rb');
            flock($fp, LOCK_SH); // lock file for reading
            
            if (!$fp) {
                echo "<p>No newsletter signups pending.<br />
                      Please try again later. </p>";
                exit;
            }
            
            while (!feof($fp)) {
                $newsletter= fgets($fp);
                echo htmlspecialchars($newsletter)." <br />";
            }
            
            flock($fp, LOCK_UN); //release the read lock
            fclose($fp);
            
        ?>
        
        </section>
        </main>
        </body>
        </html>