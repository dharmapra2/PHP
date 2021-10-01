 
 <?php
 include './curd/sessionCheck.php';
include 'header.php';
?>
    <!-- dashboard contents -->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-3 col-md-3">
                <div class="list-group small">
                    <div class="list-group-item active">Employee Data</div>
                    <a href="#" class="list-group-item" data-toggle="modal" data-target="#add_employee">Add Employee</a>
                    <a href="employees-list.php" class="list-group-item">View all Employees</a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <table class="table table-striped table-hover bg-light small">
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                include './curd/config.php';
                   $sql=("select eid,ename,email from employee");
                   $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                    if(mysqli_num_rows($check)>0)
                    {  
                        while($data=mysqli_fetch_assoc($check)){ 
                ?>
                    <tr>
                        <td><?php echo $data['eid']?></td>
                        <td><?php echo $data['ename']?></td>
                        <td><?php echo $data['email']?></td>
                        <td><a href="#" data-toggle="modal" data-target="#employee_details1" class="btn btn-sm btn-block btn-info" onclick="test(<?php echo $data['eid']?>)" >Details</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#employee_edit_details1" class="btn btn-sm btn-block btn-warning" onclick="editEmp(<?php echo $data['eid']?>)">Edit</a></td>
                        <td><a href="#" class="btn btn-sm btn-block btn-danger" onclick="confirm('Are you sure you want to delete \' <?php echo $data['ename'];?> \'?');">Delete</a></td>
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

    <!-- Add Employee Modal -->
    <div class="modal fade" id="add_employee" tabindex="-1" aria-labelledby="add_employee" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Employee Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="./curd/employee.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="ename" class="form-control form-control-sm" placeholder="Employee Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Employee Email ID" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="ph_no" class="form-control form-control-sm" placeholder="Employee Phone Number" required>
                    </div>
                    <div class="mb-3">
                        <input type="date" name="date" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-3">
                       
                        <select name="jid"  class="form-control form-control-sm">
                            <option value=""selected disabled>Selecct Job Profile</option>
                            <?php
                            include './curd/config.php';
                            $sql=("select jid,jname from job");
                            $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                            if(mysqli_num_rows($check)>0)
                            {
                                while($data=mysqli_fetch_assoc($check)){
                            ?>
                            <option value="<?php echo $data['jid'];?>"><?php echo $data['jname'];?></option>
                            <?php
                                }
                            }
                            ?>
                            </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success btn-block">Add New Employee</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Details Model -->
    <div class="modal fade" id="employee_details1" tabindex="-1" aria-labelledby="employee_details1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="emp">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    include './curd/config.php';
                    $sql=("select e.eid,e.ename,e.jdate,e.email,e.ph_no,j.jname from employee e inner join job j where e.jid=j.jid");
                    $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                    $array_obj_key = array();
                    $array_obj = array();
                    if(mysqli_num_rows($check)>0)
                    {
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

    <!-- Edit Employee Detaisl -->
    <div class="modal fade" id="employee_edit_details1" tabindex="-1" aria-labelledby="employee_edit_details1" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Employee Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <?php
                    include './curd/config.php';
                    $sql=("select e.eid,e.ename,e.jdate,e.email,e.ph_no,j.jid,j.jname from employee e inner join job j where e.jid=j.jid");
                    $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                    $sql1=("select jid,jname from job");
                    $check1=mysqli_query($conn,$sql1) or die("data can't fatch from db.");
                    $array_obj = array();
                    $job_name_array = array();
                    if(mysqli_num_rows($check)>0)
                    {
                        foreach($check as $val){
                            array_push($array_obj,$val);
                        }
                        $array_obj = json_encode($array_obj);
                    }
                    foreach($check1 as $val){
                        array_push($job_name_array, $val);
                    }
                   $job_name_array =  json_encode($job_name_array);
                ?>
                <div id="editform">

                </div>
            </div>
        </div>
        </div>
    </div>
    <script type="text/javascript">
            job_name = <?php echo $job_name_array; ?>;
            job_name.forEach(val => {console.log(val);});
            php_array_obj = <?php echo ($array_obj); ?>;
            php_array_obj.forEach(val => {
                console.log(val);
            });
            function test(id){
                table = document.createElement('table');
                table.className = "table table-bordered";
                table.id = "emptab";
                table.innerHTML = "";
                result = 0
                document.getElementById('emptabdiv').innerHTML = "";
                php_array_obj.forEach(val => {
                    console.log("value : "+val);
                    if(val.eid == id){
                        table.innerHTML ="<tr><th>ID</th><td>"+val.eid+"</td></tr><tr><th>Joining Date</th><td>"+val.jdate+"</td></tr><tr><th>Name</th><td>"+val.ename+"</td></tr><tr><th>Email</th><td>"+val.email+"</td></tr><tr><th>Phone </th><td>+91"+val.ph_no+"</td></tr><tr><th>Job</th><td>"+val.jname+"</td></tr>";
                        document.getElementById('emptabdiv').appendChild(table);
                        console.log("Value of the "+val); 
                        result = val;
                    } 
                });
            }
            function editEmp(id){
                form = document.createElement('form');
                form.action = "./curd/updateEmp.php";
                form.method='POST';
                form.innerHTML = "";
                str = "";
                job_name.forEach(val =>{str = str+"<option value='"+val.jid+"'>"+val.jname+"</option>"});
                result = 0
                document.getElementById('editform').innerHTML = "";
                php_array_obj.forEach(val => {
                    job=val;
                    if(val.eid == id){
                        form.innerHTML ="<div class='mb-3'><input type='text' name='eid' class='form-control' value='"+val.eid+"'></div><div class='mb-3'><input type='date' name='jdate' class='form-control' value='"+val.jdate+"'></div><div class='mb-3'><input type='text' class='form-control' name='ename' value='"+val.ename+"'></div><div class='mb-3'><input type='email' name='email' class='form-control' value='"+val.email+"'></div><div class='mb-3'><input type='text' name='ph_no' class='form-control' value='"+val.ph_no+"'></div><div class='mb-3'><select name='jid' class='form form-control form-control-sm'><option value='"+val.jid+"'>"+val.jname+"</option>"+str+"</select></div><div class='mb-3'><input type='submit' name='submit' value='Update Employee'  class='btn btn-sm btn-success btn-block'></div>";
                        document.getElementById('editform').appendChild(form);
                        console.log("Value of the "+val); 
                        result = val;
                    } 
                });
            }
        </script>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" ></script>
  </body>
</html>
