<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                 <?php 
                    include "config.php";
                    $limit=10;//for pagination.
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                        //for initial page
                    }
                    $offset=($page-1) * $limit;//pagination formula
                    /* select query of post table with offset and limit */
                    if($_SESSION["user_role"]== '1'){
                        /*Here we check only admin. If user is admin then he can visible all posts from all users.  */
                        $sql= "select p.post_id,p.title,p.post_date,u.username,c.category_id,c.category_name from post p 
                        left join category c on p.category=c.category_id
                        left join user u on p.author=u.user_id 
                        order by p.post_id desc limit {$offset},{$limit}";
                        /* in above ,we do 2 times left joining by table aliases*/
                    }elseif($_SESSION["user_role"]== '0'){
                        /*Here we check only normal user. If user is normal user then he can visible his/her posts only.  */
                        $sql= "select p.post_id,p.title,p.post_date,u.username,c.category_id,c.category_name from post p 
                        left join category c on p.category=c.category_id
                        left join user u on p.author=u.user_id 
                        where p.author= {$_SESSION['user_id']}
                        order by p.post_id desc limit {$offset},{$limit}";
                        /* in above ,we do 2 times left joining by table aliases.. And also checking session variable i.e,user_id from index.php file for checking specific author only.
                        */
                    }
                   
                        $result= mysqli_query($conn,$sql) or die("Query failed..");
                    if(mysqli_num_rows($result)>0)
                    {
                 ?>
                  <table class="table content-table table-bordered  table-sm table-striped table-responsive">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php
                          while($row=mysqli_fetch_assoc($result))
                          { 
                          ?>
                          <tr>
                              <td class='id'><?php echo $row['post_id'];?></td>
                              <td><?php echo $row['title'];?></td>
                              <td><?php echo $row['category_name'];?></td>
                              <td><?php echo $row['post_date'];?></td>
                              <td><?php echo $row['username'];?></td>
                              <td class='edit'><a href="update-post.php?id=<?php echo $row['post_id']; ?>"><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href="delete-post.php?id=<?php echo $row['post_id']; ?>&cat_id=<?php echo $row['category_id']; ?>"><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php }?>
                      </tbody>
                  </table>
                  <?php 
                   $sql1="select *from post";
                   $result1= mysqli_query($conn,$sql1) or die("Query failed..");
                   if(mysqli_num_rows($result1)>0)
                   {
                       $total_records=mysqli_num_rows($result1);
                      //only showing 7 record
                       $total_page=ceil($total_records / $limit);

                       echo '<ul class="pagination admin-pagination">';
                       if($page>1){
                           //for prev button
                           echo '<li><a href="post.php?page='.($page-1).'">Prev</a></li>';
                       }
                       for($i=1;$i<=$total_page;$i++){
                           //for active page
                           if($i==$page){
                               $active="active";
                           }
                           else{
                               $active="";
                           }
                           echo '<li class="'.$active.'"><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                       }
                       if($total_page>$page){
                           //for next button
                           echo '<li><a  href="post.php?page='.($page+1).'">Next</a></li>';
                       }
                       echo '</ul>';
                   }
                }else
                {
                    /*initialy user have record. So we only showing empty table with instruction. */
                    ?>
                    <table class="table content-table table-bordered  table-sm table-striped table-responsive">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    </table>
                     <p class="col-md"><h3 class="text-center font-weight-bold"> No Records avilabe.<br/>Add some stuff.</h3</p>
                    <?php } ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
