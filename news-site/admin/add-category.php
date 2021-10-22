<?php include "header.php";

//for restricate normal user do any stuff
if($_SESSION["user_role"]== '0'){
    header("Location: {$hostName}/admin/post.php");
}
//---------------------------------------------------
//------form updateing----------------------------
if(isset($_POST['save'])){
    include "config.php"; 
    $cate= mysqli_real_escape_string($conn,$_POST['cat']);

    //for checking the category is not already present in the DB.
    $sql="select category_name from category where category_name='{$cate}'";
    $result=mysqli_query($conn,$sql) or die("Query failed..");
    //for checking any record for that category_name we do if condition.
        if(mysqli_num_rows($result)>0){
            echo "<p style='color:red;text-align:center;margin :10px 0;'> category Name already exists.</p>";
        }
        else{
            $sql1="insert into category (category_name) values('{$cate}')";
            if(mysqli_query($conn,$sql1)){
                header("Location: {$hostName}/admin/category.php");
                mysqli_close($conn);
            }
        }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
