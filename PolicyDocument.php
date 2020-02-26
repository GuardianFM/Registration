<?php
session_start();
if (isset($_SESSION["username"])) {
    $id = $_GET['id'];
    include './dbconnection.php';

    $sql = "SELECT * FROM `tbl_employee` WHERE `EmployeeID`=" . $id . " ";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $credentials = $row['credentials'];
        $name = $row['firstname'] . ' ' . $row['lastname'];
        $regdate = $row['regdate'];
    } else {
        echo 'No Data Found' . $sql;
    }
} else {
    header("location:index_V1.1.php");
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Advance AI Security Controller</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>

            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 50%;
            }

            /* The Close Button */
            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container" style="padding-top: 20px; margin-top: 20px;background-color: lightgray; border-radius: 15px;"> 
            <center>
                <p><strong><u>CODE 22</u></strong></p>
                <p><strong><u>CODES OF CONDUCT </u></strong></p>
                <p><strong>&nbsp;</strong></p>
            </center>


            <p>At all times, maintain the agreed standards of personal appearance and deportment appropriate to the event or establishment and <strong><u>not</u></strong> to act in a manner that is likely to bring discredit to <strong>GUARDIAN FM </strong>or to the Customer.&nbsp;&nbsp;</p>
            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol>
                <li>Officers are not allowed to engage in direct employment with the client or client&rsquo;s client in any circumstances otherwise you will loose all your pay with us and you will not be able to work with client either as they are bound with our terms not to employ anyone directly.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="2">
                <li>If you are late more than 30 minutes without any proof able excuse, your 2 hrs wages will be deducted and if you are late more than 3 times in your employment, we will offsite you.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="3">
                <li>If you are failed to turn up on site without a notice of more than 6 hours, you will lose your last shift wages and disciplinary action will be taken against you.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="4">
                <li>If you leave the site before finish time, you will lose your last shift wages and disciplinary action will be taken against you.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="5">
                <li>If you don&rsquo;t reply the pre-check message and book on message your 30 mins wages will be deducted.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="6">
                <li>If you miss the book on message, please ring on the number 02035001905 option 1 to inform the control about your presence.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="7">
                <li>Standard uniform (Smart Black Trouser, Smart Black Shoes (No Trainers), Black Tie, Black Jumper/blazer and white shirt is very important, and 2 hr wages will be deducted if your uniform doesn&rsquo;t meet the required standards.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="8">
                <li>Greet all visitors to the unit in a friendly and courteous manner.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="9">
                <li>You should give assistance to any person on the premises who is injured or distressed.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="10">
                <li>Always use moderate language when dealing with members of the public and other members of staff employed at the Client&rsquo;s establishment.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="11">
                <li>Act fairly and not unlawfully, do not discriminate against any person on the grounds of colour, race, religion, sex or disability (and to be prepared to justify your actions.)</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="12">
                <li>Never solicit or accept any bribes or other considerations from any person, nor fail to account for any money or property received during the course of an assignment.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="13">
                <li>Not to drink alcohol, or under the influence of alcohol or any illegal substance, when reporting for duty, or whilst on an assignment.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="14">
                <li>Never abuse your position of authority and immediately report any incidents involvement with the police that may affect your continued ability to work on assignments as a Door Supervisor.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="15">
                <li>You should give due consideration concerning the admission of persons suspected of being underage or under the influence of drink or drugs. The final decision will always lie with the licensees or his deputy.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="16">
                <li>Never carry an offensive weapon.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="17">
                <li>Only use mobile telephones in an emergency whilst on duty, should stay silent and in pocket.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="18">
                <li>Always sign in upon commencement and the end of your duties. You must always prominently display your registration badge whilst on duty.</li>
            </ol>

            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="19">
                <li>Don&rsquo;t chew gum or eat any food whilst on duty.</li> </ol>
            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="20">
                <li>Only smoke during breaks in designated areas as instructed by the Clients representative.</li></ol>
            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="21">
                <li>Every self-employed/Employed person should be aware of the evacuation procedure and position of the fire points of the venue.</li></ol>
            <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="width:15px; float: left; padding: 2px;" /><ol start="22">
                <li>If you have medical emergency and can&rsquo;t attend the site, then you must produce relevant NHS documents.</li></ol>


            <p><strong><u>Failure to comply with any of the above Codes may result in dismissal or disciplinary proceedings</u></strong></p>


            <p>Before proceeding with this application</p>

            <ol start="23">
                <li> <input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="" />
                    Do you agree to a S.I.A. Criminal record check being carried out?</li>
                <li><input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="" />
                    Do you fully understand the potential consequences?</li>
                <li><input type="checkbox"  checked disabled name="" class="agreement" value="ON" style="" />
                    Do you agree to a credit check taken via a credit agency regards to yourself?</li>
            </ol>

            <p> Name<label style="width:250px; padding-left: 5px;  outline: 0;  border-width: 0 0 2px;  border-color: black " ><?php echo $name ?></label></p>

            <p>Your credentials<input style="width:250px; padding-left: 5px;  outline: 0;  border-width: 0 0 2px;  border-color: black " placeholder="Your credentials" type="text" name="credentials" value="<?php echo $credentials ?>" id="status" disabled/></p>



            <p>Date &emsp13;<?php echo $regdate; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>




            <div style="text-align: center;">


                <p><input  id="btn-accept" type="checkbox" name="accept" checked disabled style="width:15px;height: 15px;"/>&nbsp;&nbsp;<b><u>Accept Agreement</u></b></p>

                <br>
                <br>

            </div>
        </div>
    </body>



</html>

