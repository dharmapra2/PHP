<?php
include 'config.php';
$name=$_POST['name'];
$age=$_POST['age'];
$ph_no=$_POST['ph_no'];
$sub_name=$_POST['sub_name'];
$sql=("insert into teacher (name,age,ph_no,sub_name) values('{$name}','{$age}','{$ph_no}','{$sub_name}')");
$result=mysqli_query($conn,$sql) or die("data can't insert into db.");
header("Location: https://localhost/Teacher_Data/index.php");
mysqli_close($conn);
?>