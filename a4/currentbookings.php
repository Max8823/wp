<?php 
include 'tools.php';

$user_name = $_POST['user']['Name'];
$user_email = $_POST['user']['Email'];

$bookings = loadfile();
$foundBookings = search_bookings($bookings, $user_name, $user_email );
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
    </head>
    <body class = "currentBookings">

    <div class ='nav'>
    <a href="index.php#about">About us </a>
    <a href =index.php#seating> Seating </a> 
    <a href =index.php#now_showing> Now Showing </a>
  </div>
        <main>
            <div id = "prevBookings">
            <h1> Previous bookings </h1>
           
            <?php if($foundBookings !== 0){ ?>

            <table>
                
                <tr>
                  <td align="center"colspan = 4> <h2> Previous bookings for <?php echo $user_name; ?> </h2> </td>
                 </tr>
                
                    <th>Movie</th>
                    <th>Day</th>
                    <th>Booking Time</th>
                    
                </tr>
                <?php
                   for($i = 0; $i < count($foundBookings); $i++){
                    $movie_name = find_movie_name($foundBookings[$i][4]);
                   
                        echo("<tr>");
                        echo("<td>".$movie_name."</td>");
                        echo("<td>".$foundBookings[$i][5]."</td>");
                        echo("<td>".$foundBookings[$i][0]."</td>");
                        echo("<td>".getBtn($foundBookings[$i])."</td>");
                        echo("</tr>");
                    }
                    
                
                ?>    
           <?php }else{ ?>
                <h3> No bookings found for <?php $user_name  ?>  </h3>
            <?php } ?>
           </table>
           </div>
        </main>

      



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

</html>

    