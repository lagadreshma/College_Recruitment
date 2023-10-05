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

<!-- Main Section -->

<div class="dashboard-form">

   <form class="form" action="" method="post" enctype="multipart/form-data">

    <h1 class="heading"> Update Job Post Info. </h1>

    <?php
    
    $jid = $_GET['id'];

$sql = "select * from job_posts where j_id = {$jid} ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);


if(isset($_POST["update"])){

  $updateid = $jid;

  $jposition = mysqli_real_escape_string($conn, $_POST['jposition']);
  $jcname = mysqli_real_escape_string($conn, $_POST['jcname']);
  $jlocation = mysqli_real_escape_string($conn, $_POST['jlocation']);
  $jsalary = mysqli_real_escape_string($conn, $_POST['jsalary']);
  $jdesc = mysqli_real_escape_string($conn, $_POST['jdesc']);
  $jtype = mysqli_real_escape_string($conn, $_POST['jtype']);
  $jvacancy = mysqli_real_escape_string($conn, $_POST['jvacancy']);
  $jskills = mysqli_real_escape_string($conn, $_POST['jskills']);
  $jeducation = mysqli_real_escape_string($conn, $_POST['jeducation']);
  $jexperience= mysqli_real_escape_string($conn, $_POST['jexperience']);
  $japplylastdate = mysqli_real_escape_string($conn, $_POST['japplylastdate']);
  $jerid = mysqli_real_escape_string($conn, $_POST['jeid']);
  $jcimage = $_FILES['jcimage']['name'];
  $image_tmp = $_FILES['jcimage']['tmp_name'];
  $destinationfile = '../Upload/' . $jcimage;
  move_uploaded_file($image_tmp, $destinationfile);


  $updateQuery = "update job_posts set j_id='$updateid', j_position='$jposition', j_cname='$jcname',j_salary='$jsalary',j_desc='$jdesc',j_type='$jtype',j_vacancy='$jvacancy',j_skills='$jskills',j_education='$jeducation',j_experience='$jexperience',j_last_date='$japplylastdate',jclogo='$destinationfile',er_id='$jerid' where j_id = $updateid "; 
  
  $result = mysqli_query($conn, $updateQuery);

  if($result){
    
    // echo "<script> 
    //   alert('Data Upadated Properly.'); 
    // </script>";

    redirect('manage_posts.php');
    
  }
  else{

      echo "<script> alert('Data Not Upadated.'); </script>" ;
   
  }


}

    ?>



    <div class="col-2">
      <div>
        <label for="j_position"> Enter Job Position : </label>
        <input type="text" name="jposition" id="j_position"  value="<?php echo $result['j_position']; ?>" autocomplete="off" placeholder="Enter Job Position" required>
      </div>

      <div>
        <label for="j_cname"> Enter Company Name : </label>
        <input type="text" name="jcname" id="j_cname"  value="<?php echo $result['j_cname']; ?>" placeholder="Enter Company Name" autocomplete="off" required>
      </div>

    </div>

    <div class="col-2">
      
      <div>
        <label for="j_location"> Enter Job Location: </label>
        <input type="text" name="jlocation" id="j_location" value="<?php echo $result['j_location']; ?>" autocomplete="off" placeholder="Enter Job Location" required>
      </div>

      <div>
        <label for="j_salary"> Enter Job Salary : </label>
        <input type="text" name="jsalary" id="j_salary"  value="<?php echo $result['j_salary']; ?>" autocomplete="off" placeholder="Enter Job Salary " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="j_desc"> Enter Job Description : </label>
        <input type="text" name="jdesc" id="j_desc" value="<?php echo $result['j_desc']; ?>" autocomplete="off" placeholder="Enter Job Description " required>
      </div>

      <div>
        <label for="j_type"> Enter Job Type : </label>
        <input type="text" name="jtype" id="j_type" value="<?php echo $result['j_type']; ?>" autocomplete="off" placeholder="Enter Job Type " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="j_vacancy"> Enter Job Vacancies : </label>
        <input type="text" name="jvacancy" id="j_vacancy" value="<?php echo $result['j_vacancy']; ?>" autocomplete="off" placeholder="Enter Job Vacancies " required>
      </div>

      <div>
        <label for="j_skills"> Enter Job Skills : </label>
        <input type="text" name="jskills" id="j_skills" value="<?php echo $result['j_skills']; ?>" autocomplete="off" placeholder="Enter Job Skills " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="j_education"> Enter Job Education : </label>
        <input type="text" name="jeducation" id="j_education" value="<?php echo $result['j_education']; ?>" autocomplete="off" placeholder="Enter Job Education " required>
      </div>

      <div>
        <label for="j_experience"> Enter Job Experience : </label>
        <input type="text" name="jexperience" id="j_experience" value="<?php echo $result['j_experience']; ?>" autocomplete="off" placeholder="Enter Job Experience " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="j_post_date"> Job Post Date : </label>
        <input type="date" name="jpostdate" id="j_post_date" value="<?php echo $result['j_post_date']; ?>" autocomplete="off" placeholder="Enter Job Post Date " required>
      </div>

      <div>
        <label for="j_last_date"> Enter Job Apply Last Date : </label>
        <input type="date" name="japplylastdate" id="j_last_date" value="<?php echo $result['j_last_date']; ?>" autocomplete="off" placeholder="Enter Job Apply Last Date " required>
      </div>

    </div>

    <div>
      <label for="j_clogo"> Choose Company Logo </label>
      <input type="file" name="jcimage" id="j_clogo" value="<?php echo $result['j_clogo']; ?>" required>
      <img src="<?php echo $result['j_clogo']; ?>" width="100px" height="100px">
    </div>

    <div>
        <label for="er_id"> </label>
        <input type="hidden" name="jeid" id="er_id" value="<?php echo $result['er_id']; ?>" autocomplete="off" required>
    </div>
    
    <div class="buttons">
      
      <div class="col-2">

      <div>
        <input type="submit" name="update" class="btn" value="Update">
      </div>
      
      </div>

    </div>

   </form>
   
</div>

<!-- Footer Page  -->
<?php

  require_once("../footer.php");

?>


<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>