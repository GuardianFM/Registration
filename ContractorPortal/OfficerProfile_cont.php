<?php
session_start();
if (isset($_SESSION["username3"])) {
    $id = $_GET["id"];
} else {
    header("location:logindb_cont.php");
}
?>
<!DOCTYPE html>
<html>
    <title></title>
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="vendor/jquery/select2.min.js" type="text/javascript"></script>
    <link href="css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <style>
        table {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;

        }

        .circle {
            height: 200px;
            width: 200px;
            background-color:white;
            border-radius: 100%;
            border-style: solid;
            border-color: red;
            text-align: center;
            margin-bottom: 50px;
        }
        #span_{ 
            line-height:200px; 

        }
        div.b{
            vertical-align:middle; 
            display:inline-block; 

        }
        #officer_dtl td label{
            float: left;
        }

        .MainDiv{
            width:70%;

        }        
        .circle{
            width:200px;;
            height: 200px;
            /*float: right;*/
            margin-bottom: -5px;

        }
        div{
            /*border-style: solid;*/
        }

        button {
            background-color: #cc2900; /* Green */
            border: none;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width:25%;
            border-radius: 12px;
        }

        #mediacircle{
            display: none;
        }
        @media all and (max-width: 767px) {
            .MainDiv {
                width: 95%;

            }

            #mediacircle{
                display: block;
            }

            .circle{
                display: none;
            }
        }
        .select2-dropdown {
            top: 22px !important; left: 8px !important;
        }


    </style>
    <body>
        <br>
        <br>


        <div class="container">
            <div class="w3-light-grey" style="margin-left:15%; margin-right: 15%; border-radius: 15px; ">
                <div class="w3-green" style="height:26px; text-align: center; border-radius: 15px;"  id="percent"></div>
            </div>
        </div>
        <div class="container" >

            <center> <div class="MainDiv">   
                    <br>
                    <select class="w3-input w3-border w3-round-large" id="select_officer" name="select_officer" >
                        <?php
                        include 'dbconnection.php'; //get the contractors 
                        $sql = "SELECT * FROM `tbl_employee` WHERE contractor_id='" . $_GET['id'] . "' ORDER BY shortname ASC";
                        $result = mysqli_query($connect, $sql);
                        $i = 0;
                        $row = mysqli_fetch_array($result);
                        $contractor_id = 0;

                        mysqli_data_seek($result, 0);

                        while ($row = mysqli_fetch_array($result)) {
                            ?>

                            <option id="<?php echo $row["EmployeeID"] ?>"><?php echo $row["firstname"] ?> <?php echo $row["lastname"] ?></option>

                            <?php
                        }
                        ?> 
                    </select>
                    <script src="select2.min.js"></script>
                    <script>
                        $("#select_officer").select2({
                            placeholder: "Select Officer",
                            allowClear: true
                        });
                    </script>
                    <br>
                    <br>
                    <table class="w3-table-all w3-border w3-card w3-small w3-centered " id="officer_dtl">
                        <thead>
                        <th colspan="2"><h2>Personal Information</h2></th>

                        </thead>
                        <tbody>


                            <tr class="table-row">
                                <td><label >ID</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="officer_id" disabled=""></td>


                            </tr>
                            <tr>
                                <td><label>Last Name</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="lastname"></td>


                            </tr>
                            <tr>
                                <td><label>First Name</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="firstname"></td>


                            </tr>
                            <tr>
                                <td><label>User Name</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="username" disabled></td>


                            </tr>
                            <tr>
                                <td><label>Gender</label></td>
                                <td><select class="w3-input w3-round-large w3-border" id="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select></td>


                            </tr>
                            <tr>
                                <td><label>Date Of Birtd</label></td>
                                <td><input type="date" class="w3-input w3-round-large w3-border" id="dob"></td>

                            </tr>
                            <tr>
                                <td><label>Email</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="email"></td>

                            </tr>
                            <tr>
                                <td><label>Password</label></td>
                                <td><input type="password" class="w3-input w3-round-large w3-border" id="password"></td>

                            </tr>
                            <tr>
                                <td><label>Confirm Password</label></td>
                                <td><input type="password" class="w3-input w3-round-large w3-border" id="confrmpassword"></td>


                            </tr>
                            <tr>
                                <td><label>Phone</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="phone"></td>

                            </tr>
                            <tr>
                                <td><label>Address</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="address"></td>

                            </tr>
                            <tr>
                                <td><label>Postcode</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="postcode"></td>

                            </tr>
                            <tr>
                                <td><label>Region</label></td>
                                <td><input type="text" class="w3-input w3-round-large w3-border" id="region"/></td>

                            </tr>
                            <tr>
                                <td><label>Country</label></td>
                                <td><input type="text" class="w3-input w3-round-large w3-border" id="country"/></td>

                            </tr>

                            <tr>
                                <td><label>Type Of Officer</label></td>
                                <td><select class="w3-input w3-round-large w3-border" id="typeofofficer">
                                        <option value="Door Supervisor">Door Supervisor</option>
                                    <option value="Security Guard">Security Guard</option>
                                    <option value="Steward">Steward</option>
                                    <option value="Construction Operative Security">Construction Operative Security</option>
                                    <option value="Cleaners">Cleaners</option>
                                    </select>        
                                </td>

                            </tr>
                            <tr>
                                <td><label>SIA License No.</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="license" maxlength="16"></td>

                            </tr>
                            <tr>
                                <td><label>SIA License Expiry Date</label></td>
                                <td><input type="date" class="w3-input w3-round-large w3-border" id="licenseexp"></td>

                            </tr>
                            <tr>
                                <td class="table-header"><label>Bank Name</label></td>
                                <td class="col col-2" data-label="Bank Name"><input class="w3-input w3-round-large w3-border" id="bankname" ></td>
                            </tr>
                            <tr>
                                <td><label>Account Title</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="accounttitle"></td>
                            </tr>
                            <tr>
                                <td><label>Sort Code</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="sortcode" maxlength="8"></td>
                            </tr>
                            <tr>
                                <td><label>Account Number</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="accountno"></td>
                            </tr>
                            <tr style="display: none;">
                                <td><label>Latitude</label></td>
                                <td>
                                    <input placeholder="Latitude" name="latitude" id="latitude"   class="w3-input w3-border w3-round-large">
                                </td>

                            </tr>
                            <tr style="display: none;">
                                <td><label>Longitude</label></td>
                                <td>
                                    <input placeholder="Longitude" name="longitude" id="longitude"   class="w3-input w3-border w3-round-large">
                                </td>

                            </tr>
                        </tbody>


                    </table>
            </center>
        </div>



        <br>
        <br>

        <div class="container" style="margin:2% 15% 2% 15%;">            
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
                        <td class="col col-1"> SIA Badge (Front)</td>
                        <td class="col col-1" data-label=""><a href="#" id="sia_front" title="SIA Badge (Front)"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                        <td class="col col-1" data-label=""><label  id="sia_front_label">Please upload document</label></td>

                    </tr>
                    <tr class="table-row">
                        <td class="col col-2">SIA NI</td>
                        <td class="col col-2" data-label=""><a <a href="#" id="sia_rear" title="SIA Badge (Rear)"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                        <td class="col col-2"><label id="sia_rear_lable">Please upload document</label></td>
                    </tr>
                    <tr class="table-row">
                        <td class="col col-3">Passport</td>
                        <td class="col col-3" data-label=""><a href="#" id="passport" title="Passport"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                        <td class="col col-3" data-label=""><label  id="passport_label">Please upload document</label></td>
                    </tr>
                    <tr class="table-row">

                        <td class="col col-4">Utility Bill</td>
                        <td class="col col-4" data-label=""><a href="#" id="utilitybill" title="Utility Bill"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                        <td class="col col-4" data-label=""><label  id="utilitybill_label">Please upload document</label></td>
                    </tr>
                    <tr class="table-row">

                        <td class="col col-1">Other Document</td>
                        <td class="col col-1" data-label=""><a href="#" id="otherdocument" title="Other Document"><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                        <td class="col col-1" data-label=""><label  id="otherdocument_label">Please upload document</label></td>
                    </tr>

                </tbody>

