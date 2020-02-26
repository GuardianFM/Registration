<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>


        <div class="w3-container">
            <center>
                <br>
                <br>
                <input type="text" id="txtsearch"  class="w3-input w3-animate-input " value="" placeholder="Search" style="width:135px; " />
                <br>
                <br>
                <table class="w3-table-all w3-small" id="off_tbl" border="1"  >
                    <thead >
                    <th>S No.</th>
                    <th>Master Check</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Short Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Postcode</th>
                    <th>email</th>
                    <th>SIA</th>
                    <th>SIA Expiry</th>
                    <th>Bank Name</th>
                    <th>Account Title</th>
                    <th>Account No.</th>
                    <th>Sort Code</th>
                    <th colspan="2">Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </center>
        </div>
    </body>


    <script>
        $(document).ready(function () {


            LoadData();


        });

        $(document).on('click', '#btn_save', function (event)
        {
            var id = $(this).attr("data-id");

            var firstname = $(this).closest('tr').find('#firstname').text();
            var lastname = $(this).closest('tr').find('#lastname').text();
            var shortname = $(this).closest('tr').find('#shortname').text();
            var phone = $(this).closest('tr').find('#phone').text();
            var address = $(this).closest('tr').find('#address').text();
            var city = $(this).closest('tr').find('#city').text();
            var country = $(this).closest('tr').find('#country').text();
            var postcode = $(this).closest('tr').find('#postcode').text();
            var email = $(this).closest('tr').find('#email').text();
            var sia = $(this).closest('tr').find('#sia').text();
            var siaexp = $(this).closest('tr').find('#siaexp').text();
            var bank = $(this).closest('tr').find('#bank').text();
            var acctitle = $(this).closest('tr').find('#acctitle').text();
            var acc = $(this).closest('tr').find('#acc').text();
            var sort = $(this).closest('tr').find('#sort').text();



            var col = "firstname='" + firstname + "'\n\
                          ,lastname='" + lastname + "'\n\
                          ,shortname='" + shortname + "'\n\
                           ,telephone='" + phone + "'\n\
                          ,add1='" + address + "'\n\
                         ,city='" + city + "'\n\
                         ,country='" + country + "'\n\
                         ,postcode='" + postcode + "'\n\
                        ,email='" + email + "'\n\
                        ,sia='" + sia + "'\n\
                        ,siaexp='" + siaexp + "'\n\
                        ,bankname='" + bank + "'\n\
                        ,acctitle='" + acctitle + "'\n\
                        ,account='" + acc + "'\n\
                        ,sortcode='" + sort + "'";

            $.ajax({
                url: "DuplicateOfficer_db.php",
                method: "POST",
                data: {id: id, mode: 'Update', col: col},
                success: function (data)
                {
                    alert(data);
                    LoadData();
                }
            });


        });

        $(document).on('click', '#btn_delete', function (event)
        {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "DuplicateOfficer_db.php",
                method: "POST",
                data: {id: id, mode: 'Delete', },
                success: function (data)
                {
                    alert(data);
                    LoadData();
                }
            });

        });

        $(document).on('change', '#mastercheck', function (event)
        {
            var id = $(this).attr("data-tblid");
            var EmployeeID = $(this).attr("data-id");
            if (this.checked == true) {
                var master = "checked";
            } else {
                var master = "unchecked";
            }

            alert("ID : " + id + ", EmployeeID : " + EmployeeID + ", master : " + master)
            $.ajax({
                url: "DuplicateOfficer_db.php",
                method: "POST",
                data: {id: id, mode: 'Update-Master', EmployeeID: EmployeeID, master: master},
                success: function (data)
                {
                    alert(data);
                    LoadData();
                }
            });

        });


        function LoadData() {



            $.ajax({
                url: "DuplicateOfficer_db.php",
                method: "POST",
                data: {mode: 'Fetch'},
                success: function (data)
                {
                    $('#off_tbl tbody').html(data);
                }
            });
        }

        $('#txtsearch').keyup(function () {
            search_table($(this).val());
        });
        function search_table(value) {
            $('#off_tbl tr').each(function () {
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

    </script>
</html>
