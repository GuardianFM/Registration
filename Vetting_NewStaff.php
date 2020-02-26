<!DOCTYPE html>
<html>
    <title>Screening</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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

        /*===================Toggle Switch=============================*/
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
            background-color: #ccc;
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
            background-color: #2196F3;
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

    <body>



        <div id="NewStaff" class="w3-container">
            <h1>New Staff</h1><p>Needs to be verified by controller.</p>


            <center>
                <div class="responsive">

                    <input type="text" id="txtsearch2"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px; "/>


                    <br>
                    <table border="1" class="responsive-table w3-table-all w3-centered w3-bordered">
                        <thead>
                            <tr>
                                <th>CSV Export</th>
                                <th>Show</th>                                
                                <th>Limit</th>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody>



                        <td>
                            <form method="post"  action="csv.php"  align="center" id="exportform">
                                <input type="submit"  class="w3-btn w3-white w3-border w3-border-blue w3-round-large" name="export" value="CSV Export" class="btn btn-success" id="export_csv1"/>  
                                <input type="text" name="header" value="Guardian FM" hidden/>  
                                <input type="text" name="tblname" value="tbl_employee"  hidden/>  
                                <input type="text" name="criteria" id="criteria1" value="" hidden/>  
                                <input type="text" name="limit" id="limit1" value="" hidden/>
                            </form>
                        </td>
                        <td>    
                            <select id="select_active" class="w3-input w3-border w3-round-large">
                                <option selected>Active</option>
                                <option>Inactive</option>
                            </select>
                        </td>
                        <td>
                            <select id="select_newstaff" class="w3-input w3-border w3-round-large">
                                <option >25</option>
                                <option>50</option>
                                <option>100</option>
                                <option>200</option>
                                <option>500</option>
                                <option selected>All</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" id="from" class="w3-input w3-border w3-round-large" value="<?php echo date("Y-01-01") ?>"/>
                        </td>
                        <td>
                            <input type="date" id="to" class="w3-input w3-border w3-round-large" value="<?php echo date("Y-m-t") ?>"/>
                        </td>
                        </tbody>
                    </table>







                    <br>
                    <br>
                    <br>
                    <table border='1' class="responsive-table w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered w3-bordered "   id="newstaff"> 
                        <thead class="table-header">
                            <tr class="header">
                                <th>S No.</th>
                                <th>ID</th>
                                <th>Display Name</th>
                                <th>Steps Completed</th>
                                <th>Docs Completed</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Postcode</th>
                                <th>SIA No.</th>
                                <th>Registration Date</th>
                                <th>SMS</th>

                            </tr>
                        </thead> 
                        <tbody>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="11"></td>

                            </tr>

                        </tfoot>

                    </table>

                </div>
            </center>

        </div>


        <div class="w3-container">



            <div id="id05" class="w3-modal w3-animate-opacity">
                <div class="w3-modal-content w3-card-4">
                    <header class="w3-container w3-blue"> 
                        <span onclick="document.getElementById('id05').style.display = 'none'" 
                              class="w3-button w3-large w3-display-topright">&times;</span>
                        <center>
                            <h2 style="margin:10px; color:white;">Text Message To Officer</h2>
                        </center>
                    </header>
                    <div class="w3-container">
                        <br>
                        <br>
                        <label>Message</label>
                        <textarea rows="5" id="msg_text" class="w3-input w3-border w3-round"></textarea>

                        <label>Select Template</label>

                        <select id="template" class="w3-input w3-border w3-round"> 
                            <option selected></option>
                            <?php
                            include 'dbconnection.php'; //get the contractors 
                            $sql = "SELECT * FROM template order by title";
                            $result = mysqli_query($connect, $sql);
                            $i = 0;
                            $row = mysqli_fetch_array($result);

                            mysqli_data_seek($result, 0);

                            while ($row = mysqli_fetch_array($result)) {
                                ?> 
                                <option id="<?php echo $row["description"] ?>"><?php echo ($row["title"]) ?></option>
                                <?php
                            }
                            ?> 
                            <option disabled></option>
                            <option>
                                <--Add New Template-->
                            </option>
                        </select>


                        <br>
                        <center>
                            <button class="w3-btn w3-white w3-border w3-border-blue w3-round-large" id="send_msg">Send</button>
                        </center>
                        <br>
                        <br>
                    </div>
                    <footer class="w3-container w3-blue">
                        <input type="text" id="tempid" hidden/>

                        <center>
                            <p style="margin:10px;">Guardian FM</p>
                        </center>
                    </footer>
                </div>
            </div>
        </div>
    </body>

    <script>
        $(document).ready(function () {

            CSV();
            var limit_newstaff = document.getElementById('select_newstaff').value;
            LoadData('fetch-newstaff', limit_newstaff);
        })


        $('#from').change(function () {

            CSV();
            var limit_newstaff = document.getElementById('select_newstaff').value;
            LoadData('fetch-newstaff', limit_newstaff);
        });

        $('#to').change(function () {

            CSV();
            var limit_newstaff = document.getElementById('select_newstaff').value;
            LoadData('fetch-newstaff', limit_newstaff);
        });


        function CSV() {
            var active = document.getElementById('select_active').value;
            var limit_newstaff = document.getElementById('select_newstaff').value;
            var from = document.getElementById('from').value;
            var to = document.getElementById('to').value;

            if (limit_newstaff != 'All') {
                document.getElementById('limit1').value = "LIMIT " + limit_newstaff;
                document.getElementById('criteria1').value = "WHERE Date(`regdate`)>='" + from + "' AND Date(`regdate`)<='" + to + "' AND `active`='" + active.toLowerCase() + "' AND contractor_id=1120";
            } else {
                document.getElementById('limit1').value = "";
                document.getElementById('criteria1').value = "WHERE Date(`regdate`)>='" + from + "' AND Date(`regdate`)<='" + to + "' AND `active`='" + active.toLowerCase() + "' AND contractor_id=1120";
            }
        }

        function LoadData(Status, limit) {

            var active = document.getElementById('select_active').value;
            var from = document.getElementById('from').value;
            var to = document.getElementById('to').value;

            $.ajax({
                url: "db_screening.php",
                method: "POST",
                data: {mode: "fetch", Status: Status, limit: limit, active: active, from: from, to: to},
                success: function (data)
                {
                    $('#newstaff tbody').html(data);
                }
            });
        }

        $('#select_active').change(function () {

            var limit = document.getElementById('select_newstaff').value;
            LoadData('fetch-newstaff', limit);
            CSV();
        });


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


        $('#select_newstaff').change(function () {
            var limit = this.value;
            LoadData('fetch-newstaff', limit);
            CSV();
        });

        $(document).on('click', '#SMS', function () {
            var officerID = $(this).attr("data-id");

            document.getElementById('id05').style.display = 'block';
            document.getElementById('tempid').value = officerID;
        });

        $('#send_msg').click(function () {

            var id = document.getElementById('tempid').value;
            var message = document.getElementById('msg_text').value;
            if (message == "") {
                alert("Please enter message for officer");
                document.getElementById('msg_text').focus();
                return false;
            } else {
                SMSToOfficer(id, message);
                document.getElementById('id05').style.display = 'none';
            }

            function SMSToOfficer(officerID, message) {

                $.ajax({
                    url: "Vetting_SMS.php",
                    method: "POST",
                    data: {officerID: officerID, message: message},
                    success: function (data)
                    {
                        alert(data);
                        document.getElementById('msg_text').value = "";
                    }
                });
            }
        });

        $('#template').change(function () {

            var template_val = document.getElementById('template').value;
            var template = document.getElementById('template');
            var template_id = template[template.selectedIndex].id;
            if (template_val == '<--Add New Template-->') {
                window.open('Template.php', '_blank', 'maximize=no toolbar=no,scrollbars=no,resizable=no,top=0,left=-2000,width=600,height=600')
            } else {
                document.getElementById('msg_text').value = template_id;
            }
        });
    </script>

</html>