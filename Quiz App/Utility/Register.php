<!-- <?php
include './config.php';
if(isset($_POST['signin'])){
    $uname=trim($_POST['uname']);
    $uid=trim($_POST['uid']);
    $email=trim($_POST['email']);
    $pwd=trim($_POST['upwd']);
    $sql="select uid from user_ac where uid='{$uname}'";
    $result=mysqli_query($conn,$sql) or die("Query failed..");
    if(mysqli_num_rows($result)>0){
        echo "<div class='alert alert-warning'>User id is already taken.</div>";
    }else{     
        $sql=("insert into user_ac(name,uid,email,pwd) values('{$uname}','{$uid}','{$email}','{$pwd}')");
        $result=mysqli_query($conn,$sql) or die(mysqli_error());
        // header("Location: {$hostName}");
        if($result){
            echo "Account has created..";
        }
    }
    mysqli_close($conn);
}
?> -->