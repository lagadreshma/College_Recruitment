<?php

session_start();

include "../function.php";
include "../connection.php";

unset($_SESSION['IS_LOGIN']);
redirect('../admin_login.php');

?>