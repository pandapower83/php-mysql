<?php


require('session_stuff.php');

require('../library/header_sec.html');

require('../library/head.html');

require('library/admin_nav.php');

echo '<br><h4> Hello '.$_SESSION['name'].'<br> This page is currently under construction</h4><br>';

echo $_SESSION['user'];

require('library/footer.html');
























?>