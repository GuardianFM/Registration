<?php

include './dbconnection.php';

$mode = $_POST['mode'];

if ($mode == "fetch-img") {
    $id = $_POST['id'];

    $sql = "SELECT `file` FROM tbl_officers_employement WHERE id='$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $file = $row['file'];
        echo $file;
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "fetch-img-2") {

    $id = $_POST['id'];

    $sql = "SELECT `SIA_Front` FROM tbl_officers_document WHERE oid='$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $SIA_Front = $row['SIA_Front'];
        echo $SIA_Front;
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "fetch-img-3") {

    $id = $_POST['id'];

    $sql = "SELECT `SIA_Rear` FROM tbl_officers_document WHERE oid='$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $SIA_Rear = $row['SIA_Rear'];
        echo $SIA_Rear;
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "fetch-img-4") {
    $id = $_POST['id'];

    $sql = "SELECT `Passport` FROM tbl_officers_document WHERE oid='$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $Passport = $row['Passport'];
        echo $Passport;
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "fetch-img-5") {
    $id = $_POST['id'];

    $sql = "SELECT `bill` FROM tbl_officers_document WHERE oid='$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $bill = $row['bill'];
        echo $bill;
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "fetch-img-6") {
    $id = $_POST['id'];

    $sql = "SELECT `other` FROM tbl_officers_document WHERE oid='$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $other = $row['other'];
        echo $other;
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "fetch-img-7") {
    $id = $_POST['id'];

    $sql = "SELECT `selfie` FROM tbl_officers_document WHERE oid='$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $selfie = $row['selfie'];
        echo $selfie;
    } else {
        echo 'No Data Found';
    }
}