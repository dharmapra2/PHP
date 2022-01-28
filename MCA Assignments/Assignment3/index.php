<?php
$arr=[
    "Andhra Pradesh" =>["Hyderabad"=>["Telugu","Urdu"]],
    "Arunachal Pradesh" =>["Itanagar"=>["Miji","Apotanji","Merdukpen","Tagin","Adi","Honpa","Banging-Nishi"]],
    "Assam" =>["Dispur"=>["Assamese"]],
    "Bihar" =>["Patna"=>["Hindi"]],
    "Goa" =>["Panaji"=>["Marathi","Konkani"]],
    "Gujarat" =>["Gandhinagar"=>["Gujarati"]],
    'Haryana' =>["Chandigarh"=>["Hindi"]],
    "Himachal Pradesh" =>["Shimla"=>["Hindi","Pahari"]],
    "Jammu & Kashmir" =>["Srinagar"=>["Kashmiri","Dogri","English","Hindi","Urdu"]],
    "Karnataka" =>["Bengaluru"=>["Kannada"]],
    "Kerala" =>['Thiruvananthapuram'=>["Malayalam"]],
    "Madhya Pradesh" =>["Bhopal"=>["Hindi"]],
    "Maharashtra" =>['Mumbai'=>["Marathi"]],
    "Manipur" =>["Imphal"=>["Manipuri"]],
    "Meghalaya" =>['Shillong'=>["Khashi","Jaintia","Garo"]],
    "Mizoram" =>["Aizawl"=>["Mizo","English"]],
    'Nagaland' =>['Kohima'=>["Ao","Konyak","Angami","Sema","Lotha"]],
    'Orissa' =>['Bhubaneswar'=>["Oriya","Sambalpuri"]],
    "Punjab" =>['Chandigarh'=>["Punjabi"]],
    'Rajasthan' =>['Jaipur'=>["Rajasthani","Hindi"]],
    "Sikkim" =>['Gangtok'=>["Bhutia","Hindi","Nepali","Lepcha","Limbu"]],
    "Tamil Nadu" =>['Chennai'=>["Tamil"]],
    "Tripura" =>['Agartala'=>["Bengali","Tripuri","Manipuri","Kakborak"]],
    "Uttar Pradesh" =>['Lucknow'=>["Hindi"]],
    "West Bengal" =>['Kolkata'=>["Bengali"]],
    "Chhattisgarh" =>['Raipur'=>["Hindi"]],
    'Uttarakhand' =>['Dehradun'=>["Hindi"]],
    'Jharkhand' =>['Ranchi'=>["Hindi"]],
    "Telangana" =>['Hyderabad'=>["Telugu","Urdu"]],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width","initial-scale=1.0">
    <title>State and their Capitals</title>
    <meta name="keywords" content="HTML,CSS,JavaScript,PHP,Bootstrap">
    <meta name="description" content="For MCA PHP Assignment 3">
    <meta name="author" content="Dharma Pradhan">
    <link rel="stylesheet" href="./bootstrap.min.css">
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
        <h1>States And Their Capitals</h1>
    </div>
    <table class="table table-bordered table-responsive table-striped">
            <thead class="container-sm">
                <tr class="form-group bg-primary">
                    <td class="form-label text-center">SL No.</td>
                    <td class="form-label text-center">State Name</td>
                    <td class="form-label text-center">Click to get Name</td>
                </tr>
            </thead>
            <tbody class="container-sm">
                <?php
                // echo "<pre>";
                // print_r($arr);
                // echo "</pre>";
                // foreach($arr as $state=>$capital){
                //     echo $state."- ";
                //     foreach($capital as $capi=>$lang){
                //         echo $capi."[";
                //         echo implode(" ",$lang);
                //         echo "]<br>";
                //     }
                // }
                // foreach($arr as $state=>list($capital=>$langu)){
                //     print_r($capital);
                // }
                // die;
                $no=1;
                foreach($arr as $state=>$capital){
                    foreach($capital as $capi=>$lang){
                        //here we use implode for array to string
                        $str=implode(" ",$lang);
                        echo '<tr class="text-center font-weight-bold">
                                <td><strong>'.$no.'</strong></td>
                                <td><strong>'.$state.'</strong></td>
                                <td><a href="getPhp.php?State='
                                .$state.'&capi='.$capi.'&
                                languages='.$str.'
                                "class="alert-link" style="color: white;">
                                <button type="button" 
                                class="btn btn-danger" 
                                id="btn2">Click</button></a></td>
                            </tr>';
                        $no++;
                    }
                }
                ?>
            </tbody>
    </table>
</body>
</html>