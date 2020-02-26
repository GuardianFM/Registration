<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require ("class.phpmailer.php");
include "./dbconnection.php"; // Load file connection.php

$email = trim($_POST['email']);

$errors = array();



$user_check_query = "SELECT * FROM tbl_employee WHERE  `email`='$email' LIMIT 1";

$result = mysqli_query($connect, $user_check_query);
$user = mysqli_fetch_array($result);

if (mysqli_num_rows($result) > 0) { // 
    echo 'User Found!';

    $username = $user['shortname'];
    $emailuser = $user['email'];
    $password = $user['password'];

    sendmail($username, $email, $password);
} else {
    echo 'User Not Found';
}

function sendmail($username, $email, $password) {
    include "./dbconnection.php"; // Load file connection.php

    $pass = "fin786";

//    $email = $_POST['email'];  // Get Email Value

    $message = "Your Password is ";
    $to = $email;
    $subject = "Your Password";
    $from = 'syedtradeleads@gmail.com';
    $verificationLink = "http://etaksi.co.uk/Guardianfm/logindb.php";
    $headers = "From:" . $from;
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "send.one.com"; // Your Domain Name
//       $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port = 587;//2525;
    $mail->Username = "info@etaksi.co.uk"; // Your Email ID
    $mail->Password = "etaksi2009"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "info@etaksi.co.uk";
    $mail->FromName = "Guardian Team";
    //$mail->AddAddress("hr@guardianfm.co.uk"); // On which email id you want to get the message
    $mail->AddCC($email);
    $mail->IsHTML(true);

    $mail->Subject = "Password Reset"; // This is your subject
    // HTML Message Starts here

    $mail->Body = "
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>User Name: </strong></td>
                            <td style='width:400px'>$username</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Password: </strong></td>
                            <td style='width:400px'>$password</td>
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
//        echo'Your password is sent at "' . $email;
    }
}

?>