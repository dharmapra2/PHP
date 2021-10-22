<?php
include "config.php";
session_start();
//if user not logged out then we can redirect to main index page without login
if(isset($_SESSION['username'])){
    header("Location: {$hostName}/admin/post.php");
}
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8">
                        <a href="../index.php"><img class="logo" src="images/news.jpg"></a>
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                        <?php 
                        if(isset($_POST['login'])){
                            include "config.php";

                            //the mysqli_real_escape_string() -> The string to be escaped. Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z. 
                            //and also Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection

                            $username=mysqli_real_escape_string($conn,$_POST['username']);
                            $password=md5($_POST['password']);

                            $sql="select user_id,username,role from user where username='{$username}' and password='{$password}'";
                            $result=mysqli_query($conn,$sql) or die("Query failed..");
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    session_start();
                                    $_SESSION['username']=$row['username'];
                                    $_SESSION['user_id']=$row['user_id'];
                                    $_SESSION['user_role']=$row['role'];
                                    header("Location: {$hostName}/admin/post.php");
                                }
                            }
                            else{
                                echo "<div class='alert alert-warning'>User Name and Password are mismatch</div>";
                            }
                        }
                        ?>
                          <div style="position: absolute;top: 33.8rem;right: 2rem;
                          ">
                          <abbr title="Don't Have An Account ?">
                                <a href="createAc.php"><button class="btn btn-primary">Sign Up</button></a>
                            </abbr>
                            </div>
                    </div>
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8">
                    <a href="../index.php"><button class="btn btn-primary float-left">Back To Main page</button></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
