<?php

include './dbconnection.php';
$id = $_POST['id'];

$sql = "SELECT * FROM `tbl_officers_document` where OID=$id";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($result);
if (mysqli_num_rows($result) > 0) {
    echo json_encode($row);
} else {
    echo 'No Data Found';
}