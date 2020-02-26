
<?php
include "./dbconnection.php"; // Load file connection.php   
session_start();
if (isset($_SESSION["username"])) {
    
} else {
    header("location:logindb.php");
}
?>



<!DOCTYPE html>
<html>
    <head>
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
      <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />-->
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
         <script src="jquery.json-2.4.min.js"></script>-->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--           
                    Links For Header & Footer Start 
        
         jQuery library 
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
           Include all compiled plugins (below), or include individual files as needed 
           Bootstrap 
          <script src="assets/js/bootstrap.js"></script>
           Slick Slider 
          <script type="text/javascript" src="assets/js/slick.js"></script>    
           mixit slider 
          <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
           Add fancyBox         
          <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
          counter 
          <script src="assets/js/waypoints.js"></script>
          <script src="assets/js/jquery.counterup.js"></script>
           Wow animation 
          <script type="text/javascript" src="assets/js/wow.js"></script> 
           progress bar   
          <script type="text/javascript" src="assets/js/bootstrap-progressbar.js"></script>  
           Custom js 
          <script type="text/javascript" src="assets/js/custom.js"></script>
              Favicon 
            <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
             Font Awesome 
            <link href="assets/css/font-awesome.css" rel="stylesheet">
             Bootstrap 
            <link href="assets/css/bootstrap.css" rel="stylesheet">    
             Slick slider 
            <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/> 
             Fancybox slider 
            <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
             Animate css 
            <link rel="stylesheet" type="text/css" href="assets/css/animate.css"/> 
             Progress bar  
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-progressbar-3.3.4.css"/> 
              Theme color 
            <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
             Main Style 
            <link href="style.css" rel="stylesheet">
             Fonts 
             Open Sans for body font 
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
             Lato for Title 
            <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>    
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           
         Links For Header & Footer Ends 
        -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--<script src="assets/js/jquery.js" type="text/javascript"></script>-->


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html, body { margin: 0; padding: 0; }

            #tblcalender table{
                border-collapse: collapse;
                font-family: Georgia, Times, serif;
            }

            #tblcalender th{
                border: 1px solid #A8A8A8;
                vertical-align: top;
            }

            #tblcalender td {
                height: 100px;
                width: 950px;
                padding: 5px;
                border: 1px solid #A8A8A8;
                vertical-align: top;
                color: black;

            }

            .divcalendar {
                padding: 15px;
                float:left;
                width: 100%;
                /*background-color: #FFCC00;*/
            }

            /* Wrapper div. That makes the inner div into an inline element that can be centered with text-align.*/
            #calendaroverallcontrols {
                text-align: left;

            }

            /* This is a fluid div as width will be changing */
            #calendarmonthcontrols {
                display: inline-block;
                /*background-color: #FF0000;*/
                /*margin-left: 1%;*/ 

            }

            #calendarmonthcontrols > div, #calendarmonthcontrols > a {
                display: inline-block;
            }    

            #btnPrevYr {
                text-decoration: none;
                font-size: 35px;
                vertical-align: middle;
                /*background: #00FFCC;*/      
            }

            #btnPrev {
                text-decoration: none;
                font-size: 35px;
                margin-left: 20px;
                vertical-align: middle;
                /*background: #00FFCC;*/
            }    

            /*.yearspan {
              font-size: 20px;
              font-weight: bold;
              float: left;
              margin-left: 5px;
              margin-right: 5px;
            }
            
            .monthspan {
              font-size: 20px;
              font-weight: bold;
              float: left;
              margin-left: 5px;
              margin-right: 5px;
            }*/

            #monthandyearspan {
                width: 50px;
                font-size: 25px;
                font-weight: bold;
                margin-left: 20px;
                margin-right: 20px;
                vertical-align: middle;
                /*background: #00FFCC;*/
            }    

            #monthandyear {
                vertical-align: middle;
            }

            #btnNext {
                text-decoration: none;
                font-size: 35px;
                margin-right: 20px;
                vertical-align: middle;
                /*background: #00FFCC;*/
            }

            #btnNextYr {
                text-decoration: none;
                font-size: 35px;
                vertical-align: middle;
                /*background: #00FFCC;*/
            }        

            #divcalendartable {
                clear: both;
                /*zoom: 80%;*/

            }

            .daysheader {
                background: #C0C0C0;
                height: auto;
                text-align: center;
            }

            #prevmonthdates {
                background-color: #E0E0E0;
            }

            #nextmonthdates {
                background-color: #E0E0E0;
            }

            #currentmonthdates {
                background-color: #FFFFFF;
            }

            #cellvaluespan {
                /*background:   #FF0000;*/
            }

            #cellvaluelist {
                background:  #FFCC00;
            }        

            .swim {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 80%;
                text-align: center;
                background: #445511;
                color: #F5F5F5;
                margin-bottom: 5px;
                padding: 5px;
            }

            .chrono {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 80%;
                text-align: center;
                background: #778899;
                color: #F5F5F5;
                margin-bottom: 5px;
                padding: 5px;
            }
            div
            {
                /*border: solid;*/
            }
            .chkbox1{
                font-weight:  bold;
                font-size: 20px;
                color: red;
                margin-left: 10px;

            }
            @media (max-width: 768px) {
                #tblcalender td {
                    height: 50px;


                }
            }

        </style>
    </head>
    <body>



        <div id="calendaroverallcontrols" style="">
            <!--          <div class="panel-heading" style="padding: 5px; background-color:  #337ab7; height: 60px; text-align: center; color: white;">
                                
                          
                                </div>-->
            <!-- <div id="year"></div> -->
            <div id="calendarmonthcontrols" style=" text-align: center;   width: 100%;">

                <a id="btnPrevYr" href="#" title="Previous Year"><span style="color:red; font-size:  60px; display: none;" class="fa fa-caret-square-o-left"></span></a>
                <a id="btnPrev" href="#" title="Previous Month"><span style="color: darkblue; font-size:  50px; " class="fa fa-caret-square-o-left"></span></a> 
                <div id="monthandyear"></div>
                <a id="btnNext" href="#" title="Next Month"><span style="color:darkblue; font-size:  50px; " class="fa fa-caret-square-o-right"></span></a>

                <a id="btnNextYr" href="#" title="Next Year"><span style="color:red; font-size:  60px; display: none;" class="fa fa-caret-square-o-right"></span></a>
                <p id="updatemsg" style="color: blue;"></p>
                <button type="button" style=" margin :5px;  width:250px; display: none;" class="btn btn-primary" id="btn-tab3save">Save</button>


            </div>


            <div class="panel panel-primary" style=" overflow: hidden;  width: 90%; margin-left: 5%; margin-right: 5%; ">

                <form class="form-horizontal" id="regform" style="height:80%;">
                    <div style="width:80%; margin-left: 10%; margin-right: 10%; float: left; margin-top: 0px; text-align: center; display: none; ">


                        <label for="inputEmail3" style="margin-left:20px; text-align:center;">ID<input type="text" class="form-control" id="textOfficerid" style="width:50px;" value="<?php echo $_GET['id']; ?>" /></label>

                        <label for="inputEmail3"  style="margin-left:20px; text-align:  center; display: none;">Officer Name 


                            <select  id ="Op_Officername" class="form-control" style ="width:400; display: none;">
                                <?php
                                $sql = "SELECT * FROM  tbl_officers";
                                $result = mysqli_query($connect, $sql);
                                $i = 0;

                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row == 1) {
                                        $OfficerName = $row["name"];
                                    }
                                    ?>  

                                    <option id="<?php echo $row["id"] ?>"><?php echo $row["name"] . $row["id"] ?></option>
                                    <?php
                                }
                                // mysqli_data_seek($result, 0);
                                ?>  

                            </select></label>

                        <label for="inputPassword3" > Status 
                            <select name="OpOfficerStatus" class="form-control">
                                <option>Available</option>
                                <option>Un-Availaible</option>
                                <option>Not Confirmed</option>
                            </select></label> 
                        <button type="button" style="margin:5px;" class="btn btn-primary" id="btn-tab3search">Search</button>

                    </div>



                    <strong class="chkbox1"><input class ="Monthcheckall" type="checkbox" id="Chkall"  style="font-size: 50px; "  value="ON"  />SELECT ALL</strong>
    <p>No Need to press save Just Click on the days when you are avaliable</p>

                    <div id="divcalendartable" style=" overflow:hidden; margin: 2px; float: left;  width: 100%; border-radius: 4px; ">

                    </div>
                    <div style="width:65%; height: 500px; border:1px inset ; float: right; overflow-x: auto; " hidden="">
                        <input type="text" class="form-control" placeholder="Enter your Search Text here!" id="tab3Srchtext" style="width: 70%;">
                        <table class="table table-bordered" style=" background-color:#fff; color: #000;   float: right;    "  id="tablerequest"  table-layout="Fixed">
                            <thead>

                                <tr >  
                                    <th width="5%" >ID</th>  
                                    <th width="10%"  >Officer</th>  
                                    <th width="10%" overflow="hidden">Date Schedule</th> 
                                    <th width="10%" overflow="hidden">Day</th> 
                                    <th width="10%">Status</th>  
                                    <th width="10%">Week No</th>  
                                    <th width="10%">Site Contact</th>
                                    <th width="10%">Site Address</th>

                                </tr>  

                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM  tbl_officerstatus where Status !='' Order by Date ";
                                $result = mysqli_query($connect, $sql);

                                $i = 0;

                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row["Status"] == "1") {
                                        $status = "Available";
                                    }
                                    $date = new DateTime($row["Date"]);
                                    $date = $date->format("d-M-Y");
                                    if ($row["Date"] < date('Y-m-d')) {
                                        $status = "Expired";
                                    }
                                    ?>  
                                    <tr >
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["OfficerName"] . " )" ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $row["Day"] ?></td>
                                        <td><?php echo $status ?></td>
                                        <td><?php echo $row["Weekno"] ?></td>
                                        <td><?php echo $row["Sitecontact"] ?></td>
                                        <td><?php echo $row["Siteaddress"] ?></td>







                                    </tr>  

                                    <?php
                                }
                                // mysqli_data_seek($result, 0);
                                ?>  

                            </tbody>
                        </table>

                    </div>

                </form>
            </div>
        </div>



        <?php // include 'footer.php';  ?>



    </body>
    <script>
        var Cmonth = []; //to use this array for save user selection value
        var Nmonth = []; //to use this array for save user selection value
        var userdataMonth = [];
        var Calendardata = new Array();
        var currmon = "<?php echo $_GET['currmon'] ?>";
        $(document).ready(function () {



            searchavailibility();
            $(":checkbox").click(function ()
            {
                //       alert('I have been checked');
            })

        })

        // Get element by id
        function getarraydata() {
            var monthandyear = document.getElementById('monthandyear').textContent;
            var ln = Calendardata.length;

            //  alert (Calendardata.length);
            for (var i = 0; i < ln; i++) {

                if (Calendardata[i].monthandyear == monthandyear) {
                    ln = i;
                    //   alert (Calendardata[i].monthandyear);
                    //load the values of selected month from array

                    document.getElementById('1').checked = Calendardata[i].Day1;
                    document.getElementById('2').checked = Calendardata[i].Day2;
                    document.getElementById('3').checked = Calendardata[i].Day3;
                    document.getElementById('4').checked = Calendardata[i].Day4;
                    document.getElementById('5').checked = Calendardata[i].Day5;

                    document.getElementById('6').checked = Calendardata[i].Day6;
                    document.getElementById('7').checked = Calendardata[i].Day7;
                    document.getElementById('8').checked = Calendardata[i].Day8;
                    document.getElementById('9').checked = Calendardata[i].Day9;
                    document.getElementById('10').checked = Calendardata[i].Day10;
                    document.getElementById('11').checked = Calendardata[i].Day11;
                    document.getElementById('12').checked = Calendardata[i].Day12;
                    document.getElementById('13').checked = Calendardata[i].Day13;
                    document.getElementById('14').checked = Calendardata[i].Day14;
                    document.getElementById('15').checked = Calendardata[i].Day15;
                    document.getElementById('16').checked = Calendardata[i].Day16;
                    document.getElementById('17').checked = Calendardata[i].Day17;
                    document.getElementById('18').checked = Calendardata[i].Day18;
                    document.getElementById('19').checked = Calendardata[i].Day19;
                    document.getElementById('20').checked = Calendardata[i].Day20;
                    document.getElementById('21').checked = Calendardata[i].Day21;
                    document.getElementById('22').checked = Calendardata[i].Day22;
                    document.getElementById('23').checked = Calendardata[i].Day23;
                    document.getElementById('24').checked = Calendardata[i].Day24;
                    document.getElementById('25').checked = Calendardata[i].Day25;
                    document.getElementById('26').checked = Calendardata[i].Day26;
                    document.getElementById('27').checked = Calendardata[i].Day27;
                    document.getElementById('28').checked = Calendardata[i].Day28;
                    document.getElementById('29').checked = Calendardata[i].Day29;
                    document.getElementById('30').checked = Calendardata[i].Day30;
                    document.getElementById('31').checked = Calendardata[i].Day31;



                }
            }

        }


        $('#Op_Officername').change(function () {

            //   alert ($("#Op_Officername option:selected").attr("id"));
            document.getElementById('textOfficerid').value = $("#Op_Officername option:selected").attr("id");

        });


        $('#btn-tab3save').click(function () {
            //   var OfficerName = document.getElementById('Op_Officername').value;
            var OfficerName = "<?php echo $_SESSION['username']; ?>";
            var Officer_id = "<?php echo $_GET['id']; ?>";
            var status = "Valid";
            var TableData2 = "";
            TableData2 = JSON.stringify(Calendardata);
            var month_year = document.getElementById('monthandyear').textContent;
         

            $.ajax({
                type: "POST",
                url: "saverequest.php",
                data: {monthandyear: month_year, pTableData: TableData2, OfficerName: OfficerName, Officer_id: Officer_id, status: status},
                dataType: "text",
                success: function (msg) {
                    document.getElementById('updatemsg').innerHTML = 'Your avalibility has been updated successfully';
                    //setTimeout(function() {document.getElementById('updatemsg').innerHTML="Your Information is updated";},5000);

// return value stored in msg variable 
                    //   $('#tbServerResponse').val( msg);
                    // alert(msg);
                }

            });
        })

        $('#btn-tab3search').click(function (e) { //save array data
            e.preventDefault();
            //    document.getElementById('9').checked = 
            searchavailibility();

        });

        $('.Monthcheckall').click(function (event) {

            if (this.checked) {
                $('.Monthcheckall').each(function () {
                    this.checked = true;
                    //assign value to month variable on checkall=true

                });
            } else {
                $('.Monthcheckall').each(function () {
                    this.checked = false;
                    //assign value to month variable on un-checkall=false
                });
            }
            getwork();
        });

        //$('.Monthcheckall').click(function () {
        //     alert ("jwad");//monthandyear
        //           
        //        });        


        var Calendar = function (o) {
            //Store div id

            this.divId = o.ParentID;

            // Days of week, starting on Sunday
            this.DaysOfWeek = o.DaysOfWeek;

            console.log("this.DaysOfWeek == ", this.DaysOfWeek);

            // Months, stating on January
            this.Months = o.Months;

            console.log("this.Months == ", this.Months);

            // Set the current month, year
            var d = new Date();

            console.log("d == ", d);

            this.CurrentMonth = d.getMonth();

            console.log("this.CurrentMonth == ", this.CurrentMonth);

            this.CurrentYear = d.getFullYear();

            console.log("this.CurrentYear == ", this.CurrentYear);

            var f = o.Format;

            console.log("o == ", o);

            console.log("f == ", f);

            //this.f = typeof(f) == 'string' ? f.charAt(0).toUpperCase() : 'M';

            if (typeof (f) == 'string') {
                this.f = f.charAt(0).toUpperCase();
            } else {
                this.f = 'M';
            }

            console.log("this.f == ", this.f);
        };

        // Goes to next month
        Calendar.prototype.nextMonth = function () {
            console.log("Calendar.prototype.nextMonth = function() {");

            if (this.CurrentMonth == 11) {
                console.log("this.CurrentMonth == ", this.CurrentMonth);

                this.CurrentMonth = 0;

                console.log("this.CurrentMonth == ", this.CurrentMonth);

                console.log("this.CurrentYear == ", this.CurrentYear);

                this.CurrentYear = this.CurrentYear + 1;

                console.log("this.CurrentYear == ", this.CurrentYear);
            } else {
                console.log("this.CurrentMonth == ", this.CurrentMonth);

                this.CurrentMonth = this.CurrentMonth + 1;

                console.log("this.CurrentMonth + 1 == ", this.CurrentMonth);
            }

            this.showCurrent();
            //  getchkvalues();
        };

        // Goes to previous month
        Calendar.prototype.previousMonth = function () {
            console.log("Calendar.prototype.previousMonth = function() {");

            if (this.CurrentMonth == 0) {
                console.log("this.CurrentMonth == ", this.CurrentMonth);

                this.CurrentMonth = 11;

                console.log("this.CurrentMonth == ", this.CurrentMonth);

                console.log("this.CurrentYear == ", this.CurrentYear);

                this.CurrentYear = this.CurrentYear - 1;

                console.log("this.CurrentYear == ", this.CurrentYear);
            } else {
                console.log("this.CurrentMonth == ", this.CurrentMonth);

                this.CurrentMonth = this.CurrentMonth - 1;

                console.log("this.CurrentMonth - 1 == ", this.CurrentMonth);
            }


            //  for(var i=1; i < Cmonth.length;i++) {
            //      userdataMonth[i]=Cmonth[i];
            //  }
            this.showCurrent();

            // getchkvalues();

        };

        // 
        Calendar.prototype.previousYear = function () {
            console.log(" ");

            console.log("Calendar.prototype.previousYear = function() {");

            console.log("this.CurrentYear == " + this.CurrentYear);

            this.CurrentYear = this.CurrentYear - 1;

            console.log("this.CurrentYear - 1 i.e. this.CurrentYear == " + this.CurrentYear);

            this.showCurrent();
        }

        // 
        Calendar.prototype.nextYear = function () {
            console.log(" ");

            console.log("Calendar.prototype.nextYear = function() {");

            console.log("this.CurrentYear == " + this.CurrentYear);

            this.CurrentYear = this.CurrentYear + 1;

            console.log("this.CurrentYear - 1 i.e. this.CurrentYear == " + this.CurrentYear);

            this.showCurrent();
        }

        // Show current month
        Calendar.prototype.showCurrent = function () {
            console.log(" ");

            console.log("Calendar.prototype.showCurrent = function() {");

            console.log("this.CurrentYear == ", this.CurrentYear);

            console.log("this.CurrentMonth == ", this.CurrentMonth);

            this.Calendar(this.CurrentYear, this.CurrentMonth);
            getarraydata();
        };

        // Show month (year, month)
        Calendar.prototype.Calendar = function (y, m) {
            console.log(" ");

            console.log("Calendar.prototype.Calendar = function(y,m){");

            typeof (y) == 'number' ? this.CurrentYear = y : null;

            console.log("this.CurrentYear == ", this.CurrentYear);

            typeof (y) == 'number' ? this.CurrentMonth = m : null;

            console.log("this.CurrentMonth == ", this.CurrentMonth);

            // 1st day of the selected month
            var firstDayOfCurrentMonth = new Date(y, m, 1).getDay();

            console.log("firstDayOfCurrentMonth == ", firstDayOfCurrentMonth);

            // Last date of the selected month
            var lastDateOfCurrentMonth = new Date(y, m + 1, 0).getDate();

            console.log("lastDateOfCurrentMonth == ", lastDateOfCurrentMonth);

            // Last day of the previous month
            console.log("m == ", m);

            var lastDateOfLastMonth = m == 0 ? new Date(y - 1, 11, 0).getDate() : new Date(y, m, 0).getDate();

            console.log("lastDateOfLastMonth == ", lastDateOfLastMonth);

            console.log("Print selected month and year.");

            // Write selected month and year. This HTML goes into <div id="year"></div>
            //var yearhtml = '<span class="yearspan">' + y + '</span>';

            // Write selected month and year. This HTML goes into <div id="month"></div>
            //var monthhtml = '<span class="monthspan">' + this.Months[m] + '</span>';

            // Write selected month and year. This HTML goes into <div id="month"></div>
            var monthandyearhtml = '<span id="monthandyearspan">' + this.Months[m] + '-' + y + '</span>';
            // alert (this.Months[m]+y);I will use this for month reference 
            console.log("monthandyearhtml == " + monthandyearhtml);

            var html = '<table id="tblcalender">';

            // Write the header of the days of the week
            html += '<tr>';

            console.log(" ");

            console.log("Write the header of the days of the week");

            for (var i = 0; i < 7; i++) {
                console.log("i == ", i);

                console.log("this.DaysOfWeek[i] == ", this.DaysOfWeek[i]);

                html += '<th class="daysheader">' + this.DaysOfWeek[i] + '</th>';
            }

            html += '</tr>';

            console.log("Before conditional operator this.f == ", this.f);

            //this.f = 'X';

            var p = dm = this.f == 'M' ? 1 : firstDayOfCurrentMonth == 0 ? -5 : 2;

            /*var p, dm;
             
             if(this.f =='M') {
             dm = 1;
             
             p = dm;
             } else {
             if(firstDayOfCurrentMonth == 0) {
             firstDayOfCurrentMonth == -5;
             } else {
             firstDayOfCurrentMonth == 2;
             }
             }*/

            console.log("After conditional operator");

            console.log("this.f == ", this.f);

            console.log("p == ", p);

            console.log("dm == ", dm);

            console.log("firstDayOfCurrentMonth == ", firstDayOfCurrentMonth);

            var cellvalue;

            for (var d, i = 0, z0 = 0; z0 < 6; z0++) {
                html += '<tr>';

                console.log("Inside 1st for loop - d == " + d + " | i == " + i + " | z0 == " + z0);

                for (var z0a = 0; z0a < 7; z0a++) {
                    console.log("Inside 2nd for loop");

                    console.log("z0a == " + z0a);

                    d = i + dm - firstDayOfCurrentMonth;

                    console.log("d outside if statm == " + d);

                    // Dates from prev month
                    if (d < 1) {
                        console.log("d < 1");

                        console.log("p before p++ == " + p);

                        cellvalue = lastDateOfLastMonth - firstDayOfCurrentMonth + p++;

                        console.log("p after p++ == " + p);

                        console.log("cellvalue == " + cellvalue);

                        //        html += '<td id="prevmonthdates">' + 
                        //              '<span id="cellvaluespan">' + (cellvalue) + '</span><br/>' + 
                        //              '<ul id="cellvaluelist"><li>apples</li><li>bananas</li><li>pineapples</li></ul>' + 
                        //            '</td>';
                        html += '<td id="prevmonthdates">' +
                                '<span id="cellvaluespan">' + (cellvalue) + '</span><br/>'
                        '</td>';

                        // Dates from next month
                    } else if (d > lastDateOfCurrentMonth) {
                        console.log("d > lastDateOfCurrentMonth");

                        console.log("p before p++ == " + p);

                        html += '<td id="nextmonthdates">' + (p++) + '</td>';

                        console.log("p after p++ == " + p);

                        // Current month dates
                    } else {


                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth() + 1; //January is 0!
                        var yyyy = today.getFullYear();

                        if (dd < 10) {
                            dd = '0' + dd
                        }

                        if (mm < 10) {
                            mm = '0' + mm
                        }

                        if ((parseInt(y)) < parseInt(yyyy)) {
                            html += '<td id="currentmonthdates">' + (d) + '<label id=' + 'lab' + (d) + ' class="calLabel"></label></td>';
                        } else if (parseInt((m + 1)) < parseInt(mm)) {
                            html += '<td id="currentmonthdates">' + (d) + '<label id=' + 'lab' + (d) + ' class="calLabel"></label></td>';
                        } else {
                            html += '<td id="currentmonthdates"><input class="Monthcheckall" onclick="getwork()" type="checkbox" id=' + (d) + ' value="ON" />' + (d) + '<label id=' + 'lab' + (d) + ' class="calLabel"></label></td>';
                        }



                        //        document.write(d);
                        console.log("d inside else { == " + d);

                        //  document.write(d);
                        // document.write(this.Months[m]);


                        p = 1;

                        console.log("p inside } else { == " + p);
                    }

                    if (i % 7 == 6 && d >= lastDateOfCurrentMonth) {
                        console.log("INSIDE if (i % 7 == 6 && d >= lastDateOfCurrentMonth) {");

                        console.log("i == " + i);

                        console.log("d == " + d);

                        console.log("z0 == " + z0);

                        z0 = 10; // no more rows
                    }

                    console.log("i before i++ == " + i);

                    i++;

                    console.log("i after i++ == " + i);
                }

                html += '</tr>';
            }

            // Closes table
            html += '</table>';

            // Write HTML to the div
            //document.getElementById("year").innerHTML = yearhtml;

            //document.getElementById("month").innerHTML = monthhtml;

            document.getElementById("monthandyear").innerHTML = monthandyearhtml;

            document.getElementById(this.divId).innerHTML = html;
        };

        // On Load of the window
        window.onload = function () {

            // Start calendar
            var c = new Calendar({
                ParentID: "divcalendartable",

                DaysOfWeek: [
                    'MON',
                    'TUE',
                    'WED',
                    'THU',
                    'FRI',
                    'SAT',
                    'SUN'
                ],

                Months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

                Format: 'dd/mm/yyyy'
            });

            c.showCurrent();

            // Bind next and previous button clicks
            getId('btnPrev').onclick = function () {

                c.previousMonth();
                searchavailibility();


                //  getchkvalues();
            };

            getId('btnPrevYr').onclick = function () {

                c.previousYear();

                //    
            };

            getId('btnNext').onclick = function () {

                c.nextMonth();
                searchavailibility();
                //        getarraydata();
                // getchkvalues();
            };

            getId('btnNextYr').onclick = function () {

                c.nextYear();
            };
        };
        function getchkvalues() {


            $('.Monthcheckall').each(function (i) {
                if (this.checked) {
                    Cmonth [i] = true;

                    document.getElementById('tablerequest').rows[i + 1].cells[1].innerHTML = document.getElementById('monthandyear').textContent + Cmonth[i];

                    //assign value to month variable on checkall=true
                } else {
                    Cmonth[i] = false;
                    document.getElementById('tablerequest').rows[i + 1].cells[1].innerHTML = document.getElementById('monthandyear').textContent + Cmonth[i];
                }
            });

        }

        function getId(id) {
            return document.getElementById(id);
        }
        function getwork() {

            //function changecelltext(id){
            //    var v='lab'+id;
            //   document.getElementById(v).innerHTML="available";  
            //    
            //}   


            var labcount = 0;
            $('.Monthcheckall').each(function (i) {

                if (this.checked) {

                    Cmonth [i] = true;//                  

                } else {

                    Cmonth[i] = false;//                
                }
                //assign value to month variable on checkall=true    


            });
            var monthandyear = document.getElementById('monthandyear').textContent;

            if (typeof Cmonth[29] !== 'undefined') {
                Cmonth[29] = false;
            }

            if (typeof Cmonth[30] !== 'undefined') {
                Cmonth[30] = false;
            }

            if (typeof Cmonth[31] !== 'undefined') {
                Cmonth[31] = false;
            }

            //if month is less then 3 then create array for 29 30 and 31 days as false 

            //CREAT 31 DAYS CALENDER COLUMN IN TABULAR FORMAT IN ARRAY

            //duplication validation 
            var addtype = "New";
            var ln = Calendardata.length;
            var Day29 = "";
            // Calendardata.remove(1);
            //       alert(ln);
            if (ln > 0) {

                //            addtype='Edit';ln=i;break}
                //check mmonthname already in exist
                for (var i = 1; i < ln; i++) {
                    if (Calendardata[i].monthandyear == monthandyear) {
                        ln = i;
                        break
                    }
                }
                Calendardata[i] = {
                    "monthandyear": monthandyear
                    , "Day1": Cmonth[1], "Day2": Cmonth[2], "Day3": Cmonth[3], "Day4": Cmonth[4], "Day5": Cmonth[5], "Day6": Cmonth[6], "Day7": Cmonth[7], "Day8": Cmonth[8]
                    , "Day9": Cmonth[9], "Day10": Cmonth[10], "Day11": Cmonth[11], "Day12": Cmonth[12], "Day13": Cmonth[13], "Day14": Cmonth[14], "Day15": Cmonth[15], "Day16": Cmonth[16], "Day17": Cmonth[17], "Day18": Cmonth[18]
                    , "Day19": Cmonth[19], "Day20": Cmonth[20], "Day21": Cmonth[21], "Day22": Cmonth[22], "Day23": Cmonth[23], "Day24": Cmonth[24], "Day25": Cmonth[25], "Day26": Cmonth[26], "Day27": Cmonth[27], "Day28": Cmonth[28]
                    , "Day29": Cmonth[29], "Day30": Cmonth[30], "Day31": Cmonth[31]};
                Calendardata.shift();  // first row will be empty - so remove

            } else {
                if (ln == 0) {
                    ln = 1;
                }

                Calendardata[ln] = {
                    "monthandyear": monthandyear
                    , "Day1": Cmonth[1], "Day2": Cmonth[2], "Day3": Cmonth[3], "Day4": Cmonth[4], "Day5": Cmonth[5], "Day6": Cmonth[6], "Day7": Cmonth[7], "Day8": Cmonth[8]
                    , "Day9": Cmonth[9], "Day10": Cmonth[10], "Day11": Cmonth[11], "Day12": Cmonth[12], "Day13": Cmonth[13], "Day14": Cmonth[14], "Day15": Cmonth[15], "Day16": Cmonth[16], "Day17": Cmonth[17], "Day18": Cmonth[18]
                    , "Day19": Cmonth[19], "Day20": Cmonth[20], "Day21": Cmonth[21], "Day22": Cmonth[22], "Day23": Cmonth[23], "Day24": Cmonth[24], "Day25": Cmonth[25], "Day26": Cmonth[26], "Day27": Cmonth[27], "Day28": Cmonth[28]
                    , "Day29": true, "Day30": true, "Day31": false};

                Calendardata.shift();  // first row will be empty - so remove

            }
            document.getElementById('btn-tab3save').click();

//           alert(Calendardata.length); 




            //                if (ln == 0){
            //                     ln=1;
            //                }else{
            //                  addtype='Edit';
            //                }
            //            
            //                if (typeof Cmonth[29] !== 'undefined') {   Day29 = "";  }else { Day29 = Cmonth[29];}
            //                if (addtype=="New"){
            //                    
            //                   Calendardata[ln]={
            //                     "monthandyear" : monthandyear
            //                     , "Day1" :Cmonth[1], "Day2" :Cmonth[2],"Day3" :Cmonth[3], "Day4" :Cmonth[4],"Day5" :Cmonth[5], "Day6" :Cmonth[6],"Day7" :Cmonth[7], "Day8" :Cmonth[8]
            //                      ,"Day9" :Cmonth[9], "Day10" :Cmonth[10],"Day11" :Cmonth[11], "Day12" :Cmonth[12],"Day13" :Cmonth[13], "Day14" :Cmonth[14],"Day15" :Cmonth[15], "Day16" :Cmonth[16],"Day17" :Cmonth[17], "Day18" :Cmonth[18]
            //                    ,"Day19" :Cmonth[19], "Day20" :Cmonth[20],"Day21" :Cmonth[21], "Day22" :Cmonth[22],"Day23" :Cmonth[23], "Day24" :Cmonth[24],"Day25" :Cmonth[25], "Day26" :Cmonth[26],"Day27" :Cmonth[27], "Day28" :Cmonth[28]
            //                    ,"Day29" :true, "Day30" :true,"Day31" :false};
            //                
            //        Calendardata.shift();  // first row will be empty - so remove

            document.getElementById('tablerequest').rows[2].cells[3].innerHTML = Calendardata[1].Day8;

            //                        if (ln==1) {
            //                            alert (Calendardata.length);
            //                        }else {
            //                             alert (Calendardata.length);
            //
            //                    };
            //                }else {



            //                    Calendardata[ln]={
            //                     "monthandyear" : monthandyear
            //                     , "Day1" :Cmonth[1], "Day2" :Cmonth[2],"Day3" :Cmonth[3], "Day4" :Cmonth[4],"Day5" :Cmonth[5], "Day6" :Cmonth[6],"Day7" :Cmonth[7], "Day8" :Cmonth[8]
            //                      ,"Day9" :Cmonth[9], "Day10" :Cmonth[10],"Day11" :Cmonth[11], "Day12" :Cmonth[12],"Day13" :Cmonth[13], "Day14" :Cmonth[14],"Day15" :Cmonth[15], "Day16" :Cmonth[16],"Day17" :Cmonth[17], "Day18" :Cmonth[18]
            //                    ,"Day19" :Cmonth[19], "Day20" :Cmonth[20],"Day21" :Cmonth[21], "Day22" :Cmonth[22],"Day23" :Cmonth[23], "Day24" :Cmonth[24],"Day25" :Cmonth[25], "Day26" :Cmonth[26],"Day27" :Cmonth[27], "Day28" :Cmonth[28]
            //                    ,"Day29" :Day29, "Day30" :false,"Day31" :true};

            //                };
        }

        function searchavailibility(type = "") {

            var OfficerName = document.getElementById('Op_Officername').value;
            var Officer_id = document.getElementById('textOfficerid').value;
            var monthandyear = currmon;
         
            var monthandyear = document.getElementById('monthandyear').textContent;
               
            if (monthandyear.trim() == "") {
                var monthandyear = currmon;
            }

            $("#loading").show(); // Show  the loading



            $.ajax({
                type: "POST", // The method of sending data can be with GET or POST
                url: "availibilitysearch.php", // Fill in url / php file path to destination
                //  alert ($("#id").val());
                data: {Officer_id: Officer_id, OfficerName: OfficerName, monthandyear: monthandyear}, // data to be sent to the process file
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (response) { // When the submission process is successful
                    $("#loading").hide(); // Hide loading

                    if (response.status == "success") { // If the content of the status array is success
                        //alert(response);
                        // alert(response.Day2);   

                        document.getElementById('1').checked = response.Day1;
                        document.getElementById('2').checked = response.Day2;
                        document.getElementById('3').checked = response.Day3;
                        document.getElementById('4').checked = response.Day4;
                        document.getElementById('5').checked = response.Day5;
                        document.getElementById('6').checked = response.Day6;
                        document.getElementById('7').checked = response.Day7;
                        document.getElementById('8').checked = response.Day8;
                        document.getElementById('9').checked = response.Day9;
                        document.getElementById('10').checked = response.Day10;
                        document.getElementById('11').checked = response.Day11;
                        document.getElementById('12').checked = response.Day12;
                        document.getElementById('13').checked = response.Day13;
                        document.getElementById('14').checked = response.Day14;
                        document.getElementById('15').checked = response.Day15;
                        document.getElementById('16').checked = response.Day16;
                        document.getElementById('17').checked = response.Day17;
                        document.getElementById('18').checked = response.Day18;
                        document.getElementById('19').checked = response.Day19;
                        document.getElementById('20').checked = response.Day20;
                        document.getElementById('21').checked = response.Day21;
                        document.getElementById('22').checked = response.Day22;
                        document.getElementById('23').checked = response.Day23;
                        document.getElementById('24').checked = response.Day24;
                        document.getElementById('25').checked = response.Day25;
                        document.getElementById('26').checked = response.Day26;
                        document.getElementById('27').checked = response.Day27;
                        document.getElementById('28').checked = response.Day28;
                        document.getElementById('29').checked = response.Day29;
                        document.getElementById('30').checked = response.Day30;
                        document.getElementById('31').checked = response.Day31;



                    } else { // If the contents of the status array are failed

                        // alert('Failed');


                        //   alert("No Record Found ");


                    }
                },
                error: function (xhr, ajaxOptions, thrownError) { // When there is an error
                    alert(xhr.responseText);
                }
            });
        }


    </script>
    <script>
        $(document).ready(function () {

            $('#tab3Srchtext').keyup(function () {
                search_table($(this).val());
            });
            function search_table(value) {
                $('#tablerequest tr').each(function () {
                    var found = 'false';
                    $(this).each(function () {
                        if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                        {
                            found = 'true';
                        }

                    });
                    if (this.rowIndex >= 1) {
                        if (found == 'true')
                        {
                            $(this).show();
                        } else
                        {
                            $(this).hide();
                        }
                    }
                });
            }
        });
    </script>  
</html>
