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

   <?php

      $sql = "select * from company where c_id = {$cid} ";
      $query = mysqli_query($conn, $sql);
      $result = mysqli_fetch_assoc($query);
   
   ?>
        
        <div class="profile_name">
          <div>
          <img src="<?php echo $clogo; ?>" width="70px" height="70px">
          <h2><?php echo $cname; ?></h2>
          </div>
        </div>

    <div class="col-2">

      <div>
        <label for="c_name"> Company Name : </label>
        <input type="text" name="cname" id="c_name"  value="<?php echo $result['c_name']; ?>" autocomplete="off" placeholder="Enter Company Name" required>
      </div>

      <div>
        <label for="c_type"> Company Type : </label>
        <input type="text" name="ctype" id="c_type" value="<?php echo $result['c_type']; ?>"  autocomplete="off" placeholder="Enter Company " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_category"> Company Category : </label>
        <input type="text" name="ccategory" id="c_category"  value="<?php echo $result['c_category']; ?>" autocomplete="off" placeholder="Enter Company Category " required>
      </div>    
      
      <div>
        <label for="c_email"> Company Email : </label>
        <input type="text" name="cemail" id="c_email"  value="<?php echo $result['c_email']; ?>" autocomplete="off" placeholder="Enter Company Email " required>
      </div>

    </div>

    <div class="col-2">
      
      <div>
        <label for="c_password"> Password : </label>
        <input type="text" name="cpassword" id="c_password" value="<?php echo $result['c_password']; ?>" autocomplete="off" placeholder="Enter Password " required>
      </div>

      <div>
        <label for="c_contact"> Company Contact : </label>
        <input type="text" name="ccontact" id="c_contact"  value="<?php echo $result['c_contact']; ?>" autocomplete="off" placeholder="Enter Company Contact " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_city"> Company City : </label>
        <input type="text" name="ccity" id="c_city" value="<?php echo $result['c_city']; ?>" autocomplete="off" placeholder="Enter Company City " required>
      </div>

      <div>
        <label for="c_state"> Company State : </label>
        <input type="text" name="cstate" id="c_state" value="<?php echo $result['c_state']; ?>" autocomplete="off" placeholder="Enter Company State " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_country"> Company Country : </label>
        <input type="text" name="ccountry" id="c_country"  value="<?php echo $result['c_country']; ?>" autocomplete="off" placeholder="Enter Company Country " required>
      </div>

      <div>
        <label for="c_website"> Company Website : </label>
        <input type="text" name="cwebsite" id="c_website"  value="<?php echo $result['c_website']; ?>" autocomplete="off" placeholder="Enter Company Website " required>
      </div>

    </div>

    <div>
     <img src="<?php echo $result['c_image']; ?>" width="100px" height="100px">
    </div>

   </form>
   
</div>

<!-- Footer Page -->

<?php

  require_once("../footer.php");

?>





<!-- --------------- JavaScript File ---------------- -->
<script src="main.js"></script>

</body>
</html>