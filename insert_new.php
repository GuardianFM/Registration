<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require ("class.phpmailer.php");
include "./dbconnection.php"; // Load file connection.php

$regdate = date("Y-m-d");
$name = $_POST['lastname'];
$firstname = $_POST['firstname'];
$shortname = $_POST['shortname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$country = $_POST['country'];
$Region = $_POST['Region'];
$postcode = $_POST['postcode'];
$typeofofficer = $_POST['typeofofficer'];
$license = $_POST['sia_no'];
$licenseexpiry = $_POST['sia_exp'];
$password = $_POST['password'];
$conf_password = $_POST['conf_password'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];


$mode = $_POST['mode'];
$errors = array();
$fullname = $_POST['fullname'];

if ($mode == "Insert") {
    $user_check_query = "SELECT * FROM tbl_employee WHERE  fullname='$fullname' OR shortname='$shortname' OR sia ='$license' OR telephone ='$phone' LIMIT 1";
    $result = mysqli_query($connect, $user_check_query);
    //$user = mysqli_fetch_assoc($result);
    $user = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) { // if user exists
        if ($user['fullname'] == $fullname) {
            echo "Officername already exists";
            return false;
            array_push($errors, "Officername already exists");
        }

        if ($user['shortname'] == $shortname) {
            echo "User Name already exists";
            return false;
            array_push($errors, "email already exists");
        }

        if ($user['sia'] == $license) {
            echo "License No already exists";
            return false;
            array_push($errors, "License No already exists");
        }
        if ($user['telephone'] == $phone) {
            echo "Phone No already exists";
            return false;
            array_push($errors, "Phone No already exists");
        }
    }

    if (count($errors) == 0) {
//  	$password = md5($password_1);//encrypt the password before saving in the database
//  	$query = "INSERT INTO tbl_officersinfo (OfficerName, email, password) 
//  			  VALUES('$OfficerName', '$email', '$password')";

        $query = "INSERT INTO `tbl_employee`( `lastname`, `firstname`, `fullname`, `email`, `password`, `conf_password`,`dob`, `postcode`, `telephone`, `add1`, `regdate`, `gender`, `country`, `shortname`,`typeofofficer`, `sia`, `siaexp`,`active`,`region`,`emp_latitude`, `emp_longitude`)"
                . " VALUES ('$name','$firstname','$fullname' , '$email','$password','$conf_password','$dob','$postcode','$phone','$address','$regdate','$gender','$country','$shortname','$typeofofficer','$license','$licenseexpiry','inactive','$Region','$latitude','$longitude')";
//        echo $query;
        if (mysqli_query($connect, $query)) {

            echo 'New Officer has been registered ';
            $InsertID = mysqli_insert_id($connect);
            sendmail($InsertID);
        } else {
            array_push($errors, "ERROR IN QUERY");
        };
    }
} else if ($mode == "Edit") {

    //TO EDIT RECORD 
    $record_check_query = "SELECT * FROM tbl_employee WHERE EmployeeID='$id'  LIMIT 1";
//  echo $record_check_query;
    $result = mysqli_query($connect, $record_check_query);
    //$user = mysqli_fetch_assoc($result);
    $user = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) { // if user exists
        $user_check_query = "SELECT * FROM tbl_employee WHERE EmployeeID != '$id' AND (lastname='$name' OR shortname='$shortname' OR sia ='$license') LIMIT 1";
        // echo $user_check_query;
        $result = mysqli_query($connect, $user_check_query);
        //$user = mysqli_fetch_assoc($result);
        $user = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) > 0) { // if user exists
            if ($user['fullname'] == $fullname) {
                echo "Officername already exists";
                return false;
                array_push($errors, "Officername already exists");
            }

            if ($user['shortname'] == $shortname) {
                echo "Short Name already exists";
                return false;
                array_push($errors, "Username already exists");
            }

            if ($user['sia'] == $license) {
                echo "License No already exists";
                return false;
                array_push($errors, "License No already exists");
            }
        }

        if (count($errors) == 0) {
//  	$password = md5($password_1);//encrypt the password before saving in the database
//  	$query = "INSERT INTO tbl_officersinfo (OfficerName, email, password) 
//  			  VALUES('$OfficerName', '$email', '$password')";

            $query = "UPDATE `tbl_employee` SET `lastname`='$name',`firstname`='$firstname',`email`='$email',`password`='$password',`conf_password`='$conf_password',`dob`='$dob',`postcode`='$postcode',"
                    . "`telephone`='$phone',`add1`='$address',`regdate`='$regdate',`gender`='$gender',`country`='$country',`shortname`='$shortname',`typeofofficer`='$typeofofficer',`region`='$Region',`sia`='$license',"
                    . "`siaexp`='$licenseexpiry', `emp_latitude`='$latitude', `emp_longitude`='$longitude'  WHERE EmployeeID='$id' ";
            echo $query;
            if (mysqli_query($connect, $query)) {
                //  $InsertID = mysqli_insert_id ($connect);
                echo 'Officer has been Updated Succesfully! Please login ';
                sendmail($id);
            } else {
                array_push($errors, "ERROR IN QUERY");
            };
        }
    } else {
        echo 'No Record Found for this ID';
    }
}if ($mode == "Delete") {

    //TO DELETE RECORD 
    $record_check_query = "SELECT * FROM tbl_employee WHERE EmployeeID='$id'  LIMIT 1";

    $result = mysqli_query($connect, $record_check_query);
    //$user = mysqli_fetch_assoc($result);
    $user = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) { // if user exists
//    $user_check_query = "SELECT * FROM tbl_officers WHERE name='$name' OR shortname='$shortname' OR license ='$license' LIMIT 1";
//    echo $user_check_query;
//  $result = mysqli_query($connect, $user_check_query);
//  //$user = mysqli_fetch_assoc($result);
//  $user =mysqli_fetch_array($result);
//  
//  if(mysqli_num_rows($result) > 0)  { // if user exists
//      
//    if ($user['name'] == $name) {
//        echo "Officername already exists";
//        return false;
//      array_push($errors, "Officername already exists");
//    }
//
//    if ($user['shortname'] == $shortname) {
//      echo "Short Name already exists";   
//      return false;
//      array_push($errors, "email already exists");
//    }
//    
//    if ($user['license'] == $license) {
//         echo "License No already exists";   
//      return false;
//      array_push($errors, "email already exists");
//    }
//  }
        $record_del_query = "SELECT * FROM tbl_employee WHERE EmployeeID='$id' ";

        $result = mysqli_query($connect, $record_del_query);
        //$user = mysqli_fetch_assoc($result);
        $user = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0) { // if user exists
            $sql = "DELETE FROM tbl_employee WHERE EmployeeID = '$id'";

            if (mysqli_query($connect, $sql)) {
                echo 'Officer has been Deleted Successfully';
            } else {
                echo 'ERROR IN QUERY' . $sql . $connect->error;
            }
        }
    } else {
        echo 'No Record Found for this ID';
    }
}

