<?php
session_start();
if (isset($_SESSION["username3"])) {
    $id = $_GET["id"];
} else {
    header("location:logindb_cont.php");
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    </head>

    <body>
        <br>
        <br>
        <br>
        <br>

        <div class="container">

            <table class="responsive-table w3-table-all w3-card-4 w3-striped w3-small w3-centered w3-bordered">
                <thead>
                    <tr class="table-header">
                        <th>From</th>
                        <th>To</th>
                        <th>Incident</th>
                    </tr>
                </thead>
                <tbody class="table-row">

                    <tr>

                        <td class="col col-1" data-label="From"><input type="date" id="from" class="w3-input w3-border w3-round" value="<?php echo date("Y-m-d", strtotime('first day of this month')) ?>" onchange="LoadData('Detailed');"></td>

                        <td class="col col-2" data-label="To"><input type="date" id="to" class="w3-input w3-border w3-round" value="<?php echo date("Y-m-d", strtotime('last day of this month')) ?>" onchange="LoadData('Detailed');"></td>



                        <td class="col col-4" data-label="Incident">
                            <select class="w3-input w3-border w3-round" id="select_report" onchange="LoadData('Detailed');">
                                <option selected>All</option>
                                <option>Blow-Out</option>
                                <option>Fraudulent Book-ON</option>
                                <option>Late</option>
                                <option>Unreachable</option>
                                <option>Replacement</option>
                                <option>No Bookon</option>
                                <option>No Precheck</option>
                                <option>Other</option>
                            </select>
                        </td>
                    </tr>
                </tbody> 
            </table>

        </div>

        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered"   id="report_table"> 
                <thead>

                    <tr>
                        <th colspan="8">
                            <h3>Reported Incidents</h3>
                        </th>
                    </tr>

                    <tr class="table-header">
                        <th>S No.</th>
                        <th>Date</th>
                        <th id="_1">Officer Name</th>
                        <th id="_2">Customer</th>
                        <th id="_3">Location</th>
                        <th id="_4">Duty Start</th>
                        <th id="_5">Incident</th>
                        <th id="_6">Description</th>
                    </tr>
                </thead> 
                <tbody>

                </tbody>

            </table>

        </div>

    </body>  
    <script>


        $(document).ready(function () {
            LoadData("Detailed");
           
        });

        function LoadData(mode) {
            var from = document.getElementById('from').value;
            var to = document.getElementById('to').value;

            var incident = document.getElementById('select_report').value;

            $.ajax({
                url: "IncidentReport_db_cont.php",
                method: "POST",
                data: {mode: mode, from: from, to: to, contractor_id: '<?PHP echo $_GET['id']; ?>', incident: incident},
                success: function (data)
                {
                    $('#report_table tbody').html(data);
                }
            });
        }














    </script>

</html>