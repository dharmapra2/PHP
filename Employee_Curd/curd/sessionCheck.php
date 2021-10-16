<?php
session_start();
if(!isset($_SESSION['logedin'])){
    header("Location: https://localhost/Employee_Curd/index.php");
}
?>