<?php
session_start();
if(!isset($_SESSION['logedin'])){
    header("Location: https://localhost/Project%201/index.php");
}
?>