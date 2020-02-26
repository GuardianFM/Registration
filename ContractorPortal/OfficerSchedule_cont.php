<?php
session_start();
if (isset($_SESSION["username3"])) {
    $id = $_GET["id"];
} else {
    header("location:logindb_cont.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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


            /*===============Toggle Switch==================================*/

            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input { 
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #2196F3;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: red;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>

    </head>
    <body> 
        <div class="container">
            <center>
                <br>
                <br>
                <br>
                <br>
                <table>
                    <tr>
                        <td>Schedule</td>
                        <td><label class="switch">
                                <input type="checkbox" id="mode_checked">
                                <span class="slider round"></span>
                            </label></td>
                        <td>Pending</td>

                    </tr>
                </table>
                <br>
                <br>
                <input type="text" id="txtsearch"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px; " />
                <br>
                <br>
                <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered" id="t02">
                    <thead>
                        <tr>
                            <th colspan="6"><h3>Schedules</h3></th>
                        </tr>
                        <tr class="table-header">
                            <th class="col col-1">S No.</th>
                            <th class="col col-2">Location</th>
                            <th class="col col-3">Post</th>
                            <th class="col col-4">Employee</th>
                            <th class="col col-1" style="display:none;">Contact</th>
                            <th class="col col-2">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </center>
        </div>
    </body>

    <script>
        $(document).ready(function () {
            LoadSchedule('Confirmed');
        });

        $('#mode_checked').change(function () {
            if (this.checked == true)
            {
                LoadSchedule('Pending');
            } else {
                LoadSchedule('Confirmed');
            }
        });

        function LoadSchedule(Status) {

            $.ajax({
                url: "GetOfficersScheduleStatus_cont.php",
                method: "POST",
                data: {type: "f", contractor_id: '<?PHP echo $id; ?>', Status: Status, mode: "Fetch"},
                success: function (data)
                {
                    $('#t02 tbody').html(data);
                }
            });

        }

        $('#txtsearch').keyup(function () {
            search_table($(this).val());
        });
        function search_table(value) {
            $('#t02 tr').each(function () {
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

        $(document).on('blur', '#remarks', function (event)
        {

            var id = $(this).attr('data-id');
            var remarks = $(this).closest('tr').find('#remarks').text();
//            alert(id)


            $.ajax({
                url: "GetOfficersScheduleStatus_cont.php",
                method: "POST",
                data: {id: id, mode: 'Update', remarks: remarks},
                success: function (data)
                {
//                    alert(data);
                }
            });
        });
    </script>
</html>


