<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="index.php"><img class="logo" src="images/news.jpg"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9 col-sm-offset col-md-1 col-sm-8">
                        <a href="logout.php" class="admin-logout">Welcome</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
<?php include "config.php";
//only for restricate normal user do any stuff
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
                echo "<h1>Account Sucessfully Created.</h1>";
                header("Location: {$hostName}/admin/index.php");
                mysqli_close($conn);
            }
        }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Create a New Account</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="on">
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
                              <option value="1" disabled>Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                    <!-- <?php
                       echo $status;
                    ?> -->
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
