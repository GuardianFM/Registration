<?php

include "./dbconnection.php"; // Load file connection.php

$mode = $_POST['mode'];
$x = 1;

if ($mode == 'Schedule') {
    $id = $_POST['id'];
    $CurrentDate = date("Y-m-d");
    $sql = "SELECT * FROM `tbl_dutyschedule` WHERE DATE(`DutyStart`)>='$CurrentDate' AND `Officer_id`='$id' AND `duty_status`='Confirmed'";
//       echo $sql;

    $result = mysqli_query($connect, $sql);

    $output = '';


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {


            $output .= '
              <tr class="table-row" style="text-align:center;">    
                    <td class="col col-1" data-label="S No.">' . $x . '</td>
                    <td class="col col-2" data-label="Officer Name">' . $row['OfficerName'] . '</td>
                    <td class="col col-3" data-label="Location">' . $row['Location'] . '</td>
                    
                    <td class="col col-4" data-label="Duty Start">' . $row['DutyStart'] . '</td>
                    <td class="col col-1" data-label="Duty Finish">' . $row['DutyFinish'] . '</td>
                    <td class="col col-2" data-label="Hours">' . $row['Hours'] . '</td>
                    <td class="col col-3" data-label="Rate">' . $row['Rate'] . '</td>
                        <td class="col col-4" data-label="Amount">' . $row['Amount'] . '</td>
                            <td class="col col-1" data-label="Status">' . $row['paid_status'] . '</td>
          
              </tr>
              ';
            $x++;
        }
        echo $output;
    } else {
        $output .= '
             <tr class="table-row">
              <td class="col col-1" colspan="14" align="center">No Data Found</td>
             </tr>
             ';
    }
} else if ($mode == 'Available') {
    $id = $_POST['id'];
    $z = 0;
    $CurrentDate = date("Y-m-d");
    $shiftid = array();
    $sql2 = "SELECT * FROM `tbl_employee` WHERE `EmployeeID`='$id'";
    $result2 = mysqli_query($connect, $sql2);
    $output = '';
    $row2 = mysqli_fetch_array($result2);
    if (mysqli_num_rows($result2) > 0) {
        $OfficerLat = $row2['emp_latitude'];
        $OfficerLong = $row2['emp_longitude'];

        //scanning job accept
//        $sql = "SELECT tbl_jobaccept.Status,tbl_jobaccept.shiftid, tbl_dutyschedule.* FROM `tbl_dutyschedule` JOIN tbl_jobaccept ON tbl_jobaccept.shiftid=tbl_dutyschedule.ID WHERE tbl_jobaccept.officerid='$id' AND DATE(tbl_dutyschedule.DutyStart)>'$CurrentDate' AND tbl_jobaccept.Status!='Approve'";
        $sql = "SELECT tbl_jobaccept.Status,tbl_jobaccept.shiftid, tbl_dutyschedule.* FROM `tbl_dutyschedule` JOIN tbl_jobaccept ON tbl_jobaccept.shiftid=tbl_dutyschedule.ID WHERE tbl_jobaccept.officerid='$id' AND tbl_jobaccept.Status!='Approve'";


        //        echo $sql;

        $result = mysqli_query($connect, $sql);


        $selshiftid = '';

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
                $distance = round(geodistance(Location_Lat_Long($row['Location_ID'])[0], Location_Lat_Long($row['Location_ID'])[1], $OfficerLat, $OfficerLong, "K") * 1000, 2);
                $shiftid [$z] = $row['shiftid'];
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
          <td id="acceptstatus" class="col col-4" data-label="Status">' . $row['Status'] . '</td>
          <td class="col col-1" data-label="Accept Job"><a href="#" title="Accept Job" class="acceptjob "  data-id="' . $row['ID'] . '" data-email="' . $row2['email'] . '" ><i  class="far fa-thumbs-up" aria-hidden="true" style="font-size:18px; color:green;"></i></a></td>
          <td class="col col-2" data-label="Decline Job"><a href="#" title="Decline Job" class="declinejob" data-id="' . $row['ID'] . '" data-email="' . $row2['email'] . '"><i class="far fa-thumbs-down" style="font-size:18px; color:darkred" ></i></a></td>

          </tr>
          ';
                $x++;
                $z++;
            }
        } else {
//            $output .= '
//                         <tr>
//                          <td colspan="14" align="center">No Data Found</td>
//                         </tr>
//                         ';
        }

        $shiftid_str = implode(",", $shiftid);
        if ($shiftid_str != "") {
            $search = "AND `tbl_dutyschedule`.ID NOT IN ($shiftid_str)";
        } else {
            $search = "";
        }
    } else {
        echo 'No Data Found';
    }


    /* ============================================Showing Available Jobs in 25Miles Radius========================================================= */
    $x = 1;
    $OfficerLat = 0;
    $OfficerLong = 0;
    $SiteLat = 0;
    $SiteLong = 0;
    $emp_email = '';
    $i = 0;
    $distance_reaius = 25; // $_POST['distance'];


    $sql = "SELECT * FROM `tbl_employee` WHERE EmployeeID='$id'";
