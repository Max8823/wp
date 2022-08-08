<?php 

include "tools.php";
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

      <main>

        <h1>Booking Confirmation</h1>

        <section>

          <h2>Recipt</h2>
          <h3>customer Information:</h3>

          <p>Name: <?php echo($_SESSION['Name']); ?></p>
          <p>Email: <?php echo($_SESSION['Email']); ?></p>
          <p>Phone: <?php echo($_SESSION['Phone']); ?></p>

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
                    for($i=0; $i<4; $i++){
                      echo("<td></td>");
                    }
                    echo("</tr>");
                    echo("<tr>");
                    
                    echo("<td>Total cost: $".$_SESSION['Price']."</td>");
                    
                    echo("<td>"."Gst.(incl): $".get_gst($_SESSION['Price'])."</td>");
                    
              ?>
            </tr>
          </table>
        </section>


            <h1> Tickets </h1>
              

              <?php
              $num =1;
              foreach($seats as $seat => $value){

                if($value != null){
                  for( $i=0; $i<$value; $i++){
                    
                    ?>
                    
                    <div class="tickets">
                    
                    <h3> Customer Name: <?php echo($_SESSION['Name']); ?></h3>
                    <h3> Movie: <?php echo($current_movie->get_movie_name()); ?></h3>
                    <h3> Day: <?php echo($_SESSION['day']); ?> </h3>
                    <h3> Time: <?php echo(get_view_time($_SESSION['time'])); ?> </h3>
                    <h3> Seat type: <?php echo(get_ticket_name($seat)); ?> </h3>
                    <h3> Ticket: <?php echo($num. "of ". $quantity); ?> </h3>
                    <br><br>
                      </div>
                      <br>
                    <?php
                     $num++;
                } 
                }
              
              }
              
              
              ?>



    <table>


  </section>
  </main>





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
