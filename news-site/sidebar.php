<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php 
            include "config.php";
            $limit=6;
            /*Here we check only admin. If user is admin then he can visible all posts from all users.  */
            $sql= "select p.post_id,p.title,p.post_date,p.category,p.post_img,c.category_name from post p 
            left join category c on p.category=c.category_id
            order by p.post_id desc limit {$limit}";
            /* in above ,we do 2 times left joining by table aliases*/
            $result= mysqli_query($conn,$sql) or die("Query failed:Recent post.");
            if(mysqli_num_rows($result)>0)
                {
                while($row=mysqli_fetch_assoc($result))
                    { 
        ?>
        <div class="recent-post">
            <a class="post-img" href="single.php?id=<?php echo $row['post_id'];?>">
                <img src="./admin/upload/<?php echo $row['post_img'];?>" alt="post-image"/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo $row['post_id'];?>"><?php echo $row['title'];?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?cid=<?php echo $row['category'];?>'><?php echo $row['category_name'];?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date'];?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo $row['post_id'];?>">read more</a>
            </div>
        </div>
        <?php 
            }//for while loop
        }//for if loop
        ?>
    </div>
    <!-- /recent posts box -->
</div>
