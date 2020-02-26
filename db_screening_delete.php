<?php

//
$mode = $_POST['mode'];
$id = $_POST['id'];

include "./dbconnection.php"; // Load file connection.php


if ($mode == "Emp_Ref") {
    $sql = "DELETE FROM `tbl_officers_employement` WHERE `id`=" . $id . "";

    if (mysqli_query($connect, $sql)) {
        echo 'Record has been deleted';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
} else if ($mode == "Per_Ref") {
    $sql = "DELETE FROM `tbl_officers_reference` WHERE `id`=" . $id . "";

    if (mysqli_query($connect, $sql)) {
        echo 'Record has been deleted';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
}else if ($mode == "Edu") {
    $sql = "DELETE FROM `tbl_officers_education` WHERE `id`=" . $id . "";

    if (mysqli_query($connect, $sql)) {
        echo 'Record has been deleted';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
}
?>