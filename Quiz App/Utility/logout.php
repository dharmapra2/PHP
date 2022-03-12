<?php
include "./config.php";
session_start();
// print_r($_SESSION);
session_unset();
session_destroy();
header("Location: $hostName");
?>