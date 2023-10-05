<?php

include "function.php";

session_start();

session_destroy();

unset($_SESSION['IS_LOGIN']);

echo "<script> window.location.href = 'login.php'; </script>";

?>