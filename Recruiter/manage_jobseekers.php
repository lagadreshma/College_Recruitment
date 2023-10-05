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
        <h1> Available Jobseekers Information </h1>
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
            <th>id</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Country</th>
            <th>Registered Date</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from jobseekers";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                <td><?php echo $res['id']; ?></td>
                <td><?php echo $res['username']; ?></td>
                <td><?php echo $res['full_name']; ?></td>
                <td><?php echo $res['email']; ?></td>
                <td><?php echo $res['mobile']; ?></td>
                <td><?php echo $res['address']; ?></td>
                <td><?php echo $res['country']; ?></td>
                <td><?php echo $res['register_date']; ?></td>
                  
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


<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>