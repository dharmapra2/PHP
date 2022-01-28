<?php
$arr=[
    "Andhra Pradesh" => "Hyderabad",
    "Arunachal Pradesh" => "Itanagar",
    "Assam" => "Dispur",
    "Bihar" => "Patna",
    "Goa" => "Panaji",
    "Gujarat" => "Gandhinagar",
    'Haryana' => "Chandigarh",
    "Himachal Pradesh" => "Shimla",
    "Jammu & Kashmir" => "Srinagar",
    "Karnataka" => "Bengaluru",
    "Kerala" => 'Thiruvananthapuram',
    "Madhya Pradesh" => "Bhopal",
    "Maharashtra" => 'Mumbai',
    "Manipur" => "Imphal",
    "Meghalaya" => 'Shillong',
    "Mizoram" => "Aizawl",
    'Nagaland' => 'Kohima',
    'Orissa' => 'Bhubaneswar',
    "Punjab" => 'Chandigarh',
    'Rajasthan' => 'Jaipur',
    "Sikkim" => 'Gangtok',
    "Tamil Nadu" => 'Chennai',
    "Tripura" => 'Agartala',
    "Uttar Pradesh" => 'Lucknow',
    "West Bengal" => 'Kolkata',
    "Chhattisgarh" => 'Raipur',
    'Uttarakhand' => 'Dehradun',
    'Jharkhand' => 'Ranchi',
    "Telangana" => 'Hyderabad'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State and their Capitals</title>
    <meta name="keywords" content="HTML,CSS,JavaScript,PHP,Bootstrap">
    <meta name="description" content="For MCA PHP Assignment">
    <meta name="author" content="Dharma Pradhan">
    <link rel="stylesheet" href="/MCA Assignments/bootstrap.min.css">
    <style>
        body{
            background-color: lavenderblush;
        }
        table{
            margin-top: 2rem;
        }
    </style>
</head>
<body class="container-sm">
    <div class="container-fluid bg-primary text-white text-center">
        <h1>States And Thier Capitals</h1>
    </div>
    <table class="table table-bordered table-responsive">
            <thead class="container-sm">
                <tr class="form-group bg-primary">
                    <td class="form-label">SL No.</td>
                    <td class="form-label">State Name</td>
                    <td class="form-label">Click to get Name</td>
                </tr>
            </thead>
            <tbody class="container-sm">
                <?php
                $no=1;
                    foreach($arr as $key=>$val){
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$key.'</td>
                                <td><a href="getPhp.php?State='.$key.'&capi='.$val.'"class="alert-link" style="color: white;"><button type="button" class="btn btn-danger" id="btn2">Click</button></a></td>
                            </tr>';
                        $no++;
                    }
                ?>
            </tbody>
    </table>
</body>
</html>