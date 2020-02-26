<html>
    <head>
        <!--===============================================================================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <!--==================================From INDEX.php=============================================================-->
        <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.png"/>
        <link href="assets/css/font-awesome.css" rel="stylesheet">
        <link href="assets/css/bootstrap.css" rel="stylesheet">    
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/> 
        <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css"/> 
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-progressbar-3.3.4.css"/> 
        <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <link href="style.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


        <style>
            .form-gap {
                padding-top: 70px;
            }
        </style>
    </head>

    <body>

        <div class="form-gap" style="margin-top:150px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">

                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" id="btn-submit" class="btn btn-lg btn-primary btn-block" value="Email Password " type="button" style="background-color:#57b846; ">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value=""> 
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="wait" style="display:none ;width:69px;height:89px;border:1px solid black;position:absolute;top:36%;left:48.2%;padding:2px;"><img src='assets\images\demo_wait.gif' width="64" height="64" />Updating..</div>
        </div>
    </body>
    <script>



        $(document).ready(function () {
            $(document).ajaxStart(function () {
                $("#wait").css("display", "block");
            });
            $(document).ajaxComplete(function () {
                $("#wait").css("display", "none");
            });

            $(document).on('click', '#btn-submit', function () {

                var email = document.getElementById('email').value;

                $.ajax({

                    url: "forgot_passwordphp_cont.php",
                    method: "POST",
                    data: {email: email},
                    dataType: "text",
                    success: function (data)
                    {
                        alert(data);

                    }

                });

            });


        });



    </script>
</html>