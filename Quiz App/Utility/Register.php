<?php
include './config.php';
$uname=$_POST['uname'];
$uid=$_POST['uid'];
$pwd=$_POST['upwd'];
$sql=("insert into user_ac(name,uid,pwd) values('{$uname}','{$uid}','{$pwd}')");
$result=mysqli_query($conn,$sql) or die("data can't insert into db.");
header("Location: {$hostName}");
mysqli_close($conn);
?>