<?php


Class Movie
{

    private string $movie_name;
    private string $trailer_link;
    private string $movie_details;
    private string $movie_img;
    private string $rating;
    private string $movie_code;
    private array $viewing_days;
    private array $viewing_times;
    private array $movie_stars;
    private string $movie_director;

    function __construct(array $movie_data){

        $this->movie_name = $movie_data["movie_name"];
        $this->trailer_link = $movie_data["trailer_link"];
        $this->movie_img = $movie_data["movie_img"];
        $this->movie_details =$movie_data["movie_details"];
        $this->rating = $movie_data["movie_rating"];
        $this->movie_code = $movie_data["movie_code"];
        $this->viewing_times = $movie_data["viewing_times"];
        $this->viewing_days = $movie_data["viewing_days"];
        $this->movie_stars = $movie_data["main_cast"];
        $this->movie_director = $movie_data["movie_director"];
}

    function get_movie_name(){
        return $this->movie_name;
    }

    function get_movie_trailer(){
        return $this->trailer_link;
    }

    function get_movie_details(){
        return $this->movie_details;
    }

    function get_movie_rating(){
        return $this->rating;
    }

    function get_viewing_times(){
        return $this->viewing_times;
    }

// this function is used to convert the time string stored in movies_data to 12hr - am/pm time format    
    function get_viewing_display_times(){

        $times = $this->viewing_times;
        $i=0;
        while($i < count($times)){
            $times[$i] = date("g:i a", strtotime($times[$i]));
            $i++;
    }

        return $times;
    }


    function get_viewing_days(){
        return $this->viewing_days;
    }

    function get_movie_code(){
        return $this->movie_code;
    }

    function get_movie_cast(){
        return $this->movie_stars;
    }
    function get_movie_director(){
        return $this->movie_director;
    }

   



}
