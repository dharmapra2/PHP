<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State and their Capitals</title>
    <meta name="keywords" content="HTML,CSS,JavaScript,PHP,Bootstrap">
    <meta name="description" content="For MCA PHP Assignment">
    <meta name="author" content="Dharma Pradhan">
    <link rel="stylesheet" href="/MCA Assignments/bootstrap.min.css">
    <style>
        body{
            background-color: lavenderblush;
        }
        table{
            margin-top: 2rem;
        }
    </style>
</head>
<body class="container-sm">
    <div class="container-fluid bg-primary text-white text-center">
        <h1>States And Thier Capitals</h1>
    </div>
    <?php
        echo "<h1>Capital of ".$_GET['State']." is <strong>".$_GET['capi']."</strong></h1>";
    ?>
    <a href="./index.php" class="alert-link" style="color: white;"><button type="button" class="btn btn-danger" id="btn2">Click to Back</button></a>
</body>
</html>