<?php

session_start();
include "connection.php";
include "function.php";

$msg = "";

if(isset($_POST['login'])){
    $cemail = $_POST['cemail'];
    $cpassword = $_POST['cpassword'];

    $sql = "select * from company where c_email='$cemail' and c_password='$cpassword'";
    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['IS_LOGIN'] = 'Yes';
        $_SESSION['cid'] = $row['c_id'];
        $_SESSION['cname'] = $row['c_name'];
        $_SESSION['clogo'] = $row['c_image'];
        redirect('./Company/index.php');
    }else{
        $msg = "<pre>   **Please enter valid login details.  </pre>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Online Job Portal Website">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP , MySQL">
    <meta name="author" content="Reshma Lagad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit= no">

    <title> Online Job Portal </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS  -->
    <link rel="stylesheet" href = "logins_style.css">

  </head>

  <body>
    
<div class="admin">
<form action="" method="post">

    <h2> Company Login </h2>

    <div class="form">

        <div class="two-col">
          <span class="material-icons-sharp">perm_identity</span>
          <input type="text" name="cemail" placeholder="Company email" autocomplete="off" required> 
        </div>

        <div class="two-col">
          <span class="material-icons-sharp">lock_open</span>
          <input type="password" name="cpassword" placeholder="Company Password" required>
        </div>

        <div>
          <input type="submit" name="login" class="btn" value="Login">
        </div>
    </div>
    <div class="answer"> <?php echo $msg ?> </div>
</form>

</div>

</body>
</html>