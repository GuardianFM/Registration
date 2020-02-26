<?php

include('dbconnection.php');

$mode = $_POST['mode'];
if ($mode == "Fetch") {
    $i = 1;


    $type = 'Contact';


    date_default_timezone_set('Europe/London');

    $nowtime = new DateTime();
    $curtime = $nowtime->format('Y-m-d H:i:s');
    $nowdate = new DateTime();
    $curtdate = $nowdate->format('Y-m-d');
    $nextdate = date('Y-m-d', strtotime(' +2 day', strtotime($curtdate)));
    $Status = $_POST['Status'];
    $contractor_id = $_POST['contractor_id'];
    $search_text = "select * from  tbl_dutyschedule ORDER BY DutyStart ASC";


//  $sql = "select * from  tbl_dutyschedule   where DATE(DutyStart) >= '$curtdate'  and DATE(DutyStart) <'$nextdate'  and duty_status='Confirmed' ORDER BY DutyStart ASC";

    $sql = "SELECT `ID`, `OID`, tbl_dutyschedule.`Branch_id`, tbl_contractors.contractor as Branch, tbl_dutyschedule.`Location_ID`,tbl_locations.Location , `Event_Type`,

`DutyStart`, `DutyFinish`, `PBRule`, `Hours`, `Rate`, `Amount`, `duty_status`, `Officer_id`, tbl_employee.shortname  as `OfficerName`, tbl_employee.telephone ,tbl_employee.sia ,tbl_employee.telephone as mobile, `account_id`, `account_name`,

tbl_dutyschedule.`RefID`, `PaidAmount`, `Duplicate`, `book_type`, tbl_dutyschedule.`customer_id` , tbl_customers.customer as customer_name,tbl_customers.email as email, tbl_dutyschedule.`RegionID`, tbl_dutyschedule.`region`, `shiftexpense`, `type`, `ReadyToClaim`, `claim`, `paid_status`, `netamount`, `StatusChk`,`remarks`, `importID`, tbl_dutyschedule.`postcode`, `Bokdate`, `jobdate`, `paid`

FROM `tbl_dutyschedule` JOIN tbl_locations ON tbl_locations.LocationID=tbl_dutyschedule.Location_ID JOIN tbl_customers ON tbl_customers.customer_id=tbl_dutyschedule.customer_id JOIN tbl_contractors ON tbl_contractors.contractor_id=tbl_dutyschedule.Branch_id left JOIN tbl_employee ON tbl_employee.EmployeeID=tbl_dutyschedule.Officer_id

where DATE(DutyStart) > '$curtdate' and duty_status='$Status' AND tbl_dutyschedule.Branch_id='$contractor_id'  ORDER BY DutyStart ASC";

//}SELECT * from tbl_ledger JOIN db_accountdtl ON db_accountdtl.account_id=tbl_ledger.AccountID where account_type='SUPPLIER' AND account_name='A.Louaked'
//echo $sql;
    $result = mysqli_query($connect, $sql);

    $output = '';

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $jobstart = new DateTime($row["DutyStart"]);
            $jobstartdate = $jobstart->format('d-m-Y');
            $jobstarttime = $jobstart->format('H:s:i');


            $jobfinish = new DateTime($row["DutyFinish"]);
            $jobfinishdate = $jobfinish->format('d-m-Y');
            $jobfinishtime = $jobfinish->format('H:s:i');

            $output .= '
              <tr class="table-row">
                                      
                     
                        <td class="col col-1" data-label="S No."><b>' . $i . '</b></td>    
                        <td class="col col-2" data-label="Location">' . $row["Location"] . '</td>
                        <td class="col col-3" data-label="Post">' . $jobstartdate . '  ' . $jobstarttime . ' - ' . $jobfinishtime . '</td>
                        <td class="col col-4" data-label="Employee" >' . $row["OfficerName"] . '</td>
                        <td class="col col-1" data-label="Contact" style="display:none;" >' . $row["mobile"] . '</td>
                        <td class="col col-2" data-label="Remarks" contenteditable id="remarks" data-id="' . $row['ID'] . '">' . $row["remarks"] . ' </td>
                            
                       
                   

              </tr>
              ';
            $i = $i + 1;
        }

        mysqli_close($connect);
    } else {
        $output .= '
             <tr class="table-row">
              <td class="col col-1" data-label="" colspan="5" align="center">No Data Found</td>
             </tr>
             ';
    }

    echo $output;
} elseif ($mode == "Update") {


    include './dbconnection.php';
    $id = $_POST['id'];
    $remarks = $_POST['remarks'];


    $sql = "UPDATE `tbl_dutyschedule` SET `remarks`='" . $remarks . "' WHERE ID=" . $id . "";

    if (mysqli_query($connect, $sql)) {
        echo 'remarks has been Updated Succesfully ';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
} else if ($mode == 'Available') {
    $id = $_POST['id'];


    /* ============================================Showing Available Jobs in 25Miles Radius========================================================= */
    $x = 1;
    $ContractorLat = 0;
    $ContractorLong = 0;
    $SiteLat = 0;
    $SiteLong = 0;
    $i = 0;
    $distance_reaius = $_POST['mile']; // $_POST['distance'];
    $output = '';

    $sql = "SELECT * FROM `tbl_contractors` WHERE `contractor_id`='$id'";
//    echo $sql;
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {

        $ContractorLat = $row['cont_latitude'];
        $ContractorLong = $row['cont_longitude'];
    } else {

        echo 'No Data Found';
    }


    $sql = "SELECT `tbl_locations`.`Location`,`tbl_locations`.postcode,`tbl_locations`.`latitude`,`tbl_locations`.`longitude`,`tbl_dutyschedule`.`ID`, `tbl_dutyschedule`.`DutyStart`, `tbl_dutyschedule`.`DutyFinish`, `tbl_dutyschedule`.`Hours`, `tbl_dutyschedule`.`Rate`, `tbl_dutyschedule`.`Amount` FROM `tbl_dutyschedule` JOIN `tbl_locations` ON `tbl_locations`.LocationID=`tbl_dutyschedule`.Location_ID WHERE `tbl_locations`.`latitude`!=0 AND `tbl_locations`.`longitude`!=0 AND Date(`DutyStart`)>='" . date("Y-m-d") . "' AND `tbl_dutyschedule`.`duty_status`='Pending' ";
//    echo $sql;
    $result = mysqli_query($connect, $sql);

//    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $SiteLat = $row["latitude"];
            $SiteLong = $row["longitude"];

            $distance = round(geodistance($SiteLat, $SiteLong, $ContractorLat, $ContractorLong, "K") * 1000, 2);
            if ($distance <= $distance_reaius) {
                $output .= '
              <tr class="table-row" style="text-align:center;">    
                    <td class="col col-1" data-label="S No.">' . $x . '</td>
                    <td class="col col-2" data-label="Location">' . $row['Location'] . '</td>
                        <td class="col col-2" data-label="Distance">' . $distance . ' Miles</td>
                    <td class="col col-3" data-label="Duty Start">' . $row['DutyStart'] . '</td>
                    <td class="col col-4" data-label="Duty Finish">' . $row['DutyFinish'] . '</td>
                    <td class="col col-1" data-label="Hours">' . $row['Hours'] . '</td>
                    <td class="col col-2" data-label="Rate">' . $row['Rate'] . '</td>
                     <td class="col col-3" data-label="Amount">' . $row['Hours'] * $row['Rate'] . '</td>                    
              </tr>
              ';
                $x++;
            }
        }
    } else {
        $output .= '
          <tr>
          <td colspan="4" align="center">No Data Found</td>
          </tr>
          ';
    }
    echo $output;
}

function geodistance($lat1, $lon1, $lat2, $lon2, $unit) {
    if (($lat1 == $lat2) && ($lon1 == $lon2)) {
        return 0;
    } else {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            $miles = (($miles * 1.609344) / 1609.34); //-15 to get exact figures compare to google map; Dividing by 1000 so that answer would be in KM

            return $miles;
        } else if ($unit == "N") {
            $miles = ($miles * 0.8684);
            return $miles;
        } else {
            $miles = $miles;
            return $miles;
        }
    }
}
