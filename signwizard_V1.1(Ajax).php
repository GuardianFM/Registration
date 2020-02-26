<?php
include "dbconnection.php";
session_start();
if (isset($_SESSION["username"])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $currmon = $_GET['currmon'];
        $name = $_GET['officername'];

        $record_check_query = "SELECT * FROM tbl_employee  WHERE `EmployeeID`='$id'  AND agreement_status='Accept' AND stepno =5 LIMIT 1";
        $result = mysqli_query($connect, $record_check_query);
        $user = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) > 0) { // if user exists
            header("location:index_user.php?id=$id&currmon=$currmon&officername=$name");
            echo 'last step';
        } else {
//            header("location:index_V1.1.php");
        }
    }
} else {

    header("location:index_V1.1.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Guardian FM</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <!--<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">-->
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->



        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <link type='text/css' rel='stylesheet' href='assets/css/authenticationPage.css'>
        <link rel="stylesheet" href="assets/libs/css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link rel="stylesheet" href="assets/libs/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <!--<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <script src="assets/js/select2.min.js" type="text/javascript"></script>
        <link href="assets/css/select2.min.css" rel="stylesheet" type="text/css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>

        <script src="vendor/jquery/select2.min.js" type="text/javascript"></script>
        <link href="css/select2.min.css" rel="stylesheet" type="text/css"/>
        <style>
            html,
            body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;

                -ms-flex-align: center;
                align-items: center;
                /*padding-top: 20px;*/
                padding-bottom: 40px;
                background-color: white;
                font-family: Averta, "Avenir W02", Avenir, Helvetica, Arial, sans-serif;
                font-size: 15px;
                line-height: 24px;
                color: #5d7079;
            }
            /*    h1 {border-style: solid;}*/

            a {
                color: #00b9ff;
                text-decoration: underline;
                border-color: transparent;
            }
            div{
                /*border:1px solid black;*/
            }

            @media only screen and (max-width: 600px) {
                .splash-container {
                    /*width:100%;*/
                    min-height: 500px;
                    margin-right:5px;
                }
            }

        </style>

        <style>
            * {
                box-sizing: border-box;
            }

            body {
                background-color: white;
            }

            #rehgform {
                background-color: #ffffff;
                margin: 100px auto;
                font-family: Raleway;
                padding: 40px;
                /*width: 70%;*/
                min-width: 300px;
                min-height: 500px;

            }
            div{
                /*border-style: solid;*/
            }
            h1 {
                text-align: center;  
            }

            /*        input {
                        padding: 10px;
                        width: 100%;
                        font-size: 17px;
                        font-family: Raleway;
                        border: 1px solid #aaaaaa;
                    }*/

            /* Mark input boxes that gets an error on validation: */
            input.invalid {
                background-color: #ffdddd;
            }

            /* Hide all steps by default: */
            .tab {
                display: none;
                /*min-height: 300px;*/

            }

            button {
                background-color: #4CAF50;
                color: #ffffff;
                border: none;
                padding: 10px 20px;
                font-size: 17px;
                font-family: Raleway;
                cursor: pointer;
            }

            button:hover {
                opacity: 0.8;
            }

            #prevBtn {
                background-color: #bbbbbb;
            }

            /* Make circles that indicate the steps of the form: */
            .step {
                height: 20px;
                width: 20px;
                margin: 0 2px;
                background-color: #bbbbbb;
                border: none;  
                border-radius: 50%;
                display: inline-block;
                opacity: 1;
            }

            .step.active {
                opacity: 1;
                background-color:  orange;
            }

            /* Mark the steps that are finished and valid: */
            .step.finish {
                background-color: #00b9ff;
            }
            div{
                /*border-style:solid;*/
            }
        </style>
        <style>
            div.relative {
                position: relative;
                width: 600px;
                height: 400px;
                border: 3px solid #73AD21;
            } 

            div.absolute {
                position: absolute;
                top: 80px;
                right: 0;
                width: 200px;
                height: 100px;
                border: 3px solid #73AD21;
            }
        </style>
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
                position: relative;
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                border: 1px solid #888;
                width: 80%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }

            /* Add Animation */
            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0} 
                to {top:0; opacity:1}
            }

            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }

            /* The Close Button */
            .close {
                color: white;
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

            .modal-header {
                padding: 2px 16px;
                background-color: #5cb85c;
                color: white;
            }

            .modal-body {padding: 2px 16px;}

            .modal-footer {
                padding: 2px 16px;
                background-color: #5cb85c;
                color: white;
            }
            .sampleDiv1{  
                display:none;
                margin-top:5px;     
            }
            .sampleDiv2{  
                display:none;
                margin-top:5px;     
            }
            *:focus{
                outline:none !important;
            }


            .select2-dropdown {
                top: 22px !important; left: 8px !important;
            }

            .error{
                outline: 1px solid red;
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
                        <span  class="ng-scope"><a href= "agreement_V1.1.php" style="text-decoration:none">
                                <h3 style="text-transform: capitalize; " >Guardian<span style="font-size:20px; font-weight: bold; color: #C03A1C;">FM</span>
                                </h3><img hidden="" class="logo-img" src="assets/images/logo.png" alt="logo"></a></span> 


                        <div class="m-t-2" >
                            <h2 class="m-b-2 ng-scope st-hover">Security Jobs without borders</h2> 
                        </div>
                        <p>Already member? <a href="logout_V1.1.php" class="">Logout Here.</a></p>

                    </div>

                    <form class="splash-container" method="post" id="regform" name="myForm" >
                        <input type="hidden" name="stepno" id="stepno" style="width:100px; display: block;" value="0" />
                        <input type="hidden" name="stepdb" id="stepdb" style="width:100px; display: block;" value="" />

                        <div class="text-xs-center">


                            <div class="card">



                                <div  class="form-group row pt-0">

                                    <!-- Circles which indicates the steps of the form: -->
                                    <div  style="text-align:center;margin-top:20px;  " class='form-control'>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab form-group" id="0">Step1 User Info:
                            <div class="form-group" >
                                <select name="typofficer"  id="typofficer" class="form-control form-control-lg " >
                                    <?php
                                    include 'dbconnection.php'; //get the contractors 
                                    $sql = "SELECT * FROM `typeofofficer` ORDER BY `type` ASC";
                                    $result = mysqli_query($connect, $sql);
                                    $i = 0;
                                    $row = mysqli_fetch_array($result);
                                    $contractor_id = 0;

                                    mysqli_data_seek($result, 0);

                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $row["type"] ?>"><?php echo $row["type"] ?></option>
                                        <?php
                                    }
                                    ?> 

                                </select>

                            </div>

                            <script>

                                document.getElementById('typofficer').value = '';
                            </script>

                            <div class="form-group" hidden="">

                                <input type="hidden" name="contractor_id" id="contractor_id" value="1120"  />
                                <select  class="form-control form-control-lg"  name="contractor" id="contractor" >

                                    <option id="1120">MAIN</option>



                                </select>

                                <script>
                                    document.getElementById('contractor').value = 'MAIN'

                                </script>
                            </div>


                            <div class="form-group">

                                <input class="form-control form-control-lg" type="text" class="user" id="firstname" autocomplete="off" name="firstname" value="" placeholder="firstname"/>

                                <input class="form-control form-control-lg" type="text" class="user" id="lastname"  autocomplete="off" name="lastname" value="" placeholder="lastname"/>
                            </div>

                            <div class="form-group">

                                <input type="hidden" class="form-control form-control-lg"  name="EmployeeID" id="EmployeeID" autocomplete="off" value="" placeholder="id"/>
                                <input type="text" class="form-control form-control-lg" id="shortname" name="shortname" autocomplete="off"  value="" placeholder="Short Name"/>

                            </div>

                            <div class="form-group">
                                <input class="form-control form-control-lg" id="password" name="password" type="password" autocomplete="off" value=""   placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="cnfpassword" name="cnfpassword" type="password" autocomplete="off"  value=""  placeholder="Confirm">
                            </div>


                            <div class="form-group">


                                <input type="text" id="email" name="email" class="form-control form-control-lg" autocomplete="off" value="" placeholder="Email"/>
                            </div>

                        </div>

                        <div class="tab form-group" id="1">Address & Contact Info:
            <!--                <p><input class="form-control form-control-lg" placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
                            <p><input class="form-control form-control-lg" placeholder="Phone..." oninput="this.className = ''" name="phone"></p>-->



                            <div class="form-group">

                                <input onblur=" PostCodeValidate();" id="postcode" class="form-control form-control-lg" type="text" name="postcode" autocomplete="off" value="" placeholder="Postcode(For example : CA24,LU1..)" />
                                <input placeholder="Latitude" name="latitude" id="latitude" type="hidden"  class="form-control form-control-lg" value=""  autocomplete="off">
                                <input placeholder="Longitude" name="longitude" id="longitude" type="hidden"  class="form-control form-control-lg" value=""  autocomplete="off">
                            </div>



                            <div class="form-group"> 
                                <select style="width:100%;" placeholder="Address..." name="add1" id="address" class="form-control form-control-lg" >
                                    <!--<option value=""></option>-->
                                </select>
<!--                                <script>
                                    $("#address").select2({
                                        placeholder: "Select Address",
                                        allowClear: true
                                    });
                                </script>-->
                            </div>


                            <div class="form-group" style="border-style: none;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select id="Region" class="form-control form-control-lg" name="region" >
                                            <optgroup label="Please Select County"></optgroup>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select id="city" class="form-control form-control-lg" name="city" >
                                            <optgroup label="Please Select City"></optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <input id="country" class="form-control form-control-lg" type="text" autocomplete="off" name="country" value="" placeholder="Country"/>
                            </div>

                            <div class="form-group">
                                <input placeholder="Phone..." name="telephone" id="phone" maxlength="12"  value="" class="form-control form-control-lg" autocomplete="off" onblur="PhoneCheck(this.value);">
                            </div>


                            <div class="form-group">
                                <select placeholder="Gender.." name="gender" id="gender"  value="" class="form-control form-control-lg" autocomplete="off">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>


                            </div>


                            <div class="form-group">
                                <input type="date" name="dob" id="dob"  value=" class="form-control form-control-lg" autocomplete="off">
                                       <div class="sampleDiv1">
                                    <div class="well">Enter Date Of Birth</div>
                                </div>

                            </div>

                        </div>
                        <div class="tab form-group" id="2">Doc & License:

                            <div class="form-group">
                                <input name="typofficerIn" id="typofficerIn"  value="" class="form-control form-control-lg" autocomplete="off" disabled/>
                            </div>


                            <div class="form-group">
                                <input placeholder="SIA License Number..." name="sia_no" id="sia_no"   value=""  maxlength="16" class="form-control form-control-lg" autocomplete="off">
                            </div>



                            <div class="form-group">
                                <input type="date" placeholder="SIA License Expiry..." name="sia_exp"  value="" id="sia_exp" class="form-control form-control-lg" autocomplete="off">
                                <div class="sampleDiv2">
                                    <div class="well">Enter SIA Expiry Date </div>
                                </div>

                            </div>

                        </div>
                        <div class="tab form-group" id="3">
                            <div class="form-group">            
                                <table border='1' class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " id="document" >
                                    <thead >
                                        <tr class="header">
                                            <th colspan="4"><h4 class="headerheading">Upload Documents</h4></th>
                                        </tr>
                                        <tr class="table-header">
                                            <th>Description</th>
                                            <th>Upload</th>
                                            <th></th>

                                        </tr>
                                    </thead> 
                                    <tbody >

                                        <tr class="table-row">
                                            <td><input type="checkbox" name="siafrontcheck" id="siafrontcheck" value="ON" disabled/></td>
                                            <td class="col col-1"> SIA Badge (Front)</td>
                                            <td class="col col-1" data-label=""><a href="#" id="sia_front" title="SIA Badge (Front)"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                            <td class="col col-1" data-label=""><label  id="sia_front_label">Please upload document</label></td>

                                        </tr>
                                        <tr class="table-row">
                                            <td><input type="checkbox" name="siabackcheck"  id="siabackcheck" value="ON" disabled/></td>
                                            <td class="col col-2">SIA NI</td>
                                            <td class="col col-2" data-label=""><a <a href="#" id="sia_rear" title="SIA Badge (Rear)"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                            <td class="col col-2"><label id="sia_rear_lable">Please upload document</label></td>
                                        </tr>
                                        <tr class="table-row">
                                            <td><input type="checkbox" name="passportcheck" id="passportcheck" value="ON" disabled/></td>
                                            <td class="col col-3">Passport</td>
                                            <td class="col col-3" data-label=""><a href="#" id="passport" title="Passport"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                            <td class="col col-3" data-label=""><label  id="passport_label">Please upload document</label></td>
                                        </tr>
                                        <tr class="table-row">
                                            <td><input type="checkbox" name="utilitybillcheck" id="utilitybillcheck" value="ON" disabled/></td>
                                            <td class="col col-4">Utility Bill</td>
                                            <td class="col col-4" data-label=""><a href="#" id="utilitybill" title="Utility Bill"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                            <td class="col col-4" data-label=""><label  id="utilitybill_label">Please upload document</label></td>
                                        </tr>
                                        <tr class="table-row">
                                            <td><input type="checkbox" name="otherdoccheck" id="otherdoccheck" value="ON" disabled/></td>
                                            <td class="col col-1">Other Document</td>
                                            <td class="col col-1" data-label=""><a href="#" id="otherdocument" title="Other Document"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                            <td class="col col-1" data-label=""><label  id="otherdocument_label">Please upload document</label></td>
                                        </tr>

                                    </tbody>

<!--                                <tfoot>
                                <td colspan="2"></td>

                                </tfoot>-->

                                </table>
                            </div>
                        </div>

                        <div class="tab form-group" style="font-size:12px;" id="4">Agreement:


                            <div class="card" style="overflow-y:auto; height: 400px;"> <?php include 'agreement_V1.1.php'; ?>
                                <!--<div class="absolute">This div element has position: absolute;</div>-->
                            </div>

                        </div>

                        <div class="tab form-group" id="5">
                            <h3  />Thank You! You have Successfully completed your registeration process.</h3>

                            <label>Please Click login to apply for jobs. </label>
                        </div>


                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="btn_extra_license_modal"  onclick="" style="display: none;">Add Extra License</button>
                                <button type="button" id="prevBtn" class="" onclick="">Previous</button>
                                <button  id="nextBtn" type="button"  class="" onclick="">Next</button>
                                <button  id="nextFinish"  hidden="" type="button"  class="" onclick="">Complete</button>
                                <button  class="btn btn-block btn-primary" id="nextsubmit" type="submit" hidden="" name="next"  >validate</button>
                                <!--<button type="submit" class="" name="next">next</button>-->  
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                <header class="w3-container w3-blue"> 
                    <span onclick="document.getElementById('id02').style.display = 'none'" 
                          class="w3-button w3-display-topright">&times;</span>
                    <h2>Document</h2>
                </header>
                <br/>
                <div class="w3-container" style="height: 90%; overflow-y: auto;">
                    <table class="w3-table-all w3-centered w3-hoverable" id="" style="height: auto; overflow-y: scroll; zoom: 80%;">
                        <thead >
                            <tr >
                                <th>Description</th>
                                <th>Upload</th>

                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td>SIA License (Front)</td>
                                <td><input type="file" id="file_2" name="file_2" ></td>

                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    <br/>

                    <img id="sia_front_doc" alt="No document uploaded yet" style="width: 100%;"/>


                </div>
                <footer class="w3-container w3-blue">
                    <p>GuardianFM</p>
                </footer>
            </div>
        </div>

        <div id="id03" class="w3-modal">
            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                <header class="w3-container w3-blue"> 
                    <span onclick="document.getElementById('id03').style.display = 'none'" 
                          class="w3-button w3-display-topright">&times;</span>
                    <h2>Document</h2>
                </header>
                <br/>
                <div class="w3-container" style="height: 90%; overflow-y: auto;">
                    <table class="w3-table-all w3-centered w3-hoverable" id="" style="height: auto; overflow-y: scroll; zoom: 80%;">
                        <thead >
                            <tr >
                                <th>Description</th>
                                <th>Upload</th>

                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td>SIA License (Rear)</td>
                                <td><input type="file" id="file_3" name="file_3" ></td>

                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    <br/>

                    <img id="sia_rear_doc" alt="No document uploaded yet" style="width: 100%;"/>


                </div>
                <footer class="w3-container w3-blue">
                    <p>GuardianFM</p>
                </footer>
            </div>
        </div>

        <div id="id04" class="w3-modal">
            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                <header class="w3-container w3-blue"> 
                    <span onclick="document.getElementById('id04').style.display = 'none'" 
                          class="w3-button w3-display-topright">&times;</span>
                    <h2>Document</h2>
                </header>
                <br/>
                <div class="w3-container" style="height: 90%; overflow-y: auto;">
                    <table class="w3-table-all w3-centered w3-hoverable" id="" style="height: auto; overflow-y: scroll; zoom: 80%;">
                        <thead >
                            <tr >
                                <th>Description</th>
                                <th>Upload</th>

                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td>Passport</td>
                                <td><input type="file" id="file_4" name="file_4" ></td>

                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    <br/>

                    <img id="passport_doc" alt="No document uploaded yet" style="width: 100%;"/>


                </div>
                <footer class="w3-container w3-blue">
                    <p>GuardianFM</p>
                </footer>
            </div>
        </div>

        <div id="id05" class="w3-modal">
            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                <header class="w3-container w3-blue"> 
                    <span onclick="document.getElementById('id05').style.display = 'none'" 
                          class="w3-button w3-display-topright">&times;</span>
                    <h2>Document</h2>
                </header>
                <br/>
                <div class="w3-container" style="height: 90%; overflow-y: auto;">
                    <table class="w3-table-all w3-centered w3-hoverable" id="" style="height: auto; overflow-y: scroll; zoom: 80%;">
                        <thead >
                            <tr >
                                <th>Description</th>
                                <th>Upload</th>

                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td>Passport</td>
                                <td><input type="file" id="file_5" name="file_5" ></td>

                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    <br/>

                    <img id="bill_doc" alt="No document uploaded yet" style="width: 100%;"/>


                </div>
                <footer class="w3-container w3-blue">
                    <p>GuardianFM</p>
                </footer>
            </div>
        </div>

        <div id="id06" class="w3-modal">
            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                <header class="w3-container w3-blue"> 
                    <span onclick="document.getElementById('id06').style.display = 'none'" 
                          class="w3-button w3-display-topright">&times;</span>
                    <h2>Document</h2>
                </header>
                <br/>
                <div class="w3-container" style="height: 90%; overflow-y: auto;">
                    <table class="w3-table-all w3-centered w3-hoverable" id="" style="height: auto; overflow-y: scroll; zoom: 80%;">
                        <thead >
                            <tr >
                                <th>Description</th>
                                <th>Upload</th>

                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td>Passport</td>
                                <td><input type="file" id="file_6" name="file_6" ></td>

                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    <br/>

                    <img id="other_doc" alt="No document uploaded yet" style="width: 100%;"/>


                </div>
                <footer class="w3-container w3-blue">
                    <p>GuardianFM</p>
                </footer>
            </div>
        </div>



    </body>


    <script>
        $(document).ready(function () {

            DocumentCompleteStatus();
            setTimeout(function () {
                Fetch();
            }, 1000);



            function Fetch() {

                var id = '<?php echo $_GET['id']; ?>';

                $.ajax({
                    url: "Signin_new_db.php",
                    type: "POST",
                    dataType: "json",
                    data: {id: id, mode: "Fetch"},
                    success: function (data)
                    {

                        //Step No. 0
                        document.getElementById('typofficer').value = data['typeofofficer'];
                        document.getElementById('firstname').value = data['firstname'];
                        document.getElementById('lastname').value = data['lastname'];
                        document.getElementById('shortname').value = data['shortname'];
                        document.getElementById('password').value = data['password'];
                        document.getElementById('cnfpassword').value = data['conf_password'];
                        document.getElementById('email').value = data['email'];

                        //Step No. 1
                        document.getElementById('postcode').value = data['postcode'];

                        //Adding Value in Address Select
                        var x = document.getElementById("address");
                        var option = document.createElement("option");
                        option.text = data['add1'];
                        x.add(option);

                        //Adding Value in County Select
                        var y = document.getElementById("Region");
                        var option = document.createElement("option");
                        option.text = data['county'];
                        y.add(option);

                        document.getElementById('country').value = data['country'];

                        //Adding Value in city Select
                        var z = document.getElementById("city");
                        var option = document.createElement("option");
                        option.text = data['city'];
                        z.add(option);

                        document.getElementById('phone').value = data['telephone'];
                        document.getElementById('gender').value = data['gender'];
                        document.getElementById('dob').value = data['dob'];
                        document.getElementById('latitude').value = data['emp_latitude'];
                        document.getElementById('longitude').value = data['emp_longitude'];

                        //Step No. 2
                        document.getElementById('sia_no').value = data['sia'];
                        document.getElementById('sia_exp').value = data['siaexp'];


                        //Step No. 3
                        //Documents Upload

                        //Step No. 4
                        document.getElementById('status').value = data['credentials'];

                    }
                });
            }






        });



        showTab(0, 'Start');
        $('#nextBtn').click(function () {

            if (document.getElementById('stepno').value == '5') {
                window.location.href = "index_user.php?id=" + '<?php echo $id; ?>' + "&currmon=" + '<?php echo $currmon; ?>' + "&officername=" + '<?php echo $name; ?>';
            }

            if (Validate() != false) {
                Update();
                showTab('', 'Next');
            }



        });
        $('#prevBtn').click(function () {
            showTab('', 'Previous');
        });

        function showTab(n, mode) {

            var steps = parseInt(document.getElementById('stepno').value);
            if (mode == "Start") {
                document.getElementById(n).style.display = "block";
            } else if (mode == "Next") {

                var n = (parseInt(steps) + 1);
                document.getElementById('stepno').value = n;
                //Show Next Step
                document.getElementById(n).style.display = "block";
                //Hide Prevouus Step
                document.getElementById(steps).style.display = "none";
            } else if (mode == "Previous") {

                var n = (parseInt(steps) - 1);
                document.getElementById('stepno').value = n;
                //Show Previous Step
                document.getElementById(n).style.display = "block";
                //Hide Current Step
                document.getElementById(steps).style.display = "none";
            }


            //Final Step
            if (n == 5) {
                document.getElementById("nextBtn").innerHTML = "Finish";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //Hide Previous Button On 0 Step
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }

            if (n == 2) {
                document.getElementById("btn_extra_license_modal").style.display = "inline";
            } else {
                document.getElementById("btn_extra_license_modal").style.display = "none";
            }


        }


        function Update() {
            var id = '<?php echo $_GET['id']; ?>';
            var steps = document.getElementById('stepno').value;
            //Step No. 0
            var typofficer = document.getElementById('typofficer').value;
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById('lastname').value;
            var shortname = document.getElementById('shortname').value;
            var password = document.getElementById('password').value;
            var cnfpassword = document.getElementById('cnfpassword').value;
            var email = document.getElementById('email').value;

            //Step No. 1
            var postcode = document.getElementById('postcode').value;
            var address = document.getElementById('address').value;
            var Region = document.getElementById('Region').value;
            var city = document.getElementById('city').value;
            var country = document.getElementById('country').value;
            var phone = document.getElementById('phone').value;
            var gender = document.getElementById('gender').value;
            var dob = document.getElementById('dob').value;
            var latitude = document.getElementById('latitude').value;
            var longitude = document.getElementById('longitude').value;


            //Step No. 2
//            var typofficer = document.getElementById('typofficer').value;
            var sia_no = document.getElementById('sia_no').value;
            var sia_exp = document.getElementById('sia_exp').value;

            if (typofficer == "Steward" || typofficer == "Cleaner") {
                sia_exp = '0000-00-00';
            }

            //Step No. 3
            //Documents Upload

            //Step No. 4
            var credential = document.getElementById('status').value;
            var agreement_accept = document.getElementById('btn-accept').checked;
            if (agreement_accept.checked == true) {
                var agreement = "Accept";
            } else {
                var agreement = "Decline";
            }
            //Step No. 5
            //Finish

            $.ajax({
                url: "Signin_new_db.php",
                type: "POST",
                dataType: "TEXT",
                data: {mode: "Update", id: id, steps: steps, typofficer: typofficer, firstname: firstname, lastname: lastname, shortname: shortname, password: password, cnfpassword: cnfpassword, email: email, postcode: postcode,
                    address: address, Region: Region, city: city, country: country, latitude: latitude, longitude: longitude, phone: phone, gender: gender, dob: dob, sia_no: sia_no, sia_exp: sia_exp, credential: credential, agreement: agreement},
                success: function (data)
                {
//                    alert(data);
                }
            });

        }

        function Validate() {
            var steps = document.getElementById('stepno').value;
            //Step No. 0
            var typofficer = document.getElementById('typofficer').value;
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById('lastname').value;
            var shortname = document.getElementById('shortname').value;
            var password = document.getElementById('password').value;
            var cnfpassword = document.getElementById('cnfpassword').value;
            var email = document.getElementById('email').value;
            //Step 0 Validations
            if (steps == 0) {
                if (typofficer == "") {
                    $("#typofficer").addClass("error");
                    return false;
                } else {
                    $("#typofficer").removeClass("error");
                }
                if (firstname == "") {
                    $("#firstname").addClass("error");
                    return false;
                } else {
                    $("#firstname").removeClass("error");
                }
                if (lastname == "") {
                    $("#lastname").addClass("error");
                    return false;
                } else {
                    $("#lastname").removeClass("error");
                }
                if (shortname == "") {
                    $("#shortname").addClass("error");
                    return false;
                } else {
                    $("#shortname").removeClass("error");
                }
                if (password == "") {
                    $("#password").addClass("error");
                    return false;
                } else {
                    $("#password").removeClass("error");
                }
                if (cnfpassword == "") {
                    $("#cnfpassword").addClass("error");
                    return false;
                } else {
                    $("#cnfpassword").removeClass("error");
                }
                if (email == "") {
                    $("#email").addClass("error");
                    return false;
                } else {
                    $("#email").removeClass("error");
                }
                if (password != cnfpassword) {
                    $("#password").addClass("error");
                    $("#cnfpassword").addClass("error");
                    alert("Password does not match");
                    return false;
                }
                return true;
            }

            //Step No. 1
            var postcode = document.getElementById('postcode').value;
            var address = document.getElementById('address').value;
            var Region = document.getElementById('Region').value;
            var city = document.getElementById('city').value;
            var country = document.getElementById('country').value;
            var phone = document.getElementById('phone').value;
            var gender = document.getElementById('gender').value;
            var dob = document.getElementById('dob').value;

            //Step 1 Validations
            if (steps == 1) {
                if (postcode == "") {
                    $("#postcode").addClass("error");
                    return false;
                } else {
                    $("#postcode").removeClass("error");
                }
                if (address == "") {
                    $("#address").addClass("error");
                    return false;
                } else {
                    $("#address").removeClass("error");
                }
                if (city == "") {
                    $("#city").addClass("error");
                    return false;
                } else {
                    $("#city").removeClass("error");
                }
                if (Region == "") {
                    $("#Region").addClass("error");
                    return false;
                } else {
                    $("#Region").removeClass("error");
                }
                if (country == "") {
                    $("#country").addClass("error");
                    return false;
                } else {
                    $("#country").removeClass("error");
                }
                if (phone == "") {
                    $("#phone").addClass("error");
                    return false;
                } else {
                    $("#phone").removeClass("error");
                }
                if (gender == "") {
                    $("#gender").addClass("error");
                    return false;
                } else {
                    $("#gender").removeClass("error");
                }
                if (dob == "") {
                    $("#dob").addClass("error");
                    return false;
                } else {
                    $("#dob").removeClass("error");
                }

                if (dob > '<?php echo date("Y-m-d"); ?>') {
                    $("#dob").addClass("error");
                    alert("Enter valid date of birth");
                    return false;
                } else {
                    $("#dob").removeClass("error");
                }
                return true;
            }


            //Step No. 2
            var typofficer = document.getElementById('typofficer').value;
            var sia_no = document.getElementById('sia_no').value;
            var sia_exp = document.getElementById('sia_exp').value;
            //Step 2 Validations
            if (steps == 2) {

                if (typofficer == "Door Supervisor" || typofficer == "Security Guard" || typofficer == "Construction Operative Security") {
                    if (sia_no == "") {
                        $("#sia_no").addClass("error");
                        return false;
                    } else {
                        $("#sia_no").removeClass("error");
                    }
                    if (sia_exp == "") {
                        $("#sia_exp").addClass("error");
                        return false;
                    } else {
                        $("#sia_exp").removeClass("error");
                    }
                }
                if (typofficer == "Steward" || typofficer == "Cleaner") {
                    sia_exp = '0000-00-00';
                    $("#sia_no").removeClass("error");
                    $("#sia_exp").removeClass("error");
                }
                return true;
            }
            //Step No. 3
            //Document Uploads 

            if (steps == 3) {
                var total = 0;

                if (document.getElementById('siafrontcheck').checked == true) {
                    total++;
                }
                if (document.getElementById('siabackcheck').checked == true) {
                    total++;
                }
                if (document.getElementById('passportcheck').checked == true) {
                    total++;
                }
                if (document.getElementById('utilitybillcheck').checked == true) {
                    total++;
                }
                if (document.getElementById('otherdoccheck').checked == true) {
                    total++;
                }

                if (total < 1) {
                    alert(total)
                    alert("Upload atleast 1 documents");
                    return false;
                } else {
                    return true;
                }
            }
            //Step No. 4
            var credential = document.getElementById('status').value;


            //Agreement
            if (steps == 4) {
                if (document.getElementById('select_all').checked == false) {
                    alert("Please check all the checkboxes after reading the points");
                    return false;
                }
                if (credential == "") {

                    $("#status").focus();
                    return false;
                }
                if (document.getElementById('btn-accept').checked == false) {
                    alert('Please accept agreement');
                    return false;
                }

                return true;
            }
            //Step No. 5
            //Finish
        }





        $('#dob').focus(function () {
            $('.sampleDiv1').fadeIn(1000);
        }).focusout(function () {
            $('.sampleDiv1').fadeOut(1000);
        });
        $('#sia_exp').focus(function () {
            $('.sampleDiv2').fadeIn(1000);
        }).focusout(function () {
            $('.sampleDiv2').fadeOut(1000);
        });
        $('#sia_exp').focusout(function () {
            if (this.value <= '<?php echo date("Y-m-d") ?>') {
                alert('Your License is expire');
                this.value = '<?php echo date("0000-00-00") ?>'
            }
        });



        function PhoneCheck(val) {
            var phone = document.getElementById('phone');
            if (val.length == 12) {
            } else if (val.length == 13) {
                val = phone.value.replace("+", "");
                phone.value = val;
            } else if (val.length == 11) {
                phone.value = '44' + val.slice(1, phone.value.length);
            } else {
                phone.value = '';
            }
        }


        function PostCodeValidate() {
            var postcode = document.getElementById('postcode').value;
            $.ajax({
                url: "https://api.postcodes.io/postcodes/" + postcode + "/validate",
                type: "GET",
                dataType: "json",
                success: function (data)
                {
                    if (data["result"] == true) {
                        document.getElementById('postcode').value = postcode.toUpperCase();
                        PostCodeCheck();
                    } else {
                        alert("Please enter the valid postcode");
                        document.getElementById('postcode').value = "";
                        document.getElementById('address').value = "";
                        document.getElementById('Region').value = "";
                        document.getElementById('country').value = "";
                        document.getElementById('postcode').focus();
                    }
                }

            });
        }

        function PostCodeCheck() {
            var postcode = document.getElementById('postcode').value;
            $.ajax({
                url: "PostCode_API_db.php",
                type: "GET",
                dataType: "json",
                data: {postcode: postcode},
                success: function (data)
                {
                    //Emptying the select boxes
                    document.getElementById("Region").options.length = 0;
                    document.getElementById("city").options.length = 0;

                    var county = data['county'];
                    var city = data['city'];
                    document.getElementById('postcode').value = postcode;
                    document.getElementById('latitude').value = data['lat'];
                    document.getElementById('longitude').value = data['lon'];

                    //Adding value in county Select
                    var z = document.getElementById("Region");
                    var option = document.createElement("option");
                    option.text = county.trim();
                    z.add(option);

                    //Adding value in City Select
                    var w = document.getElementById("city");
                    var option = document.createElement("option");
                    option.text = city.trim();
                    w.add(option);

                    //No Value return for county then get values from database
                    if (county.trim() == "") {

<?php
include 'dbconnection.php'; //get the contractors 
$sql = "SELECT * FROM `towns`";
$result = mysqli_query($connect, $sql);
$i = 0;
$row = mysqli_fetch_array($result);
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result)) {
    ?>
                            var y = document.getElementById("Region");
                            var option = document.createElement("option");
                            option.text = '<?php echo $row["town"] ?>';
                            y.add(option);

    <?php
}
?>
                    }

                    if (city.trim() == "") {

<?php
include 'dbconnection.php'; //get the contractors 
$sql = "SELECT * FROM `counties`";
$result = mysqli_query($connect, $sql);
$i = 0;
$row = mysqli_fetch_array($result);
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result)) {
    ?>
                            var y = document.getElementById("city");
                            var option = document.createElement("option");
                            option.text = '<?php echo $row["county"] ?>';
                            y.add(option);

    <?php
}
?>
                    }
                    document.getElementById("address").options.length = 0;
                    for (var i = 0; i <= data['totalAddresses']; i++) {
                        var x = document.getElementById("address");
                        var option = document.createElement("option");
                        option.text = data ["addresses"][i]["fullAddress"];
                        x.add(option);
                    }
                }
            });
        }

        $('#btn_extra_license_modal').click(function () {
            window.open("MultipleLicense.php?id=" + '<?PHP echo $id; ?>', "", "width=800,height=300");
        });

    </script>

    <script>

        $(document).ready(function () {


            DocumentCompleteStatus();

            $(document).on('click', '#sia_front', function (event)
            {
                var officerval = document.getElementById('shortname').value;
                var oid = '<?php echo $_GET['id']; ?>';
                document.getElementById('id02').style.display = 'block';
                file2(oid);
            });
            $(document).on('click', '#sia_rear', function (event)
            {
                var officerval = document.getElementById('shortname').value;
                var oid = '<?php echo $_GET['id']; ?>';
                document.getElementById('id03').style.display = 'block';
                file3(oid);
            });
            $(document).on('click', '#passport', function (event)
            {
                var officerval = document.getElementById('shortname');
                var oid = '<?php echo $_GET['id']; ?>';
                document.getElementById('id04').style.display = 'block';
                file4(oid);
            });
            $(document).on('click', '#utilitybill', function (event)
            {
                var officerval = document.getElementById('shortname');
                var oid = '<?php echo $_GET['id']; ?>';
                document.getElementById('id05').style.display = 'block';
//                 
                file5(oid);
            });
            $(document).on('click', '#otherdocument', function (event)
            {
                var officerval = document.getElementById('shortname');
                var oid = '<?php echo $_GET['id']; ?>';
                document.getElementById('id06').style.display = 'block';
                file6(oid);
            });
        });

    </script>

    <script>
        $('#file_1').change(function (e) {

            var file = document.getElementById('file_1').files[0];
            if (file && file.size < 10485760) { // 10 MB (this size is in bytes)
                //Submit form        
            } else {
                //Prevent default and display error
                e.preventDefault();
                alert("File is too large")
                return false;
            }

            //            var name = document.getElementById('shortname').value;
            files = event.target.files;
            var data = new FormData();
            $.each($('#file_1')[0].files, function (i, file) {

                data.append('file_1', file);
                data.append('file_name', 13773);
            });
            console.log();
            $.ajax({
                type: 'post',
                url: 'fileupload_emp_ref.php',
                processData: false,
                data: data,
                contentType: false,
                success: function (result) {

                    alert(result);
                    file1(13773);
                    DocumentCompleteStatus();
                }
            });
        });
        $('#file_2').change(function (e) {

            var file = document.getElementById('file_2').files[0];
            if (file && file.size < 10485760) { // 10 MB (this size is in bytes)
                //Submit form        
            } else {
                //Prevent default and display error
                e.preventDefault();
                alert("File is too large")
                return false;
            }

            var officerval = document.getElementById('shortname');
            var oid = '<?php echo $_GET['id']; ?>';
            files = event.target.files;
            var data = new FormData();
            $.each($('#file_2')[0].files, function (i, file) {

                data.append('file_2', file);
                data.append('file_name', oid);
            });
            console.log();
            $.ajax({
                type: 'post',
                url: 'fileupload_sia_front.php',
                processData: false,
                data: data,
                contentType: false,
                success: function (result) {

                    //    alert(result);
                    file2(oid);
                    DocumentCompleteStatus();
                }
            });
        });
        function file2(id) {


            $.ajax({
                url: "img_fetch.php",
                method: "POST",
                data: {mode: "fetch-img-2", id: id},
                success: function (data)
                {
                    //                        alert(data);
                    reloadImage('sia_front_doc', data);
                }
            });
        }
        function reloadImage(imageId, data)
        {
            path = data + '?cache='; //for example
            imageObject = document.getElementById(imageId);
            imageObject.src = path + (new Date()).getTime();
        }

        $('#file_3').change(function (e) {

            var file = document.getElementById('file_3').files[0];
            if (file && file.size < 10485760) { // 10 MB (this size is in bytes)
                //Submit form        
            } else {
                //Prevent default and display error
                e.preventDefault();
                alert("File is too large")
                return false;
            }

            var officerval = document.getElementById('shortname');
            var oid = '<?php echo $_GET['id']; ?>';
            files = event.target.files;
            var data = new FormData();
            $.each($('#file_3')[0].files, function (i, file) {

                data.append('file_3', file);
                data.append('file_name', oid);
            });
            console.log();
            $.ajax({
                type: 'post',
                url: 'fileupload_sia_rear.php',
                processData: false,
                data: data,
                contentType: false,
                success: function (result) {

                    alert(result);
                    file3(oid);
                    DocumentCompleteStatus();
                    //                        document.getElementById("sia_rear_doc").src = "uploads/SIA(Rear)/" + oid + ".png";
                }
            });
        });
        function file3(id) {


            $.ajax({
                url: "img_fetch.php",
                method: "POST",
                data: {mode: "fetch-img-3", id: id},
                success: function (data)
                {
                    //                        alert(data);
                    //                        document.getElementById("sia_rear_doc").src = "" + data;
                    reloadImage('sia_rear_doc', data);
                }
            });
        }


        $('#file_4').change(function (e) {

            var file = document.getElementById('file_4').files[0];
            if (file && file.size < 10485760) { // 10 MB (this size is in bytes)
                //Submit form        
            } else {
                //Prevent default and display error
                e.preventDefault();
                alert("File is too large")
                return false;
            }

            var officerval = document.getElementById('shortname');
            var oid = '<?php echo $_GET['id']; ?>';
            files = event.target.files;
            var data = new FormData();
            $.each($('#file_4')[0].files, function (i, file) {

                data.append('file_4', file);
                data.append('file_name', oid);
            });
            console.log();
            $.ajax({
                type: 'post',
                url: 'fileupload_passport.php',
                processData: false,
                data: data,
                contentType: false,
                success: function (result) {

                    alert(result);
                    //                        document.getElementById("passport_doc").src = "uploads/Passport/" + oid + ".png";
                    file4(oid);
                    DocumentCompleteStatus();
                }
            });
        });
        function file4(id) {


            $.ajax({
                url: "img_fetch.php",
                method: "POST",
                data: {mode: "fetch-img-4", id: id},
                success: function (data)
                {
                    //                        alert(data);
                    //                        document.getElementById("passport_doc").src = "" + data;
                    reloadImage('passport_doc', data);
                }
            });
        }


        $('#file_5').change(function (e) {

            var file = document.getElementById('file_5').files[0];
            if (file && file.size < 10485760) { // 10 MB (this size is in bytes)
                //Submit form        
            } else {
                //Prevent default and display error
                e.preventDefault();
                alert("File is too large")
                return false;
            }

            var officerval = document.getElementById('shortname');
            var oid = '<?php echo $_GET['id']; ?>';
            files = event.target.files;
            var data = new FormData();
            $.each($('#file_5')[0].files, function (i, file) {

                data.append('file_5', file);
                data.append('file_name', oid);
            });
            console.log();
            $.ajax({
                type: 'post',
                url: 'fileupload_bill.php',
                processData: false,
                data: data,
                contentType: false,
                success: function (result) {

                    alert(result);
                    //                        document.getElementById("bill_doc").src = "uploads/Bill/" + oid + ".png";
                    file5(oid);
                    DocumentCompleteStatus();
                }
            });
        });
        function file5(id) {


            $.ajax({
                url: "img_fetch.php",
                method: "POST",
                data: {mode: "fetch-img-5", id: id},
                success: function (data)
                {
                    //                        alert(data);
                    //                        document.getElementById("bill_doc").src = "" + data;
                    reloadImage('bill_doc', data);
                }
            });
        }

        $('#file_6').change(function (e) {

            var file = document.getElementById('file_6').files[0];
            if (file && file.size < 10485760) { // 10 MB (this size is in bytes)
                //Submit form        
            } else {
                //Prevent default and display error
                e.preventDefault();
                alert("File is too large")
                return false;
            }

            var officerval = document.getElementById('shortname');
            var oid = '<?php echo $_GET['id']; ?>';
            files = event.target.files;
            var data = new FormData();
            $.each($('#file_6')[0].files, function (i, file) {

                data.append('file_6', file);
                data.append('file_name', oid);
            });
            console.log();
            $.ajax({
                type: 'post',
                url: 'fileupload_other.php',
                processData: false,
                data: data,
                contentType: false,
                success: function (result) {

                    //                    alert(result);
                    //                        document.getElementById("bill_doc").src = "uploads/Bill/" + oid + ".png";
                    file6(oid);
                    DocumentCompleteStatus();
                }
            });
        });
        function file6(id) {


            $.ajax({
                url: "img_fetch.php",
                method: "POST",
                data: {mode: "fetch-img-6", id: id},
                success: function (data)
                {
                    //                    alert(data);
                    //                        document.getElementById("bill_doc").src = "" + data;
                    reloadImage('other_doc', data);
                }
            });
        }


        function DocumentCompleteStatus() {

            var total = 0;
            $.ajax({
                type: "POST", // The method of sending data can be with GET or POST
                url: "db_OfficerDetails.php", // Fill in url / php file path to destination
                //          

                data: {id: '<?php echo $_GET['id']; ?>', mode: 'DocumentCheck'}, // data to be sent to the process file
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (response) {




                    if (response.status == "success") {

                        // If the content of the status array is success
                        if (response.SIA_Front == "") {
                            document.getElementById("sia_front").style.color = "red";
                            document.getElementById("sia_front_label").style.display = "block";
                            document.getElementById('siafrontcheck').checked = false;
                        } else {
                            document.getElementById("sia_front").style.color = "green";
                            document.getElementById("sia_front_label").innerHTML = "Uploaded";
                            document.getElementById("sia_front_label").style.color = "green";
                            document.getElementById('siafrontcheck').checked = true;
                        }

                        if (response.SIA_Rear == "") {
                            document.getElementById("sia_rear").style.color = "red";
                            document.getElementById("sia_rear_lable").style.display = "block";
                            document.getElementById('siabackcheck').checked = false;
                        } else {
                            document.getElementById("sia_rear").style.color = "green";
                            document.getElementById("sia_rear_lable").innerHTML = "Uploaded";
                            document.getElementById("sia_rear_lable").style.color = "green";
                            document.getElementById('siabackcheck').checked = true;
                        }

                        if (response.Passport == "") {
                            document.getElementById("passport").style.color = "red";
                            document.getElementById("passport_label").style.display = "block";
                            document.getElementById('passportcheck').checked = false;
                        } else {
                            document.getElementById("passport").style.color = "green";
                            document.getElementById("passport_label").innerHTML = "Uploaded";
                            document.getElementById("passport_label").style.color = "green";
                            document.getElementById('passportcheck').checked = true;
                        }

                        if (response.bill == "") {
                            document.getElementById("utilitybill").style.color = "red";
                            document.getElementById("utilitybill_label").style.display = "block";
                            document.getElementById('utilitybillcheck').checked = false;
                        } else {
                            document.getElementById("utilitybill").style.color = "green";
                            document.getElementById("utilitybill_label").innerHTML = "Uploaded";
                            document.getElementById("utilitybill_label").style.color = "green";
                            document.getElementById('utilitybillcheck').checked = true;
                        }

                        if (response.other == "") {
                            document.getElementById("otherdocument").style.color = "red";
                            document.getElementById("otherdocument_label").style.display = "block";
                            document.getElementById('otherdoccheck').checked = false;
                        } else {
                            document.getElementById("otherdocument").style.color = "green";
                            document.getElementById("otherdocument_label").innerHTML = "Uploaded";
                            document.getElementById("otherdocument_label").style.color = "green";
                            document.getElementById('otherdoccheck').checked = true;
                        }





                    } else { // If the contents of the status array are failed
                        //                        alert("No Record Found");
                        document.getElementById("sia_front").style.color = "red";
                        document.getElementById("sia_front_label").style.display = "block";
                        document.getElementById("sia_rear").style.color = "red";
                        document.getElementById("sia_rear_lable").style.display = "block";
                        document.getElementById("passport").style.color = "red";
                        document.getElementById("passport_label").style.display = "block";
                        document.getElementById("utilitybill").style.color = "red";
                        document.getElementById("utilitybill_label").style.display = "block";
                        document.getElementById("otherdocument").style.color = "red";
                        document.getElementById("otherdocument_label").style.display = "block";
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) { // When there is an error
                    alert(xhr.responseText);
                }
            });
        }
    </script>

    <script>

        $(document).on('click', '#btn-accept', function (event)
        {

            if (document.getElementById('select_all').checked == false) {
                alert("Please check all the checkboxes after reading the points");
                return false;
            }
            var agreement_status = "Accept";
            var id = '<?php echo $_GET['id'] ?>';
            var status = document.getElementById('status').value;
            agreement = true;
            if (status != "") {
                Updateaccept(agreement_status, id);
                SendPDFAgreement();
            } else {
                alert("Please enter your ceredentials");
                document.getElementById('status').focus();
                return false;
            }
        });

        function SendPDFAgreement() {

            var id = '<?php echo $_GET['id'] ?>';
            var status = "Accept";

            $.ajax({
                url: "AgreementPdf.php",
                method: "POST",
                data: {status: status, id: id},
                success: function (data)
                {
//                        alert(data);
                }
            })

        }

        $(document).on('click', '#btn-decline', function (event)
        {
            var agreement_status = "Decline";
            agreement = false;
            var id = '<?php echo $_GET['id'] ?>';
            var status = document.getElementById('status').value;
            if (status != "") {
                Updateaccept(agreement_status, id);
            } else {
                alert("Please write Accept/Decline");
                document.getElementById('status').focus();
                return false;
            }
        });
        function Updateaccept(agreement_status, id) {


            $.ajax({
                url: "agreementupdate.php",
                method: "POST",
                data: {type: "f", agreement_status: agreement_status, id: id},
                success: function (data)
                {
//                        alert(data);
                    if (data == "You Have Accepted The Agreement") {
//                    location.replace("dashboard.php?id=<?php echo $_GET['id'] ?>);

                    }

                    if (data == "You Have Declined The Agreement") {
                        window.close();
                    }
                }
            })

        }
    </script>
</html>
