<?php 

/*i finally got this to work by putting the function first and not including any parameters.  then at the bottom after the closing bracket I called the function with no parameters. Including the array as parameter either did nothing or caused errors depending on where I did it.  */

function produce_list() {

 $produce = array(array('Product' =>'Tomato', 
                       'Price' => '$3/dozen', 
                       'Date available' => '12 June 2018', 
                       'Date unavailable' =>'17 June 2018'
                      ),
                array('Product' =>'Potato',
                      'Price' => '$4 per 6', 
                      'Date available' => '12 June 2018', 
                      'Date unavailable' =>'17 June 2018'
                     ),
                array('Product' => 'Onions', 
                      'Price'=>'$2/4',
                      'Date available' => '12 June 2018', 
                      'Date unavailable' =>'17 June 2018'
                     ),
                array('Product' => 'Peppers', 
                      'Price'=>'$2.50/doz', 
                      'Date available' => '12 June 2018', 
                      'Date unavailable' =>'17 June 2018' 
                     ),                   
                );

/*the table gets created here.  I would like to play with font sizing to make it look exactly like the original page- need to look in the CSS */
    
    echo '<table>
            <tr>
            <td colspan="4">
                <h2 style="margin-left: 15px";>Produce Information</h2>
                </td>
                </tr>';
    echo '<tr>
            <td><h4>Product</h4></td>
            <td><h4>Price</h4></td>
            <td><h4>Date available</h4></td>
            <td><h4>Date unavailable</h4></td>
         </tr>';
   
    /*foreach loops run through each key and value in the 2d array echoing them in each row */

     foreach($produce as $key) {
        echo '<tr>';
        foreach($key as $value) {
            echo '<td>'.$value.'</td>';
        }
            echo '</tr>';
     }

        echo '</table>';
      

}

/*calling the function- the magic happens here. this is where the function gets called and all the code from above gets run */

produce_list();

?>