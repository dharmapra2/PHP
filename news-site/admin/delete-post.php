<?php
include "config.php";
// session_start();

$post_id=$_GET['id'];
$cat_id=$_GET['cat_id'];
//below lines code is for delete image from upload folder
$sql1="select * from post where post_id={$post_id};";
$result=mysqli_query($conn,$sql1)or die("Query failed...");
$row=mysqli_fetch_assoc($result);
unlink("upload/".$row['post_img']);//this function is used for remove file from any  relative path specific folder.
$sql="delete from post where post_id={$post_id};";
$sql.="update category set post= post - 1 where category_id={$cat_id}";
if(mysqli_multi_query($conn,$sql))
{
    header("Location: {$hostName}/admin/post.php");
}
else{
    echo "<p style='color:red;text-align:center;margin :10px 0;'>can't delete the category record..</p>";
}
mysqli_close($conn);
?>