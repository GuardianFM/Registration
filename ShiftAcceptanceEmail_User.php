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
$portal = $_POST['portal'];
$shiftid = $_POST['shiftid'];
$email = $_POST['email'];
if ($portal == "User") {
    $message = "We have recieved";
} else {
    $message = "Controller has decline";
}






$x = 1;
$i = 0;
$output = '';
$site = "";

$sql = "SELECT tbl_jobaccept.*, tbl_dutyschedule.ID,tbl_dutyschedule.Location AS Location,tbl_dutyschedule.DutyStart As DutyStart,tbl_dutyschedule.DutyFinish AS DutyFinish FROM `tbl_dutyschedule` JOIN tbl_jobaccept ON tbl_dutyschedule.ID=tbl_jobaccept.shiftid WHERE tbl_jobaccept.officerid='$id' AND shiftid =$shiftid";
//echo $sql;
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$site = $row['Location'];
$output .= "<tr>                           
                           <td>Hi,<br><br> " . $row['officername'] . ",<br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                            <td > $message your request for the site '" . $row['Location'] . "', Date : '" . substr($row['DutyStart'], 0, 10) . "' Timing : '" . substr($row['DutyStart'], 11) . "' - '" . substr($row['DutyFinish'], 11) . "'. <br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                            <td ><b>Status : '" . $row['Status'] . "'</b><br><br></td>
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
                            <td >J.K, Controller<br><br></td>
                        </tr>
                         <tr>
                            <td style='margin-bottom:30px;'>GuardianFM ltd.</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td><p>a: 79 Hoe Street| Walthamstow |London | E17 4SA</p> </td>
                        </tr>
                        <tr>
                            <td><p>t: 02035001905 |f: 02031375745</p> </td>
                        </tr>
                        <tr>
                            <td style='margin-bottom:30px;'>e: comms@guardianfm.co.uk|  w: www.guardianfm.co.uk </td>
                        </tr>
                        ";


//    echo $output;

    $name = $row['officername']; // Get Name value from HTML Form
    $mobile = ""; //$_POST['mobile'];  // Get Mobile No
//    $email = $row['email'];
    //$_POST['email'];  // Get Email Value
    $message = ''; //$_POST['message']; // Get Message Value
    $msg_id = '';


    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "send.one.com"; // Your Domain Name
    //$mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port =  587;//2525;
    $mail->Username = "jobs@guardianfm.co.uk"; // Your Email ID
    $mail->Password = "jobs2009@"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "jobs@guardianfm.co.uk";
    $mail->FromName = "GuardianFM Control Department";
    $mail->AddAddress($email); // On which email id you want to get the message
    $mail->IsHTML(true);

    $mail->Subject = "Shift Request for the site '" . $site . "'"; // This is your subject

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


      
    


