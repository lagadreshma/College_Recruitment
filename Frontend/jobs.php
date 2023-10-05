<?php

session_start();
require_once("connection.php");
require_once("function.php");

if(isset($_POST['apply'])){

  if(!isset($_SESSION['IS_LOGIN'])){
      redirect("login.php");
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


    <!-- Job Posts  -->

    <section class="job-posts">

    <div class="jobs">

        <?php

     $select = "select * from job_posts";

     $query = mysqli_query($conn, $select);
     
     $rows = mysqli_num_rows($query);

     while($result = mysqli_fetch_assoc($query)){

    ?>
      <div class="row">
        <form action="" method="post">
            
           <div class="posts">
           <div class="col-4">
               <div class="box-1">
                  <img src="<?php echo $result['j_clogo']; ?>" alt="" width="200px" height="200px">
               </div>
               <div class="box-2">
                  <p class="job-title"><?php echo $result['j_position']; ?></p>
                  <p class="company-name"><?php echo $result['j_cname']; ?></p>
               </div>
            </div>
            <div class="col-6">
                <div class="box-1">
                    <p class="job-location"><i class="fa fa-location-arrow" aria-hidden="true"></i><?php echo $result['j_location']; ?></p>
                    <p class="job-salary"><?php echo $result['j_salary']; ?> /month</p>
                </div>
                <div class="box-2">
                    <p class="job-type"><?php echo $result['j_type']; ?></p>
                    <p class="job-post-date"><?php echo $result['j_post_date']; ?></p>

                    <button type="submit" name="apply" class="btn">Apply</button>
                    <input type="hidden" name="" value="<?php echo $result['j_id']; ?>">

                </div>
            </div>
           </div>

        </form>
      </div>

    <?php

     }
              
    ?>

      

    </div>

    </section>



    <!-- Footer Page   -->

    <?php

        require_once("footer.php");

    ?>




    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>


  </body>
</html>