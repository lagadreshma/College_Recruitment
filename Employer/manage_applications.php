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

if(isset($_POST['reject'])){

    $js_id = $_POST['js_id'];
    
    $sql = " update applications set status= 'reject' where js_id = {$js_id} ";
    $query = mysqli_query($conn, $sql);

    if($query){

        // echo "<script> alert('Deleted Successfully.'); </script>";
        echo "<script> window.location.href = 'manage_applications.php'; </script>";

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

<div class="dashboard-form">

   <div class="display">

     <div class="col-2">
        <h1> All Applications </h1>
        <div>
        <form class="form" action="" method="get">
            <input type="text" name="search" value="" autocomplete="off" placeholder="Search...">
            <button type="submit" name="search" class="search"> Search </button> 
        </form>
        </div>
     </div>

     <div class="table">

       <table>

        <thead>

          <tr>
            <th>Sr No.</th>
            <th>Jobseeker Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Job Title</th>
            <th>Resume</th>
            <th>Status</th>
            <th>Comp Id </th>
            <th>Applied Date</th>
            <th colspan="2">Action</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from applications where er_id = {$eid}";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           while($res=mysqli_fetch_array($query)){
                  
            $i = 1;

            ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $res['js_name']; ?></td>
                <td><?php echo $res['js_email']; ?></td>
                <td><?php echo $res['js_mobile']; ?></td>
                <td><?php echo $res['j_title']; ?></td>
                <td><i class="fa fa-download" aria-hidden="true" style="font-size: 20px;color:blue; padding: 10px;"></i></td>
                <td><?php echo $res['status']; ?></td>
                <td><?php echo $res['c_id']; ?></td>
                <td><?php echo $res['applied_date']; ?></td>
                <td>
                  <button class="update"><a href="send_email.php?id=<?php echo $res['js_id']; ?>">Accept</a></button>
                </td>
                <td>
                <form action="" method="post">
                  <button class="delete" name="reject">Reject</button>
                  <input type="hidden" name="js_id" value="<?php echo $res['js_id']; ?>"> 
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



<!-- Footer page  -->

<?php

  require_once("../footer.php");

?>

</body>
</html>