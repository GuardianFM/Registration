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
$name = $_POST['name'];
$oid = $_POST['oid'];
$Total = 0;
$HoursTotal = 0;

$x = 1;
$i = 0;
$output = '';
$verificationLink = "RefrencesVerificationForm.php?id=$oid&name=$name";

$sql = "SELECT * FROM `tbl_officers_employement` WHERE id ='$id'";
//echo $sql;
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

$output .= "<tr>                           
                           <td>Dear HR Team,<br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                            <td >We are currently screening " . $name . " for a position with us.<br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                        <td >Would it be possible for you to complete the attached standard reference letter or provide dates of employment to assist us with screening?<br><br></td>
                        </tr>
                        <tr  style='margin-bottom:30px;'>
                            <td >Many thanks in advance.<br><br></td>
                        </tr>
                        
                        <tr>
                        <td><a href='{$verificationLink}' > <br>Verify Applicant</a><br><br></td>
                        </tr>
                        ";



mysqli_data_seek($result, 0);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {
        
    }




    $output .= "        <tr  style='margin-bottom:30px;'>
                            <td >Kind regards,<br><br></td>
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
                            <td ><p>t: 02035001905 |f: 02031375745</p> </td>
                        </tr>
                        <tr>
                            <td style='margin-bottom:30px;'>e: comms@guardianfm.co.uk|  w: www.guardianfm.co.uk </td>
                        </tr>
                        ";


//    echo $output;

    $name = $row['RefName']; // Get Name value from HTML Form
    $mobile = ""; //$_POST['mobile'];  // Get Mobile No
    $email = $_POST['email'];
    //$_POST['email'];  // Get Email Value
    $message = ''; //$_POST['message']; // Get Message Value
    $msg_id = '';


    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "send.one.com"; // Your Domain Name
    //$mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port = 2525; //587;
    $mail->Username = "accounts@guardianfm.co.uk"; // Your Email ID
    $mail->Password = "Accounts2009"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "accounts@guardianfm.co.uk";
    $mail->FromName = "GuardianFM HR";
    $mail->AddAddress($email); // On which email id you want to get the message
    $mail->IsHTML(true);

    $mail->Subject = "Employment Reference Verification"; // This is your subject

    $mail->Body = $output;



    if (!$mail->Send()) {
        // Message if mail has been sent
        echo('Email Failed.' . $email);
    } else {
        // Message if mail has been not sent

        echo('Email has been sent successfully.');
    }
} else {
    echo 'No Data Found';
}


      
    


