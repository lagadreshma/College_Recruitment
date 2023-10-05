<?php

session_start();


require_once("connection.php");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  </head>

  <body>

    <!-- Navigation Bar -->

      <?php

        require_once("header.php");

      ?>

            <!-- About us Section -->

            <section class="about">

<div class="container">

  <h1 class="heading"> About Me </h1>

  <div class="row">

    <div class="box-1">

      <h2> Hello, My name is <span>Reshma Lagad </span> <br> And I am a
        <span> Student. </span> <h2>

          <p> I am MCA Student at <br> Sinhgad Institute of Management, Vadgaon Bk Pune. </p>

          <a href="" class="btn"> More about Me </a>

          <div class="about-links">

            <a
              href="https://www.linkedin.com/in/reshma-lagad-735501227/"
              target="blank"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="https://github.com/lagadreshma" target="blank"><i
                class="fa-brands fa-github"></i> </a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>

          </div>

    </div>


    <div class="box-2">
      <img src="images1/portfolio.jpg">
    </div>

  </div>

</div>

</section>

    

   <!-- Footer Section --> 

    <?php

        require_once("footer.php");

    ?>





    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>


  </body>
</html>