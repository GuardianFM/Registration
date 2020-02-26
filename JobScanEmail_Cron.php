<?php

include './dbconnection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require ("class.phpmailer.php");
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

$site = "";
$start = "";
$end = "";
$output = "";
$officerid = 0;
$i = 0;
$sql = "SELECT tbl_jobaccept.*, tbl_dutyschedule.ID,tbl_dutyschedule.Location AS Location,tbl_dutyschedule.DutyStart As DutyStart,tbl_dutyschedule.DutyFinish AS DutyFinish FROM `tbl_dutyschedule` JOIN tbl_jobaccept ON tbl_dutyschedule.ID=tbl_jobaccept.shiftid WHERE tbl_jobaccept.Email_Status='Pending'";
//echo $sql;

$result = mysqli_query($connect, $sql);



if (mysqli_num_rows($result) > 0) {

    while ($row1 = mysqli_fetch_array($result)) {
        $officerid = $row1["officerid"];


        $output = "<tr>                           
                           <td>Hi,<br><br> Controller,<br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                            <td>Officer '" . $row1["officername"] . "' has <b></b> requested to cover <br>Site : " . $row1["Location"] . "<br> From : " . substr($row1["DutyStart"], 0, 10) . " - " . substr($row1["DutyStart"], 11) . "<br> To : " . substr($row1["DutyFinish"], 0, 10) . " - " . substr($row1["DutyFinish"], 11) . " <br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                            <td >regards,<br><br></td>
                        </tr>
                        ";

    

        $i = $i + 1;

        email($officerid, $output, $row1["officername"], $row1["Location"], $row1["shiftid"]);
//        echo $output;
    }
    
} else {

    echo 'No Data Found';
}

function email($id, $output, $officername, $site, $shiftid) {



    $mobile = ""; //$_POST['mobile'];  // Get Mobile No
    $email = "comms2@guardianfm.co.uk";

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "send.one.com"; // Your Domain Name
    //$mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port = 587; //2525;
    $mail->Username = "jobs@guardianfm.co.uk"; // Your Email ID
    $mail->Password = "jobs2009@"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "jobs@guardianfm.co.uk";
    $mail->FromName = "Guardian FM Control Department";
    $mail->AddAddress($email); // On which email id you want to get the message
    $mail->IsHTML(true);

    $mail->Subject = " " . $officername . "  has applied to cover site '" . $site . "'"; // This is your subject

    $mail->Body = $output;



    if (!$mail->Send()) {
        // Message if mail has been sent
        echo('Email Failed.' . $email);
    } else {
        include './dbconnection.php';
        $sql = "UPDATE `tbl_jobaccept` SET Email_Status='Delivered' WHERE officerid=" . $id . " AND shiftid=" . $shiftid . "";
        if (mysqli_query($connect, $sql)) {
            echo 'Record has been Updated Succesfully ';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
    }
    echo 'You have submitted your request successfully';
}
