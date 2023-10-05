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
        <h1> All Posts </h1>
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
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from job_posts";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                <td><?php echo $res['j_id']; ?></td>
                <td><img src="<?php echo $res['j_clogo']; ?>" width="150px" height="120px"></td>
                <td><?php echo $res['j_cname']; ?></td>
                <td><?php echo $res['j_position']; ?></td>
                <td><?php echo $res['j_type']; ?></td>
                <td><?php echo $res['j_location']; ?></td>
                <td><?php echo $res['j_vacancy']; ?></td>
                <td><?php echo $res['j_salary']; ?></td>
                <td><?php echo $res['j_post_date']; ?></td>
                <td><?php echo $res['j_last_date']; ?></td>
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