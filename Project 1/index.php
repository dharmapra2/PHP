<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-4">
                <div class="card bx">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Login as Admin</h4>
                            <p class="card-text small text-muted">Login with you username &amp; password</p>
                            <form action="./curd/admin.php" method="POST">
                                <div class="mb-3">
                                    <input type="text" name="uname" class="form-control form-control-sm" placeholder="Username" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="pwd" class="form-control form-control-sm" placeholder="Password" required>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="signin" class="btn btn-block btn-sm btn-success" value="Sign in">
                                </div>
                            </form>
                            <div class="justify-content-center">
                                <p class="card-text align-center small text-muted">Don't Have Any Account</p>
                                
                                <div class="mb-3">
                                    <input type="submit" name="signup" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#signup" value="Sign up">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sign up Model-- -->
    <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signup" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create An Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="createAC.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="uname" class="form-control form-control-sm" placeholder="@username" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="upwd" class="form-control form-control-sm" placeholder="enter password" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="save" class="btn btn-sm btn-success btn-block">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>