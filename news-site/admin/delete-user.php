<?php include "header.php";
include "config.php";
//only for restricate normal user do any stuff
if($_SESSION["user_role"]== '0'){
    header("Location: {$hostName}/admin/post.php");
}
//---------------------------------------------------
$user_id=$_GET['id'];
$sql="delete from user where user_id={$user_id}";
if(mysqli_query($conn,$sql))
{
    header("Location: {$hostName}/admin/users.php");
}
else{
    echo "<p style='color:red;text-align:center;margin :10px 0;'>can't delete the user record..</p>";
}
mysqli_close($conn);
?>