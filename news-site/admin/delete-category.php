<?php include "header.php";
include "config.php";
//only for restricate normal user do any stuff
if($_SESSION["user_role"]== '0'){
    header("Location: {$hostName}/admin/post.php");
}
//---------------------------------------------------
$category_id=$_GET['cat_id'];
$sql="delete from category where category_id={$category_id}";
if(mysqli_query($conn,$sql))
{
    header("Location: {$hostName}/admin/category.php");
}
else{
    echo "<p style='color:red;text-align:center;margin :10px 0;'>can't delete the category record..</p>";
}
mysqli_close($conn);
?>