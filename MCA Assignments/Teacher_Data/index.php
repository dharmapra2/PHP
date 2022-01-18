<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type = "text/javascript"   
src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.  
min.js">  
      </script> 
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- dashboard contents -->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-3 col-md-3">
                <div class="list-group small">
                    <div class="list-group-item active">Teacher Data</div>
                    <a href="#" class="list-group-item" data-bs-toggle="modal" data-bs-target="#add_teacher">Add Teacher</a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <table class="table table-striped table-hover bg-light small">
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Teacher Name</th>
                        <th>subject Name</th>
                        <th>Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                include './curd/config.php';
                   $sql=("select ID,name,sub_name from teacher");
                   $check=mysqli_query($conn,$sql) or die("data can't fatch from db.");
                    if(mysqli_num_rows($check)>0)
                    {  
                        while($data=mysqli_fetch_assoc($check)){ 
                ?>
                    <tr>
                        <td><?php echo $data['ID']?></td>
                        <td><?php echo $data['name']?></td>
                        <td><?php echo $data['sub_name']?></td>
                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#Teacher_details1" class="btn btn-sm btn-block btn-info" onclick="test(<?php echo $data['ID']?>)" >Details</a></td>
                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#Teacher_edit_details1" class="btn btn-sm btn-block btn-warning editBtn">Edit</a></td>
                        <td><a href="./curd/deleteEmp.php?id=<?php echo $data['ID']; ?>" class="btn btn-sm btn-block btn-danger" onclick="return confirm('Are you sure you want to delete \' <?php echo $data['name'];?> \'?');">Delete</a></td>
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
    <!-- Add Teacher Modal -->
    <div class="modal fade" id="add_teacher" tabindex="-1" aria-labelledby="add_teacher" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Teacher Details</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="./curd/addTeacher.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="age" class="form-control form-control-sm" placeholder="Enter your age" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" name="ph_no" class="form-control form-control-sm" placeholder="Phone Number" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="sub_name" class="form-control form-control-sm" placeholder="Subject Name" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success btn-block">Add New Teacher</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="Teacher_details1" tabindex="-1" aria-labelledby="Teacher_details1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Teacher Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
                <div id="emptabdiv"> </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Teacher_edit_details1" tabindex="-1" aria-labelledby="Teacher_edit_details1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
                <div id="emptabdiv"> </div>
            </div>
        </div>
    </div>

    <script type = "text/javascript">  
         $(document).ready(function(){  
             $('.editBtn').on('click',function()){
                 $('#Teacher_edit_details1').modal('show');
             }
         });  
    </script>    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>