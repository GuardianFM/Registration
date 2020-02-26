<?php
session_start();
if (isset($_SESSION["username"])) {
    $uname = $_SESSION["username"];
    // echo $uname;
} else {
    header("location:index_V1.1.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Officer Portal</title>
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
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading"> <h1 style="text-transform: capitalize; color: white;">Guardian<span style="font-size:26px; font-weight: bold; color: #C03A1C;">FM</span></h1> </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="EmployeeDetails">Employee Details</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="EmployeeStatement">Statement</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light"id="EmployeeDocuments">Employee Documents</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="Availability">Availability</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="Schedules">Schedules</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="AvailableJobs">Available Jobs</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="Inbox">Inbox</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="PolicyDocument">Policy Document</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="IncidentReport">Report Incident</a>
                    <a href="logout_V1.1.php" class="list-group-item list-group-item-action bg-light">Logout</a>

                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

                    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!--                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0" hidden>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            File
                                                        </a>
                                                        <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Edit
                                                        </a>
                                                        <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            View
                                                        </a>
                                                        <div class="dropdown-menu bg-light " aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Administration
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Customers</a>
                                                            <a class="dropdown-item" href="#">Contractors</a>
                                                            <a class="dropdown-item" href="#">Location</a>
                                                            <a class="dropdown-item" href="#">Employee</a>
                                                            <a class="dropdown-item" href="#">Users</a>
                                                            <a class="dropdown-item" href="#">Reports</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                        
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Company
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                        
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Roastering
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                        
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Sourcing
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                        
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Wages & Payments
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Customers
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                        
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Reports
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                        
                        
                                                    </li>
                        
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Help
                                                        </a>
                        
                        
                        
                                                    </li>
                                                </ul>-->

                    </div>
                </nav>
                <div style="background-color:#cc2900; height: 10px; width: auto; border-style:none; display:none;"></div>
                <div class="container-fluid iframe-container">
                    <!--        <h1 class="mt-4">Simple Sidebar</h1>
                            <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>-->



                    <iframe id="myframe" class="iframe" src="OfficerDetails.php?id=<?php echo $_GET['id']; ?>"  ></iframe> 

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
    <footer class="modal-footer" style="display:none;">
        <i class="fa fa-circle" style="font-size:18px; color:#FF5733;"></i><i class="fa fa-circle" style="font-size:18px; color:#2ECC71;"></i><span style=" margin-left: 20px;">&emsp;User Login: <?PHP echo $_SESSION["username"]; ?></span>

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



            $('#EmployeeDetails').click(function (event) {
                var id = '<?php echo $_GET['id']; ?>';
//                alert(id)
                document.getElementById('myframe').src = "OfficerDetails.php?id=" + id;
                //  openPage(event, 'Maintab1');
                $("#wrapper").toggleClass("toggled");
            });

            $('#EmployeeStatement').click(function (event) {
                var id = '<?php echo $_GET['id']; ?>';
                var officername = '<?php echo $_GET['officername']; ?>';
//                alert(id)
                document.getElementById('myframe').src = "Officer_Statement.php?id=" + id + "&officername=" + officername;
                //  openPage(event, 'Maintab1');
                $("#wrapper").toggleClass("toggled");
            });


            $('#EmployeeDocuments').click(function (event) {
                var id = '<?php echo $_GET['id']; ?>';
                var officername = '<?php echo $_GET['officername']; ?>';
                document.getElementById('myframe').src = "UserPortal_EmpDocuments.php?id=" + id + "&officername=" + officername;
                $("#wrapper").toggleClass("toggled");
            });

            $('#Availability').click(function (event) {
                var id = '<?php echo $_GET['id']; ?>';
                var currmon = '<?php echo $_GET['currmon']; ?>';
//                alert(id + '-' + currmon)
                document.getElementById('myframe').src = "requestprocess.php?id=" + id + "&currmon=" + currmon;
                $("#wrapper").toggleClass("toggled");
            });

            $('#Schedules').click(function (event) {
                var id = '<?php echo $_GET['id']; ?>';
                document.getElementById('myframe').src = "UserPortal_OfficerSchedule.php?id=" + id;
                $("#wrapper").toggleClass("toggled");
            });

            $('#AvailableJobs').click(function (event) {
                var id = '<?php echo $_GET['id']; ?>';
                document.getElementById('myframe').src = "UserPortal_AvailableJobs.php?id=" + id;
                $("#wrapper").toggleClass("toggled");
            });

            $('#Inbox').click(function (event) {
                var id = '<?php echo $_GET['id']; ?>';
                document.getElementById('myframe').src = "OfficerInbox.php?id=" + id;
                $("#wrapper").toggleClass("toggled");
                //  openPage(event, 'Maintab1');
            });

            $('#PolicyDocument').click(function (event) {

                var id = '<?php echo $_GET['id']; ?>';

                document.getElementById('myframe').src = "PolicyDocument.php?id=" + id;
                $("#wrapper").toggleClass("toggled");
                //  openPage(event, 'Maintab1');
            });



            $('#IncidentReport').click(function (event) {

                var id = '<?php echo $_GET['id']; ?>';
                var officername = '<?php echo $_GET['officername']; ?>';

                document.getElementById('myframe').src = "ReportIncident.php?id=" + id + "&officername=" + officername;
                $("#wrapper").toggleClass("toggled");
                //  openPage(event, 'Maintab1');
            });

        });
    </script>
    <!-- Footer -->
</html>

