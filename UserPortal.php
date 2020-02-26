<!DOCTYPE html>
<html>
    <title>User Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<script src="assets/js/jquery.js" type="text/javascript"></script>-->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    

    <style>
        .fas,.header{
            color:#4188F4;
        }
        #btn_edit,#btn_delete{
            cursor: pointer;
        }
        #btn_edit:hover{
            color:green;
        }
        #btn_delete:hover{
            color:red;
        }
        #Emp_ref_doc {

            width: 100%;

        }

        #officer_dtl td label{
            float: left;
        }
        /*=======================================================================================*/


        body {
            font-family: 'lato', sans-serif;
        }

        .container {
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 10px;
            padding-right: 10px;
        }

        h2 {
            font-size: 26px;
            margin: 20px 0;
            text-align: center;
        }
        h2 small {
            font-size: 0.5em;
        }

        .responsive-table li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }
        .responsive-table .table-header {
            background-color: #95A5A6;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }
        .responsive-table .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
        }
        .responsive-table .col-1 {
            flex-basis: 10%;
        }
        .responsive-table .col-2 {
            flex-basis: 40%;
        }
        .responsive-table .col-3 {
            flex-basis: 25%;
        }
        .responsive-table .col-4 {
            flex-basis: 25%;
        }
        @media all and (max-width: 767px) {
            .responsive-table .table-header {
                display: none;
            }
            .responsive-table li {
                display: block;
            }
            .responsive-table .col {
                flex-basis: 100%;
            }
            .responsive-table .col {
                display: flex;
                padding: 10px 0;
            }
            .responsive-table .col:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
            .btn-danger{
                color:#fff;
                background-color:#d9534f;
                border-color:#d43f3a}
        }

        /*============================Navigation========================================*/

        .dropdown-container {
            display: none;
            background-color: #262626;
            padding-left: 8px;
        }

        .dropdown-item {
            /*  padding: 6px 8px 6px 16px;
              text-decoration: none;
              font-size: 20px;
              color: #818181;
              display: block;
              border: none;
              background: none;
              width: 100%;
              text-align: left;
              cursor: pointer;
              outline: none;*/
            /*background-color: #999999;*/
            color:#e67300;
        }

        .iframe-container {
            /*overflow-y: scroll;*/
            /*Calculated from the aspect ration of the content (in case of 16:9 it is 9/16= 0.5625)*/
            padding-top: 56.25%;
            position: relative;
        }

        .iframe-container .iframe {
            border: 0;
            height: 1000px;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            border-color: red;
        }

        @media only screen and (max-width: 1440px) {
            /* styles for browsers larger than 1440px; */

            .modal-content {
                width: auto;

            }

        }

        @media only screen and (max-width: 2000px) {
            /* for sumo sized (mac) screens */
            .modal-content {
                width: auto;
            }


        }
        @media only screen and (max-width: 960px) {
            /* styles for browsers larger than 960px; */
            .modal-content {

            }             

        }

        @media only screen and (max-width: 728px) {

            /* default iPad screens */

            .modal-content {
                width: 710px;

            }
        }

        @media only screen and (max-width: 480px) {
            /* styles for mobile browsers smaller than 480px; (iPhone) */
            .modal-content {
                width: 340px;

            }

        }

        @media only screen and (max-width: 414px) {
            /* styles for mobile browsers smaller than 480px; (iPhone) */
            .modal-content {
                width: 400px;

            }
            .iframe-container  {
                height: 630px;
            }
        }
        @media only screen and (max-width: 375px) {
            /* styles for mobile browsers smaller than 480px; (iPhone) */
            .modal-content {
                width: 350px;

            }
            .iframe-container  {
                height: 560px;
            }
        }
        @media only screen and (max-width: 320px) {
            /* styles for mobile browsers smaller than 480px; (iPhone) */
            .modal-content {
                width: 300px;

            }
            .iframe-container  {
                height: 490px;
            }
        }
        /* different techniques for iPad screening */
        /*            @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
                         For portrait layouts only 
                        .modal-content {
                                    width: 400px;
        
                                }
                    }
        
                    @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
                         For landscape layouts only 
                    }*/



        /*
                            @media (min-width: 640px) {
                                .modal-content {
                                    width: 360px;
        
                                }
        
                            }
        
                            @media (min-width: 728px) {
                                .modal-content {
                                    width: 700px;
        
                                }
        
                            }*/

        div {
            /*border-style: solid;*/
        }

    </style>

    <body>





        <div class="container1" style="background-color:#4286f4; color: white;  height: 90px;text-align: center; overflow: hidden"  >  <h2>User Portal</h2><a href="logout.php?logout='1'" style=" color: red;"><i class="fa fa-sign-out" style="font-size:24px">Log out</i></a>
            <br/>

        </div>
        <br>
        <div class="w3-container">

            <div class="w3-row "> 

                <div class="w3-col w3-container" style="width:16.66%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'EmpDetails');" id="EmpDetailsTab">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding ">Employee Details</div>
                    </a>
                </div>
                <div class="w3-col w3-container" style="width:16.66%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'EmpDocuments');LoadPersonalReference('vet_per_ref');LoadEducation('vet_education');LoadEmploementRef('vet_emp_ref');">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Employee Documents</div>
                    </a>
                </div>
                <div class="w3-col w3-container" style="width:16.66%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'Availibility');">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><br>Availability</div>
                    </a></div>
                <div class="w3-col w3-container" style="width:16.66%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'Schedules');LoadData();">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><br>Schedules</div>
                    </a>
                </div>
                <div class="w3-col w3-container" style="width:16.66%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'AvailableJobs');LoadAvailableJobData();">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Available Jobs</div>
                    </a>
                </div>
                <div class="w3-col w3-container" style="width:16.66%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'Message');">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><br>Inbox</div>
                    </a></div>
            </div>

            <div id="EmpDetails" class="w3-container city" style="display:none">


                <?php include './OfficerDetails.php'; ?>


            </div>

            <div id="EmpDocuments" class="w3-container city" style="display:none">

                <center>
                    <div class="w3-responsive">
                        <br>
                        <br>

                        <select class="w3-round-large" id="select_officer" name="select_officer" style="width:20%; height: 30px; ">
                            <?php
                            include 'dbconnection.php'; //get the contractors 
                            $sql = "SELECT * FROM `tbl_employee` WHERE `EmployeeID`=" . $_GET["id"] . "";
                            $result = mysqli_query($connect, $sql);
                            $i = 0;
                            $row = mysqli_fetch_array($result);
                            $contractor_id = 0;

                            mysqli_data_seek($result, 0);

                            while ($row = mysqli_fetch_array($result)) {
                                ?>

                                <option id="<?php echo $row["EmployeeID"] ?>"><?php echo $row["lastname"] ?></option>

                                <?php
                            }
                            ?> 
                        </select>
                        <br>
                        <br>
                        <br>
                        <br>
                        <!--<div class="w3-responsive">-->
                        <br>
                        <div class="container">
                            <table border="1" class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered" id="creditcheck">
                                <thead>
                                    <tr class="header ">
                                        <th colspan="7"><h4 class="headerheading">Credit Check</h4></th>

                                    </tr>
                                    <tr class="table-header">
                                        <th class="col col-1">Date of Check</th>
                                        <th class="col col-2">Requested By</th>
                                        <th class="col col-3">Response Date</th>
                                        <th class="col col-4">Notices of Correction</th>
                                        <th class="col col-1">Court Judgements</th>
                                        <th class="col col-2">Linked Address</th>
                                        <th class="col col-3">Action</th>


                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr class="table-row">
                                        <td class="col col-1" data-label="Date of Check">14-05-2019</td>
                                        <td class="col col-2" data-label="Requested By">1</td>
                                        <td class="col col-3" data-label="Response Date">0002,0003,0004</td>
                                        <td class="col col-4" data-label="Notices of Correction">0</td>
                                        <td class="col col-1" data-label="Court Judgements">0</td>
                                        <td class="col col-2" data-label="Linked Address">0</td>
                                        <td class="col col-3" data-label="Action"><i class="far fa-file" style="font-size: 16px;" id="btn_file"></i></td>
                                    </tr>


                                </tbody>

<!--                                <tfoot>
                                    <tr>
                                        <td colspan="7"></td>

                                    </tr>

                                </tfoot>-->

                            </table>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="container">
                            <table border='1' class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " id="document">
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
                                        <td class="col col-1">SIA Badge (Front)</td>
                                        <td class="col col-1" data-label=""><a href="#" id="sia_front" title="SIA Badge (Front)"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                        <td class="col col-1" data-label=""><label style="color:red;  display: none;" id="sia_front_label">Please upload document</label></td>

                                    </tr>
                                    <tr class="table-row">
                                        <td class="col col-2">SIA Badge (Rear)</td>
                                        <td class="col col-2" data-label=""><a <a href="#" id="sia_rear" title="SIA Badge (Rear)"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                        <td class="col col-2"><label style="color:red;  display: none;" id="sia_rear_lable">Please upload document</label></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="col col-3">Passport</td>
                                        <td class="col col-3" data-label=""><a href="#" id="passport" title="Passport"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                        <td class="col col-3" data-label=""><label style="color:red;  display: none;" id="passport_label">Please upload document</label></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="col col-4">Utility Bill</td>
                                        <td class="col col-4" data-label=""><a href="#" id="utilitybill" title="Utility Bill"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                        <td class="col col-4" data-label=""><label style="color:red; display: none;" id="utilitybill_label">Please upload document</label></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="col col-1">Other Document</td>
                                        <td class="col col-1" data-label=""><a href="#" id="otherdocument" title="Other Document"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                        <td class="col col-1" data-label=""><label style="color:red; display: none;" id="otherdocument_label">Please upload document</label></td>
                                    </tr>

                                </tbody>

<!--                                <tfoot>
                                <td colspan="2"></td>

                                </tfoot>-->

                            </table>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="container">
                            <table border="1" class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered" id="employeeref">
                                <thead>
                                    <tr class="header ">
                                        <th colspan="15"><center><h4 class="headerheading">Employment Reference</h4></center></th>

                                </tr>
                                <tr class="subheader table-header">
                                    <th class="col col-1">Ref' Name</th>
                                    <th class="col col-2">Company</th>
                                    <th class="col col-3">Job Title</th>
                                    <th class="col col-4">Phone No.</th>
                                    <th class="col col-1">Email</th>
                                    <th class="col col-2">Employed From</th>
                                    <th class="col col-3">Employed To</th>
                                    <th class="col col-4">File Upload</th>
                                    <th class="col col-1">Tel' Ref</th>
                                    <th class="col col-2">Save</th>
                                    <th class="col col-3">Delete</th>
                                </tr>

                                </thead> 
                                <tbody class="table-row">
                                </tbody>

<!--                                <tfoot>
                                    <tr>
                                        <td colspan="13"></td>
                                    </tr>

                                </tfoot>-->

                            </table>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="container">
                            <table border='1' class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered "  id="personalref">
                                <thead>
                                    <tr class="header">
                                        <th colspan="7"><h4 class="headerheading">Personal References</h4></th>
                                    </tr>
                                    <tr class="subheader table-header">
                                        <th class="col col-1">Name</th>
                                        <th class="col col-2">Ref' Telephone No.</th>
                                        <th class="col col-3">Ref' Email</th>
                                        <th class="col col-4">Save</th>
                                        <th class="col col-1">Delete</th>

                                    </tr>

                                </thead> 
                                <tbody>
                                </tbody>

<!--                            <tfoot>
                            <td colspan="15"></td>

                            </tfoot>-->

                            </table>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="container">
                            <table border='1' class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " id="education">
                                <thead>
                                    <tr class="header">
                                        <th colspan="10"><h4 class="headerheading">Education</h4><p>(most recent)</p></th>
                                    </tr>
                                    <tr class="subheader table-header">
                                        <th class="col col-1">School</th>
                                        <th class="col col-2">Address</th>
                                        <th class="col col-3">Postcode</th>
                                        <th class="col col-4">Attended From</th>
                                        <th class="col col-1">Attended To</th>
                                        <th class="col col-2">Course Details</th>
                                        <th class="col col-3">Save</th>
                                        <th class="col col-4">Delete</th>

                                    </tr>
                                </thead> 
                                <tbody>


                                </tbody>

<!--                                <tfoot>
                                <td colspan="10"></td>

                                </tfoot>-->

                            </table>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>


                        <!--</div>-->

                        <div id="id01" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container w3-blue"> 
                                    <span onclick="document.getElementById('id01').style.display = 'none'" 
                                          class="w3-button w3-display-topright">&times;</span>
                                    <h2>Employment Reference Document</h2>
                                </header>
                                <br/>
                                <div class="w3-container" style="height: 90%; overflow-y: auto;">
                                    <table class="w3-table-all w3-centered w3-hoverable" id="shift_tbl" style="height: auto; overflow-y: scroll; zoom: 80%;">
                                        <thead >
                                            <tr >
                                                <th>Description</th>
                                                <th>Upload</th>

                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr >
                                                <td>Appointment Letter</td>
                                                <td><input type="file" id="file_1" name="file_1" ></td>

                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br/>

                                    <img id="Emp_ref_doc" alt="No document uploaded yet"/>


                                </div>
                                <footer class="w3-container w3-blue">
                                    <p>GuardianFM</p>
                                </footer>
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

                    </div>
                </center>

            </div>

            <div id="Availibility" class="w3-container city" style="display:none">

                <center>
                    <br>
                    <br>
                    <?php include './requestprocess.php'; ?>
                </center>
            </div>

            <div id="Schedules" class="w3-container city" style="display:none">

                <h1>Officer Schedule</h1>

                <center>
                    <div class="container">
                        <table class="responsive-table w3-table-all w3-card w3-hoverable w3-centered w3-small" id="off_Sch_tbl" >
                            <thead>
                                <tr class="table-header">
                                    <th colspan="9" class="col col-1"></th>
                                </tr>
                                <tr class="table-header">
                                    <th class="col col-1">S No.</th>
                                    <th class="col col-2">Officer Name</th>
                                    <th class="col col-3">Location</th>
                                    <th class="col col-4">Duty Start</th>
                                    <th class="col col-1">Duty Finish</th>
                                    <th class="col col-2">Hours</th>
                                    <th class="col col-3">Rate</th>
                                    <th class="col col-4">Amount</th>
                                    <th class="col col-1">Status</th>
                                </tr>

                            </thead>
                            <tbody>

                            </tbody>
<!--                            <tfoot>
                            <td colspan="9"></td>
                            </tfoot>-->
                        </table>
                    </div>
                </center>

            </div>
            <div id="AvailableJobs" class="w3-container city" style="display:none">
                <h1>Available Jobs</h1>
                <center>
                    <div class="container">
                        <table class="responsive-table w3-table-all w3-card w3-hoverable w3-centered w3-small" id="available_Jobs_tbl" >
                            <thead>
                                <tr>
                                    <th colspan="9"></th>
                                </tr>
                                <tr class="table-header"> 
                                    <th class="col col-1">S No.</th>                                
                                    <th class="col col-2">Location</th>
                                    <th class="col col-3" >Duty Start</th>
                                    <th class="col col-4">Duty Finish</th>
                                    <th class="col col-1">Hours</th>
                                    <th class="col col-2">Rate</th>
                                    <th class="col col-3">Amount</th>
                                    <th class="col col-4">Status</th>
                                    <th colspan="2" class="col col-1">Action</th>


                                </tr>
                                <tr class="table-header">
                                    <th></th>                                
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th >Accept Job</th>
                                    <th >Decline Job</th>


                                </tr>

                            </thead>
                            <tbody>

                            </tbody>
<!--                            <tfoot>
                            <td colspan="9"></td>
                            </tfoot>-->
                        </table>
                    </div>
                </center>



            </div>
            <div id="Message" class="w3-container city" style="display:none">

                <center>
                    <br>
                    <br>
                    <?php include './OfficerInbox.php'; ?>
                </center>
            </div>
            <br>
        </div>



    </div>

    <script>
//        openCity(event, 'EmpDetails');


        $(document).ready(function () {

        
            DocumentCompleteStatus();
            document.getElementById('EmpDetailsTab').click();
            LoadPersonalReference('vet_per_ref');
            LoadEducation('vet_education');
            LoadEmploementRef('vet_emp_ref');
            LoadData();
//            $(document).on('change', '#select_officer', function (event) {
//                LoadPersonalReference('vet_per_ref');
//                LoadEducation('vet_education');
//                LoadEmploementRef('vet_emp_ref');
//            })


            $(document).on('click', '#btn_delete_emp_ref_u', function ()
            {
                var id = $(this).attr("data-id");
                if (confirm("Are you sure you want to delete this record?")) {

                    $.ajax({
                        url: "db_screening_delete.php",
                        method: "POST",
                        data: {id: id, mode: 'Emp_Ref'},
                        success: function (data)
                        {
                            alert(data);
                            LoadEmploementRef('vet_emp_ref');
                        }
                    });
                }
            });
            $(document).on('click', '#btn_delete_per_ref_u', function ()
            {
                var id = $(this).attr("data-id");
                if (confirm("Are you sure you want to delete this record?")) {

                    $.ajax({
                        url: "db_screening_delete.php",
                        method: "POST",
                        data: {id: id, mode: 'Per_Ref'},
                        success: function (data)
                        {
                            alert(data);
                            LoadPersonalReference('vet_per_ref');
                        }
                    });
                }
            });
            $(document).on('click', '#btn_delete_edu_u', function ()
            {
                var id = $(this).attr("data-id");
                if (confirm("Are you sure you want to delete this record?")) {

                    $.ajax({
                        url: "db_screening_delete.php",
                        method: "POST",
                        data: {id: id, mode: 'Edu'},
                        success: function (data)
                        {
                            alert(data);
                            LoadEducation('vet_education');
                        }
                    });
                }
            });
            $(document).on('click', '#btn_save_emp_ref_u', function (event)
            {
                var id = $(this).attr('data-id');
                var name = $(this).closest('tr').find('#emp_ref_name').text();
                var company = $(this).closest('tr').find('#emp_ref_company').text();
                var jobtitle = $(this).closest('tr').find('#emp_ref_job').text();
                var phone = $(this).closest('tr').find('#emp_ref_phone').text();
                var email = $(this).closest('tr').find('#emp_ref_email').text();
                var emp_from = $(this).closest('tr').find('#emp_ref_date_from').val();
                var emp_to = $(this).closest('tr').find('#emp_ref_date_to').val();
                var email = $(this).closest('tr').find('#emp_ref_email').text();
                var refphone = $(this).closest('tr').find('#emp_ref_refphone').text();

                var col = "RefName='" + name + "'\n\
         ,Company='" + company + "'\n\
         ,JobTitle='" + jobtitle + "'\n\
         ,Phone='" + phone + "'\n\
         ,EmpFrom='" + emp_from + "'\n\
         ,EmpTo='" + emp_to + "'\n\
         ,Email='" + email + "'\n\
         ,RefPhone='" + refphone + "'";
                $.ajax({
                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: id, col: col, mode: 'Update-Emp-Ref'},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
            $(document).on('click', '#btn_save_emp_ref_i', function (event)
            {

                var officerval = document.getElementById('select_officer');
                var id = officerval[officerval.selectedIndex].id;

                var name = $(this).closest('tr').find('#emp_ref_name_i').text();
                var company = $(this).closest('tr').find('#emp_ref_company_i').text();
                var jobtitle = $(this).closest('tr').find('#emp_ref_job_i').text();
                var phone = $(this).closest('tr').find('#emp_ref_phone_i').text();
                var email = $(this).closest('tr').find('#emp_ref_email_i').text();
                var emp_from = $(this).closest('tr').find('#emp_ref_date_from_i').val();
                var emp_to = $(this).closest('tr').find('#emp_ref_date_to_i').val();
                var email = $(this).closest('tr').find('#emp_ref_email_i').text();
                var refphone = $(this).closest('tr').find('#emp_ref_refphone_i').text();


                var col = "OID,RefName,Company,JobTitle,Phone,EmpFrom,EmpTo,RefPhone,Email";

                var val = "'" + id + "','" + name + "','" + company + "','" + jobtitle + "','" + phone + "','" + emp_from + "','" + emp_to + "','" + refphone + "','" + email + "'";

                $.ajax({
                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: id, mode: 'Insert-Emp-Ref', col: col, val: val},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
            $(document).on('click', '#btn_save_emp_ref_n', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var id = officerval[officerval.selectedIndex].id;
                var name = $(this).closest('tr').find('#emp_ref_name_n').text();
                var company = $(this).closest('tr').find('#emp_ref_company_n').text();
                var jobtitle = $(this).closest('tr').find('#emp_ref_job_n').text();
                var phone = $(this).closest('tr').find('#emp_ref_phone_n').text();
                var emp_from = $(this).closest('tr').find('#emp_ref_date_from_n').text();
                var emp_to = $(this).closest('tr').find('#emp_ref_date_to_n').text();
                var email = $(this).closest('tr').find('#emp_ref_email_n').text();
                var refphone = $(this).closest('tr').find('#emp_ref_refphone_n').text();


                var col = "OID,RefName,Company,JobTitle,Phone,EmpFrom,EmpTo,Email,RefPhone";
                var val = "'" + id + "','" + name + "','" + company + "','" + jobtitle + "','" + phone + "','" + emp_from + "','" + emp_to + "','" + email + "','" + refphone + "'";
                $.ajax({
                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: id, mode: 'Insert-Emp-Ref', col: col, val: val},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });


            $(document).on('click', '.acceptjob', function (event) {

                var shiftid = $(this).attr("data-id");
                var email = $(this).attr("data-email");
                var officerval = document.getElementById('select_officer');
                var officerid = officerval[officerval.selectedIndex].id;
                var oname = document.getElementById('select_officer').value;
                var jobstatus = "Awaiting Confirmation";
                var curr_status = $(this).closest('tr').find('#acceptstatus').text();

                if (curr_status == "Awaiting Confirmation") {
                    alert("Your request is in the que");
                    return false;
                }
                if (curr_status == "Approve") {
                    alert("Your request has already been approved");
                    return false;
                }
                if (curr_status != "Disapprove") {
                    $.ajax({
                        url: "OfficerSchedule_db.php",
                        method: "POST",
                        data: {shiftid: shiftid, officerid: officerid, oname: oname, mode: 'JobStatusInsert', jobstatus: jobstatus},
                        success: function (data)
                        {
                            alert(data);
                            LoadAvailableJobData();
                            Email(shiftid, email);
                            EmailAdmin(shiftid, jobstatus);
                        }
                    });
                } else {
                    alert("Controller has disapprove your request")
                }
            });

            function Email(shiftid, email) {
                var officerval = document.getElementById('select_officer');
                var id = officerval[officerval.selectedIndex].id;

                $.ajax({
                    url: "ShiftAcceptanceEmail_User.php",
                    method: "POST",
                    data: {id: id, portal: 'User', shiftid: shiftid, email: email},
                    success: function (data)
                    {
//                        alert(data);
                    }
                });
            }
            function EmailAdmin(shiftid, jobstatus) {
                var officerval = document.getElementById('select_officer');
                var id = officerval[officerval.selectedIndex].id;



                $.ajax({
                    url: "ShiftAcceptanceEmail_Admin.php",
                    method: "POST",
                    data: {id: id, portal: 'User', shiftid: shiftid, Status: jobstatus},
                    success: function (data)
                    {
//                        alert(data);
                    }
                });
            }

            $(document).on('click', '.declinejob', function (event) {
                var shiftid = $(this).attr("data-id");
                var email = $(this).attr("data-email");
                var officerval = document.getElementById('select_officer');
                var officerid = officerval[officerval.selectedIndex].id;
                var oname = document.getElementById('select_officer').value;
                var jobstatus = "Decline";
                var curr_status = $(this).closest('tr').find('#acceptstatus').text();
                if (curr_status == "Decline") {
                    alert("You have already decline this shift");
                    return false;
                }

                if (curr_status != "Disapprove") {
                    $.ajax({
                        url: "OfficerSchedule_db.php",
                        method: "POST",
                        data: {shiftid: shiftid, officerid: officerid, oname: oname, mode: 'JobStatusUpdate', jobstatus: jobstatus},
                        success: function (data)
                        {
                            alert(data);
                            LoadAvailableJobData();
                            Email(shiftid, email);
                            EmailAdmin(shiftid, jobstatus);
                        }
                    });
                } else {
                    alert("This shift has already been disapproved by controller");
                }
            });
            $(document).on('click', '#btn_save_edu_u', function (event)
            {

                var id = $(this).attr('data-id');
                var school = $(this).closest('tr').find('#edu_school_u').text();
                var address = $(this).closest('tr').find('#edu_address_u').text();
                var postcode = $(this).closest('tr').find('#edu_postcode_u').text();
                var att_from = $(this).closest('tr').find('#edu_att_from_u').val();
                var att_to = $(this).closest('tr').find('#edu_att_to_u').val();
                var course = $(this).closest('tr').find('#edu_course_u').text();
                //                alert($(this).attr('data-id'));
                //                alert(school + "<br>" + address + "<br>" + postcode + "<br>" + att_from + "<br>" + att_to + "<br/>" + course);

                var col = "School='" + school + "'\n\
         ,Address='" + address + "'\n\
         ,Postcode='" + postcode + "'\n\
         ,AttendedFrom='" + att_from + "'\n\
         ,AttendedTo='" + att_to + "'\n\
         ,CourseDetails='" + course + "'";
                $.ajax({

                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: id, mode: 'Update-Emp-Edu', col: col},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
            $(document).on('click', '#btn_save_edu_i', function (event)
            {
                event.preventDefault()
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;
                var school = $(this).closest('tr').find('#edu_school_i').text();
                var address = $(this).closest('tr').find('#edu_address_i').text();
                var postcode = $(this).closest('tr').find('#edu_postcode_i').text();
                var att_from = $(this).closest('tr').find('#edu_att_from_i').val();
                var att_to = $(this).closest('tr').find('#edu_att_to_i').val();
                var course = $(this).closest('tr').find('#edu_course_i').text();
                var col = "OID,School,Address,Postcode,AttendedFrom,AttendedTo,CourseDetails";
                var val = "'" + oid + "','" + school + "','" + address + "','" + postcode + "','" + att_from + "','" + att_to + "','" + course + "'";
                $.ajax({
                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: oid, mode: 'Insert-Emp-Edu', col: col, val: val},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
            $(document).on('click', '#btn_save_edu_n', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;

                var school = $(this).closest('tr').find('#edu_school_n').text();
                var address = $(this).closest('tr').find('#edu_address_n').text();
                var postcode = $(this).closest('tr').find('#edu_postcode_n').text();
                var att_from = $(this).closest('tr').find('#edu_att_from_n').val();
                var att_to = $(this).closest('tr').find('#edu_att_to_n').val();
                var course = $(this).closest('tr').find('#edu_course_n').text();

                var col = "OID,School,Address,Postcode,AttendedFrom,AttendedTo,CourseDetails";
                var val = "'" + oid + "','" + school + "','" + address + "','" + postcode + "','" + att_from + "','" + att_to + "','" + course + "'";
                $.ajax({
                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: oid, mode: 'Insert-Emp-Edu', col: col, val: val},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
            $(document).on('click', '#btn_save_per_ref_u', function (event)
            {
                var id = $(this).attr('data-id');

                var refname = $(this).closest('tr').find('#per_ref_refname_u').text();
                var refphone = $(this).closest('tr').find('#per_ref_refphone_u').text();
                var refemail = $(this).closest('tr').find('#per_ref_refemail_u').text();

                var col = "RefName='" + refname + "'\n\
         ,RefPhone='" + refphone + "'\n\
         ,RefEmail='" + refemail + "'";
                $.ajax({

                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: id, mode: 'Update-Per-Ref', col: col},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
            $(document).on('click', '#btn_save_per_ref_i', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;

                var refname = $(this).closest('tr').find('#per_ref_refname_i').text();
                var refphone = $(this).closest('tr').find('#per_ref_refphone_i').text();
                var refemail = $(this).closest('tr').find('#per_ref_refemail_i').text();

                var col = "OID,RefName,RefPhone,RefEmail";
                var val = "'" + oid + "','" + refname + "','" + refphone + "','" + refemail + "'";
                $.ajax({
                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: '', mode: 'Insert-Per-Ref', col: col, val: val},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
            $(document).on('click', '#btn_save_per_ref_n', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;
                var refname = $(this).closest('tr').find('#per_ref_refname_n').text();
                var refphone = $(this).closest('tr').find('#per_ref_refphone_n').text();
                var refemail = $(this).closest('tr').find('#per_ref_refemail_n').text();
                var col = "OID,RefName,RefPhone,RefEmail";
                var val = "'" + oid + "','" + refname + "','" + refphone + "','" + refemail + "'";
                $.ajax({
                    url: "db_screening_update_insert.php",
                    method: "POST",
                    data: {id: '', mode: 'Insert-Per-Ref', col: col, val: val},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
            $(document).keydown(function (e) {
                // ESCAPE key pressed
                if (e.keyCode == 27) {
                    window.close();
                    document.getElementById('id01').style.display = 'None';
                }
            });
            $(document).on('click', '#file_upload', function (event)
            {
                id = $(this).attr('data-id');
                document.getElementById('id01').style.display = 'block';
                file1(id);
            });
            $(document).on('click', '#sia_front', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;
                document.getElementById('id02').style.display = 'block';
                file2(oid);
            });
            $(document).on('click', '#sia_rear', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;
                document.getElementById('id03').style.display = 'block';
                file3(oid);
            });
            $(document).on('click', '#passport', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;
                document.getElementById('id04').style.display = 'block';
                file4(oid);
            });
            $(document).on('click', '#utilitybill', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;
                document.getElementById('id05').style.display = 'block';
//                 
                file5(oid);
            });

            $(document).on('click', '#otherdocument', function (event)
            {
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;
                document.getElementById('id06').style.display = 'block';

                file6(oid);
            });
        });
        //END OF DOCUMENT.READY BLOCK

        function LoadData() {

            var id = <?php echo $_GET['id']; ?>;
            $.ajax({
                url: "OfficerSchedule_db.php",
                method: "POST",
                data: {id: id, mode: 'Schedule'},
                success: function (data)
                {

                    $('#off_Sch_tbl tbody').html(data);
                }
            });
        }

        function LoadAvailableJobData() {

            var id = <?php echo $_GET['id']; ?>;

            $.ajax({
                url: "OfficerSchedule_db.php",
                method: "POST",
                data: {id: id, mode: 'Available'},
                success: function (data)
                {
//                    alert(data);
                    $('#available_Jobs_tbl tbody').html(data);
                }
            });
        }

        function LoadPersonalReference(Status) {
            var officer = document.getElementById('select_officer').value;
//            var officerval = document.getElementById('select_officer');
//            var officer_id = officerval[officerval.selectedIndex].id;
            var officer_id = <?php echo $_GET['id'] ?>;
            $.ajax({
                url: "db_UserPortal.php",
                method: "POST",
                data: {mode: "vet", Status: Status, officer: officer, officer_id: officer_id},
                success: function (data)
                {

                    $('#personalref tbody').html(data);
                }
            });
        }
        function LoadEducation(Status) {
            var officer = document.getElementById('select_officer').value;
//            var officerval = document.getElementById('select_officer');
//            var officer_id = officerval[officerval.selectedIndex].id;
            var officer_id = <?php echo $_GET['id'] ?>;
            $.ajax({
                url: "db_UserPortal.php",
                method: "POST",
                data: {mode: "vet", Status: Status, officer: officer, officer_id: officer_id},
                success: function (data)
                {

                    $('#education tbody').html(data);
                }
            });
        }

        function LoadEmploementRef(Status) {
            var officer = document.getElementById('select_officer').value;
//            var officerval = document.getElementById('select_officer');
//            var officer_id = officerval[officerval.selectedIndex].id;
            var officer_id = <?php echo $_GET['id'] ?>;
            $.ajax({
                url: "db_UserPortal.php",
                method: "POST",
                data: {mode: "vet", Status: Status, officer_id: officer_id, officer: officer},
                success: function (data)
                {

                    $('#employeeref tbody').html(data);
                }
            });
        }





        function openCity(evt, cityName) {

            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-border-green", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-green";
        }



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

            var name = document.getElementById('select_officer').value;
            files = event.target.files;
            var data = new FormData();
            $.each($('#file_1')[0].files, function (i, file) {

                data.append('file_1', file);
                data.append('file_name', id);
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
                    file1(id);
                    DocumentCompleteStatus();
                }
            });
        });
        function file1(id) {


            $.ajax({
                url: "img_fetch.php",
                method: "POST",
                data: {mode: "fetch-img", id: id},
                success: function (data)
                {
//                        alert(data);
                    reloadImage('Emp_ref_doc', data);
                }
            });
        }

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

            var officerval = document.getElementById('select_officer');
            var oid = officerval[officerval.selectedIndex].id;
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

                    alert(result);
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

            var officerval = document.getElementById('select_officer');
            var oid = officerval[officerval.selectedIndex].id;
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

            var officerval = document.getElementById('select_officer');
            var oid = officerval[officerval.selectedIndex].id;
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

            var officerval = document.getElementById('select_officer');
            var oid = officerval[officerval.selectedIndex].id;
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

            var officerval = document.getElementById('select_officer');
            var oid = officerval[officerval.selectedIndex].id;
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

                        } else {
                            document.getElementById("sia_front").style.color = "green";
                            document.getElementById("sia_front_label").style.display = "none";
                        }

                        if (response.SIA_Rear == "") {
                            document.getElementById("sia_rear").style.color = "red";
                            document.getElementById("sia_rear_lable").style.display = "block";


                        } else {
                            document.getElementById("sia_rear").style.color = "green";
                            document.getElementById("sia_rear_lable").style.display = "none";
                        }

                        if (response.Passport == "") {
                            document.getElementById("passport").style.color = "red";
                            document.getElementById("passport_label").style.display = "block";
                        } else {
                            document.getElementById("passport").style.color = "green";
                            document.getElementById("passport_label").style.display = "none";
                        }

                        if (response.bill == "") {
                            document.getElementById("utilitybill").style.color = "red";
                            document.getElementById("utilitybill_label").style.display = "block";
                        } else {
                            document.getElementById("utilitybill").style.color = "green";
                            document.getElementById("utilitybill_label").style.display = "none";
                        }

                        if (response.other == "") {
                            document.getElementById("otherdocument").style.color = "red";
                            document.getElementById("otherdocument_label").style.display = "block";
                        } else {
                            document.getElementById("otherdocument").style.color = "green";
                            document.getElementById("otherdocument_label").style.display = "none";
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

</body>
</html>
