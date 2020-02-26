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
        <div id="Schedules" class="w3-container" >


            <center>
                <div class="container">
                    <table class="responsive-table w3-table-all w3-card w3-hoverable w3-centered w3-small" id="off_Sch_tbl"  style="margin-top: 80px;">
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

    </body>


    <script>

        $(document).ready(function () {
            LoadData();
        })
        function LoadData() {

            var id = '<?php echo $_GET['id']; ?>';
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
    </script>


</html>