<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require ("class.phpmailer.php");
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
include "dbconnection.php"; // Load file connection.php
date_default_timezone_set('Europe/London');


$name = $_POST['name'];
$email = $_POST['email'];
$officername = $_POST['officername'];


sendmail($name, $email, $officername);

function sendmail($name, $email, $officername) {
    include "./dbconnection.php"; // Load file connection.php

    $pass = "fin786";
    $to = $email;
    $subject = "Please Verify Officer";
    $from = 'info@etaksi.co.uk';

    $verificationLink = "http://etaksi.co.uk/Etaksi/Guardianfm_new/Registeration/RefrencesVerificationForm.php?name=" . $name;

    $body = '';

    $body .= "<a href='{$verificationLink}' target='_blank' > <br>VERIFY Employee</a>";
    $headers = "From:" . $from;

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "send.one.com"; // Your Domain Name
//       $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port = 2525; //587;
    $mail->Username = "info@etaksi.co.uk"; // Your Email ID
    $mail->Password = "etaksi2009"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "info@etaksi.co.uk";
    $mail->FromName = "Guardian Team";
    $mail->AddAddress("jobs@guardianfm.co.uk"); // On which email id you want to get the message
    $mail->AddCC($email);

    $mail->IsHTML(true);

    $mail->Subject = "Verify Employee"; // This is your subject
    // HTML Message Starts here

    $mail->Body = "
      <html>
    <head>

        <meta charset='utf-8'>
        <meta http-equiv='x-ua-compatible' content='ie = edge'>
        <title>Email Confirmation</title>
        <meta name='viewport' content='width = device-width, initial-scale = 1'>
        <style type='text/css'>
            /**
             * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
             */
            @media screen {
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
                }
                @font-face {
                    font-family: 'Source Sans Pro';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
                }
            }
            /**
             * Avoid browser level font resizing.
             * 1. Windows Mobile
             * 2. iOS / OSX
             */
            body,
            table,
            td,
            a {
                -ms-text-size-adjust: 100%; /* 1 */
                -webkit-text-size-adjust: 100%; /* 2 */
            }
            /**
             * Remove extra space added to tables and cells in Outlook.
             */
            table,
            td {
                mso-table-rspace: 0pt;
                mso-table-lspace: 0pt;
            }
            /**
             * Better fluid images in Internet Explorer.
             */
            img {
                -ms-interpolation-mode: bicubic;
            }
            /**
             * Remove blue links for iOS devices.
             */
            a[x-apple-data-detectors] {
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                color: inherit !important;
                text-decoration: none !important;
            }
            /**
             * Fix centering issues in Android 4.4.
             */
            div[style*='margin: 16px 0;
'] {
                margin: 0 !important;
            }
            body {
                width: 100% !important;
                height: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            /**
             * Collapse table borders to avoid space between cells.
             */
            table {
                border-collapse: collapse !important;
            }
            a {
                color: #1a82e2;
            }
            img {
                height: auto;
                line-height: 100%;
                text-decoration: none;
                border: 0;
                outline: none;
            }
        </style>

    </head>
    <body style='background-color: #e9ecef;'>

<!--start preheader -->
<div class = 'preheader' style = 'display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;'>
A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.
</div>
<!--end preheader -->

<!--start body -->
<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>

<!--start logo -->

<tr>
<td align = 'center' bgcolor = '#e9ecef'>
<!--[if (gte mso 9)|(IE)]>
<table align = 'center' border = '0' cellpadding = '0' cellspacing = '0' width = '600'>
<tr>
<td align = 'center' valign = 'top' width = '600'>
<![endif] -->
<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%' style = 'max-width: 600px;'>
<tr>
<td align = 'center' valign = 'top' style = 'padding: 36px 24px;'>
<a href = 'http://guardianfm.co.uk/' target = '_blank' style = 'display: inline-block;'>
</a>
</td>
</tr>
</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif] -->
</td>
</tr>
<!--end logo -->

<!--start hero -->
<tr>
<td align = 'center' bgcolor = '#e9ecef'>
<!--[if (gte mso 9)|(IE)]>
<table align = 'center' border = '0' cellpadding = '0' cellspacing = '0' width = '600'>
<tr>
<td align = 'center' valign = 'top' width = '600'>
<![endif] -->
<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%' style = 'max-width: 600px;'>
<tr>
<td align = 'left' bgcolor = '#ffffff' style = 'padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;'>
<h1 style = 'margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;'>Confirm Employee Reference</h1>
</td>
</tr>
</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif] -->
</td>
</tr>
<!--end hero -->

<!--start copy block -->
<tr>
<td align = 'center' bgcolor = '#e9ecef'>
<!--[if (gte mso 9)|(IE)]>
<table align = 'center' border = '0' cellpadding = '0' cellspacing = '0' width = '600'>
<tr>
<td align = 'center' valign = 'top' width = '600'>
<![endif] -->
<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%' style = 'max-width: 600px;'>

<!--start copy -->
<tr>
<td align = 'left' bgcolor = '#ffffff' style = 'padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;'>
<p style = 'margin: 0;'>Hi, '$name', '$officername' have applied for security job with Guardian FM and give your reference in his employement reference, please tap the button below to confirm your his given information.</p>
                            </td>
                        </tr>
                        <!-- end copy -->

                        <!-- start button -->
                        <tr>
                            <td align='left' bgcolor='#ffffff'>
                                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td align='center' bgcolor='#ffffff' style='padding: 12px;'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                                <tr>
                                                    <td align='center' style='border-radius: 6px;'>
                                                        <a href='$verificationLink' target='_blank' style='display: inline-block; padding: 16px 36px; font-size: 16px; text-decoration: none; border-radius: 6px; '>Verify Employee Reference</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- end button -->

                        

                       

                    </table>
                    <!--[if (gte mso 9)|(IE)]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            <!-- end copy block -->

            <!-- start footer -->
            <tr>
                <td align='center' bgcolor='#e9ecef' style='padding: 24px;'>
                    <!--[if (gte mso 9)|(IE)]>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
                    <tr>
                    <td align='center' valign='top' width='600'>
                    <![endif]-->
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>

                        <!-- start permission -->
                        <tr>
                            <td align='center' bgcolor='#e9ecef' style='padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;'>
                                <p style='margin: 0;'></p>
</td>
</tr>
<!--end permission -->



</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif] -->
</td>
</tr>
<!--end footer -->

</table>
<!--end body -->

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
        echo'Submission Successful, An email is sent at "' . $email;
    }
// 
//
}

?>