<?php 


include "Movies.php";

$movie_data = file_get_contents("movie_data.json");
$movies = [];


// storing the movies from the movie JSON into an array
foreach (json_decode($movie_data) as $movie){
  $movies[] = new Movie((array)$movie);
}
// this prevents an incorrect movie code from being submitted in the post from the index.php page
  if(!isset($_GET['movie'])){
    Header("Location: ./index.php?error=".'Movie not found');
    die;
} else{


// finding the current movie based off the movie_code that was passed in the post, comparing to existing movie_codes in the movies.JSON file
  foreach($movies as $movie){
    if($movie->get_movie_code() == $_GET['movie']){
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
        <iframe width="750" height="615" src=<?php echo $current_movie->get_movie_trailer()?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      
      <div class = "synopsis">
        <h4> Movie Synopsis </h4>
        <p><br><br><?php echo $current_movie->get_movie_details()?></p>
      </div>

    </div>

      <hr>
      <h1> Enter your personal and booking details below: </h1>
      <form action ="booking.php">
    
      <input type="hidden" name="movie" value=<?php echo $current_movie->get_movie_code() ?>>

      <div class = "booking_form_wrapper">
        <div class = "booking_form_personal"> 

          <label for ="user[Name]"> First name </label><br>
          <input type="text" id="user[Name]" name="user[Name]" required placeholder="Maxwell"><br>

          <label for="user[Email]">Email:</label><br>
          <input type="text" id="user[Email]" name="user[Email]" required placeholder="myEmail@gmail.com"><br>

          <label for="user[mobile_number]">Mobile Number:</label><br>
          <input type="text" id="user[mobile-number]" name="user[mobile_number]" required placeholder="0421 123 123"><br>

        </div>

        <div class ="booking_form_time">

          <?php 
            $showing_times = $current_movie->get_viewing_display_times();

            // this viewing times array - and the value passed to POST will be used to check if the user is eligible for discoutned prices or normal pricing
            $viewing_times = $current_movie->get_viewing_times();

            $showing_days = $current_movie ->get_viewing_days();
            
            $i=0;
            while($i < count($showing_days)){

              $dateTime = [
                'day' => $showing_days[$i],
                'time' => $viewing_times[$i]
              ];
             
              echo "<input type='radio' id='".$showing_days[$i]."' name='day' value='".json_encode($dateTime, true)."' class='radio_button'>";
              echo "<label for='".$showing_days[$i]."'>".$showing_days[$i]," - ", $showing_times[$i]."</label><br>"; 
           
              $i++;
            }?>
        </div> 

        <div id="seatForm">
            <fieldset>
              <legend>Standard Seating</legend>
      
                <label for ="seats[STA]"> Standard Adults:</label>
                  <select name="seats[STA]" data-fullprice ="20.50" data-discprice ="15">
                  <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                  </select> <br>

                <label for="seats[STP]">Standard Concession:</label>
                  <select name="seats[STP]" data-fullprice ="18" data-discprice ="13.5">
                  <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                  </select> <br>

                <label for ="seats[STC]">Standard Children: </label>
                  <select name ="seats[STC]" data-fullprice ="16.5" data-discprice ="12">
                    <option value ="">Please Select</option>
                  <?php make_seat_num(); ?>
                </select>
            </fieldset>

            <fieldset>
              <legend>First Class Seating</legend>

                <label for="seats[FCA]">First Class Adults:</label>
                  <select name ="seats[FCA]" data-fullprice ="30" data-discprice ="24">
                    <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                  </select><br>

                <label for="seats[FCP]">First Class Concession: </label>
                  <select name ="seats[FCP]" data-fullprice ="27" data-discprice ="22.5">
                    <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                  </select><br>

                <label for ="seats[FCC]">First Class Children: </label>
                  <select name ="seats[FCC]" data-fullprice="24" data-discprice ="21">
                    <option value ="">Please Select</option>
                    <?php make_seat_num(); ?>
                  </select>

            </fieldset>
            <br>
            <button name="bookNow" type="submit">Book Now</button>
                    
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