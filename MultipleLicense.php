<?PHP
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}
?>

<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            .error{
                border: 2px solid red;
            }
        </style>

    </head>
    <body>

        <div class="container">

            <table class="table table-bordered" >
                <tr>
                    <td><select  id="typeofofficer1" class="form-control">

                            <?php
                            include 'dbconnection.php'; //get the contractors 
                            $sql = "SELECT * FROM typeofofficer ORDER BY type";
                            $result = mysqli_query($connect, $sql);
                            $i = 0;
                            $row = mysqli_fetch_array($result);
                            $contractor_id = 0;

                            mysqli_data_seek($result, 0);

                            while ($row = mysqli_fetch_array($result)) {
                                ?>

                                <option><?php echo $row["type"] ?></option>

                                <?php
                            }
                            ?> 
                        </select></td>
                    <td><input type="text" id="license1" class="form-control" onkeypress='return restrictAlphabets(event)' maxlength="16" minlength="16"/></td>
                    <td><input type="date" id="expiry1" class="form-control"/></td>
                </tr>
                <tr id="row2" style="display: none;">
                    <td> <select  id="typeofofficer2" class="form-control">
                            <?php
                            include 'dbconnection.php'; //get the contractors 
                            $sql = "SELECT * FROM typeofofficer ORDER BY type";
                            $result = mysqli_query($connect, $sql);
                            $i = 0;
                            $row = mysqli_fetch_array($result);
                            $contractor_id = 0;

                            mysqli_data_seek($result, 0);

                            while ($row = mysqli_fetch_array($result)) {
                                ?>

                                <option><?php echo $row["type"] ?></option>

                                <?php
                            }
                            ?> 
                        </select></td>
                    <td><input type="text" id="license2" class="form-control" onkeypress='return restrictAlphabets(event)' maxlength="16" minlength="16"/></td>
                    <td><input type="date" id="expiry2" class="form-control"/></td>
                </tr>
                <tr id="row3" style="display: none;">
                    <td><select  id="typeofofficer3" class="form-control">
                            <?php
                            include 'dbconnection.php'; //get the contractors 
                            $sql = "SELECT * FROM typeofofficer ORDER BY type";
                            $result = mysqli_query($connect, $sql);
                            $i = 0;
                            $row = mysqli_fetch_array($result);
                            $contractor_id = 0;

                            mysqli_data_seek($result, 0);
