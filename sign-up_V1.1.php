 <?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require ("class.phpmailer.php");
include('dbconnection.php');

$message = "";
$validate = '';
try {
    $EmployeeID = isset($_POST['EmployeeID']) ? $_POST['EmployeeID'] : 0;
    $contractor_id = isset($_POST['contractor_id']) ? $_POST['contractor_id'] : 0;
    $contractor = isset($_POST['contractor']) ? $_POST['contractor'] : '';
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $shortname = isset($_POST['shortname']) ? $_POST['shortname'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $add1 = isset($_POST['add1']) ? $_POST['add1'] : '';
    $add2 = isset($_POST['add2']) ? $_POST['add2'] : '';
    $typeofofficer = isset($_POST['typeofofficer']) ? $_POST['typeofofficer'] : '';
    $region = isset($_POST['region']) ? $_POST['region'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';
    $reference = isset($_POST['reference']) ? $_POST['reference'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $credit = isset($_POST['credit']) ? $_POST['credit'] : 0;
    $sortcode = isset($_POST['sortcode']) ? $_POST['sortcode'] : '';
    $account = isset($_POST['account']) ? $_POST['account'] : '';
    $sia = isset($_POST['sia']) ? $_POST['sia'] : '';
    $siaexp = isset($_POST['siaexp']) ? $_POST['siaexp'] : '0000-00-00';
    $terms = isset($_POST['terms']) ? $_POST['terms'] : '';
    $latitude = isset($_POST['emp_latitude']) ? $_POST['emp_latitude'] : 0;
    $longitude = isset($_POST['emp_longitude']) ? $_POST['emp_longitude'] : 0;
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $active = isset($_POST['active']) ? $_POST['active'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $cnfpassword = isset($_POST['cnfpassword']) ? $_POST['cnfpassword'] : '';

    //$connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
    // $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    if (isset($_POST["save"])) {
        if (empty($_POST["firstname"]) || empty($_POST["shortname"]) || empty($_POST["contractor"])) {
            $message = '<label>firstname Name & Contractor & shortname fields are required</label>';
        } else {
            $contractor_id = $_POST["contractor_id"];
            $contractor = $_POST["contractor"];
            $EmployeeID = $_POST["EmployeeID"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $fullname = $_POST["firstname"] . ' ' . $_POST["lastname"];
            $shortname = $_POST["shortname"];
            $password = $_POST["password"];
            $cnfpassword = $_POST["cnfpassword"];
//            $telephone = $_POST["telephone"];
//            $add1 = $_POST["add1"];
//            $add2 = $_POST["add2"];
//            $region = $_POST["region"];
//            $country = $_POST["country"];
//            $postcode = $_POST["postcode"];
//            $reference = $_POST["reference"];
            $email = $_POST["email"];
//            $credit = $_POST["credit"];
//            $sortcode = $_POST["sortcode"];
//            $account = $_POST["account"];
//            $sia = $_POST["sia"];
//            $siaexp = $_POST["siaexp"];
//            $terms = $_POST["terms"];
//            $latitude = floatval($_POST['latitude']);
//            $longitude = floatval($_POST['longitude']);
            $active = $_POST['active'];
            if ($active != 'on') {
                $active = 'inactive';
            } else {
                $active = 'active';
            }

            $active = 'inactive';
            $record_check_query = "SELECT * FROM `tbl_employee` WHERE shortname ='" . $shortname . "' OR email ='" . $email . "' LIMIT 1";

// echo $record_check_query;
            $result = mysqli_query($connect, $record_check_query);
            //$user = mysqli_fetch_assoc($result);
            $user = mysqli_fetch_array($result);

            if (mysqli_num_rows($result) > 0) { // if user exists
                $message = '<label>Full Name or Email already exist!!!</label>';
                $validate = false;
            } else {


                $query = "INSERT INTO `tbl_employee`(`firstname`,`lastname`,`fullname`, `telephone`, `add1`, `add2`, `region`,`typeofofficer`,"
                        . " `country`, `postcode`, `reference`, `active`, `email`,`contractor`,`contractor_id`,`shortname`,`credit`,`sortcode`,`account`,`sia`,`siaexp`,`terms`,`regdate`,`emp_latitude`,`emp_longitude`,`password`,`conf_password`)"
                        . " VALUES ('$firstname','$lastname','$fullname','$telephone','$add1','$add2','$region','$typeofofficer',"
                        . "'$country','$postcode','$reference','$active','$email','$contractor','$contractor_id','$shortname','$credit','$sortcode','$account','$sia','$siaexp','$terms','" . date("Y-m-d") . "','$latitude','$longitude','$password','$cnfpassword')";
                // echo $query;
                if (mysqli_query($connect, $query)) {
                    //  $InsertID = mysqli_insert_id ($connect);

                    $InsertID = mysqli_insert_id($connect);
                    $empid = $InsertID;
                    sendmail($empid, $email);


                    $query = "INSERT IGNORE INTO `db_accountdtl`( `account_name`, `ShortName`  ,`Location`, `Address`,  `Contact`,account_type,headtype,Branch,regdate,Branch_id,refID, `sortcode`, `accountno`,`Email`) VALUES "
                            . "('$shortname','" . substr($shortname, 0, 15) . "', '', '',  '','Employee','Liability','$contractor','" . date('Y-m-d') . "','$contractor_id','$InsertID','$sortcode','$account','$email')";


                    if (mysqli_query($connect, $query)) {
                        $InsertID = mysqli_insert_id($connect);
                        $query = "UPDATE tbl_employee SET refID='$InsertID' WHERE EmployeeID='$empid'"; //data update in chart of accounts table
                        //echo $query;
                        if (mysqli_query($connect, $query)) {
                            
                        } else {
                            echo "ERROR IN QUERY2" . $connect->error;
                        };
                    } else {
                        echo $query . $connect->error . "ERROR IN QUERY";
                    };



                    $message = 'Submission Successful, An activation email is sent at your email id, Please click on the verify to activate your account and continue registration process. '; //'Record has been save Successfullly ';
                    $validate = true;
                    $InsertID = mysqli_insert_id($connect);
                    $EmployeeID = 0;
                    $firstname = "";
                    $lastname = "";
                    $shortname = "";
                    $contractor = "";
                    $telephone = "";
                    $add1 = "";
                    $add2 = "";
                    $region = "";
                    $country = "";
                    $postcode = "";
                    $reference = "";
                    $typeofofficer = "";
                    $email = "";
                    $credit = 0.0;
                    $sortcode = '';
                    $account = '';
                    $sia = '';
                    $siaexp = '';
                    $terms = 0;
                    $latitude = 0;
                    $longitude = 0;
                } else {
                    $message = "ERROR IN QUERY" . $connect->error;
                };
            }
        }
    }



    if (isset($_POST["new"])) {



        $EmployeeID = 0;
        $firstname = "";
        $lastname = "";
        $shortname = "";
        $contractor_id = 0;
        $contractor = "";
        $telephone = "";
        $add1 = "";
        $add2 = "";
        $typeofofficer = "";
        $region = "";
        $country = "";
        $postcode = "";
        $reference = "";
        $email = "";
        $credit = 0.0;
        $sortcode = '';
        $account = '';
        $sia = '';
        $siaexp = '';
        $terms = '';
        $latitude = 0;
        $longitude = 0;
        $message = 'Add New Record';
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}

function sendmail($InsertID, $emailid) {
    include "./dbconnection.php"; // Load file connection.php

    $pass = "fin786";
    $uname = $_POST['shortname']; // Get Name value from HTML Form
    $mobile = ''; // $_POST['telephone'];  // Get Mobile No
    $email = $emailid; //$_POST['email'];  // Get Email Value
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
//    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Port = 587; //2525;
    $mail->Username = "info@etaksi.co.uk"; // Your Email ID
    $mail->Password = "etaksi2009"; // Password of your email id
    $mail->SMTPSecure = 'tls';
    $mail->From = "info@etaksi.co.uk";
    $mail->FromName = "Guardian Team";
    $mail->AddAddress($email); // On which email id you want to get the message
    $mail->AddCC("jobs@guardianfm.co.uk");

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
                color: #1a82e2;;
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
    <body style=''>

<!--start preheader -->
<div class = 'preheader' style = 'display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;'>
A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.
</div>
<!--end preheader -->

<!--start body -->
<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%' style='margin:20px;'>



<!--start hero -->
<tr>
<td align = 'center' >
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
<td align = 'center'>
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
                                                       <a href='$verificationLink' target='_blank' style='display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;'><p style='color:white;'>Verify Your Email</p></a>
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
                    <br>
                                                       <br>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            <!-- end copy block -->

            <!-- start footer -->
            <tr>
                <td align='center'  style='padding: 24px;'>
                    <!--[if (gte mso 9)|(IE)]>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
                    <tr>
                    <td align='center' valign='top' width='600'>
                    <![endif]-->
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>

                        <!-- start permission -->
                        <tr>
                            <td align='center'  style='padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;'>
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Guardian FM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="https://cdn.crunchify.com/favicon.ico" />
        <title>Employee Entry Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/choosen.js"></script>

        <link rel="icon" type="image/x-icon" href="https://cdn.crunchify.com/favicon.ico" />
        <title>Employee Entry Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/choosen.js"></script>
        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">-->
        <!--<link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">-->
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link type='text/css' rel='stylesheet' href='assets/css/authenticationPage.css'>
        <style>
            .text-danger{
                color:red;
            }

        </style>
        <!--===============================================================================================-->
    </head>
    <body style="background-color: white; ">


        <div id="side-image" ng-class="$ctrl.fetchingReferralData ? '' : $ctrl.wasReferred() ? 'side-image--referral' : 'side-image--regular'" class="side-image--regular image-fader"></div>




        <div class="col-lg-push-4 col-lg-9">

            <div class="col-md-push-2 col-md-8 col-md-pull-2 col-xl-push-3 col-xl-6 col-xl-pull-3" style="padding-top:5%; ">

                <div class="h_iframe">

                    <div class="m-t-5 " style="text-align: center;">
                        <span  class="ng-scope"><a href= "agreement.php" style="text-decoration:none">
                                <h3 style="text-transform: capitalize; " >Guardian<span style="font-size:20px; font-weight: bold; color: #C03A1C;">FM</span>
                                </h3><img hidden="" class="logo-img" src="assets/images/logo.png" alt="logo"></a></span> 


                        <div class="m-t-2" >
                            <h2 class="m-b-2 ng-scope st-hover">Security Jobs without borders</h2> 
                        </div>
                        <p>Already member? <a href="index_V1.1.php" class="">Login Here.</a></p>

                    </div>

                    <div class="splash-container" >
                        <form  method="post" autocomplete="off" name="myForm" onsubmit="return validateForm()">

                            <div class="text-xs-center">


                                <div class="card">


                                    <div class="form-group" >
                                        <select name="typeofofficer" id="typeofofficer" value="<?php echo $typeofofficer ?>" class="form-control form-control-lg nopadding">
                                            <option value="Door Supervisor">Door Supervisor</option>
                                            <option value="Security Guard">Security Guard</option>
                                            <option value="Steward">Steward</option>
                                            <option value="Construction Operative Security">Construction Operative Security</option>
                                            <option value="Cleaners">Cleaners</option>
                                        </select>

                                    </div>






                                    <div class="form-group" hidden="">

                                        <input type="hidden" name="contractor_id" id="contractor_id" value="1120"  />
                                        <select  class="selbox form-control form-control-lg" required="" name="contractor" id="contractor" >

                                            <option id="1120">MAIN</option>



                                        </select>

                                        <script>
                                            document.getElementById('contractor').value = 'MAIN'

                                        </script>
                                    </div>






                                    <div class="form-group">

                                        <input class="form-control form-control-lg" type="text" class="user" id="firstname" name="firstname" value="<?php echo $firstname ?>" placeholder="firstname"/>


                                    </div>
                                    <div class="form-group">



                                        <input class="form-control form-control-lg" type="text" class="user" id="lastname"  name="lastname" value="<?php echo $lastname ?>" placeholder="lastname"/>
                                    </div>

                                    <div class="form-group">

                                        <input type="hidden" class="form-control form-control-lg"  name="EmployeeID" id="EmployeeID" value="<?php echo $EmployeeID ?>" placeholder="id"/>
                                        <input type="text" class="form-control form-control-lg" id="shortname" name="shortname" required="" value="<?php echo $shortname ?>" placeholder="Short Name"/>

                                    </div>

                                    <div class="form-group">
                                        <input class="form-control form-control-lg" id="password" name="password" type="password" value="<?php echo $password ?>" required="" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" id="cnfpassword" name="cnfpassword" required="" type="password" value="<?php echo $cnfpassword ?>" placeholder="Confirm">
                                    </div>


                                    <div class="form-group">


                                        <input type="text" id="email" name="email" class="form-control form-control-lg" value="<?php echo $email ?>" placeholder="Email"/>
                                    </div>





                                    <center><div class="col-75">
                                            <?php
                                            if (isset($message) && $validate == true) {
                                                // header("location:sign_up_acknowledge.php?message=" . $message);
                                                echo '<script> window.location.href ="sign_up_acknowledge.php?message=' . $message . '"</script>';
                                            } else {
                                                echo '<p  style="color:red;">' . $message . '</p>';
                                            }
                                            ?>  
                                            <button type="submit" class="btn btn-success m-t-2 btn-block text-xs-center" name="save">Register</button>  
                                            <!--<button type="submit" class="btn btn-success m-t-2 btn-block text-xs-center" name="new" style="background-color: #555555; ">Reset</button>-->  
                                            <!--<button class="submit" name="delete" style="background-color:#f44336;">Remove</button>-->
                                        </div></center>


                                    <div class="form-group">

                                    </div>

                                </div>




                                <div class="form-group row pt-0" style="display: none;">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <p>or continue with <a href="https://www.google.com">Google</a> or<a href="https://www.https://www.facebook.com/">Facebook</a> </p>
                                        <!--<button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>-->
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <!--<button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>-->
                                    </div>
                                </div>

                                <input hidden="" type="checkbox" name="active" id="active" checked=""   />
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>




        <script>

            $(document).on('change', '#terms', function ()
            {

                var val = document.getElementById('terms').value;
                if (val == 'Weekly') {
                    document.getElementById('credit').value = 14;
                } else {
                    document.getElementById('credit').value = 30;
                }




            })


            function validateForm() {
                var x = document.forms["myForm"]["password"].value;
                var y = document.forms["myForm"]["cnfpassword"].value;
                if (x != y) {
                    alert("Passwords does not match");
                    document.forms["myForm"]["password"].focus();
                    return false;
                }
            }

            $(document).ready(function () {


                $("#firstname").focusout(function () {
                    var txt = this.value;

                    this.value = txt.toUpperCase();
                });
                //
                $("#lastname").focusout(function () {
                    var txt = this.value;

                    this.value = txt.toUpperCase();
                });
                $("#email").focusout(function () {
                    var txt = this.value;

                    this.value = txt.toLowerCase();
                });

                $("#lastname , #firstname").blur(function () {
                    var txt = $("#firstname").val() + ' ' + $("#lastname").val();

                    $("#shortname").val(txt)
                });
                //document.getElementById('contractor').value=<?php // echo $contractor                                                                         ?>


                $(document).on('change', '#contractor', function ()
                {
                    //   alert("sdsds");
                    var contractor = document.getElementById('contractor');
                    var contractor_id = contractor[contractor.selectedIndex].id;
                    document.getElementById('contractor_id').value = contractor_id;
                })
            });
            function req($key, $default = '')
            {
                return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
            }
            function passdata() {
                var passvalue = "123";
                $.ajax({
                    url: 'login_success.php',
                    type: 'POST',
                    data: {passval: passvalue}, //Pass your varibale in data
                    success: function (getreturn) {
                        alert(getreturn); //you get return value in this varibale, us it anywhere
                    }
                });
                passdata();
            }


        </script> 

        <script>
            $('#select_employee').change(function ()
            {

                var emp_name = document.getElementById('select_employee');

                var id = emp_name[emp_name.selectedIndex].id;
                var column = "EmployeeID";
                var table = `tbl_employee`;
                $.ajax({
                    url: 'db_GetAdministrationData.php',
                    type: 'POST',
                    dataType: "json",
                    data: {id: id, column: column, table: table}, //Pass your varibale in data
                    success: function (data) {




                        document.getElementById('EmployeeID').value = data["EmployeeID"];

                        document.getElementById('shortname').value = data["shortname"];
                        document.getElementById('firstname').value = data["firstname"];
                        document.getElementById('contractor').value = data["contractor"];
                        document.getElementById('contractor_id').value = data["contractor_id"];

                        document.getElementById('lastname').value = data["lastname"];
                        document.getElementById('telephone').value = data["telephone"];

                        document.getElementById('add1').value = data["add1"];
                        document.getElementById('add2').value = data["add2"];

                        document.getElementById('Region').value = data["region"];
                        document.getElementById('country').value = data["country"];


                        document.getElementById('postcode').value = data["postcode"];
                        document.getElementById('reference').value = data["reference"];
                        document.getElementById('email').value = data["email"];
                        document.getElementById('credit').value = parseInt(data["credit"]);
                        document.getElementById('sortcode').value = data["sortcode"];
                        document.getElementById('account').value = data["account"];
                        document.getElementById('sia').value = data["sia"];
                        document.getElementById('siaexp').value = data["siaexp"];
                        document.getElementById('terms').value = data["terms"];
                        document.getElementById('latitude').value = data["emp_latitude"];
                        document.getElementById('longitude').value = data["emp_longitude"];

                        if (data["active"] == 'active') {
                            var active = true;
                        } else {
                            var active = false;
                        }
                        document.getElementById('active').checked = active;
                    }
                });
            });


        </script>

        <script>

            function PostCodeCheck() {
                var postcode = document.getElementById('postcode').value;


                $.ajax({
                    url: "https://api.postcodes.io/postcodes/" + postcode,
                    type: "GET",
                    dataType: "json",
                    success: function (data)
                    {

                        document.getElementById('postcode').value = data['result']['postcode'];
                        document.getElementById('country').value = data['result']['country'];
                        document.getElementById('add1').value = data['result']['admin_ward'] + ' ' + data['result']['parliamentary_constituency']
                        document.getElementById('add2').value = data['result']['region'] + ' ' + data['result']['country'];
                        document.getElementById('Region').value = data['result']['parliamentary_constituency'];
                        document.getElementById('latitude').value = data["result"]['latitude'];
                        document.getElementById('longitude').value = data["result"]['longitude'];
                    }

                });


            }

            /*--------------------------------------------Validations-----------------------------------------*/


            $("#postcode").focusout(function () { // When the user clicks the Search button
                PostCodeCheck();
            });







        </script> 
    </body>
</html>
