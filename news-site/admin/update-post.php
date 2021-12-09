<?php include "header.php"; 
include "config.php";
//here we restrict to normal user to can't open anyone's post for edit.
if($_SESSION["user_role"]== '0'){
    $post_id=$_GET['id'];
    $sql2= "select author from post where post_id={$post_id}";
    $result2= mysqli_query($conn,$sql2) or die("update check aid Query failed..");
    $row2=mysqli_fetch_assoc($result2);
    if($row2['author']!=$_SESSION["user_id"]){
    header("Location: {$hostName}/admin/post.php");
    }
}

?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <?php
            include "config.php";
            $post_id=$_GET['id'];
            $sql= "select p.post_id,p.title,p.description,p.post_img,p.category,c.category_name from post p 
            left join category c on p.category=c.category_id
            left join user u on p.author=u.user_id where post_id={$post_id}";
            /* in above ,we do 2 times left joining by table aliases*/
            $result= mysqli_query($conn,$sql) or die("Query failed..");
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                { 
        ?>
        <!-- Form for show edit-->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id'];?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo stripSlashes($row['title']);?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                <?php echo stripslashes($row['description']);?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select name="category" class="form-control">
                    <option disabled selected>Select Category</option>
                         <?php 
                            include "config.php";
                            $sql1="select * from category";
                            $result1=mysqli_query($conn,$sql1) or die("Query failed..");
                            if(mysqli_num_rows($result1)>0){
                                while($row1=mysqli_fetch_assoc($result1)){
                                    if($row['category']==$row1['category_id']){
                                        $selected="selected"; //for selecting defult option
                                    }else{
                                        $selected="";
                                    }
                                    echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                                    }
                                }
                              ?>
                    </select>
                    <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
                <!-- the above input is for updation purpose in save-update.php file. that require old category value. -->
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img class="" src="upload/<?php echo $row['post_img'];?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img'];?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <?php
                }
            }
            else{
                echo '<p class="col-md"><h3 class="text-center font-weight-bold">No Result Found.</h3</p>';
            }
        ?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
