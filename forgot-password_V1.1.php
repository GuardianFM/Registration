


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Guardian FM</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link type='text/css' rel='stylesheet' href='assets/css/authenticationPage.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 


        <!--==================================From INDEX.php=============================================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                        <p>Don't have an account? <a href="sign-up_V1.1.php" class="">Sign Up Here.</a></p>

                    </div>

                    <div class="splash-container">
                        <div class="text-xs-center ">
                            <span class="m-t-2"> <p>Don't worry, we'll send you an email to reset your password.</p></span>
                            <div class="card">

                                <div class="form-group" >
                                    <input class="form-control form-control-lg" name="username" id="email" type="email" placeholder="Your email " autocomplete="off">
                                </div>

                                <label id="msg_lbl" style="color: red; font-weight: bold;"></label> 



                                <button id="btn-submit"  value="" class="btn btn-success m-t-2 btn-block text-xs-center"><span class="icon fa fa-lock pull-left"></span>Reset</button>

                                <div class="card-footer bg-white p-0  ">


                                    <div class="card-footer-item card-footer-item-bordered">

                                        <p style="color:#5d7079;">OR Please <a href="index_V1.1.php">Login</a></p>
                                    </div>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <script>
                $(document).on('click', '#btn-submit', function () {

                    var email = document.getElementById('email').value;

                    $.ajax({

                        url: "forgot_passwordphp.php",
                        method: "POST",
                        data: {email: email},
                        dataType: "text",
                        success: function (data)
                        {
                            if (data == "User Found!") {
                                window.location.href = 'forgot_password_acknowledge.php?email=' + email;
                            } else {
//                                alert(data);
                                document.getElementById('msg_lbl').innerHTML = data;
                            }
                        }

                    });

                });
            </script>

    </body>
</html>
