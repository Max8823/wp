<?php 

include "tools.php";

 $current_movie = check_movie_code();
 
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

  <!-- this is for error handling when the user may not select a viewing time or a nubmer of seats, this will cause the validateForm javascript function to be run
again, this could be in tools however its not very big -->
<?php if(isset($_GET['error'])){
 
 echo '<div id=Target></div>';

} 

?>
  
  <header>
    <img src = "https://i.imgur.com/xAnMjzk.png" alt= "Lunardo_logo" class="header_logo">
     
  </header>

  <div class ='nav'>
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

        <h3> Movie Synopsis: </h3>
        <p><br><?php echo $current_movie->get_movie_details()?></p>
        <br><br>
    
        <h3> Movie Director: </h3>
        <p><?php echo $current_movie->get_movie_director()?></p>
        <br><br>

        <h3> Main Actors: </h3>
        <p><?php echo $current_movie->get_movie_cast()?></p>
      </div>

    </div>

    <hr>
    <h1> Enter your personal and booking details below: </h1>
    <form action = "post-validation.php"  onsubmit="return validateForm()" method = "post">
    <input type="hidden" name="movie" value=<?php echo $current_movie->get_movie_code() ?>>

    <div class = "booking_form_wrapper">
        
      <div class = "user_Information">
        <fieldset>
          <legend>User Information</legend>
          <label for ="user[Name]"> Name </label><br>
          <input type="text" id="user[Name]" name="user[Name]" value='<?php if(isset($_SESSION["Name"])){echo($_SESSION["Name"]);}?>'placeholder="John doe">
          <span id = "nameError"></span>
          <br>

          <label for="user[Email]">Email:</label><br>
          <input type="email" id="user[Email]" name="user[Email]" value='<?php if(isset($_SESSION["Email"])){echo($_SESSION["Email"]);}?>'placeholder="example@gmail.com">
          <span id = "emailError"></span>
          <br>

          <label for="user[mobile_number]">Mobile Number:</label><br>
          <input type="tel" id="user[mobile_number]" name="user[mobile_number]" value='<?php if(isset($_SESSION["Phone"])){echo($_SESSION["Phone"]);}?>'placeholder="0421 123 123"> 
          <span id = "phoneError"></span>
          <br>
        </fieldset>
      </div>
          



        <div class ="booking_form_time">
          <span id = "dayTimeError"></span>

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
          <span id = "seatingError"></span>
            <fieldset id="seatFieldset">
              <legend>Standard Seating</legend>
      
                <label for ="seats[STA]"> Standard Adults:</label>
                  <select name="seats[STA]" data-fullprice ="20.50" data-discprice ="15">
                    <option value=>Please Select</option>
                      
                    <?php make_seat_num("STA"); ?>
                  </select> <br>
       
                <label for="seats[STP]">Standard Concession:</label>
                  <select name="seats[STP]" data-fullprice ="18" data-discprice ="13.50">
                  <option value ="">Please Select</option>
                    <?php make_seat_num("STP"); ?>
                  </select> <br>

                <label for ="seats[STC]">Standard Children: </label>
                  <select name ="seats[STC]" data-fullprice ="16.5" data-discprice ="12">
                    <option value ="">Please Select</option>
                  <?php make_seat_num("STC"); ?>
                </select>
            </fieldset>

            <fieldset>
              <legend>First Class Seating</legend>

                <label for="seats[FCA]">First Class Adults:</label>
                  <select name ="seats[FCA]" data-fullprice ="30" data-discprice ="24">
                    <option value ="">Please Select</option>
                    <?php make_seat_num("FCA"); ?>
                  </select><br>

                <label for="seats[FCP]">First Class Concession: </label>
                  <select name ="seats[FCP]" data-fullprice ="27" data-discprice ="22.5">
                    <option value ="">Please Select</option>
                    <?php make_seat_num("FCP"); ?>
                  </select><br>

                <label for ="seats[FCC]">First Class Children: </label>
                  <select name ="seats[FCC]" data-fullprice="24" data-discprice ="21">
                    <option value ="">Please Select</option>
                    <?php make_seat_num("FCC"); ?>
                  </select>

            </fieldset>

            <!-- Added for assignment 4 -->
              <div id="rememberMe">
                <input type="checkbox" id="remember"onclick="Remember()">
                <label id="remember_lab" for="remember">Remember me</label>
              </div>
          <div class='Price'>
            <h2> Final Price: <h2> 
            <p id="price">$0</p>

            <input type="hidden" name="totalPrice" value="" >
        
            <button name="bookNow" type="submit">Book Now</button>
          </div>          
       
        </div>
      <div>
      </form>


  </main>
    
  
    <footer>
      <br><br><br>
      <div class = "search_booking">
        <fieldset>
          <legend>User Information</legend>
          <label for ="user[Name]"> Name </label><br>
          <input type="text" id="user[Name]" name="user[Name]" placeholder="John doe">
          <span id = "nameError"></span>
          <br>

          <label for="user[Email]">Email:</label><br>
          <input type="email" id="user[Email]" name="user[Email]" placeholder="example@gmail.com">
          <span id = "emailError"></span>
          <br>
          <button name="bookNow" type="submit" onclick = >Book Now</button>
        
        </fieldset>
      </div>
      
      
      <br><br><br><br>
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
  <script src='scripts.js'></script>
  <script> checkStorage(); </script>
</html>