//
                            while ($row = mysqli_fetch_array($result)) {
                                ?>

                                <option><?php echo $row["type"] ?></option>

                                <?php
                            }
                            ?> 
                        </select></td>
                    <td> <input type="text" id="license3" class="form-control" onkeypress='return restrictAlphabets(event)' maxlength="16" minlength="16"/></td>
                    <td><input type="date" id="expiry3" class="form-control"/></td>
                </tr>
                <tr>
                    <td colspan="3">
                <center>
                    <button class="btn btn-info" id="btn_show"><span style="font-weight: bold;"> + </span></button> &nbsp; <button class="btn btn-success" id="btn_submit" onclick="Insert('Insert/Update');">Submit</button>
                </center>
                </td>
                </tr>


            </table>

        </div>
    </body>
    <script type='text/javascript'>
        $(document).ready(function () {
            setTimeout(function () {
                LicenseValidation();
            }, 1000);

            Fetch('Fetch');
        });

        $('#btn_show').click(function () {
            if (document.getElementById('row2').style.display == 'none') {
                document.getElementById('row2').style.display = 'table-row';
            } else if (document.getElementById('row3').style.display == 'none') {
                document.getElementById('row3').style.display = 'table-row';
            }
        });

        function Insert(mode) {

            var OID = '<?php echo $id; ?>';
            var typeofofficer1 = document.getElementById('typeofofficer1').value;
            var typeofofficer2 = document.getElementById('typeofofficer2').value;
            var typeofofficer3 = document.getElementById('typeofofficer3').value;

            var license1 = document.getElementById('license1').value;
            var license2 = document.getElementById('license2').value;
            var license3 = document.getElementById('license3').value;

            var expiry1 = document.getElementById('expiry1').value;
            var expiry2 = document.getElementById('expiry2').value;
            var expiry3 = document.getElementById('expiry3').value;


            if ((license1 == '' || expiry1 == '') && (typeofofficer1 != 'Cleaners' && typeofofficer1 != 'Construction Operative Security')) {
                if (license1 == '') {
                    $('#license1').addClass('error');
                } else {
                    $('#license1').removeClass('error');
                }
                if (expiry1 == '') {
                    $('#expiry1').addClass('error');
                } else {
                    $('#expiry1').removeClass('error');
                }
                return false;
            } else {
                $('#license1').removeClass('error');
                $('#expiry1').removeClass('error');
            }


            if ((license2 == '' || expiry2 == '') && (typeofofficer2 != 'Cleaners' && typeofofficer2 != 'Construction Operative Security')) {
                if (license2 == '') {
                    $('#license2').addClass('error');
                } else {
                    $('#license2').removeClass('error');
                }
                if (expiry2 == '') {
                    $('#expiry2').addClass('error');
                } else {
                    $('#expiry2').removeClass('error');
                }
                return false;
            } else {
                $('#license2').removeClass('error');
                $('#expiry2').removeClass('error');
            }


            if ((license3 == '' || expiry3 == '') && (typeofofficer3 != 'Cleaners' && typeofofficer3 != 'Construction Operative Security')) {
                if (license3 == '') {
                    $('#license3').addClass('error');
                } else {
                    $('#license3').removeClass('error');
                }
                if (expiry3 == '') {
                    $('#expiry3').addClass('error');
                } else {
                    $('#expiry3').removeClass('error');
                }
                return false;
            } else {
                $('#license3').removeClass('error');
                $('#expiry3').removeClass('error');
            }


            $.ajax({
                url: "MultipleLicense_db.php",
                type: "POST",
                dataType: "text",
                data: {mode: mode, OID: OID, typeofofficer1: typeofofficer1, expiry1: expiry1, typeofofficer2: typeofofficer2, expiry2: expiry2, typeofofficer3: typeofofficer3, expiry3: expiry3, license1: license1, license2: license2, license3: license3},
                success: function (data)
                {
                    alert(data);
                }

            });

        }

        function Fetch(mode) {

            var OID = '<?php echo $id; ?>';

            $.ajax({
                url: "MultipleLicense_db.php",
                type: "POST",
                dataType: "JSON",
                data: {mode: mode, OID: OID},
                success: function (data)
                {
                    document.getElementById('typeofofficer1').value = data["type1"];
                    document.getElementById('typeofofficer2').value = data["type2"];
                    document.getElementById('typeofofficer3').value = data["type3"];

                    document.getElementById('license1').value = data["license1"];
                    document.getElementById('license2').value = data["license2"];
                    document.getElementById('license3').value = data["license3"];

                    document.getElementById('expiry1').value = data["expiry1"];
                    document.getElementById('expiry2').value = data["expiry2"];
                    document.getElementById('expiry3').value = data["expiry3"];
                }

            });
        }

        $('#typeofofficer1').change(function () {
            LicenseValidation();
        })
        $('#typeofofficer2').change(function () {
            LicenseValidation();
        })
        $('#typeofofficer3').change(function () {
            LicenseValidation();
        })


        function LicenseValidation() {

            var typeofofficer1 = document.getElementById('typeofofficer1').value;
            var typeofofficer2 = document.getElementById('typeofofficer2').value;
            var typeofofficer3 = document.getElementById('typeofofficer3').value;


            if (typeofofficer1 == 'Cleaners' || typeofofficer1 == 'Construction Operative Security') {
                document.getElementById('license1').disabled = true;
                document.getElementById('expiry1').disabled = true;
                document.getElementById('license1').value = '';
                document.getElementById('expiry1').value = '0000-00-00';
            } else {
                document.getElementById('license1').disabled = false;
                document.getElementById('expiry1').disabled = false;
            }

            if (typeofofficer2 == 'Cleaners' || typeofofficer2 == 'Construction Operative Security') {
                document.getElementById('license2').disabled = true;
                document.getElementById('expiry2').disabled = true;
                document.getElementById('license2').value = '';
                document.getElementById('expiry2').value = '0000-00-00';
            } else {
                document.getElementById('license2').disabled = false;
                document.getElementById('expiry2').disabled = false;
            }

            if (typeofofficer3 == 'Cleaners' || typeofofficer3 == 'Construction Operative Security') {
                document.getElementById('license3').disabled = true;
                document.getElementById('expiry3').disabled = true;
                document.getElementById('license3').value = '';
                document.getElementById('expiry3').value = '0000-00-00';
            } else {
                document.getElementById('license3').disabled = false;
                document.getElementById('expiry3').disabled = false;
            }
        }


        function restrictAlphabets(e) {
            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57) || x == 8 ||
                    (x >= 35 && x <= 40) || x == 46)
                return true;
            else
                return false;
        }
    </script>
</html>