<?php
session_start();

include "Movies.php";

// check_movie_code - used to check if the movie code exists, is used on both the tools and booking.php pages as part of validations
function check_movie_code(){

$movie_data = file_get_contents("movie_data.json");
$movies = [];
$current_movie = null;

// storing the movies from the movie JSON into an array
foreach (json_decode($movie_data) as $movie){
  $movies[] = new Movie((array)$movie);
}

  if(!isset($_SESSION['movie_code'])){

// this prevents an incorrect movie code from being submitted in the post from the index.php page
  if(!isset($_GET['movie'])){
    $current_movie = null;
} 


else{

// finding the current movie based off the movie_code that was passed in the post, comparing to existing movie_codes in the movies.JSON file
  foreach($movies as $movie){
    if($movie->get_movie_code() == $_GET['movie']){
      $current_movie =$movie;
      $_SESSION['movie_code'] = $current_movie->get_movie_code();
    }
  }
  if($current_movie == null){
    Header("Location: ./index.php?error=".'Movie not found');
    die;
  }
}
  } else{
    
    foreach($movies as $movie){
      if($movie->get_movie_code() == $_SESSION['movie_code']){
        $current_movie =$movie;
      }
  }
}
  return $current_movie;
}

// this is similar to the above function however, without over engineering the above function anymore, this function below is called
// only from the recipt page and assumes that the post validation checks have passed and that the movie code is valid - this will return the movie object which
// is used in the recipt page mainly to display certaian features of the movie
function get_movie_code(){

  $movie_data = file_get_contents("movie_data.json");
  $movies = [];
  $current_movie = null;

// storing the movies from the movie JSON into an array
  foreach (json_decode($movie_data) as $movie){
  $movies[] = new Movie((array)$movie);
}
foreach($movies as $movie){
  
  if(str_contains($movie->get_movie_code() , $_SESSION['movie_code'])){
    $current_movie =$movie;
    
  }
}

  return $current_movie;
}

// used to generate seating numbers, from 0-10 moved ffrom booking.php
function make_seat_num($type){
  $i=1;
  
  if(isset($_SESSION["seats"]["$type"])){

    while($i<11){
      if($i == $_SESSION["seats"]["$type"]){
        echo "<option value='$i' selected>$i</option>";
      }
      else{
        echo "<option value='$i'>$i</option>";
       
      }
      $i++;
    }
}

  while($i < 11){
    
            echo"<option value=$i>$i</option>";
            $i++;
}
}


//used to return the full seating name oppopsed to the short hand version
 function get_ticket_name(string $seat_type){

     $ticket_name = "";

   
    if ($seat_type == 'STA'){
      $ticket_name = 'Standard Adult';
    }

    elseif ($seat_type == 'STP'){
      $ticket_name = 'Standard Concession';
    }

    elseif ($seat_type == 'STC'){
      $ticket_name = 'Standard Child';
    }

    elseif ($seat_type == 'FCA'){
      $ticket_name = 'First Class Adult';
    }

    elseif ($seat_type == 'FCP'){
      $ticket_name = 'First Class Concession';
    }

    elseif ($seat_type == 'FCC'){
      $ticket_name = 'First Class Child';
    }

    return $ticket_name;
}

// finds the total number of seats from the session 'seats' array, returns the value - used on the recipt page to priint the appropriate nubmer of tickets
function get_quantity(){
  $quantity = 0;

  foreach($_SESSION['seats'] as $value){
    if($value != ""){

      $quantity+= $value;
    }
  }
  return $quantity;
}

// converts 24 hr time to 12 hr time, used on the recipt page to print the time in a more readable format
function get_view_time($time){

  $time = date("g:i a", strtotime($time));

  return $time;

}

function get_gst($price){

  $gst = $price * 0.1;
  return $gst;

}


