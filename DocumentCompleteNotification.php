<?php

include './dbconnection.php';
date_default_timezone_set("Europe/London");

$i = 0;
$message = "";
$sql = "SELECT * FROM `tbl_employee` WHERE `stepno`<5 AND `contractor_id`='1120'";
//echo $sql;

$result = mysqli_query($connect, $sql);



if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $fullname = $row['firstname'] . ' ' . $row['lastname'];
//        echo $row['shortname'] . '<br>';

        $message = "Hi, " . $fullname . " kindly login to http://etaksi.co.uk/Etaksi/Guardianfm_new/Registeration/Register.php/ to complete your profile via uploadong documents to apply for jobs online. Regards Guardian FM.";
        if ($row['email'] != '') {
            SENDEmail($row['EmployeeID'], $message, $fullname, $row['email']);
        }
        if ($row['telephone'] != '') {
            SENDSMS($row['EmployeeID'], $message, $fullname, $row['telephone']);
        }
        $i = $i + 1;
    }
    echo 'Messages & Emails has been broadcasted successfullly ';
} else {

    echo 'No Data Found';
}

function SENDSMS($EmployeeID, $message, $OfficerName, $mobile) {

    include './dbconnection.php';

    $curtime = date("Y-m-d h:i");


    $query = "INSERT INTO `tbl_outboxque`(`message_id`,`msglunch_time`, `msg_from`, `msg_text`, `send_at`, `msg_to`, `Status`, `curtime`, `msg_type`, `to_name`) VALUES ('" . rand(60000, 70000) . "','$curtime','447491163504','" . $message . "','$curtime','" . $mobile . "','PENDING','$curtime','SITE INSTRUCTION','" . $OfficerName . "')";
    //        echo $query;
    if (mysqli_query($connect, $query)) {

//        echo 'Message has been sent Successfullly ';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    }
}

function SENDEmail($OID, $message, $OfficerName, $email) {

    include './dbconnection.php';

    $Status = "PENDING";
    $curtime = date("Y-m-d h:i");



    $query = "INSERT INTO `tbl_emailbox_schedule`(`message_id`,`msglunch_time`, `msg_from`, `msg_text`, `send_at`, `msg_to`, `Status`,`Active`, `curtime`, `msg_type`,`to_name`) "
            . "VALUES ('" . rand(50000, 60000) . "','$curtime','comms@guardianfm.co.uk','" . $message . "','$curtime','" . $email . "','PENDING','active','$curtime','Document Complete Notification','$OfficerName')";
    //        echo $query;
    if (mysqli_query($connect, $query)) {

//        echo 'Email has been sent Successfullly ';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    }
}
