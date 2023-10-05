<?php

session_start();

include "../function.php";
include "../connection.php";

unset($_SESSION['IS_LOGIN']);
redirect('../employer_login.php');

?>