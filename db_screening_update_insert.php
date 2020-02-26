<?php

include './dbconnection.php';
$id = $_POST['id'];

$mode = $_POST['mode'];

if ($mode == "Update-Emp-Ref") {
    $col = $_POST['col'];
    $sql = "SELECT * FROM `tbl_officers_employement` where id='" . $id . "'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $sql = "UPDATE `tbl_officers_employement` SET " . $col . " WHERE id=" . $id . "";
        if (mysqli_query($connect, $sql)) {
            echo 'Record has been Updated Succesfully ';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "Insert-Emp-Ref") {
    $col = $_POST['col'];
    $val = $_POST['val'];
    $sql = "INSERT INTO `tbl_officers_employement` (" . $col . ") VALUES(" . $val . ")";
//    echo $sql2;
    if (mysqli_query($connect, $sql)) {
        echo 'Record has been Inserted Succesfully ';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
} else if ($mode == "Update-Emp-Edu") {
    $col = $_POST['col'];
    $sql = "SELECT * FROM `tbl_officers_education` where id='" . $id . "'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $sql = "UPDATE `tbl_officers_education` SET " . $col . " WHERE id=" . $id . "";
        if (mysqli_query($connect, $sql)) {
            echo 'Record has been Updated Succesfully ';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "Insert-Emp-Edu") {
    $col = $_POST['col'];
    $val = $_POST['val'];
    $sql = "INSERT INTO `tbl_officers_education` (" . $col . ") VALUES(" . $val . ")";
//    echo $sql;
    if (mysqli_query($connect, $sql)) {
        echo 'Record has been Inserted Succesfully ';
    } else {
        echo $sql . "ERROR IN QUERY" . $connect->error;
    };
} else if ($mode == "Update-Per-Ref") {
    $col = $_POST['col'];
    $sql = "SELECT * FROM `tbl_officers_reference` where id='" . $id . "'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $sql = "UPDATE `tbl_officers_reference` SET " . $col . " WHERE id=" . $id . "";
        if (mysqli_query($connect, $sql)) {
            echo 'Record has been Updated Succesfully ';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "Insert-Per-Ref") {
    $col = $_POST['col'];
    $val = $_POST['val'];
    $sql = "INSERT INTO `tbl_officers_reference` (" . $col . ") VALUES(" . $val . ")";
//    echo $sql;
    if (mysqli_query($connect, $sql)) {
        echo 'Record has been Inserted Succesfully ';
    } else {
        echo $sql . "ERROR IN QUERY" . $connect->error;
    };
}