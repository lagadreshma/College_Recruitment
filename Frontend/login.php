<?php

session_start();
require_once("connection.php");

$msg = "";

if(isset($_POST['login'])){

  $username = $_POST['name'];
  $pass = $_POST['password'];

    $sql = "select * from jobseekers where username='$username' and password='$pass'";
    $query = mysqli_query($conn,$sql);


    if(mysqli_num_rows($query) == 1){

        $row = mysqli_fetch_assoc($query);
        $_SESSION['IS_LOGIN'] = 'Yes';
        
        echo" <script> window.location.href = 'home.php'; </script>";
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $row['id'];
        $_SESSION['fullname'] = $row['full_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['mobile'] = $row['mobile'];

       die();

    }else{
        $msg = "<pre>   **Please enter valid login details.  </pre>";
    }


}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
  </head>

  <body>

    <!-- Navigation Bar -->

      <?php

        require_once("header.php");

      ?>


<!-- Login Form  -->

<section class="login">

<h1 class="heading"> Login To Your Account </h1>

<div class="row">

  <div class="box-1">

    <img src="images1/slide1.jpg">

  </div>

  <div class="box-2">

    <form action="" method="post">

      <p> If not registered ? <a href="register.php" class="link">
          Register Now </a> </p>

      <div>
        <input type="text" name="name" autocomplete="off"
          placeholder="Username" required>
      </div>

      <div>
        <input type="password" name="password" autocomplete="off"
          placeholder="Password" required>
      </div>

      <input type="submit" name="login" class="btn" value="Login">

      <p class="terms"> By Clicking on Login, I accept the Terms and
        Conditions and Privacy Policy. </p>

      <!-- if login info is wrong show this msg -->
      <div class="answer"> <?php echo $msg; ?> </div>

      </form>

    </div>

  </div>

</div>

<section>


    

   <!-- Footer Section --> 

    <?php

        require_once("footer.php");

    ?>





    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>


  </body>
</html>