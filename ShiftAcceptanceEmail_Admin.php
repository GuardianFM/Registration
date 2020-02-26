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
$id = $_POST['id'];
//$portal = $_POST['portal'];
$shiftid = $_POST['shiftid'];
$Status = $_POST['Status'];

$officer_email = "";

$x = 1;
$i = 0;
$output = '';
$site = "";

$sql = "SELECT tbl_jobaccept.*, tbl_dutyschedule.ID,tbl_dutyschedule.Location AS Location,tbl_dutyschedule.DutyStart As DutyStart,tbl_dutyschedule.DutyFinish AS DutyFinish FROM `tbl_dutyschedule` JOIN tbl_jobaccept ON tbl_dutyschedule.ID=tbl_jobaccept.shiftid WHERE tbl_jobaccept.officerid='$id' AND shiftid =$shiftid";
//echo $sql;
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$site = $row['Location'];
$name = $row['officername'];
$output .= "<tr>                           
                           <td>Hi,<br><br> Controller,<br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                            <td>" . $row['officername'] . " has <b>$Status</b> status for request to cover the site '" . $row['Location'] . "', Date : '" . substr($row['DutyStart'], 0, 10) . "' Timing : '" . substr($row['DutyStart'], 11) . "' - '" . substr($row['DutyFinish'], 11) . "'. <br><br></td>
                        </tr>
                        ";



mysqli_data_seek($result, 0);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {
        
    }




    $output .= "        <tr  style='margin-bottom:30px;'>
                            <td >regards,<br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                            <td >GuardianFM Control Room<br><br></td>
                        </tr>
                        ";


//    echo $output;
//    $name = $row['officername']; // Get Name value from HTML Form


    $sql = "SELECT * FROM `tbl_employee` where `EmployeeID`=" . $id . "";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $officer_email = $row['email'];
    } else {
        echo 'No Data Found 2';
    }

    $mobile = ""; //$_POST['mobile'];  // Get Mobile No
    $email = 'comms@guardianfm.co.uk';
    //$_POST['email'];  // Get Email Value
    $message = ''; //$_POST['message']; // Get Message Value
    $msg_id = '';





    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "send.one.com"; // Your Domain Name
    //$mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port =587; //2525; 
    $mail->Username = "jobs@guardianfm.co.uk"; // Your Email ID
    $mail->Password = "jobs2009@"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "jobs@guardianfm.co.uk";
    $mail->FromName = "Guardian FM Control Department";
    $mail->AddAddress($email); // On which email id you want to get the message
    $mail->IsHTML(true);

    $mail->Subject = " Officer has $Status request for the site '" . $site . "'"; // This is your subject

    $mail->Body = $output;



    if (!$mail->Send()) {
        // Message if mail has been sent
        echo('Email Failed.' . $email);
    } else {
        // Message if mail has been not sent
        //        echo('Email has been sent successfully.');
    }
    echo 'You have submitted your request successfully';

    $sql = "UPDATE `tbl_jobaccept` SET Email_Status='Delivered' WHERE officerid=" . $id . " AND shiftid=" . $shiftid . "";

    if (mysqli_query($connect, $sql)) {
        echo 'Record has been Updated Succesfully ';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
} else {
    echo 'No Data Found';
}


      
    


