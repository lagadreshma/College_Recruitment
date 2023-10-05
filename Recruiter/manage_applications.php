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
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from applications";

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