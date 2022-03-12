<?php
include "./config.php";
session_start();
if(!isset($_SESSION['logedin'])){
    header("Location: {$hostName}");
}
?>