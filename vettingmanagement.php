<!DOCTYPE html>
<html>
    <title>Vetting Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .subheader{
            color:#4188F4;
        }
        .headerheading{
            float:left;
        }
    </style>

    <body>

        <div class="w3-container">




            <div id="" class="w3-container" >

                <center>
                    <br>
                    <br>
                    <br>
                    <br>
                    <select class="w3-round-large" id="select_officer" style="width:20%; height: 30px;">
                        <?php
                        include 'dbconnection.php'; //get the contractors 
                        $sql = "SELECT * FROM `tbl_officers` WHERE `active`='active' AND `agreement_status`='Accept' AND `verify`='verify'";
                        $result = mysqli_query($connect, $sql);
                        $i = 0;
                        $row = mysqli_fetch_array($result);
                        $contractor_id = 0;

                        mysqli_data_seek($result, 0);

                        while ($row = mysqli_fetch_array($result)) {
                            ?>

                            <option id="<?php echo $row["id"] ?>"><?php echo $row["fullname"] ?></option>

                            <?php
                        }
                        ?> 
                    </select>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="w3-responsive">
                        <table class="w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " id="creditcheck" style="width:80%;">
                            <thead>
                                <tr class="header">
                                    <th colspan="7"><h4 class="headerheading">Credit Check</h4></th>

                                </tr>
                                <tr class="subheader">
                                    <th>Date of Check</th>
                                    <th>Requested By</th>
                                    <th>Response Date</th>
                                    <th>Notices of Correction</th>
                                    <th>Court Judgements</th>
                                    <th>Linked Address</th>
                                    <th>Action</th>


                                </tr>
                            </thead> 
                            <tbody>
                                <tr>
                                    <td>14-05-2019</td>
                                    <td>1</td>
                                    <td>0002,0003,0004</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td><i class="far fa-file" style="font-size: 16px;" id="btn_file"></i></td>
                                </tr>


                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="7"></td>

                                </tr>

                            </tfoot>

                        </table>
                        <br>
                        <br>
                        <br>
                        <br>

                        <table class="w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered" id="employeeref" style="width:80%;">
                            <thead>
                                <tr class="header">
                                    <th colspan="23"><h4 class="headerheading">Employment Reference</h4></th>

                                </tr>
                                <tr class="subheader">
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Job Title</th>
                                    <th>Phone No.</th>
                                    <th>Employed From</th>
                                    <th>Employed To</th>
                                    <th>Ref' Received</th>
                                    <th colspan="2">File Image</th>
                                    <th colspan="2">Alternate Proof</th>
                                    <th colspan="2">Emp' Dates Confirmed</th>
                                    <th colspan="2">Final Wage Confirmed</th>
                                    <th colspan="6">Reference Request</th>
                                    <th colspan="2">Tel' Ref</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Last Request</th>
                                    <th>No Requests</th>
                                    <th>Alternate Proof email sent</th>
                                    <th>Send Email</th>
                                    <th>Send Alternate Proof Email</th>
                                    <th>Print Letter</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead> 
                            <tbody>
                                <tr>
                                    <td>Unemployed</td>
                                    <td>Unemployed</td>
                                    <td>Unemployed</td>
                                    <td>Unemployed</td>
                                    <td>01-09-2018</td>
                                    <td>01-09-2019</td>
                                    <td><i class="fas fa-check" style="font-size:16px; color:green;"></i></td>
                                    <td><i class="far fa-file" style="font-size: 16px;"></i></td>
                                    <td><i class="fas fa-arrow-up" style="font-size:16px; color:green;"></i></td>
                                    <td></td>
                                    <td><i class="fas fa-arrow-up" style="font-size:16px; color:gray;"></i></td>
                                    <td><i class="fas fa-check" style="font-size:16px; color:green;"></i></td>
                                    <td>Unconfirm</td>
                                    <td><i class="fas fa-check" style="font-size:16px; color:green;"></i></td>
                                    <td>Unconfirm</td>
                                    <td>10-02-2019</td>
                                    <td>3</td>
                                    <td>No</td>
                                    <td><i class="fas fa-envelope" style="font-size:16px; color:blueviolet;"></i></td>
                                    <td><i class="fas fa-envelope" style="font-size:16px; color:blueviolet;"></i></td>
                                    <td><i class="fas fa-print" style="font-size:16px; color:green;"></i></td>
                                    <td>10-02-2015</td>
                                    <td>10-02-2019</td>
                                </tr>


                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="23"></td>
                                </tr>

                            </tfoot>

                        </table>
                        <br>
                        <br>
                        <br>
                        <br>
                        <table class="w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " style="width:80%;" id="personalref">
                            <thead>
                                <tr class="header">
                                    <th colspan="15"><h4 class="headerheading">Personal References</h4></th>
                                </tr>
                                <tr class="subheader">
                                    <th>Name</th>
                                    <th>Telephone No.</th>
                                    <th>Ref' Received</th>
                                    <th colspan="2">File Image</th>
                                    <th colspan="2">Alternate Proof</th>
                                    <th colspan="6">References Requests</th>
                                    <th colspan="2">Tel' Ref</th>
                                </tr>
                            </thead> 
                            <tbody>
                            <td>John Snow</td>
                            <td>090078601</td>
                            <td><i class="fas fa-check" style="font-size:16px; color:green;"></i></td>
                            <td><i class="far fa-file" style="font-size: 16px;"></i></td>
                            <td><i class="fas fa-arrow-up" style="font-size:16px; color:green;"></i></td>
                            <td></td>
                            <td><i class="fas fa-arrow-up" style="font-size:16px; color:gray;"></i></td>
                            <td>10-02-2019</td>
                            <td>2</td>
                            <td>No</td>
                            <td><i class="fas fa-envelope" style="font-size:16px; color:blueviolet;"></i></td>
                            <td><i class="fas fa-envelope" style="font-size:16px; color:gray;"></i></td>
                            <td><i class="fas fa-print" style="font-size:16px; color:green;"></i></td>
                            <td>02-02-2018</td>
                            <td>Confirm</td>

                            </tbody>

                            <tfoot>
                            <td colspan="15"></td>

                            </tfoot>

                        </table>

                        <br>
                        <br>
                        <br>
                        <br>

                        <table class="w3-table-all w3-card-4 w3-hoverable w3-striped w3-tiny w3-centered w3-bordered " style="width:80%;" id="education">
                            <thead>
                                <tr class="header">
                                    <th colspan="9"><h4 class="headerheading">Education</h4></th>
                                </tr>
                                <tr class="subheader">
                                    <th>Center Name</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>Center Type</th>
                                    <th>Attended From</th>
                                    <th>Attended To</th>
                                    <th>Course Details</th>
                                    <th>Verified</th>
                                    <th>Verification Notes</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                </tr>

                            </tbody>

                            <tfoot>
                            <td colspan="15"></td>

                            </tfoot>

                        </table>

                    </div>
                </center>

            </div>


        </div>
        <br>
        <br>
        <br>
        <br>


    </body>
</html>
