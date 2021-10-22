<?php include "header.php"; 
//only for restricate normal user do any stuff
if($_SESSION["user_role"]== '0'){
    header("Location: {$hostName}/admin/post.php");
}
//---------------------------------------------------
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
            <?php 
                    include "config.php";
                    $limit=5;//for pagination.
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                        //for initial page
                    }
                    $offset=($page-1) * $limit;//pagination formula
                    $sql= "select * from category order by category_id desc limit {$offset},{$limit}";
                    $result= mysqli_query($conn,$sql) or die("Query failed..");
                    if(mysqli_num_rows($result)>0)
                    {
            ?>
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                          while($row=mysqli_fetch_assoc($result))
                          { 
                          ?>
                        <tr>
                            <td class='id'><?php echo $row['category_id'];?></td>
                            <td><?php echo $row['category_name'];?></td>
                            <td><?php echo $row['post'];?></td>
                            <td class='edit'><a href='update-category.php?cat_id=<?php echo $row['category_id']; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href="delete-category.php?cat_id=<?php echo $row['category_id']; ?>"><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php 
                         $sql1="select *from category";
                         $result1= mysqli_query($conn,$sql1) or die("Query failed..");
                         if(mysqli_num_rows($result1)>0)
                         {
                             $total_records=mysqli_num_rows($result1);
                            //only showing 5 limit of record
                             $total_page=ceil($total_records / $limit);
     
                             echo '<ul class="pagination admin-pagination">';
                             if($page>1){
                                 //for prev button
                                 echo '<li><a href="category.php?page='.($page-1).'">Prev</a></li>';
                             }
                             for($i=1;$i<=$total_page;$i++){
                                 //for active page
                                 if($i==$page){
                                     $active="active";
                                 }
                                 else{
                                     $active="";
                                 }
                                 echo '<li class="'.$active.'"><a href="category.php?page='.$i.'">'.$i.'</a></li>';
                             }
                             if($total_page>$page){
                                 //for next button
                                 echo '<li><a  href="category.php?page='.($page+1).'">Next</a></li>';
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
                        <?php
                     }
                      ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>