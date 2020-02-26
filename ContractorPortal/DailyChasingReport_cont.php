<?php
session_start();
if (isset($_SESSION["username3"])) {
    
} else {

    header("location:logindb_cont.php");
}
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


        <style>


            #myProgress {
                width: 100%;
                background-color: #ddd;
            }

            #myBar {
                width: 10%;
                height: 30px;
                background-color: #4CAF50;
                text-align: center;
                line-height: 30px;
                color: white;
            }

            /*-----------------------------------------Responsive Table-------------------------------------------------------*/
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

    </head>

    <body>
        <br>
        <br>
        <br>
        <br>

        <div class="container">

            <center>
                <input type="date" class="w3-input w3-border w3-round" id="from" value="<?php echo date("Y-m-d") ?>" onchange=" LoadData('fetch');" style="width: 20%;" />
            </center>
            <br>
            <br>
            <br>
            <br>
            <div id="myProgress">
                <div id="myBar"></div>
            </div>
            <table class="responsive-table w3-table-all w3-card-4 w3-striped w3-small w3-centered w3-bordered "   id="report_table"> 
                <thead>
                    <tr>
                        <th colspan="6"><h3>Daily Chasing Report</h3></th>
                    </tr>
                    <tr class="table-header">
                        <th>S No.</th>
                        <th>Date</th>
                        <th id="_2">Total Shifts</th>
                        <th id="_3">Total Pre Checks</th>
                        <th id="_4">Total Book On</th>
                        <th id="_5">Total Late</th>
                    </tr>
                </thead> 
                <tbody>

                </tbody>

            </table>
            <br>
            <p><b>Note:</b> To check the details of the shifts please click on the numbers</p>
            <div class="w3-container">



                <div id="id01" class="w3-modal w3-animate-opacity">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue"> 
                            <span onclick="document.getElementById('id01').style.display = 'none'" 
                                  class="w3-button w3-large w3-display-topright">&times;</span>
                            <center>
                                <h2 style="margin:10px; color:white;">Total Shift Details</h2>
                            </center>
                        </header>
                        <div class="container">
                            <br>
                            <br>
                            <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered" id="totalshift_tbl">
                                <thead>
                                    <tr>
                                        <th colspan="7"><h3>Total Shift Details</h3></th>
                                    </tr>
                                    <tr class="table-header">
                                        <th>S No.</th>
                                        <th>Customer</th>
                                        <th>Location</th>
                                        <th>Duty Start</th>
                                        <th>Duty Finish</th>
                                        <th>Officer</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <br>
                        </div>
                        <footer class="w3-container w3-blue">
                            <center>
                                <p style="margin:10px;">Guardian FM</p>
                            </center>
                        </footer>
                    </div>
                </div>
            </div>

            <div class="w3-container">



                <div id="id02" class="w3-modal w3-animate-opacity">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue"> 
                            <span onclick="document.getElementById('id02').style.display = 'none'" 
                                  class="w3-button w3-large w3-display-topright">&times;</span>
                            <center>
                                <h2 style="margin:10px; color:white;">Total Pre Check Details</h2>
                            </center>
                        </header>
                        <div class="container">
                            <br>
                            <br>
                            <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered" id="totalprecheck_tbl">
                                <thead>
                                    <tr>
                                        <th colspan="8"><h3>Total Pre Check Details</h3></th>
                                    </tr>
                                    <tr class="table-header">
                                        <th>S No.</th>
                                        <th>Customer</th>
                                        <th>Location</th>
                                        <th>Duty Start</th>
                                        <th>Duty Finish</th>
                                        <th>Officer</th>

                                        <th>Pre Check Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <br>
                        </div>
                        <footer class="w3-container w3-blue">
                            <center>
                                <p style="margin:10px;">Guardian FM</p>
                            </center>
                        </footer>
                    </div>
                </div>
            </div>
            <div class="w3-container">



                <div id="id03" class="w3-modal w3-animate-opacity">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue"> 
                            <span onclick="document.getElementById('id03').style.display = 'none'" 
                                  class="w3-button w3-large w3-display-topright">&times;</span>
                            <center>
                                <h2 style="margin:10px; color:white;">Total Book On Details</h2>
                            </center>
                        </header>
                        <div class="container">
                            <br>
                            <br>
                            <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered" id="totalbookon_tbl">
                                <thead>
                                    <tr>
                                        <th colspan="8">
                                            <h3>Total Book On Details</h3>
                                        </th>
                                    </tr>
                                    <tr class="table-header">
                                        <th>S No.</th>
                                        <th>Customer</th>
                                        <th>Location</th>
                                        <th>Duty Start</th>
                                        <th>Duty Finish</th>
                                        <th>Officer</th>

                                        <th>Book On Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <br>
                        </div>
                        <footer class="w3-container w3-blue">
                            <center>
                                <p style="margin:10px;">Guardian FM</p>
                            </center>
                        </footer>
                    </div>
                </div>
            </div>
            <div class="w3-container">



                <div id="id04" class="w3-modal w3-animate-opacity">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue"> 
                            <span onclick="document.getElementById('id04').style.display = 'none'" 
                                  class="w3-button w3-large w3-display-topright">&times;</span>
                            <center>
                                <h2 style="margin:10px; color:white;">Total Late Details</h2>
                            </center>
                        </header>
                        <div class="container">
                            <br>
                            <br>
                            <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered" id="totallate_tbl">
                                <thead>
                                    <tr>
                                        <th colspan="8">
                                            <h3>Total Late Details</h3>
                                        </th>
                                    </tr>
                                    <tr class="table-header">
                                        <th>S No.</th>
                                        <th>Customer</th>
                                        <th>Location</th>
                                        <th>Duty Start</th>
                                        <th>Duty Finish</th>
                                        <th>Officer</th>

                                        <th>Late In Minutes</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <br>
                        </div>
                        <footer class="w3-container w3-blue">
                            <center>
                                <p style="margin:10px;">Guardian FM</p>
                            </center>
                        </footer>
                    </div>
                </div>
            </div>
        </div>



        <script>
            $(document).ready(function () {


                $(document).ajaxStart(function () {
                    $("#myProgress").css("display", "block");
                    move();
                });
                $(document).ajaxComplete(function () {
                    $("#myProgress").css("display", "none");
                });
                function move() {
                    var elem = document.getElementById("myBar");
                    var width = 10;
                    var id = setInterval(frame, 10);
                    function frame() {
                        if (width >= 100) {
                            clearInterval(id);
                        } else {
                            width++;
                            elem.style.width = width + '%';
                            elem.innerHTML = width * 1 + '%';
                        }
                    }
                }

                LoadData('fetch');
            });

            function LoadData(mode) {

                var from = document.getElementById('from').value;

                $.ajax({
                    url: "DailyChasingReport_db_cont.php",
                    method: "POST",
                    data: {mode: mode, from: from, Contractor_id: '<?PHP echo $_GET['id']; ?>'},
                    success: function (data)
                    {

                        $('#report_table tbody').html(data);

                    }
                });
            }

            $(document).on('click', '.totalshifts', function () {
                LoadTotalShift();
                document.getElementById('id01').style.display = 'block';
            });

            $(document).on('click', '.totalprecheck', function () {
                LoadTotalPrecheck();
                document.getElementById('id02').style.display = 'block';
            });

            $(document).on('click', '.totalbookon', function () {
                LoadTotalbookon();
                document.getElementById('id03').style.display = 'block';
            });

            $(document).on('click', '.totallate', function () {
                LoadTotalLate();
                document.getElementById('id04').style.display = 'block';
            });









            function LoadTotalShift() {
                var from = document.getElementById('from').value;

                $.ajax({
                    url: "DailyChasingReport_db_cont.php",
                    method: "POST",
                    data: {mode: 'TotalShifts', from: from, Contractor_id: '<?PHP echo $_GET['id']; ?>'},
                    success: function (data)
                    {

                        $('#totalshift_tbl tbody').html(data);

                    }
                });
            }

            function  LoadTotalPrecheck() {

                var from = document.getElementById('from').value;

                $.ajax({
                    url: "DailyChasingReport_db_cont.php",
                    method: "POST",
                    data: {mode: 'TotalPreCheck', from: from, Contractor_id: '<?PHP echo $_GET['id']; ?>'},
                    success: function (data)
                    {
                        $('#totalprecheck_tbl tbody').html(data);
                    }
                });
            }

            function  LoadTotalbookon() {
                var from = document.getElementById('from').value;

                $.ajax({
                    url: "DailyChasingReport_db_cont.php",
                    method: "POST",
                    data: {mode: 'TotalBookOn', from: from, Contractor_id: '<?PHP echo $_GET['id']; ?>'},
                    success: function (data)
                    {

                        $('#totalbookon_tbl tbody').html(data);

                    }
                });
            }

            function  LoadTotalLate() {

                var from = document.getElementById('from').value;
                $.ajax({
                    url: "DailyChasingReport_db_cont.php",
                    method: "POST",
                    data: {mode: 'TotalLate', from: from, Contractor_id: '<?PHP echo $_GET['id']; ?>'},
                    success: function (data)
                    {

                        $('#totallate_tbl tbody').html(data);

                    }
                });
            }


        </script>
    </body>
</html>