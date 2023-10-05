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

   <form class="form" action="" method="post" enctype="multipart/form-data">

    <h1 class="heading"> Update Employer Information </h1>

<?php

$eid = $_GET['id'];

$sql = "select * from employers where er_id = {$eid} ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);


if(isset($_POST["update"])){

  $updateid = $_GET['id'];

  $ername = mysqli_real_escape_string($conn, $_POST['ename']);
  $eremail = mysqli_real_escape_string($conn, $_POST['eemail']);
  $erpass = mysqli_real_escape_string($conn, $_POST['epassword']);
  $ercontact = mysqli_real_escape_string($conn, $_POST['econtact']);
  $eraddress = mysqli_real_escape_string($conn, $_POST['eaddress']);
  $ercompany = mysqli_real_escape_string($conn, $_POST['ecompany']);
  $ercid = mysqli_real_escape_string($conn, $_POST['ecid']);
  $erimage = $_FILES['eimage']['name'];
  $image_tmp = $_FILES['eimage']['tmp_name'];
  $destinationfile = '../Upload/' . $erimage;
  move_uploaded_file($image_tmp, $destinationfile);


  $updateQuery = "update employers set er_id='$updateid',er_name='$ername',er_email='$eremail',er_password='$erpass', er_contact='$ercontact', er_address='$eraddress', er_company='$ercompany',
  er_image='$destinationfile',c_id='$ercid' where er_id =$updateid ";
  
  $result = mysqli_query($conn, $updateQuery);

  if($result){
    
    // echo "<script> 
    //   alert('Data Upadated Properly.'); 
    // </script>";

    redirect('manage_employer.php');
    
  }
  else{

      echo "<script> alert('Data Not Upadated.'); </script>" ;
      die().mysqli_error();
   
  }


}


?>

<div class="col-2">

<div>
  <label for="er_name"> Enter Employer Name : </label>
  <input type="text" name="ename" id="er_name"  value="<?php echo $result['er_name']; ?>" autocomplete="off" placeholder="Enter Employer Name" required>
</div>

<div>
  <label for="er_email"> Enter Employer Email : </label>
  <input type="text" name="eemail" id="er_email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"  value="<?php echo $result['er_email']; ?>" autocomplete="off" placeholder="Enter Employer Email " required>
</div>

</div>

<div class="col-2">

<div>
  <label for="er_password"> Enter Password : </label>
  <input type="text" name="epassword" id="er_password" pattern=".{8,}" value="<?php echo $result['er_password']; ?>" autocomplete="off" placeholder="Enter Password " required>
</div>

<div>
  <label for="er_contact"> Enter Employer Contact : </label>
  <input type="text" name="econtact" id="er_contact"  value="<?php echo $result['er_contact']; ?>" autocomplete="off" placeholder="Enter Employer Contact " required>
</div>

</div>

<div class="col-2">

<div>
  <label for="er_address"> Enter Employer Address : </label>
  <input type="text" name="eaddress" id="er_address" value="<?php echo $result['er_address']; ?>" autocomplete="off" placeholder="Enter Employer Address " required>
</div>

<div>
  <label for="er_company"> Enter Employer Company : </label>
  <input type="text" name="ecompany" id="er_company" value="<?php echo $result['er_company']; ?>" autocomplete="off" placeholder="Enter Employer Company " required>
</div>

<div>
<label for="er_image">Choose Employer Profile Pic </label>
<input type="file" name="eimage" id="er_image" value="<?php echo $result['er_image']; ?>" required>
<img src="<?php echo $result['er_image']; ?>" width="100px" height="100px">
</div>

<div>
        <label for="c_id"> </label>
        <input type="hidden" name="ecid" id="c_id" value="<?php echo $result['c_id']; ?>" autocomplete="off" required>
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
   
<?php

  require_once("../footer.php");

?>


<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>