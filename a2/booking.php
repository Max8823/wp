<?php 


include "Movies.php";

$movie_data = file_get_contents("movie_data.json");
$movies = [];


foreach (json_decode($movie_data) as $movie){
  $movies[] = new Movie((array)$movie);
}
// this prevents an incorrect movie code from being submitted in the post from the index.php page
  if(!isset($_GET['movie_Code'])){
    Header("Location: ./index.php?error=".'Movie not found');
    die;
} else{



  foreach($movies as $movie){
    if($movie->get_movie_code() == $_GET['movie_Code']){
      $current_movie =$movie;
    }
  }
}

  ?>




<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Booking Page</title>
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
  </head>

  
<body>

  
  <header>
    <img src = "https://imgur.com/t6jo64l.png" alt= "Lunardo_logo" class="header_logo">
      <h1>Lunardo Cinemas<h1>
      

  </header>

  <div class ='top_nav'>
    <a href="index.php#about">About us </a>
    <a href =index.php#seating> Seating </a> 
    <a href =index.php#now_showing> Now Showing </a>
  </div>

  <main>
    
    <h1><?php echo $current_movie->get_movie_name()?></h1>

    <div class ="video_player">

      <div class = "video_wrapper">
        <iframe width="560" height="315" src=<?php echo $current_movie->get_movie_trailer()?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

      <div class = "synopsis">
        <h4> Movie Synopsis </h4>
        <p><?php echo $current_movie->get_movie_details()?></p>
      </div>

    </div>

    <hr>
    <h1> Enter your personal and booking details below: </h1>
    <form action ="booking.php">
    
    <input type="hidden" name="movie_Code" value="ACT">

      <div class = "booking_form_wrapper">
        <div class = "booking_form_personal"> 

          <label for ="first_name"> First name </label><br>
          <input type="text" id="first_name" name="first_name" required placeholder="Maxwell"><br>

          <label for = "last_name"> Last name </label><br>
          <input type = "text" id="last_name" name = "last_name" required placeholder ="Trounce"> <br>

          <label for="email">Email:</label><br>
          <input type="text" id="email" name="email" required placeholder="myEmail@gmail.com"><br>

          <label for="mobile_number">Mobile Number:</label><br>
          <input type="text" id="mobile-number" name="mobile_number" required placeholder="0421 123 123"><br>
        </div>

        <div class ="booking_form_time">

          <?php 
            $showing_times = $current_movie->get_viewing_display_times();

            // this viewing times array - and the value passed to POST will be used to check if the user is eligible for discoutned prices or normal pricing
            $viewing_times = $current_movie->get_viewing_times();

            $showing_days = $current_movie ->get_viewing_days();
            $i=0;
            while($i < count($showing_days)){

              echo "<input type='radio' id='".$showing_days[$i]."' name='day' value='".$showing_days[$i]."' class='radio_button'>";
              echo "<label for='".$showing_days[$i]."'>".$showing_days[$i]," - ", $showing_times[$i]."</label><br>"; 
              echo "<input type='hidden' id='time' name='time' value=".$showing_times[$i].">";

              $i++;
            }?>
        </div> 

        <div id="seatForm">
            <fieldset>
              <legend>Standard Seating</legend>
      
                <label for ="qty-seats-STA"> Standard Adults:</label>
                  <select name="qty-seats-STA"id="qty-seats-STA">
                  <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                    <input type='hidden' id='STA-price' name='STA-price' value='20.50'>
                    <input type='hidden' id='STA-price-disc' name='STA-price-disc' value='15.00'>
                  </select> <br>

                <label for="qty-seats-STP">Standard Concession:</label>
                  <select name="qty-seats-STP" id="qty-seats-STP">
                  <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                    <input type='hidden' id='STP-price' name='STP-price' value='18.00'>
                    <input type='hidden' id='STP-price-disc' name='STP-price-disc' value='13.50'>
                  </select> <br>

                <label for ="qty-seats-STC">Standard Children: </label>
                  <select name ="qty-seats-STC" id= "qtyseats-STC">
                    <option value ="">Please Select</option>
                  <?php make_seat_num(); ?>
                  <input type='hidden' id='STC-price' name='STC-price' value='16.50'>
                  <input type='hidden' id='STC-price-disc' name='STC-price-disc' value='12.00'>

                </select>
            </fieldset>

            <fieldset>
              <legend>First Class Seating</legend>

                <label for="qty-seats-FCA">First Class Adults:</label>
                  <select name ="qty-seats-FCA" id= "qty-seats-FCA">
                    <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                    <input type='hidden' id='FCA-price' name='FCA-price' value='30.00'>
                    <input type='hidden' id='FCA-price-disc' name='FCA-price-disc' value='24.00'>
                  </select><br>

                <label for="qty-seats-FCP">First Class Concession: </label>
                  <select name ="qty-seats-FCP" id= "qty-seats-FCP">
                    <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                    <input type='hidden' id='FCP-price' name='FCP-price' value='27.00'>
                    <input type='hidden' id='FCP-price-disc' name='FCP-price-disc' value='22.50'>
                  </select><br>

                <label for ="qty-seats-FCC">Standard Children: </label>
                  <select name ="qty-seats-FCC" id= "qty-seats-FCC">
                    <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                    <input type='hidden' id='FCC-price' name='FCC-price' value='24.00'>
                    <input type='hidden' id='FCC-price-disc' name='FCC-price-disc' value='21.00'>
                  </select>

            </fieldset>
                              <input type="submit" value="Submit">
                    
      </div>
    <?php
      function make_seat_num(){
        $i=1;
        while($i < 11){
                  echo"<option value=$i>$i</option>";
                  $i++;
      }
    }
      ?>
    
        </form>

      </div>
    </div>

  </main>
    





     
              




   
    <footer>
      <br><br><br><br><br><br><br>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
      GET Contains:
  <?php print_r($_GET) ?>
  POST Contains:
  <?php print_r($_POST) ?>
  SESSION Contains:
  <?php print_r($_SESSION) ?>
      </pre>
    </aside>

  </body>
</html>