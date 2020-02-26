<?php
session_start();
 $host = "etaksi.co.uk.mysql";  
  $username = "etaksi_co_uk_myapplication_db";
  $password = "Security2009";
  $database = "etaksi_co_uk_myapplication_db";
  $GLOBALS['db']="etaksi_co_uk_myapplication_db";
  $message = ""; 

/*$host = "localhost";
$username = "root";
$password = "";
$database = "myapplication_db";
$GLOBALS['db'] = "myapplication_db";
$message = "";*/

try {
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    // include('dbconnection.php');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["login"])) {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $query = "SELECT * FROM tbl_employee WHERE (shortname = :username OR email=:username) AND (password = :password AND active ='active')  ";
            $statement = $connect->prepare($query);
            $statement->execute(
                    array(
                        'username' => $_POST["username"],
                        'password' => $_POST["password"]
                    )
            );
            $count = $statement->rowCount();
            $row = $statement->fetch(PDO::FETCH_NUM);
            if ($count > 0) {
                $_SESSION["id"] = '1200';
                $_SESSION["username"] = $_POST["username"];
                $_SESSION['start'] = time();
                $_SESSION["version"] = "V101";
                $_SESSION["Cname"] = "Guardian FM Limited";
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                $id = $row[0];
                $name = $row[3];
                $currmon = date("M-Y");
                  //header("location:index_user.php?id=' . $id . ' & currmon=' . $currmon . ' & officername=' . $name . '");
                                  header("location:index_user.php?id=$id & currmon=$currmon & officername=$name");
                  
             //   echo '<script type="text/javascript" language="javascript">
               // window.open("index_user.php?id=' . $id . ' & currmon=' . $currmon . ' & officername=' . $name . '");</script>';
//                header("location:UserPortal.php?id=$id & currmon=$currmon & officername=$name");
            } else {
                $message = '<label>Wrong Username or Password</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?> 
<!DOCTYPE html>  
<html>  

    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="assets/images/favicon.png"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/css/util.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <!--===============================================================================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <style>


            @media only screen and (min-width: 200px) {
                /* For tablets: */
                .form-control {width: auto;}

            }    
        </style>
    </head>  
    <body>  
        <div class="limiter">
            <center>
                <div class="container-login100">
                    <div class="wrap-login100 p-t-85 p-b-20">
                        <form class="login100-form validate-form" method="post">
                            <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
                                <input class="input100" type="text" name="username">
                                <span class="focus-input100" data-placeholder="Employee Login"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                                <input class="input100" type="password" name="password">
                                <span class="focus-input100" data-placeholder="Password"></span>
                            </div>

                            <div class="container-login100-form-btn">

                                <input class="login100-form-btn" type="submit" name="login" value="Login" style='background-color: #C03A1C;'/>

                                <?php
                                if (isset($message)) {
                                    echo '<label class="text-danger">' . $message . '</label>';
                                }
                                ?> 

                            </div>

                            <ul class="login-more p-t-190">
                                <li class="m-b-8">
                                    <span class="txt1">
                                        Forgot
                                    </span>

                                    <a href="../forgot_password.php" class="txt2" style='color: #C03A1C;'>
                                        Username / Password?
                                    </a>
                                </li>

                                <li>
                                    <span class="txt1">
                                        Don’t have an account?
                                    </span>

                                    <a href="Register.php" class="txt2" style='color: #C03A1C;'>
                                        Sign up
                                    </a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </center>
        </div>


        <div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
        <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="assets/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="assets/vendor/bootstrap/js/popper.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="assets/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="assets/vendor/daterangepicker/moment.min.js"></script>
        <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="assets/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="assets/js/main.js"></script>  
    </body>  
</html>  

<script>
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
</script>