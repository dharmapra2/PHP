<?php
    include "config.php";
    //global variable is used for accessing data from the url
    $page=basename($_SERVER['PHP_SELF']);
    // basename()is to retrive the last name from the url/text 
    // eg: news-site/index.php ,so by the function we'll get index.php as a output
    switch($page){
        case 'single.php':
            if(isset($_GET['id'])){
                $sql_title="select title from post where post_id={$_GET['id']}";
                $result= mysqli_query($conn,$sql_title) or die("Title Query failed..");
                $row_title=mysqli_fetch_assoc($result);
                $page_title=$row_title['title'];
            }
            else{
                $page_title="No post found";
            }
            break;
        case 'category.php':
        if(isset($_GET['cid'])){
                $sql_title="select category_name from category where category_id={$_GET['cid']}";
                $result= mysqli_query($conn,$sql_title) or die("Title Query failed..");
                $row_title=mysqli_fetch_assoc($result);
                $page_title=$row_title['category_name']." News";
                }
            else{
                $page_title="No post found";
                }
            break;
        case 'author.php':
        if(isset($_GET['aid'])){
                $sql_title="select first_name,last_name from user where user_id={$_GET['aid']}";
                $result= mysqli_query($conn,$sql_title) or die("Title Query failed..");
                $row_title=mysqli_fetch_assoc($result);
                $page_title="News By ".$row_title['first_name']." ".$row_title['last_name'];
                }
            else{
                $page_title="No post found";
                }
            break;
        case 'search.php':
            if(isset($_GET['search'])){
                $sql_title=$_GET['search'];
                $page_title=$sql_title;
                    }
                else{
                    $page_title="No post found";
                    }
            break;
        default:
                $page_title="Home";
                break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title;?></title>
    <!-- the $page_title passed from the above php code-->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="./css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-4">
                <?php
                    include "config.php";
                    $sql= "select * from settings";
                    /* in above ,we do 2 times left joining by table aliases*/
                    $result= mysqli_query($conn,$sql) or die("Settings Query failed..");
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        { 
                            if($row['logo']==""){
                                echo '<a href="index.php"><h1>'.$row["website_name"].'</h1></a>';
                            }
                            else{
                                echo '<a href="index.php"><img src="./admin/images/'. $row['logo'].'" alt=""></a>';
                            }
                          }
                    }
                ?>
            </div>
            <!-- LOGO-Out -->
            <div class="col-md-offset-4 col-sm-offset-2 col-md-4 col-sm-10">
                <a href="./admin/" class="admin-logout"><button class="btn btn-primary">Login / Sign Up</button></a> 
            </div>
                 <!-- /LOGO-Out -->
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "config.php";
                if(isset($_GET['cid'])){
                 $cat_id=$_GET['cid'];
                }
                $sql= "select * from category where post>0";
                $result= mysqli_query($conn,$sql) or die("Query failed: category..");
                if(mysqli_num_rows($result)>0)
                {
            ?>
                <ul class='menu'>
                <li><a class="" href="<?php echo $hostName;?>">Top News</a></li>
                <?php
                        while($row=mysqli_fetch_assoc($result))
                        { if(isset($_GET['cid'])){
                            if($row['category_id']==$cat_id){
                                $active="active";
                            }else{
                            $active="";
                            }
                            echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                        }else{
                            echo "<li><a href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                        }
                        }
                    ?>
                </ul>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
