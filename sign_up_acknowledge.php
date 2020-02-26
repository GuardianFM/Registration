 <?php
session_start();
include('dbconnection.php');
if (isset($_GET['message'])) {
    $msg = isset($_GET['message']);
} else {
    $msg = '';
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Guardian FM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="https://cdn.crunchify.com/favicon.ico" />
        <title>Employee Entry Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/choosen.js"></script>

        <link rel="icon" type="image/x-icon" href="https://cdn.crunchify.com/favicon.ico" />
        <title>Employee Entry Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/choosen.js"></script>
        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">-->
        <!--<link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">-->
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link type='text/css' rel='stylesheet' href='assets/css/authenticationPage.css'>
        <style>
            .text-danger{
                color:red;
            }

        </style>
        <!--===============================================================================================-->
    </head>
    <body style="background-color: white; ">


        <div id="side-image" ng-class="$ctrl.fetchingReferralData ? '' : $ctrl.wasReferred() ? 'side-image--referral' : 'side-image--regular'" class="side-image--regular image-fader"></div>




        <div class="col-lg-push-4 col-lg-9">

            <div class="col-md-push-2 col-md-8 col-md-pull-2 col-xl-push-3 col-xl-6 col-xl-pull-3" style="padding-top:5%; ">

                <div class="h_iframe">

                    <div class="m-t-5 " style="text-align: center;">
                        <span  class="ng-scope"><a href= "agreement.php" style="text-decoration:none">
                                <h3 style="text-transform: capitalize; " >Guardian<span style="font-size:20px; font-weight: bold; color: #C03A1C;">FM</span>
                                </h3><img hidden="" class="logo-img" src="assets/images/logo.png" alt="logo"></a></span> 


                        <div class="m-t-2" >
                            <h2 class="m-b-2 ng-scope st-hover">Security Jobs without borders</h2> 
                        </div>
                        <p>Already member? <a href="index_V1.1.php" class="">Login Here.</a></p>

                    </div>

                    <div class="splash-container" >
                        <form  method="post" autocomplete="off" name="myForm" onsubmit="return validateForm()">

                            <div class="text-xs-center">


                                <div class="card">




                                    <div class="form-group">
                                        <br>
                                        <br>
                                        <br><br>

                                        <p ><?php echo $_GET['message'] ?></p>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    </div>

                                </div>




                                <div class="form-group row pt-0" >
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <p>or continue with <a href="https://www.google.com">Google</a> or<a href="https://www.https://www.facebook.com/">Facebook</a> </p>
                                        <!--<button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>-->
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <!--<button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>-->
                                    </div>
                                </div>

                                <input hidden="" type="checkbox" name="active" id="active" checked=""   />
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>




        <script>

            $(document).on('change', '#terms', function ()
            {

                var val = document.getElementById('terms').value;
                if (val == 'Weekly') {
                    document.getElementById('credit').value = 14;
                } else {
                    document.getElementById('credit').value = 30;
                }




            })


            function validateForm() {
                var x = document.forms["myForm"]["password"].value;
                var y = document.forms["myForm"]["cnfpassword"].value;
                if (x != y) {
                    alert("Passwords does not match");
                    document.forms["myForm"]["password"].focus();
                    return false;
                }
            }

            $(document).ready(function () {


                $("#firstname").focusout(function () {
                    var txt = this.value;

                    this.value = txt.toUpperCase();
                });
                //
                $("#lastname").focusout(function () {
                    var txt = this.value;

                    this.value = txt.toUpperCase();
                });
                $("#email").focusout(function () {
                    var txt = this.value;

                    this.value = txt.toLowerCase();
                });

                $("#lastname , #firstname").blur(function () {
                    var txt = $("#firstname").val() + ' ' + $("#lastname").val();

                    $("#shortname").val(txt)
                });
                //document.getElementById('contractor').value=<?php // echo $contractor                                                                   ?>


                $(document).on('change', '#contractor', function ()
                {
                    //   alert("sdsds");
                    var contractor = document.getElementById('contractor');
                    var contractor_id = contractor[contractor.selectedIndex].id;
                    document.getElementById('contractor_id').value = contractor_id;
                })
            });
            function req($key, $default = '')
            {
                return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
            }
            function passdata() {
                var passvalue = "123";
                $.ajax({
                    url: 'login_success.php',
                    type: 'POST',
                    data: {passval: passvalue}, //Pass your varibale in data
                    success: function (getreturn) {
                        alert(getreturn); //you get return value in this varibale, us it anywhere
                    }
                });
                passdata();
            }


        </script> 

        <script>
            $('#select_employee').change(function ()
            {

                var emp_name = document.getElementById('select_employee');

                var id = emp_name[emp_name.selectedIndex].id;
                var column = "EmployeeID";
                var table = `tbl_employee`;
                $.ajax({
                    url: 'db_GetAdministrationData.php',
                    type: 'POST',
                    dataType: "json",
                    data: {id: id, column: column, table: table}, //Pass your varibale in data
                    success: function (data) {




                        document.getElementById('EmployeeID').value = data["EmployeeID"];

                        document.getElementById('shortname').value = data["shortname"];
                        document.getElementById('firstname').value = data["firstname"];
                        document.getElementById('contractor').value = data["contractor"];
                        document.getElementById('contractor_id').value = data["contractor_id"];

                        document.getElementById('lastname').value = data["lastname"];
                        document.getElementById('telephone').value = data["telephone"];

                        document.getElementById('add1').value = data["add1"];
                        document.getElementById('add2').value = data["add2"];

                        document.getElementById('Region').value = data["region"];
                        document.getElementById('country').value = data["country"];


                        document.getElementById('postcode').value = data["postcode"];
                        document.getElementById('reference').value = data["reference"];
                        document.getElementById('email').value = data["email"];
                        document.getElementById('credit').value = parseInt(data["credit"]);
                        document.getElementById('sortcode').value = data["sortcode"];
                        document.getElementById('account').value = data["account"];
                        document.getElementById('sia').value = data["sia"];
                        document.getElementById('siaexp').value = data["siaexp"];
                        document.getElementById('terms').value = data["terms"];
                        document.getElementById('latitude').value = data["emp_latitude"];
                        document.getElementById('longitude').value = data["emp_longitude"];

                        if (data["active"] == 'active') {
                            var active = true;
                        } else {
                            var active = false;
                        }
                        document.getElementById('active').checked = active;
                    }
                });
            });


        </script>

        <script>

            function PostCodeCheck() {
                var postcode = document.getElementById('postcode').value;


                $.ajax({
                    url: "https://api.postcodes.io/postcodes/" + postcode,
                    type: "GET",
                    dataType: "json",
                    success: function (data)
                    {

                        document.getElementById('postcode').value = data['result']['postcode'];
                        document.getElementById('country').value = data['result']['country'];
                        document.getElementById('add1').value = data['result']['admin_ward'] + ' ' + data['result']['parliamentary_constituency']
                        document.getElementById('add2').value = data['result']['region'] + ' ' + data['result']['country'];
                        document.getElementById('Region').value = data['result']['parliamentary_constituency'];
                        document.getElementById('latitude').value = data["result"]['latitude'];
                        document.getElementById('longitude').value = data["result"]['longitude'];
                    }

                });


            }

            /*--------------------------------------------Validations-----------------------------------------*/


            $("#postcode").focusout(function () { // When the user clicks the Search button
                PostCodeCheck();
            });







        </script> 
    </body>
</html>
