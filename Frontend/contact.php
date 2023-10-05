<?php

session_start();
require_once("connection.php");


?>

<!DOCTYPE html>
<html lang="en">
  <head> </head>

  <body>

        <!-- Navigation Bar -->

       <?php

           require_once("header.php");
           
       ?>

    <!-- ---------- Contact Us Section ------------ -->
    <section class="contact">

<h1 class="heading"> Contact Us </h1>

<div class="row">

  <div class="contact-one">

    <h3> Get in Touch </h3>
    <p class="Thank-you"> Thank you for viewing my website. <br> I
      really hope you've enjoyed looking at my work. </p>

    <div class="contact-box">
    <div class="box">
      <span class="material-icons-sharp">person</span>
      <div class="desc">
        <p> Name </p>
        <p> Reshma Lagad </p>
      </div>
    </div>

    <div class="box">
      <span class="material-icons-sharp">location_on</span>
      <div class="desc">
        <p> Address </p>
        <p> Ahemdnagar, Maharastra </p>
      </div>
    </div>

    <div class="box">
      <span class="material-icons-sharp">email</span>
      <div class="desc">
        <p> Email </p>
        <p> bestcoder2022@gmail.com </p>
      </div>
    </div>
    </div>

  </div>

  <div class="contact-two">

    <h3> Message Me </h3>

    <form action="contact.php" method="POST">

      <div class="two-col">

        <input type="text" name="name" autocomplete="off"
          placeholder="Username" required>
        <input type="text" name="email" autocomplete="off"
          placeholder="Email" required>

      </div>

      <div>
        <input type="text" name="subject" placeholder="Subject"
          required>
      </div>

      <div>
        <textarea type="text" name="message" id="message"
          placeholder="Message" cols="30" rows="3" required></textarea>
      </div>

      <input type="submit" name="submit" class="btn" value="Submit">
    </form>

  </div>

</div>

</section>

<div class="map">

<iframe
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3992025.715832655!2d74.79033602624062!3d20.369773425308757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdcb05d46788921%3A0x6677e92c1a5181b6!2sAhmednagar%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1651906967592!5m2!1sen!2sin"
width="100%" height="450" style="border:0;" allowfullscreen=""
loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

    

   <!-- Footer Section --> 

    <?php

        require_once("footer.php");

    ?>





    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>


  </body>
</html>