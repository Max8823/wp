<?php 

include "tools.php";
print_to_booking();
// setting local variables used in the functions below
$seats = $_SESSION['seats'];
$current_movie = get_movie_code();
$quantity = get_quantity();
  
  ?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recipt</title>
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>

    <body>
      <main id="recipt">
        <section>
        <h1>Booking Confirmation</h1>
          <h3>customer Information:</h3>
          
          <p>Customer Name: &nbsp; <?php echo($_SESSION['Name']); ?></p>
          <p>Customer Email: &nbsp; <?php echo($_SESSION['Email']); ?></p>
          <p>Customer Phone: &nbsp; <?php echo($_SESSION['Phone']); ?></p>
          <p>Booking time: &nbsp; <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?></p>
          <br>

          <h3>Booking Information:</h3>

          <table>
            <tr>
              <td>Movie</td>
              <td>Day</td>
              <td>Time</td>
              <td>Seat Type</td>
              <td>Quantity</td>        
            </tr>
            <tr>
              <?php 
                foreach($seats as $seat => $value){
                  if($value != null){
                    echo("<tr>");
                    echo("<td>".$current_movie->get_movie_name()."</td>");
                    echo("<td>".$_SESSION['day']."</td>");
                    echo("<td>".get_view_time($_SESSION['time'])."</td>");  
                    echo("<td>".get_ticket_name($seat)."</td>");
                    echo("<td>".$value."</td>");
                    echo("</tr>");
                  }
                }
                    echo("<tr>");
                    // this likely isn't nessaary but I prefer a kind of off-set with the pricing at the end of the Table
                    for($i=0; $i<5; $i++){
                      echo("<td></td>");
                    }
                    echo("</tr>");
                    echo("<tr>");
                    echo("<td>Total cost: $".$_SESSION['Price']."</td>");
                    echo("<td>"."Gst.(incl): $".get_gst($_SESSION['Price'])."</td>");
                
              ?>
            
          </table>
        </section>
        <section>
            <h3>Tickets</h3>
              
            <?php

              $num =0;
              $tickNum = 1;
             
              foreach($seats as $seat => $value){
                
                if($value != null){
                // this if statement break the page allowing for 3 tickets per page which seems like the most resonable amount of tickets to show on a page without being
                // too much or too little
                  

                  for( $i=0; $i<$value; $i++){
                    if($num%3==0 && $num !=0){
                     
                      echo("</section>");
                      echo("<section>");
                      echo("<h3>Tickets</h3>");
                    }
                    ?>
                    
                    <div class="tickets">
                    
                      <p> Customer Name: &nbsp; &nbsp;  <?php echo($_SESSION['Name']); ?> </p>
                      <p> Movie: &nbsp; &nbsp;  <?php echo($current_movie->get_movie_name()); ?> </p>
                      <p> Showing Time: &nbsp; &nbsp;  <?php echo($_SESSION['day'])." ".get_view_time($_SESSION['time']); ?> </p>
                      <p> Seat type: &nbsp; &nbsp;  <?php echo(get_ticket_name($seat)); ?> </p>
                      <p> Ticket: &nbsp; &nbsp;  <?php echo($tickNum . " of  ". $quantity); ?> </p>
                    
                    </div>
                    <br>
                    <?php
                   
                     $num++;
                     $tickNum++;
                  } 
                }
              } 
            ?>
            </section>
        </main>



      <!--- This needs to have an ID tag or I can't edit the css for some reason --->
      <footer id="footer">
        <p>Lunardo Cinemas</p>
        <p>42 wallaby way Pakenham</p>
        <p>Phone: (03) 123 4567</p>
      </footer>

    </body>

<aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
      GET Contains:
  <?php print_r($_POST) ?>
  POST Contains:
  <?php print_r($_POST) ?>
  SESSION Contains:
  <?php print_r($_SESSION) ?>
      </pre>
    </aside>
