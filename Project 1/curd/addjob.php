 <?php
    include './config.php';
    $jname=$_POST['jname'];
    $jdate=$_POST['jdate'];
    
    $job_sql=("insert into job(jname,jdate) values('{$jname}','{$jdate}')");
    $result=mysqli_query($conn,$job_sql) or die("data can't insert into db.");
    header("Location: https://localhost/Project%201/jobs-list.php");
    
    mysqli_close($conn);
?>