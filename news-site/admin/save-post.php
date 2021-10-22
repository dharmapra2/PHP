<?php
include "config.php";
session_start();
//before going follow file codes ,we need to learn some php file upload stuff.
if(isset($_FILES['fileToUpload'])){
    $errors=array();
    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext=end(explode('.',$file_name));
    $extensions=array("jpeg","jpg","png");

    //check file extension only in jpg,png,jpeg format 
    if(in_array($file_ext,$extensions)===false){
        $errors[]="This extension file is not allowed, Please choose a JPG or PNG  file";
        echo "<div class='alert alert-warning'><a href='save-post.php'><h3 class='btn'>Back to page</h3></a></div>";
    }
    //1byte=1024bit
    //1kb=1024 bytes
    //1mb= 1024 kbs
    //2mb= 2097152 kbs

    //check file size
    if($file_size> 2097152){
        $errors[]="File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "upload/".$new_name;
    //if no error detect then we upload the temporary file name in destination
    if(empty($errors)== true){
        move_uploaded_file($file_tmp,$target);
    }
    else{
        print_r($errors);
        echo "<div class='alert alert-warning'><a href='add-post.php'><h3 class='btn'>Back to page</h3></a></div>";
        die();
    }
}
//-------form for add post---------------------------------
$title=mysqli_real_escape_string($conn,$_POST['post_title']);
$description=mysqli_real_escape_string($conn,$_POST['postdesc']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
$date=date("d-M-Y");
$author = $_SESSION['user_id'];//from index.php file 


$sql= "insert into post (title,description,category,post_date,author,post_img) values('{$title}','{$description}','{$category}','{$date}',{$author},'{$new_name}');";
//in the above sql we need to add ";" at the end.Bcz here we performe another sql statemant. 
$sql.="update category set post= post + 1 where category_id={$category}";

//mysqli_multi_query() this function used for run multiple SQL queries.
if(mysqli_multi_query($conn,$sql)){
    header("Location: {$hostName}/admin/post.php");
}else{
    echo "<div class='alert alert-danger'>Query Failed..</div>";
}

?>