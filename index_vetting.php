<?php
session_start();
if (isset($_SESSION["username1"])) {
    $uname = $_SESSION["username1"];
    $id = $_SESSION["id1"];
} else {
    header("location:../../login_admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Vetting Portal</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

        <!-- Custom styles for this template -->
        <link href="css/simple-sidebar.css" rel="stylesheet">

        <style>
            .dropdown-container {
                display: none;
                background-color: #262626;
                padding-left: 8px;
            }

            .dropdown-item {
                /*  padding: 6px 8px 6px 16px;
                  text-decoration: none;
                  font-size: 20px;
                  color: #818181;
                  display: block;
                  border: none;
                  background: none;
                  width: 100%;
                  text-align: left;
                  cursor: pointer;
                  outline: none;*/
                /*background-color: #999999;*/
                color:#e67300;
            }

            .iframe-container {
                /*overflow-y: scroll;*/
                /*Calculated from the aspect ration of the content (in case of 16:9 it is 9/16= 0.5625)*/
                padding-top: 56.25%;
                position: relative;
            }

            .iframe-container .iframe {
                border: 0;
                height: 1000px;
                left: 0;
                position: absolute;
                top: 0;
                width: 100%;
                border-color: red;
            }

            @media only screen and (max-width: 1440px) {
                /* styles for browsers larger than 1440px; */

                .modal-content {
                    width: auto;

                }

            }

            @media only screen and (max-width: 2000px) {
                /* for sumo sized (mac) screens */
                .modal-content {
                    width: auto;
                }


            }
            @media only screen and (max-width: 960px) {
                /* styles for browsers larger than 960px; */
                .modal-content {

                }             

            }

            @media only screen and (max-width: 728px) {

                /* default iPad screens */

                .modal-content {
                    width: 710px;

                }
            }

            @media only screen and (max-width: 480px) {
                /* styles for mobile browsers smaller than 480px; (iPhone) */
                .modal-content {
                    width: 340px;

                }

            }

            @media only screen and (max-width: 414px) {
                /* styles for mobile browsers smaller than 480px; (iPhone) */
                .modal-content {
                    width: 400px;

                }
                .iframe-container  {
                    height: 630px;
                }
            }
            @media only screen and (max-width: 375px) {
                /* styles for mobile browsers smaller than 480px; (iPhone) */
                .modal-content {
                    width: 350px;

                }
                .iframe-container  {
                    height: 560px;
                }
            }
            @media only screen and (max-width: 320px) {
                /* styles for mobile browsers smaller than 480px; (iPhone) */
                .modal-content {
                    width: 300px;

                }
                .iframe-container  {
                    height: 490px;
                }
            }
            /* different techniques for iPad screening */
            /*            @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
                             For portrait layouts only 
                            .modal-content {
                                        width: 400px;
            
                                    }
                        }
            
                        @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
                             For landscape layouts only 
                        }*/



            /*
                                @media (min-width: 640px) {
                                    .modal-content {
                                        width: 360px;
            
                                    }
            
                                }
            
                                @media (min-width: 728px) {
                                    .modal-content {
                                        width: 700px;
            
                                    }
            
                                }*/

            div {
                /*border-style: solid;*/
            }
        </style>
    </head>

    <body>

        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <!--            <div class="bg-light border-right" id="sidebar-wrapper">
                            <div class="sidebar-heading"> <h1 style="text-transform: capitalize; color: white;">Guardian<span style="font-size:26px; font-weight: bold; color: #C03A1C;">FM</span></h1> </div>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action bg-light" id="NewStaff">New Staff</a>
                                <a href="#" class="list-group-item list-group-item-action bg-light" id="StaffOnHold">Staff On Hold</a>
                                <a href="#" class="list-group-item list-group-item-action bg-light"id="CurrentStaff">Current Staff</a>                    
                                <a href="#" class="list-group-item list-group-item-action bg-light" id="Vetting">Vetting</a>
                                <a href="#" class="list-group-item list-group-item-action bg-light" id="OfficerStrength">Officer's Strength</a>
                                <a href="logout.php" class="list-group-item list-group-item-action bg-light">Logout</a>
            
                            </div>
                        </div>-->
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

                    <!--<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>-->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#"  id="NewStaff" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    New Staff
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="#" id="StaffOnHold" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Staff On Hold
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="CurrentStaff" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Current Staff
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="Vetting" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Vetting
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="OfficerStrength" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Officer Strength
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="OfficerProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Officer Profile
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="ControllerTargets" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Controller Targets
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="Logout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Logout
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>
                <div style="background-color:#cc2900; height: 10px; width: auto; border-style:none;"></div>
                <div class="container-fluid iframe-container">
                    <!--        <h1 class="mt-4">Simple Sidebar</h1>
                            <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>-->



                    <iframe id="myframe" class="iframe" src="Vetting_NewStaff.php"  ></iframe> 

                </div>

            </div>

            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>

            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>

    </body>
    <!-- Footer -->

    <!-- Footer Elements -->
    <footer class="modal-footer">
        <i class="fa fa-circle" style="font-size:18px; color:#FF5733;"></i><i class="fa fa-circle" style="font-size:18px; color:#2ECC71;"></i><span style="float: left;; ">&emsp;www.guardianfm.co.uk</span><span style=" margin-left: 20px;">&emsp;User Login: Jawad</span>

    </footer>
    <!-- Copyright -->



    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                // this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }


        $(document).ready(function () {



            $('#NewStaff').click(function (event) {
                document.getElementById('myframe').src = "Vetting_NewStaff.php";
            });

            $('#CurrentStaff').click(function (event) {
                document.getElementById('myframe').src = "Vetting_CurrentStaff.php";
            });

            $('#StaffOnHold').click(function (event) {
                document.getElementById('myframe').src = "Vetting_StaffOnHold.php";
            });

            $('#Vetting').click(function (event) {
                document.getElementById('myframe').src = "Vetting_VetPortal.php";
            });

            $('#OfficerStrength').click(function (event) {
                document.getElementById('myframe').src = "Vetting_OfficerStrength.php";
            });

            $('#OfficerProfile').click(function (event) {
                document.getElementById('myframe').src = "OfficerProfile.php";
            });
            $('#ControllerTargets').click(function (event) {
                document.getElementById('myframe').src = "ControllerTargets.php";
            });

            $('#Logout').click(function (event) {
                window.close();
            });


        });
    </script>
    <!-- Footer -->
</html>

