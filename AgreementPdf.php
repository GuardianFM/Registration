<?php
$message = '';
$shortname = "";
$email = '';

include './dbconnection.php';

$sql = "SELECT * FROM `tbl_employee` WHERE `EmployeeID`='" . $_POST['id'] . "'";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($result);
if (mysqli_num_rows($result) > 0) {
    $shortname = $row['shortname'];
    $email = $row['email'];
    $county = $row['county'];
} else {
    echo 'No Data Found';
}

function fetch_customer_data() {



    $agreement = $_POST['status'];


    $output = '<h1 style="text-align:center;"><u>CODES OF CONDUCT</u></h1>';
    $output .= '<body>
        <div class="container" style="width:90%;align: center;">
            <p><strong><u>&nbsp;</u></strong></p>
          <center> <p><h4><strong><u style="color:red;">CODES OF CONDUCT </u></strong></h4></p></center> 
      
            <div style="width:95%; "><p style="text-align: justify;"><strong><u> Book on Procedure</u></strong></p>
                <p style="text-align: justify;">Make sure to book on with the company. If you miss the book on message, please ring on the number 02035001905 option 1 to inform the control about your presence. If you don&rsquo;t reply the pre-check message and book on message your 30 mins wages will be deducted.</p></div>
             <p style="text-align: justify;"><strong><u>Dress Code</u></strong></p>
            <p style="text-align: justify;">Our Company&rsquo;s standard uniform (Smart Black Trouser, Smart Black Shoes (No Trainers), Black Tie, Black Jumper/blazer and a white shirt is very important. <strong>2 hours</strong> wages will be deducted if your uniform doesn&rsquo;t meet the required standards.</p>
            <p style="text-align: justify;"><strong><u>Cellphone Usage</u></strong></p>
            <p style="text-align: justify;">We allow&nbsp;<a href="https://resources.workable.com/cell-phone-company-policy">use of cell phones at work</a>. But, we also want to ensure that your devices won&rsquo;t distract you from your work. We ask you to follow a three simple rules:</p>
            <ul style="text-align: justify;">
                <li>Avoid playing games on your phone or texting excessively.</li>
                <li>Avoid personal Calling.</li>
                <li>Use phone only in Emergency</li>
            </ul>
            <p style="text-align: justify;"><strong><u>Working Hour Rules</u></strong></p>
            <p style="text-align: justify;">Always sign in upon commencement and the end of your duties. You must always prominently display your registration badge whilst on duty. If you are late more than <strong>30 minutes</strong> without any proof able excuse, your 2 hours wages will be deducted and if you are late more than <strong>3 times</strong> in your employment, we will offsite you.</p>
            <p style="text-align: justify;">If you are failed to turn up on site without a notice of more than <strong>6 hours</strong>, you will lose your last shift wages and disciplinary action will be taken against you. If you leave the site before finish time, you will lose your last shift wages and disciplinary action will be taken against you.</p>
            <p style="text-align: justify;">Officers are not allowed to engage in direct employment with the client or client&rsquo;s client in any circumstances otherwise you will lose all your pay with us and you will not be able to work with client either as they are bound with our terms not to employ anyone directly.</p>
            <p style="text-align: justify;">If you have <strong>Medical Emergency</strong> and can&rsquo;t attend the site, then you must produce relevant NHS documents.</p>
            <p style="text-align: justify;">Every self-employed/Employed person should be aware of the evacuation procedure and position of the fire points of the venue.</p>
            <p style="text-align: justify;"><strong><u>Working Culture</u></strong></p>
            <p style="text-align: justify;">Always greet all visitors to the unit in a friendly and courteous manner. You should give assistance to any person on the premises who is injured or distressed. Use moderate language when dealing with members of the public and other members of staff employed at the Client&rsquo;s establishment. Act fairly and not unlawfully, do not discriminate against any person on the grounds of colour, race, religion, sex or disability.</p>
            <p style="text-align: justify;">Don&rsquo;t chew gum or eat any food on duty. Smoke during breaks in designated areas instructed by the Clients representative. No alcohol drinking, or under the influence of alcohol or any illegal substance, when reporting for duty.</p>
            <p style="text-align: justify;">Never ask for or accept any bribes or other considerations from any person, nor fail to explain for any money or property received during the course of an assignment. You should give due consideration concerning the admission of persons suspected of being underage or under the influence of drink or drugs. The final decision will always lie with the licensees or his deputy. Never carry an offensive weapon. Never abuse your position of authority and immediately report any incidents involvement with the police that may affect your continued ability to work on assignments as a Door Supervisor.</p>
            <strong><p style="text-align: justify;"><u>Failure to comply with any of the above Codes may result in dismissal or disciplinary proceedings</u></p></strong>
            <p style="text-align: justify;">Before proceeding with this application</p>
            <ul style="text-align: justify;">
                <li>Do you agree to a S.I.A. Criminal record check being carried out? </li>
                <li>Do you fully understand the potential consequences? </li>
                <li>Do you agree to a credit check taken via a credit agency regards to yourself ?</li>
            </ul>
            <p>Print Name : <b>' . $GLOBALS['shortname'] . '</b></p>
            <p name="agreement" id="status">Signature : <b>' . $agreement . '</b></p>   
            <p>Date :<b> ' . date('d-M-Y') . '</b> </p>
            </div>
    </body>';

    $output .= '
		</body>
	';
    return $output;
}

include('pdf.php');
$file_name = md5(rand()) . '.pdf';
$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
$html_code .= fetch_customer_data();
$pdf = new Pdf();
$pdf->load_html($html_code);
$pdf->render();
$file = $pdf->output();
file_put_contents($file_name, $file);

require 'class/class.phpmailer.php';
$mail = new PHPMailer;
$mail->IsSMTP();        //Sets Mailer to send message using SMTP
$mail->Host = 'send.one.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
$mail->Port = 587; //2525;         //Sets the default SMTP server port
$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = 'info@etaksi.co.uk';     //Sets SMTP username
$mail->Password = 'etaksi2009';     //Sets SMTP password
$mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
$mail->From = 'info@etaksi.co.uk';   //Sets the From email address for the message
$mail->FromName = 'Guardian FM HR';   //Sets the From name of the message
$mail->AddAddress($GLOBALS['email'], $GLOBALS['shortname']);  //Adds a "To" address
$mail->addCC('accounts@guardianfm.co.uk', 'Guardian FM HR');
$mail->addCC('hr@guardianfm.co.uk', 'Guardian FM HR');
$mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);       //Sets message type to HTML				
$mail->AddAttachment($file_name);
//Adds an attachment from a path on the filesystem
$mail->Subject = 'Officer ' . $GLOBALS['shortname'] . ' has accepted the agreement [' . $GLOBALS['county'] . ']';   //Sets the Subject of the message
$mail->Body = 'Please Find The Officer ' . $GLOBALS['shortname'] . ' agreement attached above.';    //An HTML or plain text message body
if ($mail->Send()) {        //Send an Email. Return true on success or false on error
    $message = '<label class="text-success">Agreement Details has been send successfully...</label>';
}
unlink($file_name);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PDF Send As Attachment with Email in PHP</title>
<!--        <script src="jquery.min.js"></script>
        <link rel="stylesheet" href="bootstrap.min.css" />
        <script src="bootstrap.min.js"></script>-->
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    </head>
    <body>
        <br />
        <div class="container">
            <br />
            <?php echo $message; ?>
            <br />
            <?php
            echo fetch_customer_data();
            ?>			
        </div>
        <br />
        <br />
    </body>


</html>





