<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "myapplication_db";
$GLOBALS['db'] = "myapplication_db";
$message = "";
/*
  $host = "etaksi.co.uk.mysql";
  $username = "etaksi_co_uk_myapplication_db";
  $password = "Security2009";
  $database = "etaksi_co_uk_myapplication_db";
  $GLOBALS['db'] = "etaksi_co_uk_myapplication_db";
  $message = ""; */

$uname = '';
$pwd = '';
try {
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    // include('dbconnection.php');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["login"])) {
        $uname = $_POST["username"];
        $pwd = $_POST["password"];
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $query = "SELECT * FROM tbl_employee WHERE (email=:username) AND (password = :password) AND `active`='active'";
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
                $_SESSION["id"] = $row[0];
                $_SESSION["username"] = $row[5];
                $_SESSION["Role"] = $row[4];
                $_SESSION['start'] = time();
                $_SESSION["version"] = "V101";
                $_SESSION["Cname"] = "Guardian FM Limited";
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                $id = $row[0];
                $name = $row[2] . ' ' . $row[3];


                $currmon = date("M-Y");

//                echo '<script type="text/javascript" language="javascript">
//            window.location.href ="signwizard_V1.1.php?id=' . $id . ' & currmon=' . $currmon . ' & officername=' . $name . '";</script>';
                header("location:signwizard_V1.1.php?id=$id&currmon=$currmon&officername=$name");
            } else {
                $message = 'Wrong Username or Password';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?> 


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

        <!--===============================================================================================-->
    </head>
    <body style="background-color: white; ">


        <div id="side-image" ng-class="$ctrl.fetchingReferralData ? '' : $ctrl.wasReferred() ? 'side-image--referral' : 'side-image--regular'" class="side-image--regular image-fader"></div>




        <div class="col-lg-push-4 col-lg-9">

            <div class="col-md-push-2 col-md-8 col-md-pull-2 col-xl-push-3 col-xl-6 col-xl-pull-3" style="padding-top:5%; ">
                <br><br><br>
                <div class="h_iframe">

                    <div class="m-t-5 " style="text-align: center;">
                        <span  class="ng-scope"><a href= "agreement.php" style="text-decoration:none">
                                <h3 style="text-transform: capitalize; " >Guardian<span style="font-size:20px; font-weight: bold; color: #C03A1C;">FM</span>
                                </h3><img hidden="" class="logo-img" src="assets/images/logo.png" alt="logo"></a></span> 


                        <div class="m-t-2" >
                            <h2 class="m-b-2 ng-scope st-hover">Security Jobs without borders</h2> 
                        </div>
                        <p>Already member? <a href="sign-up_V1.1.php" class="">Sign Up Here.</a></p>

                    </div>

                    <div class="splash-container">
                        <div class="text-xs-center ">
                            <span class="m-t-2"><p>Please enter your user information.</p></span>
                            <div class="card">
                                <form  method="post">
                                    <div class="form-group" >

                                        <input class="form-control form-control-lg" name="username" id="username" value="<?php echo $uname ?>" type="text" placeholder="Your email " autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" name="password" id="password" value="<?php echo $pwd ?>" type="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label hidden="" class="custom-control custom-checkbox">
                                            <input  class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                                        </label>
                                    </div>

                                    <button type="submit" name="login" value="Login" class="btn btn-success m-t-2 btn-block text-xs-center"><span class="icon fa fa-lock pull-left"></span>Sign in</button>
                                    <div class="card-footer bg-white p-0  ">


                                        <div class="card-footer-item card-footer-item-bordered">
                                            <a href="forgot-password-2.0.php" class="footer-link">Forgot Password</a>
                                        </div>

                                        <div class="form-group">
                                            <?php
                                            if (isset($message)) {


                                                echo '<label class="text-danger">' . $message . '</label>';
                                            }
                                            ?>  

                                        </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>





    </body>
</html>
