<?php
session_start();
/* if (isset($_SESSION["username"])) {

  } else {

  header("location:login_admin.php");
  } */
?>

<!DOCTYPE html>
<html>
    <title>Screening</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<script src="assets/js/jquery.js" type="text/javascript"></script>-->

    <script src="https://www.w3schools.com/lib/w3.js"></script>

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

        }​

        /*============================================================================================================*/
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


    </style>

    <body>
        <div class="container1" style="background-color:#4286f4; color: white;  height: 100px;text-align: center; overflow: hidden"  >  <h2>Admin Portal</h2><a href="logout_admin.php?logout='1'" style=" color: red;"><i class="fa fa-sign-out" style="font-size:24px">Log out</i></a>
            <br/>

        </div>
        <div class="w3-container">

            <div class="w3-row "> 

                <div class="w3-col w3-container" style="width:20%">
                    <br>
                    <a href="javascript:void(0)" onclick="openCity(event, 'NewStaff');LoadData('fetch-newstaff', '25');" id="newstafftab">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding ">New Staff</div>
                    </a>
                </div>
                <div class="w3-col w3-container" style="width:20%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'CurrentStaff'); LoadData('fetch-currentstaff', '25');">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Current Staff</div>
                    </a>
                </div>
                <div class="w3-col w3-container" style="width:20%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'StaffHold');
                            LoadData('fetch-holdstaff', '25');" >
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Staff On Hold</div>
                    </a></div>
                <div class="w3-col w3-container" style="width:20%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'VettingManagement'); LoadData('fetch-currentstaff', '');">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Vet System</div>
                    </a>
                </div>
                <div class="w3-col w3-container" style="width:20%">
                    <a href="javascript:void(0)" onclick="openCity(event, 'OfficerStrength'); LoadData('fetch-officerstrength', '25')">
                        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Officer's Strength</div>
                    </a>
                </div>

            </div>

            <div id="NewStaff" class="w3-container city" style="display:none">
                <h1>New Staff</h1><p>Needs to be verified by controller.</p>


                <center>
                    <div class="responsive">

                        <br>
                        <br>


                        <input type="text" id="txtsearch2"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px; "/>


                        <br>
                        <table border="1" class="responsive-table w3-table-all w3-centered w3-bordered">
                            <thead>
                                <tr>
                                    <th>CSV Export</th>
                                    <th>Limit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <td>
                                <form method="post"  action="csv.php"  align="center" id="exportform">
                                    <input type="submit"  class="w3-btn w3-white w3-border w3-border-blue w3-round-large" name="export" value="CSV Export" class="btn btn-success" id="export_csv1"/>  
                                    <input type="text" name="header" value="Guardian FM" hidden/>  
                                    <input type="text" name="tblname" value="tbl_employee"  hidden/>  
                                    <input type="text" name="criteria" id="criteria1" value="WHERE `active`='active' AND `agreement_status`='Accept' AND `verify`='unverify'" hidden/>  
                                    <input type="text" name="limit" id="limit1" value="" hidden/>
                                </form>
                            </td>
                            <td>
                                <select id="select_newstaff" class="w3-input w3-border w3-round-large">
                                    <option selected>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                    <option>200</option>
                                    <option>500</option>
                                    <option>All</option>
                                </select>
                            </td>
                            </tbody>
                        </table>







                        <br>
                        <br>
                        <br>
                        <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered "   id="newstaff"> 
                            <thead class="table-header">
                                <tr class="header">
                                    <th>S No.</th>
                                    <th>ID</th>
                                    <th onclick="w3.sortHTML('#newstaff', '.item', 'td:nth-child(1)')" style="cursor:pointer">Last Name</th>
                                    <th onclick="w3.sortHTML('#newstaff', '.item', 'td:nth-child(2)')" style="cursor:pointer">First Name</th>
                                    <th>Short Name</th>
                                    <th colspan="2">Compliance</th>
                                    <th colspan="6">Screening</th>
                                    <th>Application Date</th>
                                    <th>Deployed Date</th>
                                    <th>Prescreen Status</th>

                                </tr>
                                <tr class="subheader ">
                                    <th></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>                                    
                                    <th>SIA No.<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>SIA Expiry<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>

                                    <th>Docs Recieved<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Refrences<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>App Info<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Policy Docs<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Address Verification<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Education Verification<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>


                                    <th><i style='font-size:16px' class='fas'>&#xf107;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>

                                    <th></th>



                                </tr>
                            </thead> 
                            <tbody>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="15"></td>

                                </tr>

                            </tfoot>

                        </table>

                    </div>
                </center>

            </div>

            <div id="CurrentStaff" class="w3-container city" style="display:none">
                <h1>Current Staff</h1>
                <p>Active, Verified & Agreement Accepted Officers.</p>
                <center>
                    <div class="responsive" >

                        <input type="text" id="txtsearch3"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px; "/>
                        <br>


                        <table border="1" class="responsive-table w3-table-all w3-centered w3-bordered">
                            <thead >
                                <tr>
                                    <th>CSV Export</th>
                                    <th>Limit</th>
                                </tr>
                            </thead>
                            <tbody class="table-row">
                                <tr>
                                    <td >
                                        <form method="post"  action="csv.php"  align="center" id="exportform">
                                            <input type="submit"  class="w3-btn w3-white w3-border w3-border-blue w3-round-large" name="export" value="CSV Export" class="btn btn-success" id="export_csv1"/>  
                                            <input type="text" name="header" value="Guardian FM" hidden/>  
                                            <input type="text" name="tblname" value="tbl_employee"  hidden/>  
                                            <input type="text" name="criteria" id="criteria2" value="WHERE `active`='active' AND `agreement_status`='Accept' AND `verify`='verify'" hidden/>  
                                            <input type="text" name="limit" id="limit2" value="" hidden/>
                                        </form>
                                    </td>
                                    <td >
                                        <select id="select_currentstaff" class="w3-input w3-border w3-round-large" >
                                            <option selected>25</option>
                                            <option>50</option>
                                            <option>100</option>
                                            <option>200</option>
                                            <option>500</option>
                                            <option>All</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <br>
                        <br>
                        <br>
                        <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered "   id="currentstaff"> 
                            <thead class="table-header">
                                <tr class="header">
                                    <th>S No.</th>
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Short Name</th>
                                    <th colspan="2">Compliance</th>
                                    <th colspan="6">Screening</th>
                                    <th>Application Date</th>
                                    <th>Deployed Date</th>
                                    <th>Prescreen Status</th>

                                </tr>
                                <tr class="subheader">
                                    <th></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>SIA No.<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>SIA Expiry<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>

                                    <th>Docs Recieved<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Refrences<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>App Info<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Policy Docs<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Address Verification<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Education Verification<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>


                                    <th><i style='font-size:16px' class='fas'>&#xf107;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>

                                    <th></th>



                                </tr>
                            </thead> 
                            <tbody>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="15"></td>

                                </tr>

                            </tfoot>

                        </table>

                    </div>
                </center>

            </div>

            <div id="StaffHold" class="w3-container city" style="display:none">
                <h1>Staff On Hold</h1>
                <p>Active, Verified & Agreement Declined Officers.</p>
                <center>
                    <div class="responsive" >

                        <input type="text" id="txtsearch4"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px; "/>
                        <br>

                        <table border="1" class="responsive-table w3-table-all w3-centered w3-bordered">
                            <thead >
                                <tr>
                                    <th>CSV Export</th>
                                    <th>Limit</th>
                                </tr>
                            </thead>
                            <tbody class="table-row">
                                <tr>
                                    <td >
                                        <form method="post"  action="csv.php"  align="center" id="exportform">
                                            <input type="submit"  class="w3-btn w3-white w3-border w3-border-blue w3-round-large" name="export" value="CSV Export" class="btn btn-success" id="export_csv1"/>  
                                            <input type="text" name="header" value="Guardian FM" hidden/>  
                                            <input type="text" name="tblname" value="tbl_employee"  hidden/>  
                                            <input type="text" name="criteria" id="criteria3" value="WHERE `active`='active' AND `agreement_status`='Decline' OR `agreement_status`='' AND `verify`='verify'" hidden/>  
                                            <input type="text" name="limit" id="limit3" value="" hidden/>
                                        </form>
                                    </td>
                                    <td >
                                        <select id="select_holdstaff" class="w3-input w3-border w3-round-large" >
                                            <option selected>25</option>
                                            <option>50</option>
                                            <option>100</option>
                                            <option>200</option>
                                            <option>500</option>
                                            <option>All</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>







                        <br>
                        <br>
                        <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered "   id="holdstaff"> 
                            <thead class="table-header"> 
                                <tr class="header">
                                    <th>S No.</th>
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Short Name</th>
                                    <th colspan="2">Compliance</th>
                                    <th colspan="6">Screening</th>
                                    <th>Application Date</th>
                                    <th>Deployed Date</th>
                                    <th>Prescreen Status</th>

                                </tr>
                                <tr class="subheader">
                                    <th></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>SIA No.<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>SIA Expiry<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>

                                    <th>Docs Recieved<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Refrences<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>App Info<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Policy Docs<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Address Verification<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>
                                    <th>Education Verification<br><i style='font-size:16px' class='fas'>&#xf106;</i></th>


                                    <th><i style='font-size:16px' class='fas'>&#xf107;</i></th>
                                    <th><i style='font-size:16px' class='fas'>&#xf106;</i></th>

                                    <th></th>



                                </tr>
                            </thead> 
                            <tbody>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="15"></td>

                                </tr>

                            </tfoot>

                        </table>

                    </div>
                </center>
            </div>

            <div id="VettingManagement" class="w3-container city" style="display:none">
                <center>
                    <div class="w3-responsive">
                        <br>
                        <br>

                        <select class="w3-round-large" id="select_officer" name="select_officer" style="width:20%; height: 30px;">
                            <?php
                            include 'dbconnection.php'; //get the contractors 
                            $sql = "SELECT * FROM `tbl_employee` WHERE `active`='active' AND `agreement_status`='Accept' AND `verify`='verify'";
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
                                    </tr>
                                </thead> 
                                <tbody >

                                    <tr class="table-row">
                                        <td class="col col-1">SIA Badge (Front)</td>
                                        <td class="col col-1" data-label=""><a href="#" id="sia_front" title="SIA Badge (Front)"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="col col-2">SIA Badge (Rear)</td>
                                        <td class="col col-2" data-label=""><a <a href="#" id="sia_rear" title="SIA Badge (Rear)"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="col col-3">Passport</td>
                                        <td class="col col-3" data-label=""><a href="#" id="passport" title="Passport"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="col col-4">Utility Bill</td>
                                        <td class="col col-4" data-label=""><a href="#" id="utilitybill" title="Utility Bill"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
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
                            <form name="zips" action="download.php" method="post">
                                <table border='1' class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " id="document_download">
                                    <thead >
                                        <tr class="header">
                                            <th colspan="6"><h4 class="headerheading">Download Documents</h4></th>
                                        </tr>
                                        <tr class="table-header">
                                            <th>SIA (Front)</th>
                                            <th>SIA (Rear)</th>
                                            <th>Passport</th>
                                            <th>Bill</th>
                                            <th>All</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead> 

                                    <tbody class="table-row">
                                        <tr>
                                            <td class="col col-1" data-label="SIA(Front)">
                                                <input class="chk" type="checkbox" name="files[]" id="sia_f_d" value=""/>
                                            </td>
                                            <td class="col col-2" data-label="SIA (Rear)">
                                                <input class="chk" type="checkbox" name="files[]" id="sia_r_d" value=""/>
                                            </td>
                                            <td class="col col-3" data-label="Passport">
                                                <input class="chk" type="checkbox" name="files[]" id="passp_d" value=""/>
                                            </td>
                                            <td class="col col-4" data-label="Bill"> 
                                                <input class="chk" type="checkbox" name="files[]" id="bill_d" value=""/>
                                            </td>
                                            <td class="col col-1" data-label="All">
                                                <input type="checkbox" id="checkAll" />
                                            </td>
                                            <td class="col col-2" data-label="Download">
                                                <input type="submit" id="submit" name="createzip" value="Download" >
                                            </td>
                                        </tr>

                                    </tbody>

                                    <tfoot>
                                    <td colspan="6"></td>

                                    </tfoot>

                                </table>
                            </form>
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
                        <div class="container">
                            <table border='1' class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " style="width:80%;" id="bank_info_tbl">
                                <thead >
                                    <tr class="header">
                                        <th colspan="4"><h4 class="headerheading">Bank Information</h4></th>
                                    </tr>
                                    <tr class="subheader table-header">
                                        <th>Bank Name</th>
                                        <th>Account Title</th>
                                        <th>Sort Code</th>
                                        <th>Account Number</th>                                        

                                    </tr>
                                </thead> 
                                <tbody>

                                </tbody>

                                <tfoot>
                                <td colspan="4"></td>
                                </tfoot>
                            </table>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="container">
                            <table border='1' class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " style="width:80%;" id="info_tbl">
                                <thead>
                                    <tr class="header">
                                        <th colspan="7"><h4 class="headerheading">Miscellaneous Information</h4></th>
                                    </tr>
                                    <tr class="subheader table-header">
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Postcode</th>
                                        <th>Type Of Officer</th>
                                        <th>License No.</th>
                                        <th>License Expiry</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                </tbody>

                                <tfoot>
                                <td colspan="7"></td>

                                </tfoot>

                            </table>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>

            </div>
        </center>
    </div>
    <br>
    <br>
    <div id="OfficerStrength" class="w3-container city" style="display:none">
        <!--<h1>New Staff</h1><p>Needs to be verified by controller.</p>-->
        <center>
            <div class="responsive"   >

                <input type="text" id="txtsearch"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px; " />
                <br>
                <br>
                <select id="select_officerstrength" class="w3-input w3-border w3-round-large" style="width: 80px;">
                    <option selected>25</option>
                    <option>50</option>
                    <option>100</option>
                    <option>200</option>
                    <option>500</option>
                    <option>All</option>
                </select>
                <br>


                <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered "  id="OfficerStrength_tbl"> 
                    <thead class="table-header">
                        <tr class="header">
                            <th>S No.</th>
                            <th>Strength</th>
                            <th>Country</th>
                            <th>County</th>
                        </tr>                                
                    </thead> 
                    <tbody>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="4"></td>

                        </tr>

                    </tfoot>

                </table>
                <br>
                <br>
            </div>
        </center>

    </div>

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
            <div class="w3-container" style="height: 90%;  overflow-y: auto; ">

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
            <div class="w3-container" style="height:  90%; overflow-y: auto;">
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
            <div class="w3-container" style="height:  90%; overflow-y: auto;">
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
            <div class="w3-container" style="height:  90%; overflow-y: auto;">
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

