<?php

session_start();
include "connection.php";
include "function.php";

if(isset($_POST["submit"])){

  $username = $_POST['name'];
  $pass = $_POST['password'];
  $fullname = $_POST['full_name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $country = $_POST['country'];

  $insertQuery = "insert into jobseekers(username,password,full_name,email,mobile,address,country)values('$username','$pass','$fullname','$email','$contact','$address','$country')";

  $result = mysqli_query($conn, $insertQuery);

  if($result){
    ?>

      <script> 
      // alert("Data Inserted Properly."); 
      window.location.href = "login.php";
      </script>


    <?php
  }
  else{

    ?>

      <script> alert("Data Not Inserted."); </script>

    <?php
   
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

<!-- Sign Up Form  -->

<section class="sign-up">

<h1 class="heading"> Create Your Account </h1>

<div class="row">

  <div class="box-1">
    <img src="images1/registerpage.jpg" style="background: rgba(0, 0, 0, 0.3);">
  </div>
  <div class="box-2">

    <form name="registrationForm" onsubmit="return validateForm()" action="" method="post">

      <p> Already Registered? <a href="login.php" class="link">
          Login Now </a></p>

      <div class="two-col">

        <input type="text" name="name" autocomplete="off"
         placeholder="Username" required>

        <input type="password" name="password"
        autocomplete="off" placeholder="Password" required>

      </div>            

      <div class="two-col">

        <input type="text" name="full_name" autocomplete="off"
         placeholder="Full Name" required>

        <input type="text" name="email"  autocomplete="off"
         placeholder="Email" required>

      </div>


      <div class="two-col">

        <input type="text" name="contact" autocomplte="off"
         placeholder="Mobile No." required>

        <input type="text" name="country" autocomplte="off"
         placeholder="Country" required>

      </div>

      
      <div class="desc">
        <textarea type="text" name="address" cols="20" rows="4"
         placeholder="Address" required></textarea>
      </div>

      <input type="submit" name="submit" class="btn"
        value="Register">

      <p class="terms"> By Creating an Account, I accept the
        Terms and Conditions and Privacy Policy. </p>

    </form>




  </div>

</div>

<section>      

    

   <!-- Footer Section --> 

    <?php

        require_once("footer.php");

    ?>

    <!-- Validation -->
  <script>
    function validateForm() {
      var email = document.forms["registrationForm"]["email"].value;
      var password = document.forms["registrationForm"]["password"].value;
      var mobileNumber = document.forms["registrationForm"]["contact"].value;

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


    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>


  </body>
</html>