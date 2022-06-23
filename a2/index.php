<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
    <script src =scripts.js></script>
  </head>

  <body>

    <header>
    <img src = "https://imgur.com/t6jo64l.png" alt= "Lunardo_logo" class="header_logo">
      <h1>Lunardo Cinemas<h1>
      

    </header>

    <div class ='top_nav'>
    <a href="#about">About us </a>
    <a href =#seating> Seating </a> 
    <a href =#now_showing> Now Showing </a>
    </div>

    
    <main>
     
        <section id="about">

            <h1>About us</h1>

        </section>

        <h1>Seating</h1>
        <section id ="seating">
        </section>


        <h1>Now Showing</h1>
        <section id="now_showing">
          <div class='movie_info'>
            <div class ='movie_info_inner'>

              <div class='movie_info_front'>
                <img src='https://m.media-amazon.com/images/M/MV5BMmIwZDMyYWUtNTU0ZS00ODJhLTg2ZmEtMTk5ZmYzODcxODYxXkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_FMjpg_UY576_.jpg' alt='Top gun maverick'>
                <h3>Top gun Maverick</h3>
                <h4>Rating : PG</h4>
              </div>

              <div class = 'movie_info_back'>
                <h3>Top gun Maverick</h3> <p>After more than thirty years of service as one of the Navy's top aviators, Pete Mitchell is where he belongs,
                pushing the envelope as a courageous test pilot and dodging the advancement in rank that would ground him. </p>

                <img src='https://m.media-amazon.com/images/M/MV5BMmIwZDMyYWUtNTU0ZS00ODJhLTg2ZmEtMTk5ZmYzODcxODYxXkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_FMjpg_UY576_.jpg' alt='Top gun maverick'>
                <h4>Showing Times :</h4>
                <ul>
                  <li>Mon - 9:00 PM</li>
                  <li>Tue - 9:00 PM</li>
                  <li>Wed - 9:00 PM</li>
                  <li>Thur - 9:00 PM</li>
                  <li>Fri - 9:00 PM</li>
                  <li>Sat - 6:00 PM</li>
                  <li>Sun - 6:00 PM</li>
                </ul>
                <br><br><br><br><br><br>
                
                <form action ="booking.php" method="get">
                  <input type="hidden" name="movie_Code" value="ACT">
                  <button name="bookNow" type="submit">Book Now</button>
                </form>
                
                
                 
               
                  
              </div>
            </div>
          </div>
              
          <div class='movie_info'>
           <div class='movie_info_inner'>

            <div class='movie_info_front'>
              <img src='https://m.media-amazon.com/images/M/MV5BNzlkZjI3ZDctNTEzMy00MjUxLWI5YjQtYjg0ODNjNzdjZjg0XkEyXkFqcGdeQXVyNTkzNDQ4ODc@._V1_FMjpg_UX300_.jpg' alt='Lightyear'>
              <h3>Samrat Prithviraj</h3>
              <h4>Rating : PG</h4>
            </div>
     
            <div class = 'movie_info_back'>
              <h3>Samrat Prithviraj</h3>
              <p> In 1192 CE in Ghazni, Afghanistan Prithviraj is captured by Muhammad Ghori where he forces him to fight against three lions. 
                A blinded Prithviraj is able to kill all of them but faints due to weakness.
              </p>
              <img src='https://m.media-amazon.com/images/M/MV5BNzlkZjI3ZDctNTEzMy00MjUxLWI5YjQtYjg0ODNjNzdjZjg0XkEyXkFqcGdeQXVyNTkzNDQ4ODc@._V1_FMjpg_UX300_.jpg' alt='Samrat Prithviraj'>

              <h4>Showing Times:</h4>
              <ul>
                <li>Mon - 6:00 PM</li>
                <li>Tue - 6:00 PM</li>
                <li>Sat - 9:00 PM</li>
                <li>Sun - 9:00 PM</li>
             </ul>
             <br><br><br><br><br><br>
                <form action ="booking.php" method="get">
                  <input type="hidden" name="movie_Code" value="AHF">
                  <!--there needs to be in-line styling for this button for ti to be centered-->
                  <button name="bookNow" style ="margin-right:100px" type="submit">Book Now</button>
                </form>
            </div>
           </div>
          </div>
             
               
          <div class='movie_info'>
            <div class='movie_info_inner'>
              <div class='movie_info_front'>
                <img src='https://m.media-amazon.com/images/M/MV5BYTg2Zjk0ZTctM2ZmMi00MDRmLWJjOGYtNWM0YjBmZTBjMjRkXkEyXkFqcGdeQXVyMTM1MTE1NDMx._V1_FMjpg_UY720_.jpg' alt='Lightyear'>
                <h3>Lightyear</h3>
                <h4>Rating : PG</h4>
              </div>

              <div class = 'movie_info_back'>
                <h3>Lightyear</h3>
                <p> While spending years attempting to return home, marooned Space Ranger Buzz Lightyear encounters an army of ruthless robots commanded by Zurg
                   who are attempting to steal his fuel source.</p>
                <img src='https://m.media-amazon.com/images/M/MV5BYTg2Zjk0ZTctM2ZmMi00MDRmLWJjOGYtNWM0YjBmZTBjMjRkXkEyXkFqcGdeQXVyMTM1MTE1NDMx._V1_FMjpg_UY720_.jpg' alt='Lightyear'>
                
                <h4>Showing Times:</h4>
                <ul>
                  <li>Mon - 12:00 PM</li>
                  <li>Tue - 12:00 PM</li>
                  <li>Wed - 6:00 PM</li>
                  <li>Thu - 6:00 PM</li>
                  <li>Fri - 18:00 PM</li>
                  <li>Sat - 12:00 PM</li>
                  <li>Sun - 12:00 PM</li>
                </ul>
                <br><br><br><br><br><br>
                
                <form action ="booking.php" method="get">
                  <input type="hidden" name="movie_Code" value="ACT">
                  <button name="bookNow" type="submit">Book Now</button>
                </form>

              </div>
            </div> 
          </div>
             

          <div class='movie_info'>
            <div class='movie_info_inner'>
              <div class='movie_info_front'>
                <img src='https://m.media-amazon.com/images/M/MV5BODdlNDdjOWUtNDYwNy00ZWViLWI2MjItZTMwZTVhOTk3ZjMxXkEyXkFqcGdeQXVyMTM1MTE1NDMx._V1_FMjpg_UX1080_.jpg' alt='Mrs Harris Goes to Parris'>
                <h3>Mrs Harris Goes to Paris</h3>
                <h4>Rating : PG</h4>
              </div>

              <div class = 'movie_info_back'>
                <h3>Mrs Harris Goes to Paris</h3>
                <p> A widowed cleaning lady in 1950s London falls madly in love with a couture Dior dress, and decides that she must have one of her own.</p>
                <img src='https://m.media-amazon.com/images/M/MV5BODdlNDdjOWUtNDYwNy00ZWViLWI2MjItZTMwZTVhOTk3ZjMxXkEyXkFqcGdeQXVyMTM1MTE1NDMx._V1_FMjpg_UX1080_.jpg' alt='Mrs Harris Goes to Parris'>
                
                <h4>Showing Times:</h4>
                <ul>
                  <li>Wed - 12:00 PM</li>
                  <li>Thu - 12:00 PM</li>
                  <li>Fri - 12:00 PM</li>
                  <li>Sat - 3:00 PM</li>
                  <li>Sun - 3:00 PM</li>
                </ul>
                <br><br><br><br><br><br>
                
                <form action ="booking.php" method="get">
                  <input type="hidden" name="movie_Code" value="ACT">
                  <button name="bookNow" type="submit">Book Now</button>
                </form>

              </div>
            </div>
          </div>
<!-- end of now showing section -->    
        </section>


      
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Maxwell Trounce, S3909581. Last modified: 18/06/2022 <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>