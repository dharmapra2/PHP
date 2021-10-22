<?php include "header.php";
//only for restricate normal user do any stuff
if($_SESSION["user_role"]== '0'){
    header("Location: {$hostName}/admin/post.php");
}
//---------------------------------------------------
if(isset($_POST['save'])){
    include "config.php";

    //the mysqli_real_escape_string() -> The string to be escaped. Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z. 
    //and also Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection

    $fname =mysqli_real_escape_string($conn,ucfirst($_POST['fname']));
    $lname= mysqli_real_escape_string($conn,ucfirst($_POST['lname']));
    $user= mysqli_real_escape_string($conn,strtolower($_POST['user']));
    $pwd= mysqli_real_escape_string($conn,md5($_POST['password']));
    // the md5() encript the password 
    $role= mysqli_real_escape_string($conn,$_POST['role']);

    //for checking the user is not already present in the DB.
    $sql="select username from user where username='{$user}'";
    $result=mysqli_query($conn,$sql) or die("Query failed..");
    //for checking any record for that username we do if condition.
        if(mysqli_num_rows($result)>0){
            echo "<p style='color:red;text-align:center;margin :10px 0;'> User Name already exists.</p>";
        }
        else{
            $sql1="insert into user (first_name,last_name,username,password,role) values('{$fname}','{$lname}','{$user}','{$pwd}','{$role}')";
            if(mysqli_query($conn,$sql1)){
                header("Location: {$hostName}/admin/users.php");
                mysqli_close($conn);
            }
        }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
