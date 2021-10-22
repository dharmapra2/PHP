<?php
include "config.php";
session_start();//session start
//unset for removing all variables in session
session_unset();
//destroy the session
session_destroy();
//after destroy we need to back main page i.e,admin/index.php..
header("Location: {$hostName}/admin/");
?>