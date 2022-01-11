<?php

$today = date("Y-m-d");
$conn =new mysqli('localhost', 'root', '' , 'leaveapp');

// Check record exists
$checkRecord = mysqli_query($conn,"SELECT * FROM employeeleaveapplicationdetails WHERE lLeaveToDate < ".$today);
$totalrows = mysqli_num_rows($checkRecord);

    if($totalrows > 0){
        // Update record
        $query = "UPDATE employeeleaveapplicationdetails SET lExpired = '1' WHERE lLeaveToDate < ".$today;

        mysqli_query($conn,$query);

        var_dump($query); exit;


        echo 1;
        exit;
    }else{
        echo 0;
        exit;
    }


$conn->close();

