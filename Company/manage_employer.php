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

if(isset($_POST['delete'])){

    $eid = $_POST['eid'];
    
    $sql = "delete from employers where er_id = '$eid' ";
    $query = mysqli_query($conn, $sql);

    if($query){

        // echo "<script> alert('Deleted Successfully.'); </script>";
        redirect("manage_employer.php");

    }
    else{

        die(mysqli_error($conn));

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

   <div class="display">

     <div class="col-2">
        <h1> Available Employer's Information </h1>
        <div>
        <form class="form" action="" method="get">
            <input type="text" name="search" value="" autocomplete="off" placeholder="Search...">
            <button type="submit" name="search" class="search"> Search </button> 
        </form>
        </div>
     </div>

     <a href="add_employer.php"> Add+</a>

     <div class="table">

       <table>

        <thead>

          <tr>
            <th>Id</th>
            <th>Profile Pic.</th>
            <th>Employer Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Company Name</th>
            <!-- <th>Company Id</th> -->
            <th colspan="2">Action</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from employers where er_company = '$cname' ";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                <td><?php echo $res['er_id']; ?></td>
                <td><img src="<?php echo $res['er_image']; ?>" width="100px" height="100px"></td>
                <td><?php echo $res['er_name']; ?></td>
                <td><?php echo $res['er_email']; ?></td>
                <td><?php echo $res['er_contact']; ?></td>
                <td><?php echo $res['er_address']; ?></td>
                <td><?php echo $res['er_company']; ?></td>
                <td><button class="update"><a href="update_employer_info.php?id=<?php echo $res['er_id']; ?>">Update</a></button>
                </td>
                <td>
                <form action="" method="post">
                  <button class="delete" name="delete">Delete</button>
                  <input type="hidden" name="eid" value="<?php echo $res['er_id']; ?>"> 
                </form>
                </td>
            </tr>

            <?php

           }


        ?>


        </tbody>

       </table>

     </div>

   </div>
   
</div>

<!-- Footer File  -->
   
<?php

  require_once("../footer.php");

?>


<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>