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

   <div class="profile_name">
          <div>
          <img src="<?php echo $eprofilepic; ?>" width="70px" height="70px">
          <h2><?php echo $ename; ?></h2>
          </div>
    </div>

<?php

$sql = "select * from employers where er_id = {$eid} ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

?>

<div class="col-2">

<div>
  <label for="er_name">  Employer Name : </label>
  <input type="text" name="ename" id="er_name"  value="<?php echo $result['er_name']; ?>" autocomplete="off" placeholder=" Employer Name" required>
</div>

<div>
  <label for="er_email">  Employer Email : </label>
  <input type="text" name="eemail" id="er_email"  value="<?php echo $result['er_email']; ?>" autocomplete="off" placeholder=" Employer Email " required>
</div>

</div>

<div class="col-2">

<div>
  <label for="er_password">  Password : </label>
  <input type="text" name="epassword" id="er_password" value="<?php echo $result['er_password']; ?>" autocomplete="off" placeholder=" Password " required>
</div>

<div>
  <label for="er_contact">  Employer Contact : </label>
  <input type="text" name="econtact" id="er_contact"  value="<?php echo $result['er_contact']; ?>" autocomplete="off" placeholder=" Employer Contact " required>
</div>

</div>

<div class="col-2">

<div>
  <label for="er_address">  Employer Address : </label>
  <input type="text" name="eaddress" id="er_address" value="<?php echo $result['er_address']; ?>" autocomplete="off" placeholder=" Employer Address " required>
</div>

<div>
  <label for="er_company">  Employer Company : </label>
  <input type="text" name="ecompany" id="er_company" value="<?php echo $result['er_company']; ?>" autocomplete="off" placeholder=" Employer Company " required>
</div>

<div>
<label> Employer Profile Pic </label>
<img src="<?php echo $result['er_image']; ?>" width="100px" height="100px">
</div>

<div>
        <label for="c_id"> </label>
        <input type="hidden" name="ecid" id="c_id" value="<?php echo $result['c_id']; ?>" autocomplete="off" required>
</div>

   </form>
   
</div>



<!-- Footer page  -->

<?php

  require_once("../footer.php");

?>

</body>
</html>