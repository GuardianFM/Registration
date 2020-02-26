<?php
date_default_timezone_set("Europe/London");

session_start();
if (isset($_SESSION["username"])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $officername = $_GET['officername'];
    }
} else {

    header("location:index_V1.1.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Report Incident</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="vendor/jquery/select2.min.js" type="text/javascript"></script>
        <link href="css/select2.min.css" rel="stylesheet" type="text/css"/>


        <style>
            .select2-dropdown {
                top: 22px !important; left: 8px !important;
            }
        </style>
    </head>
    <body>

        <div class="w3-container">

            <table class="w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " id="report_table">
                <thead>
                    <tr>
                        <th colspan="4">
                <center>
                    <h3>Your Reported Incidents</h3>
                </center>
                </th>
                </tr>
                <tr>
                    <th>S No</th>
                    <th>Incident Date</th>
                    <th>Incident Time</th>
                    <th>Incident Description</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <br>
            <button class="w3-btn w3-white w3-border w3-border-blue w3-round-large" style="float: right;" onclick="document.getElementById('id013').style.display = 'block';">Report Incident</button>
        </div>

        <div class="w3-container">
            <div id="id013" class="w3-modal">
                <div class="w3-modal-content w3-animate-opacity w3-card-4">
                    <header class="w3-container w3-blue"> 
                        <span onclick="document.getElementById('id013').style.display = 'none'" 
                              class="w3-button w3-display-topright">&times;</span>
                        <h2 style="text-align: center;">Report Incident</h2>
                    </header>
                    <br/>
                    <div class="w3-container" >
                        <label>Incident Date</label>
                        <input type="date"  value="<?php echo date("Y-m-d"); ?>" class="w3-input w3-border" id="incident_date">

                        <label>Incident Time</label>
                        <input type="time" value="<?php echo date("H:i:s"); ?>" class="w3-input w3-border" id="incident_time">

                        <label>Incident Site</label>
                        <select class="w3-input w3-border w3-round-large" id="select_location" style="width:100%;">
                            <?php
                            include 'dbconnection.php'; //get the contractors 
                            $sql = "SELECT * FROM `tbl_locations`";
                            $result = mysqli_query($connect, $sql);
                            $i = 0;
                            $row = mysqli_fetch_array($result);


                            mysqli_data_seek($result, 0);

                            while ($row = mysqli_fetch_array($result)) {
                                ?>

                                <option id="<?php echo $row["LocationID"] ?>"><?php echo $row["Location"] ?></option>

                                <?php
                            }
                            ?> 
                        </select>
                        <script src="select2.min.js"></script>
                        <script>
                            $("#select_location").select2({
                                placeholder: "Select Location",
                                allowClear: true
                            });
                        </script>
                        <label>Incident Type</label>
                        <select class="w3-input w3-border w3-round-large" id="select_type" style="width:100%;">
                            <option>Blow-Out</option>
                            <option>Fraudulent Book-ON</option>
                            <option>Late</option>
                            <option>Unreachable</option>
                            <option>Replacement</option>
                            <option>No Bookon</option>
                            <option>No Precheck</option>
                            <option>Other</option>
                        </select>
                        <label>Incident Description</label>
                        <textarea rows="5" class="w3-input w3-border" id="incident_description"></textarea>
                        <br>
                        <button class="w3-btn w3-white w3-border w3-border-blue w3-round-large" style="float: right;" onclick="Data('Insert');">Submit Incident Report</button>
                        <br>
                        <br>
                        <br>
                    </div>

                </div>
            </div>
        </div>
    </body>

    <script>


        $(document).ready(function () {
            Data("Fetch");
        });
        function Data(mode) {

            var date = document.getElementById('incident_date').value;
            var time = document.getElementById('incident_time').value;
            var id = '<?php echo $id ?>';
            var OfficerName = '<?php echo $officername ?>';
            var description = document.getElementById('incident_description').value;
            var location = document.getElementById('select_location').value;
            var type = document.getElementById('select_type').value;

            if (mode == 'Insert') {
                if (date == 'date') {
                    document.getElementById('incident_date').focus();
                    return false
                }
                if (time == 'time') {
                    document.getElementById('incident_time').focus();
                    return false
                }
                if (description == '') {
                    document.getElementById('incident_description').focus();
                    return false
                }

                if (location == '') {
                    document.getElementById('select_location').focus();
                    return false
                }
            }

            $.ajax({
                url: "ReportIncident_db.php",
                method: "POST",
                data: {mode: mode, date: date, time: time, description: description, id: id, OfficerName: OfficerName, location: location, type: type},
                success: function (data)
                {
                    if (mode == "Fetch") {
                        $('#report_table tbody').html(data);
                    } else if (mode == "Insert") {
                        alert(data);
                        document.getElementById('incident_description').value = "";
                        Data("Fetch");
                    }
                }
            });
        }




    </script>
</html>
