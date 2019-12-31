<?php 

require('session_stuff.php');

require('../library/header_sec.html');

require('../library/head.html');

require('library/admin_nav.php');

            $fp = fopen("../newsletters/newsletter_recipients_list.txt" , 'rb');
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