<?php
include './config.php';
$eid=$_POST['eid'];
$ename=$_POST['ename'];
$email=$_POST['email'];
$ph_no=$_POST['ph_no'];
$date=$_POST['jdate'];
$jid=$_POST['jid'];
$sql=("update employee set ename='{$ename}',jdate='{$date}',ph_no='{$ph_no}',email='{$email}',jid='{$jid}' where eid='{$eid}';");
$result=mysqli_query($conn,$sql) or die("data can't update into db.");
header("Location: https://localhost/Employee_Curd/employees-list.php");
mysqli_close($conn);
?>
