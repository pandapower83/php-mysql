<!-- php table section -->

<?php 

$produce = array( array("product" =>"tomato", "price" => $3.00/dozen, "date available" => 12 June 2018, "date unavailable" =>17 June 2018 ),
        array("title"=>"potato", "price" => $4.00 per 6, "date available" => 12 June 2018, "date unavailable" =>17 June 2018),
        array("title"=>"onions", "price"=>$2.00/4,"date available" => 12 June 2018, "date unavailable" =>17 June 2018),
        array("title"=>"peppers", "price"=>$2.50/doz, "date available" => 12 June 2018, "date unavailable" =>17 June 2018 ),                   );

if (count($produce) > 0): ?>
<table>
    <thead>
        <tr>
            <th><?php echo implode('</th><th>', array_keys(current($produce))); ?></th>
        </tr>
    </thead>
    <tbody>
        <td><?php foreach ($produce as $row): array_map('htmlentities', $row); ?></td>
        <tr>
            <td><?php echo implode('</td><td>', $row); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>
<?php endif; ?>
