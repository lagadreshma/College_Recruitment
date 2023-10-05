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

<h1>Hii</h1>

<?php

  require_once("../footer.php");

?>

</body>
</html>