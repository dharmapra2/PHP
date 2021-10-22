<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php 
                     include "config.php"; 
                     $sql1="select * from category where category_id={$cat_id}";
                      $result1= mysqli_query($conn,$sql1) or die("Query failed:pagintion..");
                        $row1=mysqli_fetch_assoc($result1);
                        ?>
                    <h2 class="page-heading text-bold"><?php echo $row1['category_name'];?></h2>
                        <?php 
                            include "config.php";
                            if(isset($_GET['cid'])){
                                $cat_id=$_GET['cid'];
                               }
                            $limit=5;//for pagination.
                            if(isset($_GET['page'])){
                                $page=$_GET['page'];
                            }
                            else{
                                $page=1;
                                //for initial page
                            }
                            $offset=($page-1) * $limit;//pagination formula
                         /*Here we check only admin. If user is admin then he can visible all posts from all users.  */
                         $sql= "select p.post_id,p.title,p.post_date,u.username,p.author,p.category,p.description,p.post_img,c.category_name from post p 
                         left join category c on p.category=c.category_id
                         left join user u on p.author=u.user_id 
                         where p.category={$cat_id}";
                         /* in above ,we do 2 times left joining by table aliases*/
                            $result= mysqli_query($conn,$sql) or die("Query failed:join..");
                            if(mysqli_num_rows($result)>0)
                            {
                                while($row=mysqli_fetch_assoc($result))
                                { 
                        ?>
                         <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'];?>"><img src="./admin/upload/<?php echo $row['post_img'];?>" alt="Post image"/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id'];?>'><?php echo $row['title'];?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category'];?>'><?php echo $row['category_name'];?></a>
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
                                        <p class="description">
                                        <?php echo substr($row['description'],0,130)."...";?>
                                        <!-- here we use substring function for showing limited characters on screen -->
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'];?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }//for while loop
                        }//for if loop
                        else{
                            echo '<p class="col-md"><h3 class="text-center font-weight-bold"> No Records found.</h3</p>';
                        }
                       
                        if(mysqli_num_rows($result1)>0)
                        {
                            $total_records=$row1['post'];
                           //only showing 5 limit of record
                            $total_page=ceil($total_records / $limit);
    
                            echo '<ul class="pagination admin-pagination">';
                            if($page>1){
                                //for prev button
                                echo '<li><a href="index.php?cid='.($cat_id).'&page='.($page-1).'">Prev</a></li>';
                            }
                            for($i=1;$i<=$total_page;$i++){
                                //for active page
                                if($i==$page){
                                    $active="active";
                                }
                                else{
                                    $active="";
                                }
                                echo '<li class="'.$active.'"><a href="index.php?cid='.($cat_id).'&page='.$i.'">'.$i.'</a></li>';
                            }
                            if($total_page>$page){
                                //for next button
                                echo '<li><a  href="index.php?cid='.($cat_id).'&page='.($page+1).'">Next</a></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
