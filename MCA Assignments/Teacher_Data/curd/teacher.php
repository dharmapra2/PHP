<?php
include 'config.php';
$ename=$_POST['ename'];
$email=$_POST['email'];
$ph_no=$_POST['ph_no'];
$date=$_POST['date'];
$jid=$_POST['jid'];
$sql=("insert into employee (ename,ph_no,email,jdate,jid) values('{$ename}','{$ph_no}','{$email}','{$date}','{$jid}')");
$result=mysqli_query($conn,$sql) or die("data can't insert into db.");
header("Location: https://localhost/Teacher_Data/index.php");
mysqli_close($conn);
?>