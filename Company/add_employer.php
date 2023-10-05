<?php

session_start();
include "../connection.php";
include "../function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("../company_login.php");
}

$cid = $_SESSION['cid'];
$cname = $_SESSION['cname'];
$clogo = $_SESSION['clogo'];


if(isset($_POST["submit"])){

  $ername = $_POST['ename'];
  $eremail = $_POST['eemail'];
  $erpass = $_POST['epassword'];
  $ercontact = $_POST['econtact'];
  $eraddress = $_POST['eaddress'];
  $ercompany = $cname;
  $erimage = $_FILES['eimage'];
  $ecid = $cid;

  $image_name = $erimage['name'];
  $image_tmp = $erimage['tmp_name'];

  $fileext = explode('.',$image_name);
  $filecheck = strtolower(end($fileext));
  
  $fileextsarray = array('png','jpg','jpeg');

  if(in_array($filecheck,$fileextsarray)){

    $destinationfile = '../Upload/' . $image_name;
    move_uploaded_file($image_tmp,$destinationfile);

    $insertQuery = "insert into employers(er_name,er_email,er_password,er_contact,er_address,er_company, er_image, c_id)values('$ername','$eremail','$erpass','$ercontact','$eraddress','$ercompany', '$destinationfile', '$ecid')";

  $result = mysqli_query($conn, $insertQuery);

  if($result){
    ?>

      <script> 
      // alert("Data Inserted Properly."); 
      window.location.href="manage_employer.php";
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

    <title> Company Panel </title>

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
          <a href="company_profile.php"><img src="<?php echo $clogo; ?>" width="70px" height="70px"></a>
          <h1><a href="index.php"><?php echo $cname; ?> </a></h1>
        </div>

        <nav>
          <ul class="menu-items">

            <li><a href="manage_employer.php"> Employers  </a></li>
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

   <form name="registrationForm" onsubmit="return validateForm()" class="form" action="" method="post" enctype="multipart/form-data">

    <h1 class="heading"> Add Employer's Information </h1>

    <div class="col-2">

      <div>
        <label for="er_name"> Enter Employer Name : </label>
        <input type="text" name="ename" id="er_name"  value="" autocomplete="off" placeholder="Enter Employer Name" required>
      </div>

      <div>
        <label for="er_email"> Enter Employer Email : </label>
        <input type="text" name="eemail" id="er_email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" value="" autocomplete="off" placeholder="Enter Employer Email " required>
      </div>

    </div>

    <div class="col-2">
      
      <div>
        <label for="er_password"> Enter Password : </label>
        <input type="password" name="epassword" id="er_password" pattern=".{8,}" value="" autocomplete="off" placeholder="Enter Password " required>
      </div>

      <div>
        <label for="er_contact"> Enter Employer Contact : </label>
        <input type="text" name="econtact" id="er_contact"  value="" autocomplete="off" placeholder="Enter Employer Contact " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="er_address"> Enter Employer Address : </label>
        <input type="text" name="eaddress" id="er_address" value="" autocomplete="off" placeholder="Enter Employer Address " required>
      </div>

      <div>
        <label for="er_company"> Enter Employer Company : </label>
        <input type="text" name="ecompany" id="er_company" value="<?php echo $cname; ?>" autocomplete="off" required>
      </div>

    </div>

    <div>
      <label for="er_image">Choose Employer Profile Pic </label>
      <input type="file" name="eimage" id="er_image"
      value="" required>
    </div>

    <div>
        <label for="c_id"> </label>
        <input type="hidden" name="ecid" id="c_id" value="<?php echo $cid; ?>" autocomplete="off" required>
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


<!-- Footer File  -->

<?php

  require_once("../footer.php");

?>

<!-- Validation -->
<script>
    function validateForm() {
      var email = document.forms["registrationForm"]["eemail"].value;
      var password = document.forms["registrationForm"]["epassword"].value;
      var mobileNumber = document.forms["registrationForm"]["econtact"].value;

      // Email validation
      var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      // Password validation
      var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
      if (!passwordPattern.test(password)) {
        alert("Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.");
        return false;
      }


      // Mobile number validation
      var numberPattern = /^\d{10}$/;
      if (!numberPattern.test(mobileNumber)) {
        alert("Please enter a valid 10-digit mobile number.");
        return false;
      }

      return true;
    }
  </script>


<!-- --------------- JavaScript File ---------------- -->
<script src="main.js"></script>

</body>
</html>

