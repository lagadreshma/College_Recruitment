<?php

session_start();
include "../connection.php";
include "../function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("../admin_login.php");
}

if(isset($_POST['delete'])){

    $cid = $_POST['cid'];
    
    $sql = "delete from company where c_id = '$cid' ";
    $query = mysqli_query($conn, $sql);

    if($query){

        // echo "<script> alert('Deleted Successfully.'); </script>";
        echo "<script> window.location.href = 'manage_company.php'; </script>";

    }
    else{

        die(mysqli_error($conn));

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

   <div class="display">

     <div class="col-2">
        <h1> Available Company's Information </h1>
        <div>
        <form class="form" action="" method="get">
            <input type="text" name="search" value="" autocomplete="off" placeholder="Search...">
            <button type="submit" name="search" class="search"> Search </button> 
        </form>
        </div>
     </div>

     <a href="add_company.php"> Add+</a>

     <div class="table">

       <table>

        <thead>

          <tr>
            <th>id</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Type</th>
            <th>Category</th>
            <th>Email</th>
            <th>Contact</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Website</th>
            <th>Added On</th>
            <th colspan="2">Action</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from company";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                <td><?php echo $res['c_id']; ?></td>
                <td><img src="<?php echo $res['c_image']; ?>" width="50px" height="50px"></td>
                <td><?php echo $res['c_name']; ?></td>
                <td><?php echo $res['c_type']; ?></td>
                <td><?php echo $res['c_category']; ?></td>
                <td><?php echo $res['c_email']; ?></td>
                <td><?php echo $res['c_contact']; ?></td>
                <td><?php echo $res['c_city']; ?></td>
                <td><?php echo $res['c_state']; ?></td>
                <td><?php echo $res['c_country']; ?></td>
                <td><?php echo $res['c_website']; ?></td>
                <td><?php echo $res['c_add_date']; ?></td>
                <td>
                  <button class="update"><a href="update_company_info.php?id=<?php echo $res['c_id']; ?>">Update</a></button>
                </td>
                <td>
                <form action="" method="post">
                  <button class="delete" name="delete">Delete</button>
                  <input type="hidden" name="cid" value="<?php echo $res['c_id']; ?>"> 
                </form>
                </td>
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