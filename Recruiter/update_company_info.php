<?php

session_start();
include "../connection.php";
include "../function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("../admin_login.php");
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

   <form class="form" action="" method="post" enctype="multipart/form-data">

    <h1 class="heading"> Update Company Information </h1>

<?php

$cid = $_GET['id'];


$sql = "select * from company where c_id = {$cid} ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

if(isset($_POST["update"])){

  $updateid = $_GET['id'];

  $cname = mysqli_real_escape_string($conn, $_POST['cname']);
  $ctype =mysqli_real_escape_string($conn,  $_POST['ctype']);
  $ccategory = mysqli_real_escape_string($conn, $_POST['ccategory']);
  $cemail = mysqli_real_escape_string($conn, $_POST['cemail']);
  $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
  $ccontact = mysqli_real_escape_string($conn, $_POST['ccontact']);
  $ccity = mysqli_real_escape_string($conn, $_POST['ccity']);
  $cstate = mysqli_real_escape_string($conn, $_POST['cstate']);
  $ccountry = mysqli_real_escape_string($conn, $_POST['ccountry']);
  $cwebsite = mysqli_real_escape_string($conn, $_POST['cwebsite']);
  $cimage = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $destinationfile = '../Upload/' . $cimage;
  move_uploaded_file($image_tmp, $destinationfile);


  $updateQuery = "update company set
   c_id='$updateid',c_name='$cname', c_type='$ctype', c_category='$ccategory', c_email='$cemail',c_password='$cpass', c_contact='$ccontact', c_city='$ccity', c_state='$cstate', c_country='$ccountry',c_website='$cwebsite',c_image='$destinationfile' where c_id =$updateid ";

  $result = mysqli_query($conn, $updateQuery);

  if($result){
    
    ?>
    <!-- <script> 
      alert('Data Upadated Properly.'); 
    </script> -->

    <?php

    redirect('manage_company.php');
    
  }
  else{

      echo "<script> alert('Data Not Upadated.'); </script>";
      die();
   
  }


}


?>

    <div class="col-2">

      <div>
        <label for="c_name"> Enter Company Name : </label>
        <input type="text" name="cname" id="c_name"  value="<?php echo $result['c_name']; ?>" autocomplete="off" placeholder="Enter Company Name" required>
      </div>

      <div>
        <label for="c_type"> Enter Company Type : </label>
        <input type="text" name="ctype" id="c_type" value="<?php echo $result['c_type']; ?>"  autocomplete="off" placeholder="Enter Company " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_category"> Enter Company Category : </label>
        <input type="text" name="ccategory" id="c_category"  value="<?php echo $result['c_category']; ?>" autocomplete="off" placeholder="Enter Company Category " required>
      </div>    
      
      <div>
        <label for="c_email"> Enter Company Email : </label>
        <input type="text" name="cemail" id="c_email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" value="<?php echo $result['c_email']; ?>" autocomplete="off" placeholder="Enter Company Email " required>
      </div>

    </div>

    <div class="col-2">
      
      <div>
        <label for="c_password"> Enter Password : </label>
        <input type="password" name="cpassword" id="c_password" value="<?php echo $result['c_password']; ?>" pattern=".{8,}" autocomplete="off" placeholder="Enter Password " required>
      </div>

      <div>
        <label for="c_contact"> Enter Company Contact : </label>
        <input type="text" name="ccontact" id="c_contact"  value="<?php echo $result['c_contact']; ?>" autocomplete="off" placeholder="Enter Company Contact " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_city"> Enter Company City : </label>
        <input type="text" name="ccity" id="c_city" value="<?php echo $result['c_city']; ?>" autocomplete="off" placeholder="Enter Company City " required>
      </div>

      <div>
        <label for="c_state"> Enter Company State : </label>
        <input type="text" name="cstate" id="c_state" value="<?php echo $result['c_state']; ?>" autocomplete="off" placeholder="Enter Company State " required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="c_country"> Enter Company Country : </label>
        <input type="text" name="ccountry" id="c_country"  value="<?php echo $result['c_country']; ?>" autocomplete="off" placeholder="Enter Company Country " required>
      </div>

      <div>
        <label for="c_website"> Enter Company Website : </label>
        <input type="text" name="cwebsite" id="c_website" pattern="https?://.+" value="<?php echo $result['c_website']; ?>" autocomplete="off" placeholder="Enter Company Website " required>
      </div>

    </div>

    <div>
<label for="c_image">Choose Company Logo </label>
<input type="file" name="image" id="c_image" value="<?php echo $result['c_image']; ?>" required>
<img src="<?php echo $result['c_image']; ?>" width="100px" height="100px">
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