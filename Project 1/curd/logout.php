<?php
session_start();
session_unset();
session_destroy();
header("Location: https://localhost/Project%201/index.php");
?>