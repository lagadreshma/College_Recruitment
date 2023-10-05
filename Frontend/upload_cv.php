<?php

session_start();
include "connection.php";
include "function.php";

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

if(isset($_POST["submit"])){

    $jsname = $user_name;
    $jsemail = $user_email;
    $jsmobile = $user_mobile;
    $jsid = $user_id;
    $resume = $_FILES['jsresume'];
  
    $file_name = $resume['name'];
    $file_tmp = $resume['tmp_name'];
  
    $fileext = explode('.',$file_name);
    $filecheck = strtolower(end($fileext));
    
    $fileextsarray = array('docx','pdf');
  
    if(in_array($filecheck,$fileextsarray)){
  
      $destinationfile = '../Upload/' . $file_name;
      move_uploaded_file($file_tmp,$destinationfile);
  
      $insertQuery = "insert into resumes(js_id,js_name,js_email,js_mobile,resume)values('$jsid','$jsname','$jsemail','$jsmobile', '$destinationfile')";
  
    $result = mysqli_query($conn, $insertQuery);
  
    if($result){
      ?>
  
        <script> 
        // alert("Data Inserted Properly."); 
        window.location.href="my_profile.php";
        </script>
  
      <?php
    }
    else{
  
      ?>
  
        <script> alert("Data Not Inserted."); </script>
  
      <?php
     
    }
  
  }
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
              <h2>naukri<span>4U</span></h2>
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

    <!-- Upload CV form -->

    <div class="dashboard-form">

   <form class="form" action="" method="post" enctype="multipart/form-data">

     <h1> Upload Your CV </h1>

    <div class="col-2">

      <div>
        <label for="js_name"> Enter Your Name : </label>
        <input type="text" name="jsname" id="c_name"  value="<?php echo $user_name; ?>" autocomplete="off" required>
      </div>

      <div>
        <label for="js_email"> Enter Your Email : </label>
        <input type="text" name="jsemail" id="js_email" value="<?php echo $user_email; ?>"  autocomplete="off" required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="js_mobile"> Enter Your Mobile No. : </label>
        <input type="text" name="jsmobile" id="js_mobile"  value="<?php echo $user_mobile; ?>" autocomplete="off" required>
      </div>  
      
      <div>
         <label for="resume"> Choose Your CV </label>
         <input type="file" name="jsresume" id="resume" value="" required>
       </div>
      
    </div>

    <div>
        <label for="js_id"> </label>
        <input type="hidden" name="jsid" id="js_id" value="<?php echo $user_id; ?>" autocomplete="off" required>
    </div>
    
    
    <div class="buttons">

      <div>
        <input type="submit" name="submit" class="btn" value="Submit">
      </div>

    </div>

   </form>
   
</div>





    <!-- Footer Section --> 

    <?php

        require_once("footer2.php");

    ?>





    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>
    
  </body>
</html>
