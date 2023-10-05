<?php


$server = "localhost";
$user = "root";
$password = "";
$db = "jobportal";


$conn = mysqli_connect($server, $user , $password, $db);

if($conn){

    ?>

      <!-- <script>
          alert("Connection Successful.");
      </script> -->

    <?php

}
else{

    die("no connection." . $mysqli_connect_error());

}

?>