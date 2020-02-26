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
            /*background-color: #95A5A6;*/
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





        <div id="OfficerStrength" class="w3-container">

            <center>
                <br>
                <br>
                <div class="responsive">

                    <input type="text" id="txtsearch"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px;"/>
                    <br>
                    <br>

                    <table class="responsive-table">
                        <thead class="table-header">
                            <tr>
                                <th> <label>From</label></th>
                                <th><label>To</label></th>
                            </tr>
                        </thead>
                        <tr class="table-row" style="text-align:center;">
                            <td class="col col-1" data-label="From ">
                                <input type="date" id="from" class="w3-input w3-border w3-round" value="<?php echo date("Y-01-01"); ?>" onchange="LoadData();">
                            </td>
                            <td class="col col-1" data-label="To ">
                                <input type="date" id="to" class="w3-input w3-border w3-round" value="<?php echo date("Y-m-d"); ?>" onchange="LoadData();">
                            </td>
                        </tr>

                    </table>
                    <br>
                    <br>
                    <table class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-bordered "  id="site_tbl"> 
                        <thead>
                            <tr>
                                <th colspan="4"><h2>Sites Covered</h2></th>
                            </tr>
                            <tr class="header table-header">
                                <th>S No.</th>
                                <th>Site Name</th>
                                <th>Total Hours Covered</th>

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

    </body>

    <script>
        $(document).ready(function () {

            LoadData();
        })

        $('#txtsearch').keyup(function () {
            search_table($(this).val());
        });
        function search_table(value) {
            $('#site_tbl tr').each(function () {
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


        function LoadData() {
            var from = document.getElementById('from').value;
            var to = document.getElementById('to').value;

            var id = '<?PHP echo $id; ?>';

            $.ajax({
                url: "SiteCovered_db_cont.php",
                method: "POST",
                data: {mode: "fetch", from: from, to: to, id: id},
                success: function (data)
                {
                    $('#site_tbl tbody').html(data);
                }
            });
        }



    </script>