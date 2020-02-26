<?php

include './dbconnection.php';
$from = $_POST["from"];
$mode = $_POST["mode"];
$Contractor_id = $_POST['Contractor_id'];
if ($mode == "fetch") {
    UpdateLate();

    $output = '';
    $x = 1;
    $sql = "SELECT `DutyStart`, COUNT(`DutyStart`) AS TotalShifts, COUNT(IF(bookOn != '00:00:00', 1, null)) AS bookOn, COUNT(IF(Precheck != '00:00:00', 1, null)) AS Precheck, COUNT(IF(late != '0' AND late != '' AND late != 'On Time', 1, null)) AS late FROM `tbl_dutyschedule` WHERE DATE(`DutyStart`) = '" . $from . "' AND `duty_status` = 'Confirmed' AND `Branch_id`='" . $Contractor_id . "'";
    echo $sql;

    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {

        $output .= '
              <tr class="table-row" >
                  
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="From">' . $from . '</td>
                     <td class="col col-3" data-label="Total Shifts"><b><a href="#" class="totalshifts" style="color:black;">' . $row["TotalShifts"] . '</a></b></td>
                     <td class="col col-4" data-label="Total Pre Check"><b><a href="#" class="totalprecheck" style="color:blue;">' . $row["Precheck"] . '</a></b></td>
                     <td class="col col-1" data-label="Total Book On"><b><a href="#" class="totalbookon" style="color:green;">' . $row["bookOn"] . '</a></b></td>
                     <td class="col col-2" data-label="Total Lates"><b><a href="#" class="totallate" style="color:red;">' . $row["late"] . '</a></b></td>
              </tr>
              ';

        echo $output;
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "TotalShifts") {

    $output = '';
    $x = 1;
    $sql = "SELECT * FROM `tbl_dutyschedule` WHERE DATE(`DutyStart`) = '" . $from . "' AND `duty_status` = 'Confirmed' AND `Branch_id`='" . $Contractor_id . "'";
//echo $sql;


    $result = mysqli_query($connect, $sql);



    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {


            $output .= '
              <tr class="table-row">
                  
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="Customer">' . $row["customer_name"] . '</td>
                     <td class="col col-3" data-label="Location">' . $row["Location"] . '</td>
                     <td class="col col-4" data-label="Duty Start">' . $row["DutyStart"] . '</td>
                     <td class="col col-1" data-label="Duty Finish">' . $row["DutyFinish"] . '</td>
                     <td class="col col-2" data-label="Officer">' . $row["OfficerName"] . '</td>
                    
              </tr>
              ';
            $x++;
        }
        echo $output;
    } else {

        echo 'No Data Found';
    }
} else if ($mode == "TotalPreCheck") {
    $output = '';
    $x = 1;
    $sql = "SELECT * FROM `tbl_dutyschedule` WHERE DATE(`DutyStart`) = '" . $from . "' AND `duty_status` = 'Confirmed' AND `Precheck`!='00:00:00' AND `Branch_id`='" . $Contractor_id . "' ";
    ;


    $result = mysqli_query($connect, $sql);



    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {


            $output .= '
              <tr class="table-row">
                  
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="Customer Name">' . $row["customer_name"] . '</td>
                     <td class="col col-3" data-label="Location">' . $row["Location"] . '</td>
                     <td class="col col-4" data-label="Duty Start">' . $row["DutyStart"] . '</td>
                     <td class="col col-1" data-label="Duty Finish">' . $row["DutyFinish"] . '</td>
                     <td class="col col-2" data-label="Officer Name">' . $row["OfficerName"] . '</td>
                    <td class="col col-4" data-label="Pre Check Time">' . $row["Precheck"] . '</td>
              </tr>
              ';
            $x++;
        }
//        echo $output;
    } else {
        $output .= '
              <tr colspan="8">
                     <td>No Data Found</td>
              </tr>
              ';
    }
    echo $output;
} else if ($mode == "TotalBookOn") {
    $output = '';
    $x = 1;
    $sql = "SELECT * FROM `tbl_dutyschedule` WHERE DATE(`DutyStart`) = '" . $from . "' AND `duty_status` = 'Confirmed' AND `bookOn`!='00:00:00' AND `Branch_id`='" . $Contractor_id . "'";


//echo $sql;


    $result = mysqli_query($connect, $sql);



    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {


            $output .= '
              <tr class="table-row">
                  
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-1" data-label="Customer">' . $row["customer_name"] . '</td>
                     <td class="col col-1" data-label="Location">' . $row["Location"] . '</td>
                     <td class="col col-1" data-label="Duty Start">' . $row["DutyStart"] . '</td>
                     <td class="col col-1" data-label="Duty Finish">' . $row["DutyFinish"] . '</td>
                     <td class="col col-1" data-label="Officer Name">' . $row["OfficerName"] . '</td>
                     <td class="col col-1" data-label="Book On Time">' . $row["bookOn"] . '</td>
              </tr>
              ';
            $x++;
        }
        echo $output;
    } else {

        echo 'No Data Found';
    }
} else if ($mode == "TotalLate") {
    $output = '';
    $x = 1;
    $sql = "SELECT * FROM `tbl_dutyschedule` WHERE DATE(`DutyStart`) = '" . $from . "' AND `duty_status` = 'Confirmed' AND `late`!='0' AND `late`!='' AND `late`!='On Time' AND `Branch_id`='" . $Contractor_id . "'";
//echo $sql;


    $result = mysqli_query($connect, $sql);



    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {


            $output .= '
              <tr class="item" style="text-align:center;">
                  
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="Customer">' . $row["customer_name"] . '</td>
                     <td class="col col-3" data-label="Location">' . $row["Location"] . '</td>
                     <td class="col col-4" data-label="Duty Start">' . $row["DutyStart"] . '</td>
                     <td class="col col-1" data-label="Duty Finish">' . $row["DutyFinish"] . '</td>
                     <td class="col col-2" data-label="Officer">' . $row["OfficerName"] . '</td>
                     <td class="col col-4" data-label="Late In Minutes">' . $row["late"] . '</td>
              </tr>
              ';
            $x++;
        }
        echo $output;
    } else {

        $output .= '
              <tr class="item" style="text-align:center;">
                  
                     <td colspan="9">No Data Found</td>
                     
              </tr>
              ';
        echo $output;
    }
}

function UpdateLate() {

    include './dbconnection.php';
    $from = $_POST["from"];
    $sql = "SELECT * FROM `tbl_dutyschedule` WHERE DATE(`DutyStart`)='" . $from . "' AND `duty_status`='Confirmed' AND (`late`='' OR `late`='0') ";
    //echo $sql;

    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {


            if ($row["bookOn"] == "" || $row["bookOn"] == "00:00:00") {
                $booktime = 0;
                $late = "";
            } else {
                $booktime = $row["bookOn"];
                $to_time = strtotime(date('H:s:i', strtotime($row["DutyStart"])));
                $from_time = strtotime($booktime);
                $late = round(($to_time - $from_time) / 60, 2);
                if ($late > 0) {
                    $late = "On Time";
                }
            }


            $sql = "UPDATE `tbl_dutyschedule` SET late='" . $late . "' WHERE ID=" . $row["ID"] . "";

            if (mysqli_query($connect, $sql)) {
                //            echo 'Record has been Updated Succesfully';
            } else {
                echo "ERROR IN QUERY" . $connect->error;
            };
        }
    } else {

        echo 'No Data Found';
    }
}
