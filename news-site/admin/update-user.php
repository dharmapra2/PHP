<?php include "header.php";
//only for restricate normal user do any stuff
if($_SESSION["user_role"]== '0'){
    header("Location: {$hostName}/admin/post.php");
}
//---------------------------------------------------
if(isset($_POST['submit'])){
    include "config.php";

    //the mysqli_real_escape_string() -> The string to be escaped. Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z. 
    //and also Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection

    $user_id =mysqli_real_escape_string($conn,$_POST['user_id']);
    $fname =mysqli_real_escape_string($conn,$_POST['f_name']);
    $lname= mysqli_real_escape_string($conn,$_POST['l_name']);
    $username= mysqli_real_escape_string($conn,$_POST['username']);
    $role= mysqli_real_escape_string($conn,$_POST['role']);

    //for checking the user is not already present in the DB.
    $sql="update user set first_name = '{$fname}',last_name = '{$lname}',username = '{$username}',role = '{$role}' where user_id={$user_id}";
    if(mysqli_query($conn,$sql)){
        header("Location: {$hostName}/admin/users.php");
    }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php 
                    include "config.php";
                    $user_id=$_GET['id'];
                    $sql= "select * from user where user_id ={$user_id}";
                    $result= mysqli_query($conn,$sql) or die("Query failed..");
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        { 
                ?>
                            <!-- Form Start -->
                            <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                                <div class="form-group">
                                    <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id'];?>" placeholder="" >
                                </div>
                                    <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'];?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'];?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                                        <?php 
                                         if($row['role']==1){
                                            echo " <option value='0'>normal User</option>
                                            <option value='1' selected>Admin</option>";
                                        }
                                            else{
                                                echo " <option value='0'selected>normal User</option>
                                                <option value='1'>Admin</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                            </form>
                  <?php
                        }
                }
                    ?>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
