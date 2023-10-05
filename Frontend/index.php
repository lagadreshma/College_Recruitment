<?php

session_start();
require_once("connection.php");
require_once("function.php");

if(isset($_POST['uploadcv'])){

  if(!isset($_SESSION['IS_LOGIN'])){
      redirect("login.php");
  }else{
      redirect("upload_cv.php");
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

<!-- Advertisement -->

<section class="advertisement">
<div class="add">

<div class="row">

  <div class="col-8">

    <h1>Your Dream Job is <br> Waiting For You </h1>
    <h3>"Don't Wait for the Right Opportunity: Create it."
     <br>
     "The Eaisest way to get your new job."
    </h3>
    
  </div>

  <div class="col-4">

   <div class="apply-now">
     <a href="jobs.php" class="apply-btn">Apply Now</a>
   </div>

  </div>

</div>

</div>

</section>

<section class="hiring">

   <div class="hire">
     <div class="row">

       <div class="small-container">
         <div class="content">
            <h2>We're looking for passionate, <br> driven individuals.</h2>
         </div>

         <div class="upload">
          <form action="" method="post">
            <button class="upload-btn" name="uploadcv">
             Upload CV &nbsp; <i class="fa fa-upload" aria-hidden="true"></i>
            </button>
          </form>
         </div>
       </div>

     </div>
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