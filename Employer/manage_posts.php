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

<?php

   if(isset($_POST['delete'])){

    $j_post_id = $_POST['id'];
    
    $sql = "delete from job_posts where j_id = '$j_post_id' ";
    $query = mysqli_query($conn, $sql);

    if($query){

        // echo "<script> alert('Deleted Successfully.'); </script>";
        redirect("manage_posts.php");

    }
    else{

        die(mysqli_error($conn));

    }
    
}

?>

<!-- Main Section -->

<div class="dashboard-form">

   <div class="display">

     <div class="col-2">
        <h1> All Posts </h1>
        <div>
        <form class="form" action="" method="get">
            <input type="text" name="search" value="" autocomplete="off" placeholder="Search...">
            <button type="submit" name="search" class="search"> Search </button> 
        </form>
        </div>
     </div>

     <a href="add_post.php"> Add Post+</a>

     <div class="table">

       <table>

        <thead>

          <tr>
            <th>Id</th>
            <th>Comp Logo</th>
            <th>Comp Name</th>
            <th>Job Position</th>
            <th>Job Type</th>
            <th>Job Location</th>
            <th>Job Vacancy</th>
            <th>Job Salary</th>
            <th>Post Date</th>
            <th>Last Date</th>
            <th colspan="2">Action</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from job_posts where er_id = {$eid}";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                <td><?php echo $res['j_id']; ?></td>
                <td><img src="<?php echo $res['j_clogo']; ?>" width="100px" height="100px"></td>
                <td><?php echo $res['j_cname']; ?></td>
                <td><?php echo $res['j_position']; ?></td>
                <td><?php echo $res['j_type']; ?></td>
                <td><?php echo $res['j_location']; ?></td>
                <td><?php echo $res['j_vacancy']; ?></td>
                <td><?php echo $res['j_salary']; ?></td>
                <td><?php echo $res['j_post_date']; ?></td>
                <td><?php echo $res['j_last_date']; ?></td>
                <td><button class="update"><a href="update_post.php?id=<?php echo $res['j_id']; ?>">Update</a></button>
                </td>
                <td>
                <form action="" method="post">
                  <button class="delete" name="delete">Delete</button>
                  <input type="hidden" name="id" value="<?php echo $res['er_id']; ?>"> 
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
   
<?php

  require_once("../footer.php");

?>


<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>