<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills Details</title>
    <link rel="stylesheet" href='./css/bootstrap.min.css'>
    <style>
        body{
            background-color: lavenderblush;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Lucida Sans', 'Lucida Sans Regular';
            width:100vw;
        }
        div{
            width: 100vw !important;
        }
        table{
            margin-top:2rem !important;
            width: 98vw !important;
            text-align: justify;
        }
    </style>
</head>
<body class="container-fluid">
<div class="bg-primary text-white text-center">
        <h1>Internship Assignment</h1>
    </div>
        <table class="table table-bordered mt-5 table-responsive table-striped table-hover container-sm">
            <thead class='container-sm'>
              <tr class="thead-dark">
                <th>No.</th>
                <th>Name</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Country</th>
                <th>Check in Date</th>
                <th>Check out Date</th>
                <th>Payment Status</th>
                <th>Payment Mode</th>
                <th>Total Cost</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $conn=mysqli_connect('localhost','root','','internship') or die("conn failed... ");
                $sql="select * from printshastra";
                $result=mysqli_query($conn,$sql) or die("Retrive failed... ");
                if(mysqli_num_rows($result)>0)
                {
                    $i=1;
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['tele']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['country']; ?></td>
                                <td><?php echo date('d-M-Y',strtotime($row['check in date'])); ?></td>
                                <td><?php echo date('d-M-Y',strtotime($row['check out date'])); ?></td>
                                <td><?php echo $row['payment_status']?'Yes':'No'; ?></td>
                                <td><?php echo $row['payment_mode']; ?></td>
                                <td><?php echo 'Rs. '. $row['totalcost']; ?></td>
                            </tr>
                        <?php
                        $i++;
                    }
                }
            ?>
    </tbody>
    </table>
    <a href="./index.html" ><button type="button" class="btn btn-primary"> Click to Back Home Page</button></a>
</body>
</html>