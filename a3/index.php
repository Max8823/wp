<!-- starting and destroying session variables here, this is due to error handling with the post validation and to prevent the user from getting 'stuck' if a false movie code is
somehow submitted -->
<?php

session_start();
session_destroy();

?>

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
    
  </head>

  <body>
    <header>
    <img src = "https://i.imgur.com/xAnMjzk.png" alt= "Lunardo_logo" class="header_logo">
    </header>

    <div class ='nav'>
      <a href="#about">About us </a>
      <a href =#seating> Seating </a> 
      <a href =#now_showing> Now Showing </a>
    </div>


    <script>
      window.onscroll = function(){
       
        var navLinks = document.getElementsByClassName("nav")[0].getElementsByTagName("a");

        var sections = document.getElementsByTagName("main")[0].getElementsByTagName("section");
       
        for(var i=0; i<sections.length; i++ ){
            
          var section_top = sections[i].offsetTop;
          var section_bottom =sections[i].offsetTop+sections[i].offsetHeight;

          if (window.scrollY >= section_top && window.scrollY <= section_bottom){

            navLinks[i].classList.add("current");
          }
          else{
            navLinks[i].classList.remove("current");
          }

          }
         
        }
       
      
    </script>
  
    <main>
    
        <section id="about">
        <h1>About us</h1>
          <img src ="https://i.imgur.com/kJ9zNsJ.jpg">
            <p> Lunardo Cinemas is local theatre located inbetween Townsville and Cairns FNQ, oringinally opening its doors to customers in 1982 Lunardo Cinemas has over 40 years
              Experience in the theatre industry. After a long renovating period and due to the covid pandemic Lunardo Cinemas is once again opening its doors to customers, with a 
            grand reopening occuring on the 4th of August 2022 </p> 

        </section>
        <hr>
       
        <section id="seating">
        <h1>Seating</h1>
        
        <p> Lunardo Cinamas have upgraded the seating options for viewers and are now offering first class seating in addition to our standard seating option. </p> 
            <h1>Pricing</h1>

            <div class = seating_options>
              <img src = "../../media/Profern-Standard-Twin.png" alt='Standard seating'> 
              <figcaption>Standard seating</figcaption>
            </div>

            <div class = seating_options>
            <img src = "../../media/Profern-Verona-Twin.png" alt='First Class'>
              <figcaption>First class seating</figcaption>
            </div>
            <p> The pricing for first class and standard seating arranements can be seen below: prices are discounted all day Monday and from 12:PM onwards every other week day. </p> 
          
          
            <table>
              <tr>
                <th>Seat Type</th>
                <th>Discounted times</th>
                <th>All other times</th>
              </tr>
              <tr>
                <td>Standard Adult</td>
                <td>$ 15.00</td>
                <td>$ 20.50</td>
              </tr>
              <tr>
                <td>Standard Concession</td>
                <td>$ 13.50</td>
                <td>$ 18.00</td>
              </tr>
              <tr>
                <td>Standard Child</td>
                <td>$ 12.00</td>
                <td>$ 16.50</td>
              </tr>
              <tr>
                <td>First Class Adult</td>
                <td>$ 24.00</td>
                <td>$ 30.00</td>
              </tr>
              <tr>
                <td>First Class Concession</td>
                <td>$ 22.50</td>
                <td>$ 27.00</td>
              </tr>
              <tr>
                <td>First Class Child</td>
                <td>$ 21.00</td>
                <td>$ 24.00</td>
              </tr>
            </table>
      </section>

        <hr>

        <h1>Now Showing</h1>   
      <section id="now_showing">
     
        
          <div class='movie_info'>
            <div class ='movie_info_inner'>

              <div class='movie_info_front'>
                <img src='https://m.media-amazon.com/images/M/MV5BMmIwZDMyYWUtNTU0ZS00ODJhLTg2ZmEtMTk5ZmYzODcxODYxXkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_FMjpg_UY576_.jpg' alt='Top gun maverick'>
                <h3>Top gun Maverick</h3>
                <h4>Rating : M</h4>
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
                <!--these breaks are needed to push the "book now button to the bottom of the card-->
                <br><br><br><br><br><br>
                
                <form action ="booking.php" method="get">
                  <input type="hidden" name="movie" value="ACT">
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
              <h4>Rating : M</h4>
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
             <!--these breaks are needed to push the "book now button to the bottom of the card-->
             <br><br><br><br><br><br>
                <form action ="booking.php" method="get">
                  <input type="hidden" name="movie" value="AHF">
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
                  <li>Fri - 6:00 PM</li>
                  <li>Sat - 12:00 PM</li>
                  <li>Sun - 12:00 PM</li>
                </ul>
                <!--these breaks are needed to push the "book now button to the bottom of the card-->
                <br><br><br><br><br><br>
                
                <form action ="booking.php" method="get">
                  <input type="hidden" name="movie" value="FAM">
                  <button name="bookNow" type="submit">Book Now</button>
                </form>

              </div>
            </div> 
          </div>
             

          <div class='movie_info'>
            <div class='movie_info_inner'>
              <div class='movie_info_front'>
                <img src='https://m.media-amazon.com/images/M/MV5BY2UyOWJjMWEtNmIwYS00ZjM5LWEyYjMtMTI4NDBhMzViNmIyXkEyXkFqcGdeQXVyMDA4NzMyOA@@._V1_.jpg' alt='Mrs Harris Goes to Parris'>
                <h3>Mrs Harris Goes to Paris</h3>
                <h4>Rating : PG</h4>
              </div>

              <div class = 'movie_info_back'>
                <h3>Mrs Harris Goes to Paris</h3>
                <p> A widowed cleaning lady in 1950s London falls madly in love with a couture Dior dress, and decides that she must have one of her own.</p>
                <img src='https://m.media-amazon.com/images/M/MV5BY2UyOWJjMWEtNmIwYS00ZjM5LWEyYjMtMTI4NDBhMzViNmIyXkEyXkFqcGdeQXVyMDA4NzMyOA@@._V1_.jpg' alt='Mrs Harris Goes to Parris'>
                
                <h4>Showing Times:</h4>
                <ul>
                  <li>Wed - 12:00 PM</li>
                  <li>Thu - 12:00 PM</li>
                  <li>Fri - 12:00 PM</li>
                  <li>Sat - 3:00 PM</li>
                  <li>Sun - 3:00 PM</li>
                </ul><!--these breaks are needed to push the "book now button to the bottom of the card-->
                <br><br><br><br><br><br>
                
                <form action ="booking.php" method="get">
                  <input type="hidden" name="movie" value="RMC">
                  <button name="bookNow" type="submit">Book Now</button>
                </form>

              </div>
            </div>
          </div>
   
      </section>
        <hr>
       


      
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Maxwell Trounce, S3909581. Last modified: 18/06/2022 <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
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