function print_to_booking(){

  $file = fopen("booking_data.txt", "a") or die;
  $txt = "\n";
  fwrite($file, $txt);
  
  $txt = date ("Y F d ", filemtime($_SERVER['SCRIPT_FILENAME'])) .","."\t\t\t";
  fwrite($file, $txt);

  $txt = $_SESSION['Name']."," . "\t\t\t";
  fwrite($file, $txt);

  $txt = $_SESSION['Phone']."," . "\t\t\t";
  fwrite($file, $txt);

  $txt = $_SESSION['Email']."," . "\t\t\t";
  fwrite($file, $txt);

  $txt = $_SESSION['movie_code']."," . "\t\t\t";
  fwrite($file, $txt);

  $txt = $_SESSION['day']."," . "\t\t\t";
  fwrite($file, $txt);

  $txt = $_SESSION['time']."," . "\t\t\t";
  fwrite($file, $txt);

  if(isset($_SESSION['seats']['STA']) && $_SESSION['seats']['STA'] != ""){
    $txt = $_SESSION['seats']['STA']."," . "\t\t\t";
    fwrite($file, $txt);
  }
  else{
    $txt = "0" . "\t\t\t";
    fwrite($file, $txt);
  }
 
  if(isset($_SESSION['seats']['STP']) && $_SESSION['seats']['STP'] != ""){
    $txt = $_SESSION['seats']['STP']."," . "\t\t\t";
    fwrite($file, $txt);
  }
  else{
    $txt = "0"."," . "\t\t\t";
    fwrite($file, $txt);
  }
 
  if(isset($_SESSION['seats']['STC']) && $_SESSION['seats']['STC'] != ""){
    $txt = $_SESSION['seats']['STC']."," . "\t\t\t";
    fwrite($file, $txt);
  }
  else{
    $txt = "0"."," . "\t\t\t";
    fwrite($file, $txt);
  }
 
  if(isset($_SESSION['seats']['FCA']) && $_SESSION['seats']['FCA'] != ""){
    $txt = $_SESSION['seats']['FCA']."," . "\t\t\t";
    fwrite($file, $txt);
  }
  else{
    $txt = "0"."," . "\t\t\t";
    fwrite($file, $txt);
  }
  
  if(isset($_SESSION['seats']['FCP']) && $_SESSION['seats']['FCP'] != ""){
    $txt = $_SESSION['seats']['FCP']."," . "\t\t\t";
    fwrite($file, $txt);
  }
  else{
    $txt = "0"."," . "\t\t\t";
    fwrite($file, $txt);
  }
 
  if(isset($_SESSION['seats']['FCC']) && $_SESSION['seats']['FCC'] != ""){
    $txt = $_SESSION['seats']['FCC']."," . "\t\t\t";
    fwrite($file, $txt);
  }
  else{
    $txt = "0"."," . "\t\t\t";
    fwrite($file, $txt);
  }
  
  $txt = $_SESSION['Price']."," . "\t\t\t";
  fwrite($file, $txt);

  $txt = get_gst($_SESSION['Price']).",";
  

  fwrite($file, $txt);
  fclose($file);
  
}


function loadfile(){
    
  $data = file_get_contents("booking_data.txt");
 
  $data = trim($data);
  $data = str_replace("\t", "", $data);
  $data = explode("\n", $data);

  foreach($data as $line){
      $line = trim($line);
     
      $line = explode(",", $line);
      $bookings[] = $line;     
  }

  return $bookings;
}


function find_movie_name(String $movie_code){
 $movie_name = "";

  if(str_contains($movie_code,"ACT")){
    $movie_name = "Top gun Maverick";
  }
  elseif(str_contains($movie_code, "AHF")){
    
    $movie_name = "Samrat Prithviraj";
  }
  elseif(str_contains($movie_code , "FAM")){
    $movie_name = "Lightyear";
  }
  elseif(str_contains($movie_code , "RMC")){
    $movie_name = "Mrs Harris Goes to Paris";
  }
  
 
  return $movie_name;
}


function getBtn(array $booking){

  $btn = "";
  $btn .= "<form action='post-validation.php' method='post'>";
  $btn .= "<input type='hidden' name='booking' value='".serialize($booking)."'>";
  $btn .= "<input type='hidden' name = 'redirected' value='True'>";
  $btn .= "<button name='View' type='submit'>View</button>";
  
        
  $btn .= "</form>";

  return $btn;
  
}


// search_bookings used as a seperate function to find if there are any previous bookings made by the user in the bookings_data.txt file
function search_bookings($bookings, $user_name, $email){
    $found = false;

    $i = 0;
    $j=0;
   
    


    // looping through the bookings array
   for($i = 0; $i < count($bookings); $i++){
    
    // checking if the user name matches the name in the bookings array, adding the matches to foundBookings array and then returning the array
    $bookings[$i][1] = trim($bookings[$i][1]);
    $bookings[$i][3] = trim($bookings[$i][3]);





        if($bookings[$i][1] == $user_name && $bookings[$i][3] == $email){
            $found = true;
            $foundBookings[$j] = $bookings[$i];
            $j++;

        }
    }

    return $foundBookings;
}





?>