<?php
session_start();
if (isset($_SESSION["username3"])) {
    $name = $_SESSION["username3"];
    $id = $_SESSION["id3"];
} else {
    header("location:logindb_cont.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Client Portal</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap_1.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link href="assets/css/simple-sidebar.css" rel="stylesheet" type="text/css"/>
        <style>
            .dropdown-container {
                display: none;
                background-color: #262626;
                padding-left: 8px;
            }

            .dropdown-item {
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

        </style>
    </head>

    <body>

        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper" >
                <div class="sidebar-heading"> <h1 style="text-transform: capitalize; color: white;">Guardian<span style="font-size:26px; font-weight: bold; color: #C03A1C;">FM</span></h1> </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action bg-light"id="Schedule">Schedule</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="AvailableSchedules">Available Schedules</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="SitesCovered">Sites Covered</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light" id="UpdateOfficerDetails">Update Officer Details</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light dropdown-btn" id="ComplainLog">Complain Log</a>
                    <div class="dropdown-container">
                        <a class="list-group-item list-group-item-action bg-light dropdown-item" href="#" id="IncidentReport">Incident Report</a>
                        <a class="list-group-item list-group-item-action bg-light dropdown-item" href="#" id="DailyChasingReport">Daily Chasing Report</a>
                    </div>
                    <a href="logout_cont.php" class="list-group-item list-group-item-action bg-light" id="Logout">Logout</a>
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


                </nav>
                <div style="background-color:#cc2900; height: 10px; width: auto; border-style:none;"></div>
                <div class="container-fluid iframe-container">

                    <iframe id="myframe" class="iframe" src="OfficerSchedule_cont.php?id=<?PHP echo $id; ?>"   ></iframe> 

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
        <i class="fa fa-circle" style="font-size:18px; color:#FF5733;"></i><i class="fa fa-circle" style="font-size:18px; color:#2ECC71;"></i><span style=" margin-left: 20px;">&emsp;User Login: <?php echo $name ?></span>

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


            var id = '<?PHP echo $id ?>';

            $('#Schedule').click(function (event) {
                document.getElementById('myframe').src = "OfficerSchedule_cont.php?id=" + id;
            });
            $('#IncidentReport').click(function (event) {
                document.getElementById('myframe').src = "IncidentReport_cont.php?id=" + id;
            });
            $('#DailyChasingReport').click(function (event) {
                document.getElementById('myframe').src = "DailyChasingReport_cont.php?id=" + id;
            });
            $('#AvailableSchedules').click(function (event) {
                document.getElementById('myframe').src = "AvailableJobs_cont.php?id=" + id;
            });
            $('#UpdateOfficerDetails').click(function (event) {
                document.getElementById('myframe').src = "OfficerProfile_cont.php?id=" + id;
            });
            $('#SitesCovered').click(function (event) {
                document.getElementById('myframe').src = "SitesCovered_cont.php?id=" + id;
            });


        });
    </script>
    <!-- Footer -->
</html>

