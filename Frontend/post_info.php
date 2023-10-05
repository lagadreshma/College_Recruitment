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


if(isset($_POST['apply'])){

    $job_id = $_POST['job_id'];
    $emp_id = $_POST['emp_id'];
    $comp_id = $_POST['comp_id'];

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

    <section class="post-info">

      <div class="all-info">

        <?php 

           $select = "select * from job_posts where j_id='$job_id' ";

           $query = mysqli_query($conn, $select);

           $rows = mysqli_num_rows($query);

           while($result = mysqli_fetch_assoc($query)){

        ?>

        <div class="row">

           <form action="application_form.php" method="post">

             <div class="info">

                <div class="job-info">

                    <div class="col-6">
                        <div class="box1">
                        <img src="<?php echo $result['j_clogo']; ?>" alt="" width="300px" height="200px">
                              
                           <div class="one">
                           <h2 class="job-title"><?php echo $result['j_position']; ?></h2>
                            <h3 class="comp-name"><?php echo $result['j_cname']; ?></h3>
                            <h3 class="job-salary"><?php echo $result['j_salary']; ?> \month</h3>
                           <h3 class="job-type"><?php echo $result['j_type']; ?></h3>
                           </div>
                           
                        </div>
                        <div class="box2">
                           <h2 class="job-desc"> Job Description : </h2>
                           <h3><?php echo $result['j_desc']; ?></h3>
                        </div>
                        <div class="box3">
                            <h2 class="job-skills"> Required Skills : </h2>
                            <h3><?php echo $result['j_skills']; ?></h3>
                        </div>
                        <div class="box4">
                            <h2 class="education">Education + Experience : </h2>
                            <h3><?php echo $result['j_education']; ?></h3>
                            <h3><?php echo $result['j_experience']; ?></h3>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="box1">
                            <h2>Job Overview</h2>

                             <p>Post Date    : <?php echo $result['j_post_date']; ?> </p>
                             <p>Location   : <?php echo $result['j_location']; ?>  </p>
                             <p>Vacancy : <?php echo $result['j_vacancy']; ?>  </p>
                             <p>Job Nature : <?php echo $result['j_type']; ?>  </p>
                             <p>Salary   : <?php echo $result['j_salary']; ?> \month</p>
                             <p>Application Date : <?php echo $result['j_last_date']; ?> </p>

                            <button type="submit" name="applynow" class="btn">Apply Now</button>
                            <input type="hidden" name="job_id" value="<?php echo $result['j_id']; ?>">
                            <input type="hidden" name="emp_id" value="<?php echo $result['er_id']; ?>">
                            <input type="hidden" name="comp_id" value="<?php echo $result['c_id']; ?>">
                        </div>

                        <div class="box2">

                           <?php 
                           
                              $sql = "Select * from company where c_id='$comp_id'";
                              $query2 = mysqli_query($conn,$sql);
                              $row = mysqli_num_rows($query2);

                              while($res = mysqli_fetch_assoc($query2)){

                           ?>
                           <h2>Company Information</h2>
                           <h2><?php echo $res['c_name']; ?></h2>

                             <p>City : <?php echo $res['c_city']; ?> </p>
                             <p>State : <?php echo $res['c_state']; ?>  </p>
                             <p>Country : <?php echo $res['c_country']; ?> </p>
                             <p>Website : <?php echo $res['c_website']; ?> </p>
                             <p>Email : <?php echo $res['c_email']; ?> </p>

                            <?php
                              }
                            ?>
                        </div>

                    </div>

                </div>

             </div>

             </form>

        </div>

        <?php

          }

        ?>


      </div>

    </section>


    <!-- Footer Section --> 

    <?php

        require_once("footer2.php");

    ?>

    
    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>
    
  </body>
</html>