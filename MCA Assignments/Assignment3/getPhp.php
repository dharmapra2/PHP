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
    <link rel="stylesheet" href="./bootstrap.min.css">
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
        <h1>States And Their Capitals</h1>
    </div>
    <table class="table table-bordered table-responsive text-center">
            <thead class="container-sm">
                <tr class="form-group bg-primary">
                    <td class="form-label">State Name</td>
                    <td class="form-label">Capital</td>
                    <td class="form-label">Languages</td>
                </tr>
            </thead>
            <tbody class="container-sm">
    <?php
        $data="<tr>
        <td><strong>".$_GET['State']."</strong></td>
        <td><strong>".$_GET['capi']."</strong></td><td>";
        $lang_arr=explode(" ",$_GET['languages']);
        // print_r($lang_arr);
        foreach($lang_arr as $lang){
            $data=$data."<strong> ".$lang.", </strong> ";
            // echo $lang;
        }
        $data=$data."</td></tr>";
        echo $data;
    ?>
         </tbody>
    </table>
    <!-- echo "<h1>Capital of ".$_GET['State']." is:- <strong>".$_GET['capi']."</strong></h1>";
    $ "<h3>And its languages are -".$_GET['languages']; -->
    <div class="container">
        <a href="./index.php" class="alert-link m-2 float-right" style="color: white;"><button type="button" class="btn btn-danger" id="btn2">Click to Back</button></a>
    </div>
</body>
</html>