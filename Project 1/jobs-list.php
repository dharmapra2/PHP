<?php
include './curd/sessionCheck.php';
include 'header.php';
?>
    <!-- dashboard contents -->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-3 col-md-3">
                <div class="list-group small">
                    <div class="list-group-item active">Jobs Data</div>
                    <a href="#" class="list-group-item" data-toggle="modal" data-target="#add_job">Add New Job</a>
                    <a href="jobs-list.php" class="list-group-item">View all Jobs</a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
            <table class="table table-striped table-hover bg-light small">
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Job Name</th>
                        <th>Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                <?php
                include './curd/config.php';
                   $sql=("select jid,jname from job");
                   $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                    if(mysqli_num_rows($check)>0)
                    {
                        while($data=mysqli_fetch_assoc($check)){
                            
                ?>
              
                    <tr>
                        <td><?php echo $data['jid']?></td>
                        <td><?php echo $data['jname']?></td>
                        <td><a href="#" data-toggle="modal" data-target="#job_details1" class="btn btn-sm btn-block btn-info" onclick="jobDEtails(<?php echo $data['jid']?>)">Details</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#job_edit_details1" class="btn btn-sm btn-block btn-warning" onclick="editJOb(<?php echo $data['jid']?>)">Edit</a></td>
                        <td><a href="#" class="btn btn-sm btn-block btn-danger" onclick="confirm('Are you sure you want to delete \' <?php echo $data['jname']?> Job \'?');">Delete</a></td>
                    </tr>
                <?php
                        }
                    }
                ?>
                </table>
            </div>
        </div>
    </div>
    <!-- dashboard contents -->

    <!-- Add Job Modal -->
    <div class="modal fade" id="add_job" tabindex="-1" aria-labelledby="add_job" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Job Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            
            </div>
            <div class="modal-body">
                <form action="./curd/addjob.php" method="POST"> 
                    <div class="mb-3">
                        <input type="date" name="jdate" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="jname" class="form-control form-control-sm" placeholder="Job Name" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success btn-block">Add New Job</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Job Details Model -->
    <div class="modal fade" id="job_details1" tabindex="-1" aria-labelledby="job_details1" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php
                    include './curd/config.php';
                    $sql=("select * from job");
                    $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                    $array_obj_key = array();
                    $array_obj = array();
                    if(mysqli_num_rows($check)>0)
                    {
                          /*foreach($check as $value){
                                foreach($value as $a){
                                    echo $a."<br>";
                                }
                                echo "<br><br>";
                            }*/
                        foreach($check as $val){
                            array_push($array_obj,$val);
                        }
                        $array_obj = json_encode($array_obj);
                    }
                ?>
                <div id="emptabdiv">

                </div>
        </div>
        </div>
    </div>

    <!-- Edit Job Detaisl -->
    <div class="modal fade" id="job_edit_details1" tabindex="-1" aria-labelledby="job_edit_details1" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Job</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <!-- <form>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" value="12-08-2020" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" value="Graphic Designer" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success btn-block">Update Job</button>
                    </div>
                </form> -->
                <?php
                    include './curd/config.php';
                    $sql=("select * from job");
                    $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                    $array_obj_key = array();
                    $array_obj = array();
                    if(mysqli_num_rows($check)>0)
                    {
                          /*foreach($check as $value){
                                foreach($value as $a){
                                    echo $a."<br>";
                                }
                                echo "<br><br>";
                            }*/
                        foreach($check as $val){
                            array_push($array_obj,$val);
                        }
                        $array_obj = json_encode($array_obj);
                    }
                ?>
                <div id="editform">

                </div>
            </div>
        </div>
        </div>
    </div>

    <script type="text/javascript">
            php_array_obj = <?php echo ($array_obj); ?>;
            php_array_obj.forEach(val => {
                console.log(val);
            });
            function jobDEtails(id){
                table = document.createElement('table');
                table.className = "table table-bordered";
                table.id = "emptab";
                table.innerHTML = "";
                result = 0
                document.getElementById('emptabdiv').innerHTML = "";
                php_array_obj.forEach(val => {
                    console.log("value : "+val);
                    if(val.jid == id){
                        table.innerHTML ="<tr><th>Job ID</th><td>"+val.jid+"</td></tr><tr><th>Date</th><td>"+val.jdate+"</td></tr><tr><th>Job Name</th><td>"+val.jname+"</td></tr>";
                        document.getElementById('emptabdiv').appendChild(table);
                        console.log("Value of the "+val); 
                        result = val;
                    } 
                });
            }
            function editJOb(id){
                form = document.createElement('form');
                // form.className = "table table-bordered";
                form.action = "./curd/updateJob.php";
                form.method='POST';
               form.innerHTML = "";
                result = 0
                document.getElementById('editform').innerHTML = "";
                php_array_obj.forEach(val => {
                    console.log("value : "+val);
                    if(val.jid == id){
                        form.innerHTML ="<div class='mb-3'><input type='text' name='jid' class='form-control' value='"+val.jid+"'></div><div class='mb-3'><input type='date' name='jdate' class='form-control' value='"+val.jdate+"'></div><div class='mb-3'><input type='text' class='form-control' name='jname' value='"+val.jname+"' required></div><div class='mb-3'><input type='submit' name='submit' value='Update Job'  class='btn btn-sm btn-success btn-block'></div>";
                        document.getElementById('editform').appendChild(form);
                    } 
                });
            }
            // <div class="mb-3">
            // <input type="text" class="form-control form-control-sm" value="12-08-2020" required>
            //         </div>
            //         <div class="mb-3">
            //             <input type="text" class="form-control form-control-sm" value="Graphic Designer" required>
            //         </div>
            //         <div class="mb-3">
            //             <button type="submit" class="btn btn-sm btn-success btn-block">Update Job</button>
            //         </div>
        </script>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
  </body>
</html>