</div>

<script>
    var id = 0;
//            var officerval = document.getElementById('select_officer');
//            var oid = officerval[officerval.selectedIndex].id;
    $(document).ready(function () {
        var limit_newstaff = document.getElementById('select_newstaff').value;
        var limit_currentstaff = document.getElementById('select_currentstaff').value;
        var limit_holdstaff = document.getElementById('select_holdstaff').value;

        document.getElementById('limit1').value = "LIMIT " + limit_newstaff;
        document.getElementById('limit2').value = "LIMIT " + limit_currentstaff;
        document.getElementById('limit3').value = "LIMIT " + limit_holdstaff;

        document.getElementById('newstafftab').click();
//
        LoadData('fetch-newstaff', '25');
//                openCity(event, 'NewStaff');
        LoadPersonalReference('vet_per_ref');
        LoadEducation('vet_education');
        LoadEmploementRef('vet_emp_ref');
        LoadBankInfo('vet_bank_info');
        LoadfurtherInfo('vet_further_info');
        DocCount();
        LoadFilePath();
        $('#select_newstaff').change(function () {
            var limit = this.value;
            LoadData('fetch-newstaff', limit);
            if (limit != 'All') {
                document.getElementById('limit1').value = "LIMIT " + limit;
            } else {
                document.getElementById('limit1').value = "";
            }
        });
        $('#select_currentstaff').change(function () {
            var limit = this.value;
            LoadData('fetch-currentstaff', limit);
            if (limit != 'All') {
                document.getElementById('limit2').value = "LIMIT " + limit;
            } else {
                document.getElementById('limit2').value = "";
            }
        });
        $('#select_holdstaff').change(function () {
            var limit = this.value;
            LoadData('fetch-holdstaff', limit);
            if (limit != 'All') {
                document.getElementById('limit3').value = "LIMIT " + limit;
            } else {
                document.getElementById('limit3').value = "";
            }
        });
        $('#select_officerstrength').change(function () {
            var limit = this.value;
            LoadData('fetch-officerstrength', limit);
        });


        $('#txtsearch').keyup(function () {
            search_table($(this).val());
        });
        function search_table(value) {
            $('#OfficerStrength_tbl tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                    {
                        found = 'true';
                    }
                });
                if (this.rowIndex >= 1) {
                    if (found == 'true')
                    {
                        $(this).show();
                    } else
                    {
                        $(this).hide();
                    }
                }
            });
        }

        $('#txtsearch2').keyup(function () {
            search_table2($(this).val());
        });
        function search_table2(value) {
            $('#newstaff tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                    {
                        found = 'true';
                    }
                });
                if (this.rowIndex >= 1) {
                    if (found == 'true')
                    {
                        $(this).show();
                    } else
                    {
                        $(this).hide();
                    }
                }
            });
        }

        $('#txtsearch3').keyup(function () {
            search_table3($(this).val());
        });
        function search_table3(value) {
            $('#currentstaff tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                    {
                        found = 'true';
                    }
                });
                if (this.rowIndex >= 1) {
                    if (found == 'true')
                    {
                        $(this).show();
                    } else
                    {
                        $(this).hide();
                    }
                }
            });
        }

        $('#txtsearch4').keyup(function () {
            search_table4($(this).val());
        });
        function search_table4(value) {
            $('#holdstaff tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                    {
                        found = 'true';
                    }
                });
                if (this.rowIndex >= 1) {
                    if (found == 'true')
                    {
                        $(this).show();
                    } else
                    {
                        $(this).hide();
                    }
                }
            });
        }
        $(document).on('change', '#select_officer', function (event) {

            LoadPersonalReference('vet_per_ref');
            LoadEducation('vet_education');
            LoadEmploementRef('vet_emp_ref');
            LoadBankInfo('vet_bank_info');
            LoadfurtherInfo('vet_further_info');
            LoadFilePath();
        })


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
            var last_req = $(this).closest('tr').find('#emp_ref_last_req').val();
            var refphone = $(this).closest('tr').find('#emp_ref_refphone').text();

            var col = "RefName='" + name + "'\n\
                  ,Company='" + company + "'\n\
                  ,JobTitle='" + jobtitle + "'\n\
                   ,Phone='" + phone + "'\n\
                  ,Email='" + email + "'\n\
                  ,EmpFrom='" + emp_from + "'\n\
                  ,EmpTo='" + emp_to + "'\n\
                 ,LastReq='" + last_req + "'\n\
                 ,RefPhone='" + refphone + "'";

            alert(col);

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
            var last_req = $(this).closest('tr').find('#emp_ref_last_req_i').val();
            var refphone = $(this).closest('tr').find('#emp_ref_refphone_i').text();


            var col = "OID,RefName,Company,JobTitle,Phone,Email,EmpFrom,EmpTo,LastReq,RefPhone";
            var val = "'" + id + "','" + name + "','" + company + "','" + jobtitle + "','" + phone + "','" + email + "','" + emp_from + "','" + emp_to + "','" + last_req + "','" + refphone + "'";

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
            var last_req = $(this).closest('tr').find('#emp_ref_last_req_n').text();
            var refphone = $(this).closest('tr').find('#emp_ref_refphone_n').text();


            var col = "OID,RefName,Company,JobTitle,Phone,EmpFrom,EmpTo,LastReq,RefPhone";
            var val = "'" + id + "','" + name + "','" + company + "','" + jobtitle + "','" + phone + "','" + emp_from + "','" + emp_to + "','" + last_req + "','" + refphone + "'";



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




        $(document).on('click', '#btn_save_edu_u', function (event)
        {



            var id = $(this).attr('data-id');
            var school = $(this).closest('tr').find('#edu_school_u').text();
            var address = $(this).closest('tr').find('#edu_address_u').text();
            var postcode = $(this).closest('tr').find('#edu_postcode_u').text();
            var att_from = $(this).closest('tr').find('#edu_att_from_u').val();
            var att_to = $(this).closest('tr').find('#edu_att_to_u').val();
            var course = $(this).closest('tr').find('#edu_course_u').text();


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



        $(document).on('click', '#btn_email_emp_ref', function (event)
        {


            var id = $(this).attr('data-id');
            var name = document.getElementById('select_officer').value;
            var email = $(this).attr('data-email');
            var officerval = document.getElementById('select_officer');
            var oid = officerval[officerval.selectedIndex].id;

            $.ajax({
                url: "RefrencesEmail.php",
                method: "POST",
                data: {id: id, name: name, email: email, oid: oid},
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
    });


    $(document).on('change', '#email_chkbox', function ()
    {
        if (this.checked) {

            var id = $(this).attr('data-id');
            var name = document.getElementById('select_officer').value;
            var email = $(this).attr('data-email');
            var officerval = document.getElementById('select_officer');
            var oid = officerval[officerval.selectedIndex].id;

            $.ajax({
                url: "RefrencesEmail.php",
                method: "POST",
                data: {id: id, name: name, email: email, oid: oid},
                success: function (data)
                {
                    alert(data);
                }
            });
        }
    })

    $('#email_chkbox_all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.email_chkbox').each(function () {
                this.checked = true;
                var id = $(this).attr('data-id');
                var name = document.getElementById('select_officer').value;
                var email = $(this).attr('data-email');
                var officerval = document.getElementById('select_officer');
                var oid = officerval[officerval.selectedIndex].id;

                $.ajax({
                    url: "RefrencesEmail.php",
                    method: "POST",
                    data: {id: id, name: name, email: email, oid: oid},
                    success: function (data)
                    {
                        alert(data);
                    }
                });
            });
        } else {
            $('.email_chkbox').each(function () {
                this.checked = false;
            });
        }
    });

    //END OF DOCUMENT.READY BLOCK

    function DocCount() {

        $.ajax({
            url: "DocumentCount.php",
            method: "POST",
            data: {},
            success: function (data)
            {
//                        alert(data);
            }
        });
    }

    function LoadFilePath() {

        var officerval = document.getElementById('select_officer');
        var id = officerval[officerval.selectedIndex].id;

        $.ajax({
            url: "loadfilepath.php",
            method: "POST",
            dataType: "json",
            data: {id: id},
            success: function (data)
            {
                document.getElementById('sia_f_d').value = data["SIA_Front"];
                document.getElementById('sia_r_d').value = data["SIA_Rear"];
                document.getElementById('passp_d').value = data["Passport"];
                document.getElementById('bill_d').value = data["bill"];


            }
        });

    }

    function LoadData(Status, limit) {


        $.ajax({
            url: "db_screening.php",
            method: "POST",
            data: {mode: "fetch", Status: Status, limit: limit},
            success: function (data)
            {
                if (Status == "fetch-newstaff") {
                    $('#newstaff tbody').html(data);
                } else if (Status == "fetch-currentstaff") {
                    $('#currentstaff tbody').html(data);
                } else if (Status == "fetch-holdstaff") {
                    $('#holdstaff tbody').html(data);
                } else if (Status == "fetch-officerstrength") {
                    $('#OfficerStrength_tbl tbody').html(data);
                }

            }
        });
    }
    function LoadPersonalReference(Status) {
        var officer = document.getElementById('select_officer').value;
        var officerval = document.getElementById('select_officer');
        var officer_id = officerval[officerval.selectedIndex].id;

        $.ajax({
            url: "db_screening.php",
            method: "POST",
            data: {mode: "vet", Status: Status, officer: officer, officer_id: officer_id},
            success: function (data)
            {
                $('#personalref tbody').html(data);

            }
        });
    }

    function LoadBankInfo(Status) {
        var officer = document.getElementById('select_officer').value;
        var officerval = document.getElementById('select_officer');
        var officer_id = officerval[officerval.selectedIndex].id;

        $.ajax({
            url: "db_screening.php",
            method: "POST",
            data: {mode: "vet", Status: Status, officer: officer, officer_id: officer_id},
            success: function (data)
            {

                $('#bank_info_tbl tbody').html(data);

            }
        });
    }

    function LoadfurtherInfo(Status) {
        var officer = document.getElementById('select_officer').value;
        var officerval = document.getElementById('select_officer');
        var officer_id = officerval[officerval.selectedIndex].id;

        $.ajax({
            url: "db_screening.php",
            method: "POST",
            data: {mode: "vet", Status: Status, officer: officer, officer_id: officer_id},
            success: function (data)
            {

                $('#info_tbl tbody').html(data);

            }
        });
    }


    function LoadEducation(Status) {
        var officer = document.getElementById('select_officer').value;
        var officerval = document.getElementById('select_officer');
        var officer_id = officerval[officerval.selectedIndex].id;

        $.ajax({
            url: "db_screening.php",
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
        var officerval = document.getElementById('select_officer');
        var officer_id = officerval[officerval.selectedIndex].id;

        $.ajax({
            url: "db_screening.php",
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



    //===========================================FILE DOWNLOAD================================================

    $('#submit').prop("disabled", true);
    $("#checkAll").change(function () {
        $(".chk").prop('checked', $(this).prop("checked"));
        $('#submit').prop("disabled", false);
        if ($('.chk').filter(':checked').length < 1) {
            $('#submit').attr('disabled', true);
        }
    });

    $('input:checkbox').click(function () {
        if ($(this).is(':checked')) {
            $('#submit').prop("disabled", false);
        } else {
            if ($('.chk').filter(':checked').length < 1) {
                $('#submit').attr('disabled', true);
            }
        }
    });
</script>

</body>
</html>
