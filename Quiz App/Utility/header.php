<?php
  require_once "./sessionCheck.php";
  require_once "./config.php";
//   $name=;
  $sql="select name from user_ac where uid='{$_SESSION['userName']}'";
//   echo $sql ;
  $result_name=mysqli_query($conn,$sql) or die(" can't retrive user name from db...");
  if(mysqli_num_rows($result_name)>0){
    while($row=mysqli_fetch_assoc($result_name)){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Add Quiz</title>
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid" >
                <a class="navbar-brand" href="#"><h3>👋Welcome, <?php  echo $row['name'];?></h3></a>
                <?php 
                }
            }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active btn" aria-current="page" href="./addQuiz.php"><h4>Add Quiz</h4></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn" aria-current="page" href="./takeQuiz.php"><h4>Take Quiz</h4></a>
                    </li>
                    </ul>
                    <form class="d-flex">
                        <a href="logout.php" class="ml-3 btn btn-sm btn-warning">Log Out</a>
                    </form>
                </div>
                </div>
            </nav>
        </div>
    <hr>