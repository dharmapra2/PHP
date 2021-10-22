<?php
include "config.php";
session_start();
if($_SESSION["user_role"]== '0'){
    header("Location: {$hostName}/admin/post.php");
}
if(empty($_FILES['logo']['name'])){
    $file_name=$_POST['old_logo'];
}
else{
    $errors=array();
    $file_name=$_FILES['logo']['name'];
    $file_size=$_FILES['logo']['size'];
    $file_tmp=$_FILES['logo']['tmp_name'];
    $file_type=$_FILES['logo']['type'];
    $exp=explode('.',$file_name);
    $file_ext=end($exp);
    $extensions=array("jpeg","jpg","png");

    //check file extension only in jpg,png,jpeg format 
    if(in_array($file_ext,$extensions)===false){
        $errors[]="This extension file is not allowed, Please choose a JPG or PNG  file";
        echo "<div class='alert alert-warning'><a href='settings.php'><h3 class='btn'>Back to page</h3></a></div>";
    }
    //1byte=1024bit
    //1kb=1024 bytes
    //1mb= 1024 kbs
    //2mb= 2097152 kbs

    //check file size
    if($file_size> 2097152){
        $errors[]="File size must be 2mb or lower.";
    }
    //if no error detect then we upload the temporary file name in destination
    if(empty($errors)== true){
        move_uploaded_file($file_tmp,"images/".$file_name);
    }
    else{
        print_r($errors);
        die();
    }
}
$sql="update settings set website_name='{$_POST["website_name"]}',footer_desc='{$_POST["footer_desc"]}',logo='{$file_name}'";
$result=mysqli_query($conn,$sql)or die("Settings update error..");
if($result){
    header("Location: {$hostName}/admin/settings.php");
}
else{
    echo "<div class='alert alert-danger'>Update Setting Query Failed..</div>";
}
mysqli_close($conn);
?>