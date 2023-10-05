<?php

session_start();
include "../connection.php";
include "../function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("../admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<!-- ---------- header file------------- -->

<?php

  require_once("header.php");

?>


<!-- ------------- Recruiter Dashboard -------------- -->

<div class="dashboard">

  <div class="row">

    <div class="dashboard_div jobseekers">
    <?php

     $select_rows = mysqli_query($conn, "select * from jobseekers");
     $jobseeker_count = mysqli_num_rows($select_rows);

    ?>

    <h3> Jobseekers <br><br> <span><?php echo $jobseeker_count; ?></span></h3>
    </div>


    <div class="dashboard_div company">
    <?php

     $select_rows = mysqli_query($conn, "select * from company");
     $company_count = mysqli_num_rows($select_rows);

    ?>
      <h3> Company's <br><br> <span><?php echo $company_count; ?></span></h3>
    </div>


    <div class="dashboard_div employers">
    <?php

     $select_rows = mysqli_query($conn, "select * from employers");
     $employers_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Employers <br> <br> <span><?php echo $employers_count; ?></span></h3>
    </div>


    <div class="dashboard_div applications">
    <?php

     $select_rows = mysqli_query($conn, "select * from applications");
     $applications_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Applications <br><br> <span><?php echo $applications_count; ?></span></h3>
    </div>

  </div>

  <div class="row">

  <div class="dashboard_div job_posts">
    <?php

     $select_rows = mysqli_query($conn, "select * from job_posts");
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


  <div class="dashboard_div india_company">
    <?php

     $select_rows = mysqli_query($conn, "select * from company where c_country='India'");
     $IndiaCompany_count = mysqli_num_rows($select_rows);

     ?>
      <h3> India Company's <br><br> <span><?php echo $IndiaCompany_count; ?></span></h3>
  </div>


  <div class="dashboard_div other_company">
    <?php

     $select_rows = mysqli_query($conn, "select * from company where c_country != 'India'");
     $OtherCompany_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Other Company's <br><br> <span><?php echo $OtherCompany_count; ?></span></h3>
  </div>

  </div>

  </div>

</div>




<!-- ------------ Footer file ------------ -->
<?php

  require_once("../footer.php");

?>

</body>
</html>