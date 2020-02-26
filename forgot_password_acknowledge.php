<?php
include('dbconnection.php');
if (isset($_GET['message'])) {
    $msg = isset($_GET['message']);
} else {
    $msg = '';
}
?>


<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Guardian FM ltd</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <style>
            html,
            body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: white;
                font-family: "Averta","Avenir W02","Avenir",Helvetica,Arial,sans-serif;
                font-size: 15px;
                line-height: 24px;
                color: #5d7079;
            }
            a {
                color: #00b9ff;
                text-decoration: underline;
                border-color: transparent;
            }
            @media only screen and (max-width: 600px) {
                .splash-container {
                    width:100%;
                    margin-right:5px;
                }
            </style>
        </head>

        <body>
            <!-- ============================================================== -->
            <!-- forgot password  -->
            <!-- ============================================================== -->
            <div class="splash-container">
                <div class="card">
                    <div class="card-header text-center"><span class="splash-description"><h3>Your password is sent at '<?php echo $_GET['email'] ?>'. <br>Please check your email.</h3></span>
                        <p style="color:#5d7079;;">click  to <a href="index_V1.1.php">Login</a></p>                  </div>
                </div>
            </div>


        </body>


    </html>