function sendmail($InsertID) {
    include "./dbconnection.php"; // Load file connection.php

    $pass = "fin786";
    $uname = $_POST['shortname']; // Get Name value from HTML Form
    $mobile = $_POST['phone'];  // Get Mobile No
    $email = $_POST['email'];  // Get Email Value
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
//       $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port = 2525; //587;
    $mail->Username = "hr@guardianfm.co.uk"; // Your Email ID
    $mail->Password = "Security2009"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "hr@guardianfm.co.uk";
    $mail->FromName = "Guardian Recruitment Team";
    $mail->AddAddress("jobs@guardianfm.co.uk"); // On which email id you want to get the message
    $mail->AddCC($email);

    $mail->IsHTML(true);

    $mail->Subject = "Verification Link $uname"; // This is your subject
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
<img src = 'assets/images/Gaurdian-Logo.png' alt = 'Logo' border = '0' width = '248' style = 'display: block; width: 248px; max-width: 248px; min-width: 148px;'>
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
<h1 style = 'margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;'>Confirm Your Email Address</h1>
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
<p style = 'margin: 0;'>Hi, '$uname' we have recieved request for account registration for this email id, please tap the button below to confirm your email address. If you didn't create an account with <a href='http://guardianfm.co.uk/'>Guardian FM</a>, you can safely delete this email.</p>
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
                                                    <td align='center' bgcolor='#1a82e2' style='border-radius: 6px;'>
                                                        <a href='$verificationLink' target='_blank' style='display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;'>Verify Your Email</a>
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
                                <p style='margin: 0;'>You received this email because we received a request for registration for your account. If you didn't request registration you can safely delete this email.</p>
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
        echo'Submission Successful, An activation email is sent at "' . $email . '" Please click on the link to activate your account';
    }
// 
//
}

?>