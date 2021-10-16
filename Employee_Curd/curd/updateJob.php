<?php
include './config.php';
$jid=$_POST['jid'];
$jname=$_POST['jname'];
$jdate=$_POST['jdate'];
// $sign_in=$_POST['save'];
 $job_sql=("update job set jname='{$jname}',jdate='{$jdate}' where jid='{$jid}';");
 if(isset($_POST['submit'])){
 mysqli_query($conn,$job_sql) or die("data can't update  db.");
 header("Location: https://localhost/Employee_Curd/jobs-list.php");
 }
 else{
     echo "sdfj";
 }
mysqli_close($conn);
?>