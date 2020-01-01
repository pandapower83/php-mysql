<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Baby Name Generator</title>
    <link rel="shortcut icon" href="images/favicon_panda.ico">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
   
<body>
   <header>
       <img src="images/logo.jpg" alt="Baby name generator Logo" height="80">
       <h2>Baby Name Generator</h2>
   </header>
   <main>
       <section> 
       <h1>Baby Name Generator</h1>
       <h2>Enjoy your names!</h2>
       <?php  
            //creating my arrays here
            $boy_firstnames = array( 'Santiago', 'Gerardo', 'Benjamin', 'Duke', 'Matthew', 'Raphael');
            $boy_middlenames = array( 'Patrick', 'Oscar', 'Romeo', 'Charlie', 'David', 'Samuel');
            $girl_firstnames = array( 'Sofia', 'Angelica', 'Anna', 'Audrey', 'Antonia', 'Pippi');
            $girl_middlenames = array( 'Daisy', 'Skippy', 'Rosa', 'Carmen', 'Annabelle', 'Maria');
  
            //this gets the choice for boy or girl and the last name typed on the index.html
            $boy_or_girl = filter_input(INPUT_POST, 'boy_or_girl');
            $last_name = filter_input(INPUT_POST, 'last_name');
       
            //the conditional if boy is picked start at 0, run it 3 times and after each time increment. after 3 times its done.
       
            if ($boy_or_girl == "boy") {
                for ($i = 0 ; $i < 3 ; $i++){
                    shuffle($boy_firstnames);
                    shuffle($boy_middlenames);
                    echo $boy_firstnames[$i].' ';
                    echo $boy_middlenames[$i].' ';
                    echo $last_name.'<br \>';}
               
                    }
        
            //no need to write ==girl because there aren't any other options.  same code as above but different variable names
       
            else {
                for ($i = 0; $i < 3; $i++){
                    shuffle($girl_firstnames);
                    shuffle($girl_middlenames);
                    echo $girl_firstnames[$i].' ';
                    echo $girl_middlenames[$i].' ';
                    echo $last_name.'<br \>';
                    }
       
      
                 }
       ?>
       
       </section>
    </main>
    </body>
</html>