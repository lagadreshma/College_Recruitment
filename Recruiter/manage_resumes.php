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
        <h1> All Resumes </h1>
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
            <th>Jobseeker Name</th>
            <th>Jobseeker Email</th>
            <th>Jobseeker Contact</th>
            <th>Resume</th>
            <th>Uploaded Date</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from resumes";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                <td><?php echo $res['r_id']; ?></td>
                <td><?php echo $res['js_name']; ?></td>
                <td><?php echo $res['js_email']; ?></td>
                <td><?php echo $res['js_mobile']; ?></td>
                <td><i class="fa fa-download" aria-hidden="true" style="font-size: 20px;color:blue; padding: 10px;"></i></td>
                <td><?php echo $res['uploaded_date']; ?></td>
                  
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