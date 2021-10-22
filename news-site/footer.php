<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                 <?php
                    date_default_timezone_set("Asia/Kolkata");
                ?>
                <?php
                    include "config.php";
                    $sql= "select * from settings";
                    /* in above ,we do 2 times left joining by table aliases*/
                    $result= mysqli_query($conn,$sql) or die("Settings Query failed..");
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        { 
                ?>
                <span>&copy;Copyright 2021-<?php echo date("y");?><?php echo $row['footer_desc'];?></a></span>
                <?php   }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
