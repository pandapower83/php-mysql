<?php

require('library/head.html');

require('library/header_sec.html');
    
require('library/nav.html');

require('functions/functions.php');

require('library/footer.html');

?>


<body>
    <h1>Simple Farms Product Search</h1>
    
    <form action="library/results.php" method="post">
        <p><strong>Choose search type</strong><br />
        <select name="searchtype">
            <option value="product_name">Product name</option>
            <option value="product_id">Product ID</option>
            <option value="product_description">Product Description</option>
            <option value="product_price">Product price</option>
            <option value="image_name">Image name</option>
            <option value="image_description">Image description</option>
            
        </select>
        </p>
        <p><strong>Enter search term</strong><br />
        <input name="searchterm" type="text" size="40">
        </p>
        <p><input type="submit" name="submit" value="Search"></p>
    </form>
</body>