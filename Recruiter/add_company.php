<?php

session_start();
include "../connection.php";
include "../function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("../admin_login.php");
}

if(isset($_POST["submit"])){

    $cname = $_POST['cname'];
    $ctype = $_POST['ctype'];
    $ccategory = $_POST['ccategory'];
    $cemail = $_POST['cemail'];
    $cpass = $_POST['cpassword'];
    $ccontact = $_POST['ccontact'];
    $ccity = $_POST['ccity'];
    $cstate = $_POST['cstate'];
    $ccountry = $_POST['ccountry'];
    $cwebsite = $_POST['cwebsite'];
    $image = $_FILES['image'];

    $image_name = $image['name'];
    $image_tmp = $image['tmp_name'];

    $fileext = explode('.',$image_name);
    $filecheck = strtolower(end($fileext));
    
    $fileextsarray = array('png','jpg','jpeg');

    if(in_array($filecheck,$fileextsarray)){

      $destinationfile = '../Upload/' . $image_name;
      move_uploaded_file($image_tmp,$destinationfile);

      $insertQuery = "insert into company(c_name,c_type,c_category,c_email,c_password,c_contact,c_city,c_state,c_country,c_website,c_image)values('$cname','$ctype','$ccategory','$cemail','$cpass','$ccontact','$ccity', '$cstate', '$ccountry', '$cwebsite','$destinationfile')";
  
    $result = mysqli_query($conn, $insertQuery);
  
    if($result){
      ?>
  
        <script> 
        // alert("Data Inserted Properly."); 
        window.location.href = "manage_company.php";
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
</head>
<body>

<?php

   require_once("header.php");


?>

<!-- Main Section -->

<div class="dashboard-form">

   <form name="registrationForm" onsubmit="return validateForm()" class="form" action="" method="post" enctype="multipart/form-data">

    <h1 class="heading"> Add Company Information </h1>

    <div class="col-2">

      <div>
        <label for="c_name"> Enter Company Name : </label>
        <input type="text" name="cname" id="c_name"  value="" autocomplete="off" placeholder="Enter Company Name" required>
      </div>

      <div>
        <label for="c_type"> Enter Company Type : </label>
        <input type="text" name="ctype" id="c_type" value=""  autocomplete="off" placeholder="Enter Company " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_category"> Enter Company Category : </label>
        <input type="text" name="ccategory" id="c_category"  value="" autocomplete="off" placeholder="Enter Company Category " required>
      </div>    
      
      <div>
        <label for="c_email"> Enter Company Email : </label>
        <input type="text" name="cemail" id="c_email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" value="" autocomplete="off" placeholder="Enter Company Email " required>
      </div>

    </div>

    <div class="col-2">
      
      <div>
        <label for="c_password"> Enter Password : </label>
        <input type="password" name="cpassword" pattern=".{8,}" id="c_password" value="" autocomplete="off" placeholder="Enter Password " required>
      </div>

      <div>
        <label for="c_contact"> Enter Company Contact : </label>
        <input type="text" name="ccontact" id="c_contact"  value="" autocomplete="off" placeholder="Enter Company Contact " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_city"> Enter Company City : </label>
        <input type="text" name="ccity" id="c_city" value="" autocomplete="off" placeholder="Enter Company City " required>
      </div>

      <div>
        <label for="c_state"> Enter Company State : </label>
        <input type="text" name="cstate" id="c_state" value="" autocomplete="off" placeholder="Enter Company State " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_country"> Enter Company Country : </label>
        <input type="text" name="ccountry" id="c_country"  value="" autocomplete="off" placeholder="Enter Company Country " required>
      </div>

      <div>
        <label for="c_website"> Enter Company Website : </label>
        <input type="text" name="cwebsite" id="c_website" pattern="https?://.+" value="" autocomplete="off" placeholder="Enter Company Website " required>
      </div>

    </div>

    <div>
      <input type="file" name="image" value="" required>
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

<!-- Footer page  -->
   
<?php

  require_once("../footer.php");

?>

<!-- Validation -->
<script>
    function validateForm() {
      var email = document.forms["registrationForm"]["cemail"].value;
      var password = document.forms["registrationForm"]["cpassword"].value;
      var mobileNumber = document.forms["registrationForm"]["ccontact"].value;
      var website = document.forms["registrationForm"]["cwebsite"].value;

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

      // URL validation
      var urlPattern = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;
      if (!urlPattern.test(website)) {
        alert("Please enter a valid website URL.");
        return false;
      }

      return true;
    }
  </script>


<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>