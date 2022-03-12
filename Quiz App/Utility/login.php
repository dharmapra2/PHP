<?php
require_once "./config.php";
if(isset($_POST['login_to_add'])){
    $username=trim($_POST['user_id']);
    $password=trim($_POST['pwd']);
    
    $sql="select uid from user_ac where uid='{$username}' and pwd='{$password}'";
    $result=mysqli_query($conn,$sql) or die("Query failed..");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION['logedin'] = true;
            $_SESSION['userName']=$username;
            header("Location: {$hostName}Utility/addQuiz.php");
        }
    }
    else{
        echo "<div class='alert alert-warning'>User Name and Password are mismatch</div>";
        echo "<a href=\"$hostName\"><button class=\"btn btn-primary\">click to back</button></a>";
    }
}
if(isset($_POST['login_to_take'])){
    $username=trim($_POST['user_id']);
    $password=trim($_POST['pwd']);
    $sql="select uid from user_ac where uid='{$username}' and pwd='{$password}'";
    $result=mysqli_query($conn,$sql) or die("Query failed..");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION['logedin'] = true;
            $_SESSION['userName']=$username;
            $_SESSION['score']=0;
            $_SESSION['ans_key']=array();
            $_SESSION['ans_val']=array();
            header("Location: {$hostName}Utility/takeQuiz.php");
        }
    }
    else{
        echo "<div class='alert alert-warning'>User Name and Password are mismatch</div>";
        echo "<a href=\"$hostName\"><button class=\"btn btn-primary\">click to back</button></a>";
    }
}
mysqli_close($conn);
include "./sessionCheck.php";
?>