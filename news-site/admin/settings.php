<?php include "header.php";
//only for restricate normal user do any stuff
if($_SESSION["user_role"]== '0'){
    header("Location: {$hostName}/admin/post.php");
}
//---------------------------------------------------
?>
?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">website Settings</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                <?php
                    include "config.php";
                    $sql= "select * from settings";
                    /* in above ,we do 2 times left joining by table aliases*/
                    $result= mysqli_query($conn,$sql) or die("Settings Query failed..");
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        { 
                ?>
                  <!-- Form -->
                  <!-- (enctype="multipart/form-data")is used for store images/files etc... -->
                  <form  action="save-settings.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="website_name">website Name</label>
                          <input type="text" name="website_name" value="<?php echo $row['website_name'];?>" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="logo"> website Logo</label>
                          <input type="file" name="logo" id="">
                          <img src="./images/<?php echo $row['logo'];?>" alt="Logo">
                          <input type="hidden" name="old_logo" value="<?php echo $row['logo'];?>">
                      </div>
                      <div class="form-group">
                          <label for="footer_desc">Footer Description</label>
                          <textarea name="footer_desc" class="form-control" cols="20" rows="5"><?php echo $row['footer_desc'];?></textarea>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
                  <?php 
                        }
                    }
                    ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
