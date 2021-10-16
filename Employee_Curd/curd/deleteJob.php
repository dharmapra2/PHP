<?php
include './sessionCheck.php';
include './config.php';
$link=$_SERVER['REQUEST_URI'];
// echo $link;
$jid=parse_url($link);
// echo $id;
parse_str($jid['query'],$newId);
$jid=$newId['id'];
$sql="delete from job where jid={$jid};";
mysqli_query($conn,$sql);
header("Location: https://localhost/Employee_Curd/jobs-list.php");
mysqli_close($conn);
?>
