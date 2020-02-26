<?php

include './dbconnection.php';

$OID = $_POST['OID'];
$mode = $_POST['mode'];

if ($mode == 'Insert/Update') {
    $typeofofficer1 = $_POST['typeofofficer1'];
    $typeofofficer2 = $_POST['typeofofficer2'];
    $typeofofficer3 = $_POST['typeofofficer3'];


    $license1 = $_POST['license1'];
    $license2 = $_POST['license2'];
    $license3 = $_POST['license3'];

    $expiry1 = $_POST['expiry1'];
    $expiry2 = $_POST['expiry2'];
    $expiry3 = $_POST['expiry3'];

  


    $sql = "SELECT * FROM `extralicense` where `OID`='" . $OID . "'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $sql = "UPDATE `extralicense` SET `type1`='" . $typeofofficer1 . "',`license1`='" . $license1 . "',`expiry1`='" . $expiry1 . "',`type2`='" . $typeofofficer2 . "',`license2`='" . $license2 . "',`expiry2`='" . $expiry2 . "',`type3`='" . $typeofofficer3 . "',`license3`='" . $license3 . "',`expiry3`='" . $expiry3 . "' WHERE `OID`=" . $OID . "";

        if (mysqli_query($connect, $sql)) {
            echo 'Your license has been updated succesfully';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        }
    } else {

        $sql = "INSERT INTO `extralicense`(`OID`,`type1`, `license1`, `type2`, `license2`, `type3`, `license3`,`expiry1`,`expiry2`,`expiry3`) VALUES ('" . $OID . "','" . $typeofofficer1 . "','" . $license1 . "','" . $typeofofficer2 . "','" . $license2 . "','" . $typeofofficer3 . "','" . $license3 . "','" . $expiry1 . "','" . $expiry2 . "','" . $expiry3 . "')";

        if (mysqli_query($connect, $sql)) {
            echo "Your licenses has been addeded successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }
} elseif ($mode == 'Fetch') {

    $sql = "SELECT * FROM `extralicense` WHERE `OID`='" . $OID . "'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        echo json_encode($row);
    } else {
        echo 'No Data Found';
    }
}







