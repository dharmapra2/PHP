<?php
include "config.php";
if(empty($_FILES['new-image']['name'])){
    $new_name=$_POST['old-image'];
    echo $new_name;
}
else{
    $errors=array();
    $file_name=$_FILES['new-image']['name'];
    $file_size=$_FILES['new-image']['size'];
    $file_tmp=$_FILES['new-image']['tmp_name'];
    $file_type=$_FILES['new-image']['type'];
    $file_ext=end(explode('.',$file_name));
    $extensions=array("jpeg","jpg","png");
    // echo $file_name."<br>".$file_tmp;

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
    $new_name = time().$file_ext;
    // echo $new_name."<br>";
    $target= "upload/".$new_name;
    //to save file prefix with time
    //if no error detect then we upload the temporary file name in destination
    if(empty($errors) == true){
        move_uploaded_file($file_tmp,$target);
    }
    else{
        print_r($errors);
        die();
    }
}
$image_name = $new_name;
$title=addslashes($_POST["post_title"]);
$desc=addslashes($_POST["postdesc"]);
$sql = "UPDATE post SET title='{$title}',description='{$desc}',category={$_POST["category"]},post_img='{$image_name}'
        WHERE post_id={$_POST["post_id"]};";
        
if($_POST['old_category'] != $_POST["category"] ){
  $sql .= "UPDATE category SET post= post - 1 WHERE category_id = {$_POST['old_category']};";
  $sql .= "UPDATE category SET post= post + 1 WHERE category_id = {$_POST["category"]};";
}
// echo $sql;
// die();
    $result=mysqli_multi_query($conn,$sql);
    // bcz, here we perform compound sql query statments.
if($result){
    header("Location: {$hostName}/admin/post.php");
}
else{
    echo "<div class='alert alert-danger'>Save update Query Failed..</div>";
}
mysqli_close($conn);
?>