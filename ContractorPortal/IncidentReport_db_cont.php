<?php

include './dbconnection.php';

$mode = $_POST["mode"];

if ($mode == "Detailed") {
    $x = 1;
    $Total = 0;
    $from = $_POST["from"];
    $to = $_POST["to"];
    $contractor_id = $_POST["contractor_id"];
    $incident = $_POST["incident"];
    $filter1 = "";
    $filter2 = "";
    $filter3 = "";

//Joining Query to get contractors officers as there is no contractor in report table
    $i = 0;
    $sql = "SELECT `tbl_officer_report`.* , `tbl_employee`.`contractor_id`,`tbl_employee`.contractor,tbl_employee.EmployeeID FROM `tbl_officer_report` JOIN `tbl_employee` ON `tbl_officer_report`.`OfficerId`=`tbl_employee`.`EmployeeID` WHERE `tbl_employee`.`contractor_id`=1120";
//echo $sql;
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $shiftid [$i] = $row['EmployeeID'];
            $i = $i + 1;
        }
    } else {
        echo 'No Data Found';
    }

    $shiftid_str = implode(",", $shiftid);
    if ($shiftid_str != "") {
        $search = "AND `tbl_officer_report`.OfficerId IN ($shiftid_str)";
    } else {
        $search = "";
    }



    if ($from != "") {
        $filter1 = "Date(Date)>= '$from' ";
    }
    if ($to != "") {
        $filter2 = "AND Date(Date)<='$to'";
    } if ($incident != "" && $incident != "All") {
        $filter3 = "AND Status='$incident'";
    }

    $criteria = $filter1 . $filter2 . $filter3;

    $sql = "SELECT * FROM `tbl_officer_report` WHERE $criteria";
//echo $sql;

    $result = mysqli_query($connect, $sql);

    $output = '';


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $output .= '
              <tr class="table-row">
                  
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="Date">' . $row["Date"] . '</td>
                     <td class="col col-3" data-label="Officer Name">' . $row["OfficerName"] . '</td>
                     <td class="col col-4" data-label="Customer Name">' . $row["customer_name"] . '</td>
                     <td class="col col-1" data-label="Location">' . $row["Location"] . '</td>
                     <td class="col col-2" data-label="Duty Start">' . $row["DutyStart"] . '</td>
                     <td class="col col-3" data-label="Status">' . $row["Status"] . '</td>
                     <td class="col col-4" data-label="Description">' . $row['Description'] . '</td>
                     
                   

              </tr>
              ';
            $Total = $x;
            $x++;
        }



        echo $output;
    } else {
        $output .= '
             <tr>
              <td colspan="8" align="center">No Data Found</td>
             </tr>
             ';
    }

    mysqli_close($connect);
}