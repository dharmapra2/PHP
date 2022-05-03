<?php
  include './Utility/config.php';
  $msg="";
  if(isset($_POST['signin']) && !empty($_POST)){
      $uname=trim($_POST['uname']);
      $uid=trim($_POST['uid']);
      $email=trim($_POST['email']);
      $pwd=trim($_POST['upwd']);
      $sql="select uid from user_ac where uid='{$uid}';";
      $result=mysqli_query($conn,$sql) or die("Query failed..");
      if(mysqli_num_rows($result)>0){
          $msg="<div class='alert alert-warning'>User id is already taken.</div>";
          header("refresh: 10");
      }else{     
          $sql=("insert into user_ac(name,uid,email,pwd) values('{$uname}','{$uid}','{$email}','{$pwd}')");
          $result=mysqli_query($conn,$sql) or die(mysqli_error());
          // header("Location: {$hostName}");
          if($result){
              $msg= "<div class='alert alert-success'>Your Account has created successfully....</div>";
              header("refresh: 10");
          }
      }
      mysqli_close($conn);
  }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is based on quiz contest.\n where user can add and take the quiz..\n This is on PHP and MySQL.">
    <meta name="keywords" content="HTML, CSS,JavaScript,PHP,MySQL,Bootstrap">
    <meta name="author" content="Dharma Pradhan">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        .container-fluid{
            display: flex;
            background-image: linear-gradient(to top right,#549cb4 1%,#7de918 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
    <title>Quiz App</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="link-primary d-grid gap-2 col-6 mx-auto">
                <div id="msg"><?php echo $msg; ?></div>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Add_quiz_modal">Add Quiz</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#take_quiz_modal">Take Quiz</button>
            </div>
        </div>  
  <!--Add Quiz Modal -->
  <div class="modal fade" id="Add_quiz_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content container-sm">
        <div class="modal-header">
          <div class="modal-title" id="exampleModalLabel"><h4 id="heading">Login Form</h4></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body container1">
        
                <section id="form-box">
                        <div class="btn-box">
                            <div class="active"></div>
                            <button type="button" class="toggle-btn" onclick="LogIn()">Log In</button>
                            <button type="button" class="toggle-btn" onclick="signUp()">Sign Up</button>
                        </div>
                        
                    <form id="login" class="login-group" method="post" action="./Utility/login.php">
                        <input type="text" class="login-field form-control-sm" placeholder="Enter User Id" name="user_id" required>
                        <input type="password" class="login-field form-control-sm"  placeholder="Enter Password" name="pwd" required/>
                        <input type="checkbox" class="check-box" required><span>Remember Password</span>
                        <button type="submit" name="login_to_add" class="submit-btn">Login</button>
                    </form>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="signup" class="login-group mb-3">
                        <input type="text" class="login-field form-control-sm" placeholder="Enter name" name="uname" required>
                        <input type="text" class="login-field form-control-sm" placeholder="Enter User id" name="uid" required>
                        <input type="email" class="login-field form-control-sm" placeholder="Enter User Email" name="email" required>
                        <input type="password" class="login-field form-control-sm"  placeholder="Enter Password" name="upwd" required/>
                        <input type="checkbox" class="check-box" required><span>i agree to the terms & conditions</span>
                        <button type="submit" name="signin" value="signin" class="submit-btn">Sign Up</button>
                    </form>
                  
                </section>
        </div>
      </div>
    </div>
  </div>
  <!--take Quiz Modal -->
  <div class="modal fade" id="take_quiz_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content container-sm">
        <div class="modal-header">
          <div class="modal-title" id="exampleModalLabel"><h4>You have to login</h4></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body container1">
                    <div class="container-sm">
                        <form method="post" action="./Utility/login.php" class="form mt-3" autocomplete="on">
                          <div class="mb-3">
                           <label for="name" class="form-label">Enter your ID</label>
                           <input type="text" class="login-field form-control-md" name="user_id" required>
                          </div>
                          <div class="mb-3">
                            <label for="pwd" class="form-label">Enter Password</label>
                            <input type="password" class="login-field form-control-md" name="pwd" required>
                           </div>
                          <button type="submit" class="btn btn-primary" name="login_to_take">Login</button>
                        </form>
                        <a class="text-danger" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#Add_quiz_modal" onclick="create_ac();">Don't Have Account</a>
                      </div>
        </div>
      </div>
    </div>
  </div>
  <!-- toggle button -->
  <script type="text/javascript">
    let login_btn = document.getElementById('login');
    let signup_btn = document.getElementById('signup');
    let active_btn= document.getElementsByClassName("active")[0];
    const text = document.getElementById('heading');
    let message = document.getElementById('msg');
    function signUp(){
        text.innerHTML = "Create Account";
        login_btn.style.left="-400px";
        signup_btn.style.left="50px";
        active_btn.style.left="110px";
        document.getElementById('form-box').style.height="423px";
    }
    function LogIn(){
        text.innerHTML = "Login Form";
        login_btn.style.left="50px";
        signup_btn.style.left="450px";
        active_btn.style.left="0px";
        document.getElementById('form-box').style.height="380px";
    }
    function create_ac(){
      signUp();
    }
  </script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>