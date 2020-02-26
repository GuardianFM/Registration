<!DOCTYPE html>
<html>
    <title></title>
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        body {
            font-family: 'lato', sans-serif;
        }

        .container {
            max-width: 100%;
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
        <div id="AvailableJobs" class="w3-container">

            <select class="w3-round-large" id="select_officer" name="select_officer" style="width:20%; height: 30px; display: none;">
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

                    <option id="<?php echo $row["EmployeeID"] ?>"><?php echo $row["firstname"] ?> <?php echo $row["lastname"] ?></option>

                    <?php
                }
                ?> 
            </select>
            <h1>Available Jobs</h1>

            <center>

                <div class="container">
                    <table class="responsive-table w3-table-all w3-hoverable w3-striped w3-medium w3-centered w3-bordered" id="available_Jobs_tbl">
                        <thead>
                            <tr class="table-header"> 
                                <th class="col col-1">S No.</th> 
                                <th class="col col-1">Duty Type</th>
                                <th class="col col-1">Description</th> 
                                <th class="col col-2">Location</th>
                                <th class="col col-2">Estimated Distance</th>
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
        <div class="w3-container">
            <div id="id01" class="w3-modal w3-animate-opacity">
                <div class="w3-modal-content w3-card-4">
                    <header class="w3-container w3-blue"> 
                        <span onclick="document.getElementById('id01').style.display = 'none'" 
                              class="w3-button w3-large w3-display-topright">&times;</span>
                        <h2>Job Description</h2>
                    </header>
                    <div class="w3-container">
                        <br>
                        <textarea rows="15" id="job_descp" class="w3-input w3-round-large w3-border" disabled></textarea>
                        <br>
                    </div>
                    <footer class="w3-container w3-blue">
                        <p>Guardian FM</p>
                    </footer>
                </div>
            </div>
        </div>
    </body>


    <script>

        $(document).ready(function () {

            LoadAvailableJobData();
        })
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


        $(document).on('click', '.acceptjob', function (event) {

            var shiftid = $(this).attr("data-id");
//            alert(shiftid)
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
//            alert(shiftid)
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

        $(document).on('click', '#job_description', function (event) {
            var id = $(this).attr("data-id");
            getjobdescp(id);
            document.getElementById('id01').style.display = 'block';
        });


        function getjobdescp(id) {
            
            $.ajax({
                url: "OfficerSchedule_db.php",
                method: "POST",
                data: {id: id, mode: "Description"},
                success: function (data)
                {                   
                    document.getElementById('job_descp').value = data;
                }
            });
        }

    </script>


</html>