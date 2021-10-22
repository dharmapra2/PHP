<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                    <?php 
                        include "config.php";
                        $post_id=$_GET['id'];
                        /*Here we check only admin. If user is admin then he can visible all posts from all users.  */
                        $sql= "select p.post_id,p.title,p.post_date,p.author,u.username,p.category,p.description,p.post_img,c.category_name from post p 
                        left join category c on p.category=c.category_id
                        left join user u on p.author=u.user_id
                        where p.post_id={$post_id}";
                        /* in above ,we do 2 times left joining by table aliases*/
                        $result= mysqli_query($conn,$sql) or die("Query failed..");
                        if(mysqli_num_rows($result)>0)
                            {
                                while($row=mysqli_fetch_assoc($result))
                                    { 
                        ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['title'];?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href="category.php?cid=<?php echo $row['category'];?>"><?php echo $row['category_name'];?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $row['author'];?>'><?php echo $row['username'];?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date'];?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="./admin/upload/<?php echo $row['post_img'];?>" alt=""/>
                            <p class="description">
                            <?php echo $row['description'];?>
                            </p>
                        </div>
                        <?php       }//for while loop
                            }//for if loop
                        else{
                            echo '<p class="col-md"><h3 class="text-center font-weight-bold"> No Records found.</h3</p>';
                        }
                        ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
