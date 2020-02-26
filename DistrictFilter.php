<?php

include "./dbconnection.php";

$postcode =$_POST['postcode'];

$sql = "SELECT * FROM `postcode` WHERE Postcode='$postcode'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

if (mysqli_num_rows($result) > 0) {
    
//    echo $row['Region'];
    echo json_encode($row);
} else {
    echo 'No Data Found';
}
