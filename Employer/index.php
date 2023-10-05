<?php

session_start();
include "../connection.php";
include "../function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("../employer_login.php");
}

$eid = $_SESSION['eid'];
$ename = $_SESSION['ename'];
$ecname = $_SESSION['ecname'];
$eprofilepic = $_SESSION['eprofilepic'];



?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Online Job Portal Recruiter-Panel">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP , MySQL">
    <meta name="author" content="Reshma Lagad">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit= no">

    <title> Employer Panel </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS File Link -->
    <link rel="stylesheet" href="../style.css">

    <!-- Font awesome icon link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet">
      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

</head>
<body>

<!-- ---------------- Navigation Bar --------------- -->

<div class="header">

  <div class="container">

    <div class="navbar">

    <div class="logo">
          <a href="employer_profile.php"><img src="<?php echo $eprofilepic; ?>" width="70px;" height="70px;" alt=""></a>
          <h1><a href="index.php"><?php echo $ename; ?> </a> </h1>
        </div>

        <nav>
          <ul class="menu-items">
            
            <li><a href="manage_jobseekers.php"> Jobseekers  </a></li>
            <li><a href="manage_posts.php"> Posts  </a></li>
            <li><a href="manage_applications.php"> Applications </a></li>
            <li><a href="manage_resumes.php"> Resumes </a></li>
            <li><a href="logout.php"> Logout </a></li>

          </ul>
        </nav>

    </div>

  </div>

</div>


<!-- ------------- Employer Dashboard -------------- -->

<div class="dashboard">

  <div class="row">

    <div class="dashboard_div jobseekers">
    <?php

     $select_rows = mysqli_query($conn, "select * from jobseekers");
     $jobseeker_count = mysqli_num_rows($select_rows);

    ?>

    <h3> Jobseekers <br><br> <span><?php echo $jobseeker_count; ?></span></h3>
    </div>

    <div class="dashboard_div applications">
    <?php

     $select_rows = mysqli_query($conn, "select * from applications where er_id='$eid' ");
     $applications_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Applications <br><br> <span><?php echo $applications_count; ?></span></h3>
    </div>

    <div class="dashboard_div job_posts">
    <?php

     $select_rows = mysqli_query($conn, "select * from job_posts where j_cname='$ecname' ");
     $posts_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Job Posts <br><br> <span><?php echo $posts_count; ?></span></h3>
  </div>

  <div class="dashboard_div resumes">
    <?php

     $select_rows = mysqli_query($conn, "select * from resumes");
     $resume_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Total Resume's <br><br> <span><?php echo $resume_count; ?></span></h3>
  </div>


  </div>

  <div class="row">


  <div class="dashboard_div frontend_posts">
    <?php

     $select_rows = mysqli_query($conn, "select * from job_posts where j_position='Frontend Developer' and j_cname='$ecname'");
     $frontend_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Frontend Posts <br><br> <span><?php echo $frontend_count; ?></span></h3>
  </div>


  <div class="dashboard_div backend_posts">
    <?php

     $select_rows = mysqli_query($conn, "select * from job_posts where j_position='Backend Developer' and j_cname='$ecname'");
     $backend_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Backend Posts <br><br> <span><?php echo $backend_count; ?></span></h3>
  </div>

  <div class="dashboard_div other_posts">
    <?php

     $select_rows = mysqli_query($conn, "select * from job_posts where (j_position !='Backend Developer') and (j_position != 'Frontend Developer') and j_cname='$ecname'");
     $other_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Other Job Posts <br><br> <span><?php echo $other_count; ?></span></h3>
  </div>


  </div>

  </div>

</div>




<!-- Footer page  -->

<?php

  require_once("../footer.php");

?>

</body>
</html>