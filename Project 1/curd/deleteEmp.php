<?php
include './sessionCheck.php';
include './config.php';
$link=$_SERVER['REQUEST_URI'];
// echo $link;
$id=parse_url($link);
// echo $id;
parse_str($id['query'],$newId);
$id=$newId['id'];
$sql="delete from employee where eid={$id};";
mysqli_query($conn,$sql);
header("Location: https://localhost/Project%201/employees-list.php");
mysqli_close($conn);
?>
