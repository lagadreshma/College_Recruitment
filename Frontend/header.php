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
              <a href="index.php"><h2>naukri<span>4U</span></h2></a>
          </div>

          <div class="navbar" id = "navlinks">
          
             <i class = "fa fa-times" onclick= "show();"></i>

               <ul id = "MenuItems">
                 <li><a href="index.php"> Home </a></li>
                 <li><a href="about.php"> About Us </a></li>
                 <li><a href="contact.php"> Contact Us </a></li>
                 <li><a href="jobs.php"> Find a Jobs </a></li>
                 <li><a href="register.php" class="register-link"> Sign Up </a></li>  
                 <li><a href="login.php"> Login </a></li>               
               </ul>

          </div>


             <i class = "fa fa-bars" onclick= "hide();"></i>

        </nav>

        
    </section>
    
  </body>
</html>