<!DOCTYPE html>
<html>
    <head>
        <title>Jobs Accepted</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://www.w3schools.com/lib/w3.js"></script>

    </head>
    <body>
        <div class="w3-container">

            <div class="w3-responsive">
                <br>
                <br>
                <table class="w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered "   id="shift_tbl"> 
                    <thead>
                        <tr >
                            <th>S No.</th>
                            <th>Shift Id</th>
                            <th>Location</th>
                            <th>Duty Start</th>
                            <th>Duty Finish</th>
                            <th>Officer Name</th>
                            <th>Phone</th>
                            <th >Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <tr >
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Approved</th>
                            <th>Disapprove</th>
                        </tr>

                    </thead> 
                    <tbody>

                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="10"></td>

                        </tr>

                    </tfoot>

                </table>
            </div>
        </div>
    </body>
    <script>

        $(document).ready(function () {


            LoadJobData();

        });

        function LoadJobData() {

            $.ajax({
                url: "OfficerSchedule_db.php",
                method: "POST",
                data: {mode: 'Fetch-Job'},
                success: function (data)
                {
//                    alert(data);
                    $('#shift_tbl tbody').html(data);
                }
            });
        }

        $(document).on('click', '.approvejob', function (event) {
            var id = $(this).attr("data-id");
            var jobstatus = "Approve";

            $.ajax({
                url: "OfficerSchedule_db.php",
                method: "POST",
                data: {mode: 'UpdateAvailableJobAdmin', jobstatus: jobstatus, id: id},
                success: function (data)
                {
                    alert(data);
                    LoadJobData();
                }
            });

        });

        $(document).on('click', '.disapprovejob', function (event) {
            var id = $(this).attr("data-id");
            var jobstatus = "Disapprove";

            $.ajax({
                url: "OfficerSchedule_db.php",
                method: "POST",
                data: {mode: 'UpdateAvailableJobAdmin', jobstatus: jobstatus, id: id},
                success: function (data)
                {
                    alert(data);
                    LoadJobData();
                }
            });
        });
    </script>

</html>