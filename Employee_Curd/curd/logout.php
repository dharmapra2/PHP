<?php
session_start();
session_unset();
session_destroy();
header("Location: https://localhost/Employee_Curd/index.php");
?>