<!--                                <tfoot>
                                <td colspan="2"></td>

                                </tfoot>-->

            </table>

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


    <center>
        <button  id="btn-save">Update</button>
    </center>
    <br>
    <br>

</div>

</body>
<script>

    var total = 0;
    var total_doc = 0;
    $(document).ready(function () {

        DocumentComplete();
        LoadEmpData();
        $(document).on('click', '#btn-save', function () {

            var id = document.getElementById('officer_id').value;
            if (Number.isInteger(parseInt(id))) {

                UpdateData();
            } else {
                alert("No id found")
            }
        });
        $("#sortcode").keyup(function () {
            if ($(this).val().length == 2) {
                $(this).val($(this).val() + "-");
            } else if ($(this).val().length == 5) {
                $(this).val($(this).val() + "-");
            }
        });
    });
    function ProfileComplete() {

        //    alert('12764')

        var officerval = document.getElementById('select_officer');
        var oid = officerval[officerval.selectedIndex].id;
        $.ajax({
            type: "POST", // The method of sending data can be with GET or POST
            url: "OfficerProfile_db_cont.php", // Fill in url / php file path to destination
            //          

            data: {id: oid, mode: 'ProfileCheck'}, // data to be sent to the process file
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {




                if (response.status == "success") {

                    // If the content of the status array is success
                    if (response.id != "") {
                        total++;
                    }
                    if (response.name != "") {
                        total++;
                    }
                    if (response.firstname != "") {
                        total++;
                    }
                    if (response.gender != "") {
                        total++;
                    }
                    if (response.phone != "") {
                        total++;
                    }
                    if (response.address != "") {
                        total++;
                    }
                    if (response.dob != "") {
                        total++;
                    }
                    if (response.postcode != "") {
                        total++;
                    }
                    if (response.country != "") {
                        total++;
                    }
                    if (response.email != "") {
                        total++;
                    }
                    if (response.license != "") {
                        total++;
                    }
                    if (response.licenseexpiry != "") {
                        total++;
                    }
                    if (response.shortname != "") {
                        total++;
                    }
                    if (response.password != "") {
                        total++;
                    }
                    if (response.conf_password != "") {
                        total++;
                    }
                    if (response.typeofofficer != "") {
                        total++;
                    }
                    if (response.bankname != "") {
                        total++;
                    }
                    if (response.acctitle != "") {
                        total++;
                    }
                    if (response.sortcode != "") {
                        total++;
                    }
                    if (response.accnum != "") {
                        total++;
                    }
                    if (response.region != "") {
                        total++;
                    }
                    //alert(total + '-' + total_doc);
                    var percentage = (((total + total_doc) / 26) * 100);
                    total = 0;
                    total_doc = 0;
                    document.getElementById('percent').innerHTML = percentage.toFixed(0) + "% Profile Completed";
                    document.getElementById('percent').style.width = percentage.toFixed(0) + '%';
                    if (percentage == 100) {
                        document.getElementById("circle").style.borderColor = "green";
                    } else {
                        document.getElementById("circle").style.borderColor = "red";
                    }
                } else { // If the contents of the status array are failed
                    alert("No Record Found");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) { // When there is an error
                alert(xhr.responseText);
            }
        });
    }

    $('#select_officer').change(function () {
        DocumentComplete();
        LoadEmpData();
        setTimeout(function () {
            CheckInputs();
            // DocumentComplete();
            ProfileComplete();
        }, 1000);
    });
    function LoadEmpData() {
        var officerval = document.getElementById('select_officer');
        var oid = officerval[officerval.selectedIndex].id;
        $.ajax({
            type: "POST", // The method of sending data can be with GET or POST
            url: "OfficerProfile_db_cont.php", // Fill in url / php file path to destination
            //          

            data: {id: oid, mode: 'fetch'}, // data to be sent to the process file
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {


                if (response.status == "success") {

                    // If the content of the status array is success
                    $("#officer_id").val(response.id); // set textbox with id name        
                    $("#lastname").val(response.name); // set textbox with id name
                    $("#firstname").val(response.firstname); // set textbox with id first name
                    $("#gender").val(response.gender); // set textbox with id gender
                    $("#phone").val(response.phone); // set textbox with id phone
                    $("#address").val(response.address); // set textbox with id address
                    $("#dob").val(response.dob); // set textbox with id name
                    $("#postcode").val(response.postcode); // set textbox with id sex
                    $("#country").val(response.country); // set textbox with id phone
                    $("#email").val(response.email); // set textbox with id address
                    $("#license").val(response.license); // set textbox with id sex
                    $("#licenseexp").val(response.licenseexpiry); // set textbox with id phone
                    $("#username").val(response.shortname); // set textbox with id address
                    $("#password").val(response.password); // set textbox with id address
                    $("#confrmpassword").val(response.conf_password);
                    $("#typeofofficer").val(response.typeofofficer);
                    $("#bankname").val(response.bankname);
                    $("#accounttitle").val(response.acctitle);
                    $("#sortcode").val(response.sortcode);
                    $("#accountno").val(response.accnum);
                    $("#latitude").val(response.emp_latitude);
                    $("#longitude").val(response.emp_longitude);
                    $("#region").val(response.region);
                } else { // If the contents of the status array are failed
                    alert("No Record Found");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) { // When there is an error
                alert(xhr.responseText);
            }
        });
    }

    function UpdateData() {


        var id = document.getElementById('officer_id').value;
        var name = document.getElementById('lastname').value;
        var firstname = document.getElementById('firstname').value;
        var shortname = document.getElementById('username').value;
        var gender = document.getElementById('gender').value;
        var dob = document.getElementById('dob').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;
        var country = document.getElementById('country').value;
        var postcode = document.getElementById('postcode').value;
        var license = document.getElementById('license').value;
        var licenseexpiry = document.getElementById('licenseexp').value;
        var licensedate = new Date(licenseexp);
        var currdate = new Date();
        var password = document.getElementById('password').value;
        var conf_password = document.getElementById('confrmpassword').value;
        var typeofofficer = document.getElementById('typeofofficer').value;
        var bankname = document.getElementById('bankname').value;
        var acctitle = document.getElementById('accounttitle').value;
        var sortcode = document.getElementById('sortcode').value;
        var accnum = document.getElementById('accountno').value;
        var region = document.getElementById('region').value;
        var latitude = document.getElementById('latitude').value;
        var longitude = document.getElementById('longitude').value;
        if (license == '')
        {
            alert("Enter SIA License No.");
            return false;
        }

        if (conf_password == '')
        {
            alert("Enter Confirm Password ");
            return false;
        }

        if (password == '')
        {
            alert("Enter Password ");
            return false;
        }
        if (postcode == '')
        {
            alert("Enter Postcode ");
            return false;
        }

        if (dob == '')
        {
            alert("Enter Valid Date Of Birth ");
            return false;
        }
        if (licenseexpiry == '')
        {
            alert("Enter Valid SIA License Expiry Date ");
            return false;
        }
        if (shortname == '')
        {
            alert("Enter User Name");
            return false;
        }

        if (licensedate < Date())
        {
            alert("Enter valid date");
            return false;
        }



        // var newWindow=window.open("Successphp.php", '_self', 'location=yes,scrollbars=yes,status=yes');

        $.ajax({
            url: "OfficerProfile_db_cont.php",
            method: "POST",
            data: {mode: 'update', id: id, name: name, firstname: firstname,
                shortname: shortname, gender: gender, dob: dob, email: email, phone: phone,
                address: address, country: country, postcode: postcode, typeofofficer: typeofofficer,
                license: license, licenseexpiry: licenseexpiry, password: password, conf_password: conf_password,
                accnum: accnum, sortcode: sortcode, acctitle: acctitle, bankname: bankname, region: region, latitude: latitude, longitude: longitude},
            dataType: "text",
            success: function (data)
            {
                alert(data);
                CheckInputs();
                DocumentComplete();
                setTimeout(function () {
                    ProfileComplete();
                }, 1000);
            }

        });
    }


    function DocumentComplete() {

        var officerval = document.getElementById('select_officer');
        var oid = officerval[officerval.selectedIndex].id;
        $.ajax({
            type: "POST", // The method of sending data can be with GET or POST
            url: "OfficerProfile_db_cont.php", // Fill in url / php file path to destination
            data: {id: oid, mode: 'DocumentCheck'}, // data to be sent to the process file
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {




                if (response.status == "success") {

                    // If the content of the status array is success
                    if (response.SIA_Front != "") {
                        total_doc++;
                    }

                    if (response.SIA_Rear != "") {
                        total_doc++;
                    }

                    if (response.Passport != "") {
                        total_doc++;
                    }

                    if (response.bill != "") {
                        total_doc++;
                    }

                    if (response.other != "") {
                        total_doc++;
                    }





                } else { // If the contents of the status array are failed
//                    alert("No Record Found");


                }
            },
            error: function (xhr, ajaxOptions, thrownError) { // When there is an error
                alert(xhr.responseText);
            }
        });
    }


    function ValidateEmail(mail)

    {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
        {
            return (true)
        } else {
            alert("You have entered an invalid email address!")
            return (false)
        }
    }

    setTimeout(function () {
        CheckInputs();
        // DocumentComplete();
        ProfileComplete();
    }, 1000);
    function CheckInputs() {

        var name = document.getElementById('lastname').value;
        var firstname = document.getElementById('firstname').value;
        var shortname = document.getElementById('username').value;
        var gender = document.getElementById('gender').value;
        var dob = document.getElementById('dob').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;
        var country = document.getElementById('country');
        //var country_id = country[country.selectedIndex].id;
        var country_name = country.value;
        var postcode = document.getElementById('postcode').value;
        var license = document.getElementById('license').value;
        var licenseexpiry = document.getElementById('licenseexp').value;
        var licensedate = new Date(licenseexp);
        var currdate = new Date();
        var password = document.getElementById('password').value;
        var conf_password = document.getElementById('confrmpassword').value;
        var typeofofficer = document.getElementById('typeofofficer').value;
        var bankname = document.getElementById('bankname').value;
        var acctitle = document.getElementById('accounttitle').value;
        var sortcode = document.getElementById('sortcode').value;
        var accnum = document.getElementById('accountno').value;
        var region = document.getElementById('region').value;
        if (name == "") {
            document.getElementById("lastname").className = document.getElementById("lastname").className + " w3-border-red"; // this adds the error class
            document.getElementById("lastname").placeholder = "Please enter Last Name";
        } else {
            $("#lastname").removeClass("w3-border-red");
            document.getElementById("lastname").className = document.getElementById("lastname").className + " w3-border";
        }

        if (firstname == "") {
            document.getElementById("firstname").className = document.getElementById("firstname").className + " w3-border-red"; // this adds the error class
            document.getElementById("firstname").placeholder = "Please enter First Name";
        } else {
            $("#firstname").removeClass("w3-border-red");
            document.getElementById("firstname").className = document.getElementById("firstname").className + " w3-border";
        }
        if (email == "") {
            document.getElementById("email").className = document.getElementById("email").className + " w3-border-red"; // this adds the error class
            document.getElementById("email").placeholder = "Please enter Email";
        } else {
            $("#email").removeClass("w3-border-red");
            document.getElementById("email").className = document.getElementById("email").className + " w3-border";
        }
        if (password == "") {
            document.getElementById("password").className = document.getElementById("password").className + " w3-border-red"; // this adds the error class
            document.getElementById("password").placeholder = "Please enter Password";
        } else {
            $("#password").removeClass("w3-border-red");
            document.getElementById("password").className = document.getElementById("password").className + " w3-border";
        }
        if (conf_password == "") {
            document.getElementById("confrmpassword").className = document.getElementById("confrmpassword").className + " w3-border-red"; // this adds the error class
            document.getElementById("confrmpassword").placeholder = "Please enter Confirm Password";
        } else {
            $("#confrmpassword").removeClass("w3-border-red");
            document.getElementById("confrmpassword").className = document.getElementById("confrmpassword").className + " w3-border";
        }

        if (phone == "") {
            document.getElementById("phone").className = document.getElementById("phone").className + " w3-border-red"; // this adds the error class
            document.getElementById("phone").placeholder = "Please enter Phone";
        } else {
            $("#phone").removeClass("w3-border-red");
            document.getElementById("phone").className = document.getElementById("phone").className + " w3-border";
        }
        if (address == "") {
            document.getElementById("address").className = document.getElementById("address").className + " w3-border-red"; // this adds the error class
            document.getElementById("address").placeholder = "Please enter Address";
        } else {
            $("#address").removeClass("w3-border-red");
            document.getElementById("address").className = document.getElementById("address").className + " w3-border";
        }

        if (postcode == "") {
            document.getElementById("postcode").className = document.getElementById("postcode").className + " w3-border-red"; // this adds the error class
            document.getElementById("postcode").placeholder = "Please enter Postcode";
        } else {
            $("#postcode").removeClass("w3-border-red");
            document.getElementById("postcode").className = document.getElementById("postcode").className + " w3-border";
        }

        if (license == "") {
            document.getElementById("license").className = document.getElementById("license").className + " w3-border-red"; // this adds the error class
            document.getElementById("license").placeholder = "Please enter License No.";
        } else {
            $("#license").removeClass("w3-border-red");
            document.getElementById("license").className = document.getElementById("license").className + " w3-border";
        }
        if (bankname == "") {
            document.getElementById("bankname").className = document.getElementById("bankname").className + " w3-border-red"; // this adds the error class
            document.getElementById("bankname").placeholder = "Please enter Bank Name";
        } else {
            $("#bankname").removeClass("w3-border-red");
            document.getElementById("bankname").className = document.getElementById("bankname").className + " w3-border";
        }


        if (acctitle == "") {
            document.getElementById("accounttitle").className = document.getElementById("accounttitle").className + " w3-border-red"; // this adds the error class
            document.getElementById("accounttitle").placeholder = "Please enter Account Title";
        } else {
            $("#accounttitle").removeClass("w3-border-red");
            document.getElementById("accounttitle").className = document.getElementById("accounttitle").className + " w3-border";
        }

        if (sortcode == "") {
            document.getElementById("sortcode").className = document.getElementById("sortcode").className + " w3-border-red"; // this adds the error class
            document.getElementById("sortcode").placeholder = "Please enter Sort Code";
        } else {
            $("#sortcode").removeClass("w3-border-red");
            document.getElementById("sortcode").className = document.getElementById("sortcode").className + " w3-border";
        }

        if (accnum == "") {
            document.getElementById("accountno").className = document.getElementById("accountno").className + " w3-border-red"; // this adds the error class
            document.getElementById("accountno").placeholder = "Please enter Account No.";
        } else {
            $("#accountno").removeClass("w3-border-red");
            document.getElementById("accountno").className = document.getElementById("accountno").className + " w3-border";
        }
        if (region == "") {
            document.getElementById("region").className = document.getElementById("region").className + " w3-border-red"; // this adds the error class
            document.getElementById("region").placeholder = "Please enter Region";
        } else {
            $("#region").removeClass("w3-border-red");
            document.getElementById("region").className = document.getElementById("region").className + " w3-border";
        }

    }

    function PostCodeCheck2() {

        var postcode = document.getElementById('postcode').value;
        $.ajax({
            url: "https://api.postcodes.io/postcodes/" + postcode,
            type: "GET",
            dataType: "json",
            success: function (data)
            {

                document.getElementById('postcode').value = data['result']['postcode'];
                document.getElementById('country').value = data['result']['country'];
                document.getElementById('region').value = data['result']['parliamentary_constituency'];
                document.getElementById('latitude').value = data['result']['latitude'];
                document.getElementById('longitude').value = data['result']['longitude'];
            }

        });
    }

    $("#postcode").focusout(function () { // When the user clicks the Search button
        PostCodeCheck2();
    });</script>

<script>

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
            url: '../fileupload_sia_front.php',
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
            url: "../img_fetch.php",
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
            url: '../fileupload_sia_rear.php',
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
            url: "../img_fetch.php",
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
            url: '../fileupload_passport.php',
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
            url: "../img_fetch.php",
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
            url: '../fileupload_bill.php',
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
            url: "../img_fetch.php",
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
            url: '../fileupload_other.php',
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
            url: "../img_fetch.php",
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



</script>
</html>
