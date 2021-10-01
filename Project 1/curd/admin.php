<?php
include './config.php';
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
// $sign_in=$_POST['signin'];
$admin_sql=("select uname,pwd from admin");
$result=mysqli_query($conn,$admin_sql) or die("data can't fatch from db.");
if(mysqli_num_rows($result)>0)
{
    while($data=mysqli_fetch_assoc($result)){
        if($data['uname']==$uname && $data['pwd']==$pwd){
            session_start();
            $_SESSION['logedin'] = true;
            header("Location: https://localhost/Project%201/dash.php");
        }
    }
}
mysqli_close($conn);
?>