<?php

session_start();

require_once("connection.php");

if(!isset($_SESSION['IS_LOGIN'])){

  echo "<script> window.location.href = 'login.php'; </script>";
  
}

if(isset($_SESSION['id'])){

$username = $_SESSION['username'];
$user_id = $_SESSION['id'];
$user_name = $_SESSION['fullname'];
$user_email = $_SESSION['email'];
$user_mobile = $_SESSION['mobile'];


}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Online Job Portal Website">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP , MySQL">
    <meta name="author" content="Reshma Lagad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit= no">

    <title> Online Job Portal </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS File Link -->
    <link rel="stylesheet" href="style.css">

    <!-- Font awesome icon link -->      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <!-- Swipper JavaScript - swipperjs.com -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  </head>

  <body>

    <!-- Navigation Bar -->

      <section class="header home">

        <nav>

        <div class="logo">
              <img src="images1/jobportallogo.jpg" alt="" width="50px" height="50px" style="border-radius:50%;">
              <a href="home.php"><h2>naukri<span>4U</span></h2></a>
        </div>

          <div class="navbar" id = "navlinks">
          
             <i class = "fa fa-times" onclick= "show();"></i>

               <ul id = "MenuItems">
                 <li><a href="home.php"> Home </a></li>
                 <li><a href="job_posts.php"> Find a Jobs </a></li>
                 <li><a href="contact_us.php"> Contact Us </a></li>
                 <li><a href=""><?php echo $username; ?><i class="fa-solid fa-caret-down"></i></a>
                 <div class="dropdown">
                 <ul>
                    <li><a href="my_profile.php">My Profile</a></li>
                    <li><a href="my_apply_history.php">Apply History</a></li>
                 </ul>
                 </div>
                 </li>
                 <li><a href="logout.php">Logout</a></li>

               </ul>

          </div>


             <i class = "fa fa-bars" onclick= "hide();"></i>

        </nav>

    </section>

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

require_once("footer2.php");

?>





<!-- Including JavaScript file link -->
<script src="main.js"> </script>


    
  </body>
</html>