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
$ecid = $_SESSION['ecid'];

if(isset($_POST["submit"])){

  $jposition = $_POST['jposition'];
  $jcname = $ecname;
  $jlocation = $_POST['jlocation'];
  $jsalary = $_POST['jsalary'];
  $jdesc = $_POST['jdesc'];
  $jtype = $_POST['jtype'];
  $jvacancy = $_POST['jvacancy'];
  $jskills = $_POST['jskills'];
  $jeducation = $_POST['jeducation'];
  $jexperience = $_POST['jexperience'];
  $japplylastdate = $_POST['japplylastdate'];
  $jcimage = $_FILES['jcimage'];
  $jerid = $eid;
  $jcid = $ecid;

  $image_name = $jcimage['name'];
  $image_tmp = $jcimage['tmp_name'];

  $fileext = explode('.',$image_name);
  $filecheck = strtolower(end($fileext));
  
  $fileextsarray = array('png','jpg','jpeg');

  if(in_array($filecheck,$fileextsarray)){

    $destinationfile = '../Upload/' . $image_name;
    move_uploaded_file($image_tmp,$destinationfile);

    $insertQuery = "insert into job_posts(j_position,j_cname, j_location, j_salary,j_desc,j_type,j_vacancy,j_skills,j_education,j_experience,j_last_date,j_clogo,er_id,c_id) values('$jposition','$jcname','$jlocation','$jsalary','$jdesc','$jtype','$jvacancy','$jskills','$jeducation','$jexperience','$japplylastdate','$destinationfile','$jerid','$jcid')";

  $result = mysqli_query($conn, $insertQuery);

  if($result){
    ?>

      <script> 
      // alert("Data Inserted Properly."); 
      window.location.href="manage_posts.php";
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

    <h1 class="heading"> Post Job </h1>
    <div class="col-2">
      <div>
        <label for="j_position"> Enter Job Position : </label>
        <input type="text" name="jposition" id="j_position"  value="" autocomplete="off" placeholder="Enter Job Position" required>
      </div>

      <div>
        <label for="j_cname"> Enter Company Name : </label>
        <input type="text" name="jcname" id="j_cname"  value="<?php echo $ecname; ?>" placeholder="Enter Company Name" autocomplete="off" required>
      </div>

    </div>

    <div class="col-2">
      
      <div>
        <label for="j_location"> Enter Job Location: </label>
        <input type="text" name="jlocation" id="j_location" value="" autocomplete="off" placeholder="Enter Job Location" required>
      </div>

      <div>
        <label for="j_salary"> Enter Job Salary : </label>
        <input type="text" name="jsalary" id="j_salary"  value="" autocomplete="off" placeholder="Enter Job Salary " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="j_desc"> Enter Job Description : </label>
        <input type="text" name="jdesc" id="j_desc" value="" autocomplete="off" placeholder="Enter Job Description " required>
      </div>

      <div>
        <label for="j_type"> Enter Job Type : </label>
        <input type="text" name="jtype" id="j_type" value="" autocomplete="off" placeholder="Enter Job Type " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="j_vacancy"> Enter Job Vacancies : </label>
        <input type="text" name="jvacancy" id="j_vacancy" value="" autocomplete="off" placeholder="Enter Job Vacancies " required>
      </div>

      <div>
        <label for="j_skills"> Enter Job Skills : </label>
        <input type="text" name="jskills" id="j_skills" value="" autocomplete="off" placeholder="Enter Job Skills " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="j_education"> Enter Job Education : </label>
        <input type="text" name="jeducation" id="j_education" value="" autocomplete="off" placeholder="Enter Job Education " required>
      </div>

      <div>
        <label for="j_experience"> Enter Job Experience : </label>
        <input type="text" name="jexperience" id="j_experience" value="" autocomplete="off" placeholder="Enter Job Experience " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="j_post_date"> Job Post Date : </label>
        <input type="date" name="jpostdate" id="j_post_date" value="" autocomplete="off" placeholder="Enter Job Post Date " required>
      </div>

      <div>
        <label for="j_apply_last_date"> Enter Job Apply Last Date : </label>
        <input type="date" name="japplylastdate" id="j_apply_last_date" value="" autocomplete="off" placeholder="Enter Job Apply Last Date " required>
      </div>

    </div>

    <div>
      <label for="j_clogo"> Choose Company Logo </label>
      <input type="file" name="jcimage" id="j_clogo" value="" required>
    </div>

    <div>
        <label for="er_id"> </label>
        <input type="hidden" name="jeid" id="er_id" value="<?php echo $eid; ?>" autocomplete="off" required>
    </div>
    
    <div>
        <label for="c_id"> </label>
        <input type="hidden" name="jcid" id="c_id" value="<?php echo $ecid; ?>" autocomplete="off" required>
    </div>

    <div class="buttons">
      
      <div class="col-2">

      <div>
        <input type="submit" name="submit" class="btn" value="Submit">
      </div>
      
      <div>
        <input type="submit" name="back" class="btn-1" value="Back">
      </div>
      
      </div>

    </div>

   </form>
   
</div>
   
<?php

  require_once("../footer.php");

?>


<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>