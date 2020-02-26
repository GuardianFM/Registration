<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require ("class.phpmailer.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
sendmail(12114);
function sendmail($InsertID) {
    include "./dbconnection.php"; // Load file connection.php

    $pass = "fin786";
    $uname = 'jawad';// $_POST['shortname']; // Get Name value from HTML Form
    $mobile = '';//$_POST['phone'];  // Get Mobile No
    $email = 'accounts@guardianfm.co.uk' ;//$_POST['email'];  // Get Email Value
    $message = ""; //$_POST['message']; // Get Message Value
    $code = substr(md5(mt_rand()), 0, 15);
//	mysqli_connect('etaksi.co.uk.mysql','etaksi_co_uk_mysourcing_db','guardian2010@');
    //mysql_select_db('etaksi_co_uk_mysourcing_db');
//    $query = "INSERT INTO `verify`( `email`, `password`, `code`) VALUES ('$email','$pass','$code')";
//
//
//    if (mysqli_query($connect, $query)) {
//        //  $InsertID = mysqli_insert_id ($connect);
//        $db_id = mysqli_insert_id($connect);
//        echo 'Officer has been Updated Succesfully ';
//    } else {
//        echo("ERROR IN QUERY" . $query);
//    };
//	$db_id=mysql_insert_id();

    $message = "Your Activation Code is " . $code . "";
    $to = $email;
    $subject = "Activation Code For Officer Registration";
    $from = 'syedtradeleads@gmail.com';

    $verificationLink = "http://etaksi.co.uk/Etaksi/Guardianfm_new/Verify.php?id=" . $InsertID;

    $body = '';

    $body .= "<a href='{$verificationLink}' target='_blank' > <br>VERIFY Account</a>";
    $headers = "From:" . $from;

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "send.one.com"; // Your Domain Name
//  $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port = 2525;//587;//2525;
    $mail->Username = "info@etaksi.co.uk"; // Your Email ID
    $mail->Password = "etaksi2009"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "info@etaksi.co.uk";
    $mail->FromName = "Guardian Team";
    $mail->AddAddress("jobs@guardianfm.co.uk"); // On which email id you want to get the message
    $mail->AddCC($email);

    $mail->IsHTML(true);

    $mail->Subject = "Verification Link $uname"; // This is your subject
    // HTML Message Starts here

    $mail->Body = "
        <html>
            <body>
            <table style='width:auto;'>
                    <tbody>
                        <tr>
                            
                            <td style='width:400px'><p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                             normal;vertical-align:baseline'><b><span style='font-size:36.0pt;color:white;
                             background:black'>Guardian </span></b><b><span style='font-size:36.0pt;
                             color:#C55A11;background:black'>FM</span></b><b><span style='font-size:36.0pt;
                             color:white'> </span></b></p></td>
                        </tr>
                        <tr>
                        <td></td>
                        </tr>
                        <tr>
                        <td></td>
                        </tr>
                         <tr>
                        <td></td>
                        </tr>
                        <tr>
                        <td></td>
                        </tr>
                        <tr>
                        <td>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                            normal;vertical-align:baseline'><span style='color:#333333'>&nbsp;</span>Hi $uname,</p>
                        </td>
                        </tr> 
                        
                            <td><strong>Email ID: </strong>$email</td>
                            
                        </tr>
                        
                            <td><strong>Mobile No: </strong>$mobile</td>
                            
                        </tr>
                        <tr>
                           <td><strong>$body </strong></td>
                            
                        </tr>
                        <tr>
                        <td></td>
                        </tr>
                        <tr>
                        <td></td>
                        </tr>
                         <tr>
                        <td></td>
                        </tr>
                        <tr>
                        <td></td>
                        </tr>
                        <tr>
                        <td>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><b><span lang=EN-GB style='font-size:10.5pt;
                        font-family:'inherit',serif;color:black'>Switch board : 02085208778
                        option 5</span></b></p>

                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><b><span lang=EN-GB style='font-size:10.5pt;
                        font-family:'inherit',serif;color:black'>DDI: 02035001905</span></b></p>

                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><b><span lang=EN-GB style='font-size:10.5pt;
                        font-family:'inherit',serif;color:black'>Mobile:  07715 626524</span></b></p>

                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><b><span lang=EN-GB style='font-size:10.5pt;
                        font-family:'inherit',serif;color:black'>&nbsp;e:</span></b><span lang=EN-GB
                        style='font-size:10.5pt;font-family:'inherit',serif;color:black'>&nbsp;<a
                        href='mailto:comms@guardianfm.co.uk%7C%C2%A0%C2%A0w' target='_blank'>comms@guardianfm.co.uk|&nbsp;&nbsp;<b>w</b></a><b>:</b>&nbsp;</span><u><span
                        lang=EN-GB style='font-size:10.5pt;font-family:'inherit',serif;color:blue'><a
                        href='http://www.guardianfm.co.uk/' target='_blank'>www.guardianfm.co.uk</a></span></u></p>

                        </td>
                        </tr>
                        
                        <tr>
                        <td>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><span lang=EN-GB style='font-size:9.0pt;
                        font-family:'inherit',serif;color:#1F497D'>“GuardianFm Ltd Holds SIA Approved
                        Contractor Status for the Provision of Security Guarding”</span></p>

                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><b><span lang=EN-GB style='font-size:9.0pt;
                        font-family:'inherit',serif;color:#1F497D'>Mission Statement:</span></b></p>

                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><span lang=EN-GB style='font-size:9.0pt;
                        font-family:'inherit',serif;color:#1F497D'>GuardianFm Ltd , it&nbsp;is our
                        mission to become&nbsp;leading provider of security solutions, ensuring that we
                        are the best in our &nbsp;field, to which others strive to emulate.&nbsp;This
                        will be established on the basis of mutual respect, honest and&nbsp;diligence
                        in developing key working relationships with both our clients and staff.</span></p>

                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><b><span style='font-size:9.0pt;font-family:
                        'inherit',serif;color:#1F497D'>Agreement:&nbsp;&nbsp;&nbsp;</span></b></p>

                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;text-align:
                        justify;line-height:normal;vertical-align:baseline'><span lang=EN-GB
                        style='font-size:9.0pt;font-family:'inherit',serif;color:#1F497D'>By accepting
                        officers from GuardianFm Ltd, the officers are not allowed to engage in direct
                        employment with the client or client site in any circumstances, our clients are
                        bound automatically with our terms and conditions from first deployment of
                        officer that they are not allowed to engage our officers in direct
                        employment.&nbsp;&nbsp;If it happened in any case the client will be liable to
                        pay introductory fee as specified in terms and conditions.</span></p>

                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                        normal;vertical-align:baseline'><b><span lang=EN-GB style='font-size:9.0pt;
                        font-family:'inherit',serif;color:#1F497D'>Disclaimer</span></b><span
                        lang=EN-GB style='font-size:9.0pt;font-family:'inherit',serif;color:#1F497D'><br>
                        This message is confidential and may contain privileged information. It is for
                        use of the person or entity to which it was addressed only. If you are not the
                        intended recipient you must not use, disclose, distribute, copy, print, rely on
                        this message or make any other use of it. If an addressing or transmission error
                        has misdirected this email, please notify the author by replying to the email
                        and delete it from any computer. Any views or opinions expressed within this
                        transmittal are those of the author and do not necessarily represent those of
                        the member companies of Guardianfm Ltd. We cannot guarantee this email to be
                        free from computer virus at this time and it is recipient’s responsibility to
                        scan any attachments before downloading them. Blue Angel Security Ltd accepts
                        no responsibility for changes made to this message after it was sent, nor any
                        loss or damage arising from its receipt or use. Guardianfm Ltd reserves the
                        right to monitor emails and any replies sent back.</span></p>

                        </td>
                        </tr>
                        
                    </tbody>
                </table>



               
            </body>
        </html>
        ";
    // HTML Message Ends here
    if (!$mail->Send()) {
        // Message if mail has been sent
        echo "<script>
                alert('Submission is UnSuccessful');
            </script>";
    } else {
        // Message if mail has been not sent
        //echo "You have been registered with us, an activation email is sent to your provided email , please click on the provided link to activate your account";
        echo'Submission Successful, An activation email is sent at "' . $email . '" Please click on the link to activate your account';
    }
// 
//
}