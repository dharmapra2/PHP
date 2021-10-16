<?php
include './config.php';
$uname=$_POST['uname'];
$pwd=$_POST['upwd'];
// $sign_in=$_POST['save'];
$sql=("insert into admin values('{$uname}','{$pwd}')");
$result=mysqli_query($conn,$sql) or die("data can't insert into db.");
header("Location: https://localhost/Employee_Curd/");
mysqli_close($conn);
?>