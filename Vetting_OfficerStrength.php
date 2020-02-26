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





        <div id="OfficerStrength" class="w3-container">
            <h1>Officer's Strength</h1>
            <center>
                <div class="responsive"   >

                    <input type="text" id="txtsearch"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px; " />
                    <br>
                    <br>
                    <select id="select_officerstrength" class="w3-input w3-border w3-round-large" style="width: 80px;">
                        <option >25</option>
                        <option>50</option>
                        <option>100</option>
                        <option>200</option>
                        <option>500</option>
                        <option selected>All</option>
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

    </body>

    <script>
        $(document).ready(function () {

            LoadData('fetch-officerstrength', 'All');
        })

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


        function LoadData(Status, limit) {


            $.ajax({
                url: "db_screening.php",
                method: "POST",
                data: {mode: "fetch", Status: Status, limit: limit},
                success: function (data)
                {
                    $('#OfficerStrength_tbl tbody').html(data);
                }
            });
        }

        $('#select_officerstrength').change(function () {
            var limit = this.value;
            LoadData('fetch-officerstrength', limit);
        });

    </script>