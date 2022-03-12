<?php
  require_once "./header.php";
  if(isset($_POST['submit'])){
    $conn=mysqli_connect("localhost","root","","quizapp")or die("<a href=\"$hostName\"><button class=\"btn btn-primary\">Connection Failed..</button></a>");
    $hostName="http://localhost/MCA/Quiz%20App/";
    $list=$_POST['option'];
    unset($_POST['submit']);
    define("option",$list);
    $_POST['question']=htmlspecialchars(trim($_POST['question']));
    $_POST['Answer']=htmlspecialchars(trim($_POST['Answer']),ENT_QUOTES);
    $no=1;
    foreach($_POST['option'] as $key=>$val){
      $_POST['option'][$no]=htmlspecialchars(trim($val),ENT_QUOTES);
      $no++;
    }
    
    // checking wether the post array is empty then exit with empty msg.
    $empty=(in_array(null,$_POST,true) || in_array('',$_POST,true))?"empty":"not empty";
    // print_r($_POST);
    // echo $empty;
    // die();
    $question=htmlspecialchars(trim($_POST['question']),ENT_QUOTES);
    $sql1="select Question from quiz where Question='{$question}'";
    $result1=mysqli_query($conn,$sql1) or die("Query failed..");

    if(mysqli_num_rows($result1)==0 && $empty!="empty"){
        $sql2="insert into quiz (Question,opt1,opt2,opt3,opt4,answer) values('{$question}',";
      foreach(option as $key => $val){
        $sql2.="'".htmlspecialchars(trim($val),ENT_QUOTES)."',";
      }
      $sql2.="'{$_POST['Answer']}')";
      $result2=mysqli_query($conn,$sql2) or die("add failed... ");
      if($result2){
        echo '<div class="alert alert-success alert-dismissible m-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> Your question has added.
        </div>';
      }else{
        echo '
        <div class="alert alert-warning alert-dismissible m-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Failed!</strong> You  Question has alrady  <a href="#" class="alert-link"> added into the DB.</a>.
        </div>';
      }
      $result2=$result1="";
    }else{
      echo '
      <div class="alert alert-warning alert-dismissible m-2">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Failed!</strong> Input fields can\'t be <a href="#" class="alert-link"> empty</a>.
      </div>';
    }
    mysqli_close($conn);
} 
?>
<div class="container-sm">
  <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="container-sm form mt-3" autocomplete="on">
    <div class="mb-1">
      <label for="question" class="form-label">Write your question here 🖌🖌👇</label>
      <input type="text" class="form-control form-control-sm" id="question" name="question">
     </div>
    <div class="mb-1">
      <label for="option" class="form-label">Put Option 1 👉</label>
      <input type="text" class="form-control-md" name="option[1]">
    </div>
    <div class="mb-1">
     <label for="option" class="form-label">Put Option 2 👉</label>
     <input type="text" class="form-control-md" name="option[2]">
    </div>
    <div class="mb-1">
     <label for="option" class="form-label">Put Option 3 👉</label>
     <input type="text" class="form-control-md" name="option[3]">
    </div>
    <div class="mb-1">
     <label for="option" class="form-label">Put Option 4 👉</label>
     <input type="text" class="form-control-md" name="option[4]">
    </div>
    <div class="mb-1">
     <label for="option" class="form-label">Correct Answer 👉</label>
     <input type="text" class="form-control-md" name="Answer">
    </div>
    <button type="reset" class="btn btn-warning">Cancel</button>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<?php
  include "./footer.php";
?>