//    echo $sql;
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {

        $OfficerLat = $row['emp_latitude'];
        $OfficerLong = $row['emp_longitude'];
        $emp_email = $row['email'];
    } else {

        echo 'No Data Found';
    }


    $sql = "SELECT `tbl_locations`.`Location`,`tbl_locations`.postcode,`tbl_locations`.`latitude`,`tbl_locations`.`longitude`,`tbl_dutyschedule`.`ID`, `tbl_dutyschedule`.`DutyStart`, `tbl_dutyschedule`.`DutyFinish`, `tbl_dutyschedule`.`Hours`, `tbl_dutyschedule`.`Rate`, `tbl_dutyschedule`.`Amount` FROM `tbl_dutyschedule` JOIN `tbl_locations` ON `tbl_locations`.LocationID=`tbl_dutyschedule`.Location_ID WHERE `tbl_locations`.`latitude`!=0 AND `tbl_locations`.`longitude`!=0 AND Date(`DutyStart`)>='" . date("Y-m-d") . "' AND `tbl_dutyschedule`.`duty_status`='Pending'  $search";
//    echo $sql;
    $result = mysqli_query($connect, $sql);

//    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $SiteLat = $row["latitude"];
            $SiteLong = $row["longitude"];

            $distance = round(geodistance($SiteLat, $SiteLong, $OfficerLat, $OfficerLong, "K") * 1000, 2);
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
                     <td class="col col-4" data-label="Status"></td>
                     <td class="col col-1" data-label="Accept Job"><a href="#" title="Accept Job" class="acceptjob" data-id="' . $row['ID'] . '" data-email="' . $emp_email . '"><i  class="far fa-thumbs-up" aria-hidden="true" style="font-size:18px; color:green;"></i></a></td>
                     <td class="col col-2" data-label="Decline Job"><a href="#" title="Decline Job" class="declinejob" data-id="' . $row['ID'] . '" data-email="' . $emp_email . '"><i class="far fa-thumbs-down" style="font-size:18px; color:darkred" ></i></a></td>
	
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
} else if ($mode == 'JobStatusInsert') {


    $shiftid = $_POST['shiftid'];
    $jobstatus = $_POST['jobstatus'];
    $officerid = $_POST['officerid'];
    $oname = $_POST['oname'];


    $sql2 = "SELECT telephone FROM `tbl_employee` WHERE EmployeeID=$officerid";
    $result2 = mysqli_query($connect, $sql2);

    $row2 = mysqli_fetch_array($result2);
    if (mysqli_num_rows($result2) > 0) {

        $sql = "SELECT * FROM `tbl_jobaccept` WHERE officerid=$officerid AND shiftid=$shiftid";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0) {

            $sql2 = "UPDATE `tbl_jobaccept` SET Status='" . $jobstatus . "' WHERE officerid=$officerid AND shiftid=$shiftid";

            if (mysqli_query($connect, $sql2)) {

                echo 'Your request has been updated succesfully ';
            } else {

                echo "ERROR IN QUERY" . $connect->error;
            };
        } else {
//            echo 'No Data Found';
            $sql3 = "INSERT INTO `tbl_jobaccept`(`shiftid`, `officerid`, `officername`, `Status`,`phone`) VALUES ('$shiftid','$officerid','$oname','$jobstatus','" . $row2['telephone'] . "') ";



            if (mysqli_query($connect, $sql3)) {
                echo "You have successfully applied for this job";
            } else {

                echo "Error: " . $sql3 . "<br>" . mysqli_error($connect);
            }
        }
    } else {
        echo 'No Data Found';
    }
} else if ($mode == 'JobStatusUpdate') {





    $shiftid = $_POST['shiftid'];
    $jobstatus = $_POST['jobstatus'];
    $officerid = $_POST['officerid'];
    $oname = $_POST['oname'];


    $sql = "SELECT * FROM `tbl_jobaccept` WHERE officerid=$officerid AND shiftid=$shiftid";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $sql2 = "UPDATE `tbl_jobaccept` SET Status='" . $jobstatus . "' WHERE officerid=$officerid AND shiftid=$shiftid";

        if (mysqli_query($connect, $sql2)) {
            echo 'Job status has been updated succesfully ';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
    } else {
        echo 'No Data Found';
    }
} else if ($mode == 'Fetch-Job') {


    $sql = "SELECT tbl_jobaccept.*, tbl_dutyschedule.ID,tbl_dutyschedule.Location AS Location,tbl_dutyschedule.DutyStart As DutyStart,tbl_dutyschedule.DutyFinish AS DutyFinish FROM `tbl_dutyschedule` JOIN tbl_jobaccept ON tbl_dutyschedule.ID=tbl_jobaccept.shiftid";
//       echo $sql;

    $result = mysqli_query($connect, $sql);

    $output = '';


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $output .= '
              <tr class="ID" style="text-align:center;">    
                    <td>' . $x . '</td>
                    <td>' . $row['shiftid'] . '</td>
                    <td>' . $row['Location'] . '</td>
                    <td>' . $row['DutyStart'] . '</td>
                    <td>' . $row['DutyFinish'] . '</td>
                    <td>' . $row['officername'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['Status'] . '</td>
                    <td><a href="#" title="Accept Job" class="approvejob" data-id="' . $row['id'] . '" ><i  class="far fa-thumbs-up" aria-hidden="true" style="font-size:18px; color:green;"></i></a></td>
                    <td><a href="#" title="Decline Job" class="disapprovejob" data-id="' . $row['id'] . '" ><i class="far fa-thumbs-down" style="font-size:18px; color:darkred" ></i></a></td>
	
              </tr>
              ';
            $x++;
        }
        echo $output;
    } else {
        $output .= '
             <tr>
              <td colspan="14" align="center">No Data Found</td>
             </tr>
             ';
    }
} else if ($mode == 'UpdateAvailableJobAdmin') {
    $id = $_POST['id'];
    $jobstatus = $_POST['jobstatus'];



    $sql = "SELECT * FROM `tbl_jobaccept` WHERE id=$id";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $sql2 = "UPDATE `tbl_jobaccept` SET Status='" . $jobstatus . "' WHERE id=$id";

        if (mysqli_query($connect, $sql2)) {
            echo 'Shift has been ' . $jobstatus;
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
    } else {
        echo 'No Data Found';
    }
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

function Location_Lat_Long($id) {

    include './dbconnection.php';
    $sql = "SELECT * FROM `tbl_locations` WHERE `LocationID`='$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $lat = $row['latitude'];
        $lat_lon[0] = $row['latitude'];
        $lat_lon[1] = $row['longitude'];
        return $lat_lon;
    } else {
        echo 'No Data Found';
    }
}
