<?php


session_start();
require booking.php;

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