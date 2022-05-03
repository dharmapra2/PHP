<?php 
    if(isset($_POST['submit'])){
        print_r($_POST);
        $start_date=date('d-M-Y',strtotime($_POST['c_in_date']));
        $end_date=date('d-M-Y',strtotime($_POST['c_out_date']));
        //connect to database
        $name=$_POST['name'];
        $tele=$_POST['tele'];
        $address=$_POST['address'];
        $country=$_POST['country'];
        $Pay_status=$_POST['Pay_status'];
        $total_cost=$_POST['total_cost'];
        $Pay_status=$_POST['Pay_status'];
        $Pay_mode=$_POST['Pay_mode'];
        $c_in_date=$_POST['c_in_date'];
        $c_out_date=$_POST['c_out_date'];
        $conn=mysqli_connect('localhost','root','','internship') or die("conn failed... ");
        $sql="INSERT INTO `printshastra`(`name`, `tele`, `address`, `country`, `check in date`, `check out date`, `payment_status`, `payment_mode`, `totalcost`) VALUES ('{$name}','{$tele}','{$address}','{$country}','{$c_in_date}','{$c_out_date}','{$Pay_status}','{$Pay_mode}','{$total_cost}')";
        $result=mysqli_query($conn,$sql) or die("add failed... ");
        $_POST=[];
        $sql='';
        if($result){
          echo '<div class="alert alert-success alert-dismissible m-2">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Success!</strong> Your Data has added.
          </div>';          
        }else{
          echo '
          <div class="alert alert-warning alert-dismissible m-2">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Failed!</strong> You  data has alrady  <a href="#" class="alert-link"> added into the DB.</a>.
          </div>';
        }
        $result="";
        header("Location: http://localhost/internship_Assignment/");
    }
?>