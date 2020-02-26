<!DOCTYPE html>
<html>
    <title>Controllers Target</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <body>
        <br>
        <br>
        <div class="container">
            <table class="table"  id="OfficerStrength_tbl"> 
                <tbody>
                </tbody>
            </table>
        </div>

            

    </body>

    <script>

        $(document).ready(function () {

            LoadData('Fetch');
        })
        function LoadData() {

            $.ajax({
                url: "ControllerTargets_db.php",
                method: "POST",
                data: {mode: "Fetch"},
                success: function (data)
                {
                    $('#OfficerStrength_tbl tbody').html(data);
                }
            });
        }
    </script>
</html>
