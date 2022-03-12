<?php
require_once "./header.php";
if(!isset($_SESSION['score'])){
  $_SESSION['score']=0;
}
$opt=[];
// print_r($opt);
if(!isset($_POST['submit']) && !empty($_POST['opt'])){
  $options=$_POST['opt'];
  // $empty=empty($options)?"empty":"not empty";
  // echo $empty;
  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";
  $sql="select ID,answer from quiz order by Question";
  $result=mysqli_query($conn,$sql);
  $answer=[];
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      $answer+=[$row['ID']=>$row['answer']];
    }
  }
  // echo "<pre>";
  // print_r($options);
  // print_r($answer);
  // echo "</pre>";
  $count=0;
  foreach($options as $key=>$val){
      if(array_search($val,$answer)==array_search($val,$options)){
      $count++;
    }
  }
  if($count){
    echo '<div class="alert alert-success alert-dismissible m-2">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Congts!&#128526;</strong> Your score is '.$count.' out of '.count($answer).'
    </div>';
  }else{
    echo '
    <div class="alert alert-warning alert-dismissible m-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Beter luck next time &#128528;!</strong> Your score is '.$count.' <a href="#" class="alert-link"></a>.
    </div>';
  }
}
//----------Pagination-----------------------------------------
if(isset($_GET['page'])){
  $page=$_GET['page'];
}
else{
  $page=1;
}
if(isset($_GET['id'])&& isset($_GET['value'])){
  $opt[$_GET['id']]=$_GET['value'];
}
// print_r($opt);
// $total_page=count($answer);
$limit=1;
$offset=($page-1)*$limit;
$sql= "select * from quiz order by Question limit {$offset},{$limit}";
// echo $sql;
?>
<div class="container-fluid">
          <div class="row">
              <!-- <div class="col-md-12 text-center">
                  <h1 class="heading">All Posts</h1>
              </div> -->
              <div class="col-md-12 text-center">
                 <?php 
                    $result= mysqli_query($conn,$sql) or die("retriveing failed..");
                    if(mysqli_num_rows($result)>0)
                    {
                 ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="container-sm form mt-3" autocomplete="off">
                      <?php
                          $no=$offset+1;
                          while($row=mysqli_fetch_assoc($result))
                          { 
                          ?>
                            <figure class="container mb-3">
                                <blockquote class="text-start blockquote">
                                  <p><input type="hidden" name="<?php echo $row['ID'];?>"><?php echo $no." .";?>
                                  <input type="hidden" id="ques"><?php echo htmlspecialchars_decode($row['Question'])." ?";?></p>
                                </blockquote>
                                <fieldset class="container" >
                                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-2">
                                    <div class="col-sm-auto form-check">
                                      <input class="form-check-input" type="radio" name="opt[<?php echo $row['ID'];?>]" value="<?php echo $row['opt1'];?>" id="gridRadios1">
                                      <label class="form-check-label" for="gridRadios1">
                                        <?php echo htmlspecialchars_decode($row['opt1']);?>
                                      </label>
                                    </div>
                                    <div class="col-sm-auto form-check">
                                      <input class="form-check-input" type="radio" name="opt[<?php echo $row['ID'];?>]" value="<?php echo $row['opt2'];?>" id="gridRadios2">
                                      <label class="form-check-label" for="gridRadios2">
                                        <?php echo htmlspecialchars_decode($row['opt2']);?>
                                      </label>
                                    </div>
                                    <div class="col-sm-auto form-check">
                                      <input class="form-check-input" type="radio" name="opt[<?php echo $row['ID'];?>]" value="<?php echo $row['opt3'];?>" id="gridRadios3">
                                      <label class="form-check-label" for="gridRadios3">
                                        <?php echo htmlspecialchars_decode($row['opt3']);?>
                                      </label>
                                    </div>
                                    <div class="col-sm-auto form-check">
                                      <input class="form-check-input" type="radio" name="opt[<?php echo $row['ID'];?>]" value="<?php echo $row['opt4'];?>" id="gridRadios4">
                                      <label class="form-check-label" for="gridRadios4">
                                        <?php echo htmlspecialchars_decode($row['opt4']);?>
                                      </label>
                                    </div>
                                  </div>
                                </fieldset>
                            </figure>
                          <?php 
                          $no++;
                          }
                          ?>
                            <!-- <div class="link-primary d-grid m-3 col-6 mx-auto"><input type="submit" class="btn btn-success" value="submit the quiz"></div> -->
                        <?php 
                        $sql_for_page="select ID from quiz";
                        $total_records=mysqli_num_rows(mysqli_query($conn,$sql_for_page));
                        $total_page=ceil($total_records / $limit);
                        // echo $total_records." ".$total_page;
                        echo '<div class="link-primary d-flex justify-content-between m-1">';
                       if($page>1){
                           //for prev button
                           echo '<a class="btn btn-outline-success justify-content-start" href="./takeQuiz1.php?page='.($page-1).'">Prev</a>';
                       }
                      //  for($i=1;$i<=$total_page;$i++){
                      //      //for active page
                      //      if($i==$page){
                      //          $active="btn--outline-success";
                      //      }
                      //      else{
                      //          $active="";
                      //      }
                      //      echo '<li class="btn '.$active.'"><a href="./takeQuiz.php?page='.$i.'">'.$i.'</a></li>';
                      //  }
                       if($total_page>$page){
                           //for next button
                           if(isset($_POST['opt'])){
                            foreach($_POST['opt'] as $key=>$val){
                              $k=$key;
                              $value=$val;
                            }
                          }else{
                            $k='';
                            $value='';
                          }
                          echo '<a class="btn btn-outline-success justify-content-end" href="./takeQuiz1.php?page='.($page+1).'&id='.($k).'&value='.($value).'">Next</a>';
                       }
                       echo '</div>';
                       if($total_records==$page){
                        echo '<div class="link-primary d-grid m-3 col-6 mx-auto"><input type="submit" class="btn btn-success" value="submit the quiz"></div>';
                       }
                    }
                        ?>
                        <!-- <div class="link-primary d-grid m-3 col-6 mx-auto"><input type="submit" id="submit" class="btn btn-success" value="submit the quiz"></div> -->
                    </form>
              </div>
          </div>
</div>
<?php
  include "./footer.php";
?>