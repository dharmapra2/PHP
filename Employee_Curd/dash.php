<?php
include './curd/sessionCheck.php';
include 'header.php';
?>
    <!-- dashboard contents -->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-3 col-md-3">
                <div class="card card-border">
                <div class="card-body">
                <?php
                     include './curd/config.php';
                   $sql=("select count(eid)as no_of_emp from employee");
                   $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                    if(mysqli_num_rows($check)>0)
                    {  
                        while($data=mysqli_fetch_assoc($check)){ 
                ?>
                        <h4 class="card-title"><?php echo $data['no_of_emp'];?> <small class="text-muted">Employees</small></h4>
                    <?php
                        }
                    }
                    ?> </div>
                    <div class="list-group list-group-flush">
                        <a href="employees-list.php" class="list-group-item list-group-item-primary">View all</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card card-border">
                <div class="card-body">
                    <?php
                        include './curd/config.php';
                        $sql=("select count(jid)as no_of_job from job");
                     $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                        if(mysqli_num_rows($check)>0)
                        { 
                            while($data=mysqli_fetch_assoc($check))
                            { 
                     ?>
                        <h4 class="card-title"><?php echo $data['no_of_job'];?>  <small class="text-muted">Jobs</small></h4>
                        <?php
                        }
                    }
                    ?>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="jobs-list.php" class="list-group-item list-group-item-primary">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dashboard contents -->

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>