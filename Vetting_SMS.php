<?php

include './dbconnection.php';
date_default_timezone_set("Europe/London");

$curtime = date("Y-m-d h:i");
$officerID = $_POST["officerID"];
$message = $_POST["message"];
$telephone = "";

$sql = "SELECT * FROM `tbl_employee` WHERE `EmployeeID` = '" . $officerID . "'";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($result);
if (mysqli_num_rows($result) > 0) {
    $Contact = $row['telephone'];
    $OfficerName = $row['shortname'];
    $telephone = $Contact;

    $query = "INSERT INTO `tbl_outboxque`(`message_id`,`msglunch_time`, `msg_from`, `msg_text`, `send_at`, `msg_to`, `Status`, `curtime`, `msg_type`, `to_name`) "
            . "VALUES ('" . rand(40000, 50000) . "','$curtime','447491163504','" . $message . "','$curtime','" . $Contact . "','PENDING','$curtime','Vetting SMS','" . $OfficerName . "')";

    if (mysqli_query($connect, $query)) {
        echo 'SMS sent';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    }
} else {
    if ($telephone == "") {
        echo 'Failed. No contact number found';
    }
}