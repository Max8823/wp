<?php


session_start();


include "Movies.php";

$movie_data = file_get_contents("movie_data.json");
$movies = [];


// storing the movies from the movie JSON into an array
foreach (json_decode($movie_data) as $movie){
  $movies[] = new Movie((array)$movie);
}
// this prevents an incorrect movie code from being submitted in the post from the index.php page
  if(!isset($_POST['movie'])){
    Header("Location: ./index.php?error=".'Movie not found');
    die;
} else{

// these 3 variables are used to check the movie code, time and day, if any one of these remain false then the booking is not valid and is likely caused by a dishonest user
$movie_found = false;
$day_found = false;
$time_found = false;
$seat_found = false;


// checking movie codes against what was passed iin POST
  foreach($movies as $movie){
    if($movie->get_movie_code() == $_POST['movie']){
      $current_movie =$movie;
      $_SESSION['movie_code'] = $_POST['movie'];
      $movie_found = true;
    }
  }
    if(!$movie_found){
        
        //Header("Location: ./index.php?error=".'Movie not found');
        //die;
    }
        
      
    // pulling variables from the post and storing them in variables to be used in comparing, this is necessary to seperate data fields
    $dayTime = explode(',', $_POST['day']);
    $time = explode(':', $dayTime[1]);
    $day = explode(':', $dayTime[0]);
        
    $viewing_times = $current_movie->get_viewing_times();
    $showing_days = $current_movie ->get_viewing_days();
        
    // removing unwanted chars from the arrays to make them easier to compare
    $day[1] = str_replace('"', "", $day[1]);
    $time[1] = str_replace('"', "", $time[1]);
    $time[1] = str_replace('}', "", $time[1]);


    // checking if the current day is in the array of days that the movie is showing
    for($i=0; $i<count($showing_days); $i++){
        if($showing_days[$i] == trim($day[1], " ")){
            $day_found = true;
            $_SESSION['day'] = $day[1];
        }
    };


    // checking if the current movie has a time that matches the time that was passed in the post
    for($i=0; $i<count($viewing_times); $i++){
        if($viewing_times[$i] == intval($time[1])){
            $time_found = true;
            $_SESSION['time'] = $time[1];   
        }
    };


    $seats = $_POST['seats'];
    
    // checking seats to ensure that they are not greater than 10
    
    
    foreach($seats as $value){

        if($value >10){
            Header('Location: ./index.php?error='.'an unexpected error occured');
            break;
        }
        elseif($value != ""){
            $seat_found = true;
            $_SESSION['seats'] = $seats;
        } 
    }
   
    }

  
    if(!$day_found || !$time_found ){
        Header("Location: ./booking.php?error=".'No day or time selected ');
       
        die;
    }elseif(!$seat_found){
      
        Header('Location: ./booking.php?error='.'No seats selected');
        ?> <script> document.getElementById("seatingError").innerHTML = "You must select at least one seat"; </script> <?php
      

        die;
    }
    

    else{
        $_SESSION['Name'] = $_POST['user']['Name'];
        $_SESSION['Email'] = $_POST['user']['Email'];
        $_SESSION['Phone'] = $_POST['user']['mobile_number'];
        
        
      //  header("Location: ./Recipt_page.php");
    }



?>

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
