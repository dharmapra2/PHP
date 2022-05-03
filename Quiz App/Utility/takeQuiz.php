<?php
require_once "./header.php";
//----------Pagination-----------------------------------------------------
if(isset($_GET['page'])){
  $page=$_GET['page'];
}
else{
  $page=1;
  $_SESSION['ans_key']=array();
  $_SESSION['ans_val']=array();
  $_SESSION['arr_mark']=array();
}
$sql="select name from user_ac where uid='{$_SESSION['userName']}'";
//   echo $sql ;
$tot=mysqli_num_rows(mysqli_query($conn,"select opt1 from quiz;"));

// set page if number is -ve then 1 or much larger then total pages from get method
$page=($page<=-1)?1:($page>=$tot?$tot:$page);

$limit=4;
$offset=($page-1)*$limit;
// sql for fetching all data
$sql= "select * from quiz order by Question limit {$offset},{$limit}";

//calculating the answer------------------------------------------------------
$answer=[];//for total questions
$sql_ans="select ID,answer from quiz order by Question";
$result=mysqli_query($conn,$sql_ans)or die(mysqli_error());

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $answer+=[$row['ID']=>$row['answer']];
  }
}

// for click on next button -----------------------------------------------------
if(isset($_POST['next']) && !empty($_POST['opt'])){
  $p=$page+1;
  foreach($_POST['opt'] as $key=>$val){
    array_push($_SESSION['ans_key'],$key);
    array_push($_SESSION['ans_val'],$val);
  }
  $_SESSION['arr_mark']=array_combine($_SESSION['ans_key'],$_SESSION['ans_val']);
  header("Location: {$hostName}Utility/takeQuiz.php?page=$p");
}else if(isset($_POST['next']) && empty($_POST['opt'])){
  echo '
    <div class="alert alert-warning alert-dismissible m-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>You did not select </strong> nothing !.<a href="#" class="alert-link"></a>.
    </div>';
}


// for click on submit button ---------------------------------------------
if(isset($_POST['submit']) && !empty($_POST['opt'])){
  unset($_POST['next']);
  foreach($_POST['opt'] as $key=>$val){
    array_push($_SESSION['ans_key'],$key);
    array_push($_SESSION['ans_val'],$val);
  }
  $_SESSION['arr_mark']=array_combine($_SESSION['ans_key'],$_SESSION['ans_val']);
  $options=$_SESSION['arr_mark'];
  foreach($options as $key=>$val){
      if(array_search($val,$answer)==array_search($val,$options)){
      $_SESSION['score']++;
    }
  }
  $score=$_SESSION['score'];
  if($score){
    echo '<div class="alert alert-success alert-dismissible m-2">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Congts!&#128526;</strong> Your score is '.$score.' out of '.count($answer).' <a href="./takeQuiz.php" class="alert-link p-1">Click To retake.</a>
    </div>';
  }else{
    echo '
    <div class="alert alert-warning alert-dismissible m-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Beter luck next time &#128528;!</strong> Your score is '.$score.' <a href="./takeQuiz.php" class="alert-link p-1"> Click To retake.</a>.
    </div>';
  }
  // after submiting score should be 0 again
  // unset($_POST['submit']);
  $_SESSION['score']=0;
}else if(isset($_POST['submit']) && empty($_POST['opt'])){
  echo '
    <div class="alert alert-warning alert-dismissible m-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>You did not select </strong> nothing !.<a href="#" class="alert-link"></a>.
    </div>';
}

// echo "<pre>";
// print_r($_SESSION['arr_mark']);
// echo "</pre>";
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
                                      <?php 
                                      if(key_exists($row['ID'],$_SESSION['arr_mark'])){
                                        $corr_ans= $_SESSION['arr_mark'][$row['ID']];
                                      }else{
                                        $corr_ans="";
                                      }
                                      ?>
                                      <div class="col-sm-auto form-check">
                                        <input class="form-check-input" type="radio" name="opt[<?php echo $row['ID'];?>]" value="<?php echo $row['opt1'];?>" id="gridRadios1" <?php echo ($corr_ans==$row['opt1'])? 'checked':''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                          <?php echo htmlspecialchars_decode($row['opt1']);?>
                                        </label>
                                      </div>
                                      <div class="col-sm-auto form-check">
                                        <input class="form-check-input" type="radio" name="opt[<?php echo $row['ID'];?>]" value="<?php echo $row['opt2'];?>" id="gridRadios2" <?php echo ($corr_ans==$row['opt2'])? 'checked':''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                          <?php echo htmlspecialchars_decode($row['opt2']);?>
                                        </label>
                                      </div>
                                      <div class="col-sm-auto form-check">
                                        <input class="form-check-input" type="radio" name="opt[<?php echo $row['ID'];?>]" value="<?php echo $row['opt3'];?>" id="gridRadios3" <?php echo ($corr_ans==$row['opt3'])? 'checked':''; ?>>
                                        <label class="form-check-label" for="gridRadios3">
                                          <?php echo htmlspecialchars_decode($row['opt3']);?>
                                        </label>
                                      </div>
                                      <div class="col-sm-auto form-check">
                                        <input class="form-check-input" type="radio" name="opt[<?php echo $row['ID'];?>]" value="<?php echo $row['opt4'];?>" id="gridRadios4" <?php echo ($corr_ans==$row['opt4'])? 'checked':''; ?>>
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
                        
                        
                        echo '<div class="link-primary d-flex justify-content-between m-1">';
                       if($page>1){
                           echo '<a class="btn btn-outline-success justify-content-start" href="./takeQuiz.php?page='.($page-1).'">Prev</a>';
                       }
                       if($total_page>$page){
                          echo '<a class="justify-content-end" href="./takeQuiz.php?page='.($page+1).'"><input type="submit" class="btn btn-outline-success" name="next" value="Next"></a>';
                       }
                       echo '</div>';
                       if($total_page==$page){
                        echo '<div class="link-primary d-grid m-3 col-6 mx-auto"><input type="submit" name="submit" class="btn btn-success" value="submit the quiz"></div>';
                       }
                      //  if(isset($_POST['opt'])){
                      //   foreach($_POST['opt'] as $key=>$val){
                      //     array_push($_SESSION['ans_key'],$key);
                      //     array_push($_SESSION['ans_val'],$val);
                      //   }
                      // }
                    }
                        ?>
                    </form>
              </div>
          </div>
</div>
<?php
  mysqli_close($conn);
  include "./footer.php";
?>