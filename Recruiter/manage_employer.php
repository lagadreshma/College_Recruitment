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

     <div class="table">

       <table>

        <thead>

          <tr>
            <th>Employer Id</th>
            <th>Profile Pic.</th>
            <th>Employer Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Company Name</th>
            <th>Company ID</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from employers";

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
                <td><?php echo $res['c_id']; ?></td>
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