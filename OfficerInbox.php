<!DOCTYPE html>
<html>
    <title></title>
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  

    <style>
        table {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;

        }

        .circle {
            height: 200px;
            width: 200px;
            background-color:white;
            border-radius: 100%;
            border-style: solid;
            border-color: red;
            float:right;
        }
        #span_{ 
            line-height:200px; 

        }
        div.b{
            vertical-align:middle; 
            display:inline-block; 

        }


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
        <div class="container">

            <br>
            <br>

            <table class="responsive-table w3-table-all w3-hoverable w3-striped w3-medium w3-centered w3-bordered "   id="tbl_inbox" style="background-color: red; border-style:   double;">
                <thead>
                    <tr class="table-header">
                        <th class="col col-1">S No.</th>
                        <th class="col col-2">Contact</th>
                        <th class="col col-3">Message</th>
                        <th class="col col-4">Status</th>
                        <th class="col col-1">Time</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </body>
    <script>
        $(document).ready(function () {
            LoadInbox();
        });


        function LoadInbox() {
            var id = '<?php echo $_GET['id']; ?>';//'12764';

            $.ajax({
                url: "OfficerInbox_db.php",
                method: "POST",
                data: {id: id},
                success: function (data)
                {
                    $('#tbl_inbox tbody').html(data);
                }
            });
        }

    </script>
</html>
