<?php

include "./dbconnection.php";
$agreement_status = $_POST['agreement_status'];
$id = $_POST['id'];

$sql = "UPDATE `tbl_employee` SET `agreement_status`='$agreement_status' WHERE EmployeeID='$id'";
$result = mysqli_query($connect, $sql);
if ($agreement_status == 'Accept') {
    echo 'You Have Accepted The Agreement';
}
if ($agreement_status == 'Decline') {
    echo 'You Have Declined The Agreement';
}
?>