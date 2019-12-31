<?php


require('connect.php');
mysqli_select_db($connect, 'simple_farms');

$query_select = "SELECT * FROM products INNER JOIN images ON products.product_id = images.image_id"; 


$result=mysqli_query($connect, $query_select);

?>

<table align="center" border="1px" style="width:600px; ">
    <tr>
    <th colspan="6"><h2>Available Produce</h2></th>
    </tr>
    <t>
     <th>Product ID</th>
    <th>Product Name</th>
    <th>Product Description</th>
    <th>Product Price</th>
    <th>Image Name</th>
    <th>Image Path</th>
    
    </t>
    
    <?php
    while($row =mysqli_fetch_assoc($result))
    { $image_dir="admin/";
      
    ?>
        <tr>
        <td><?php echo $row['product_id']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['product_description']; ?></td>
        <td><?php echo $row['product_price']; ?></td>    
        <td><?php echo $row['image_name']; ?></td>
        <td><?php echo '<img src="' .$image_dir .$row['image_path'] . '" alt="veggie image" ,width=100px, height=100px />'; ?></td>
        
     
        
        </tr>
        
        <?php
        
    }
?>
       
        </table>
        













