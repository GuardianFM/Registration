<?php

include './dbconnection.php';

$mode = $_POST["mode"];

if ($mode == "Fetch") {
    $x = 1;
    $id = $_POST['id'];
    $sql = "SELECT * FROM `tbl_officer_report` WHERE `OfficerId`='$id' AND `type`='Officer'";
//echo $sql;

    $result = mysqli_query($connect, $sql);

    $output = '';


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $output .= '
              <tr class="table-row">                  
                     <td >' . $x . '</td>
                     <td>' . $row["Date"] . '</td>
                     <td>' . $row["time"] . '</td>
                     <td>' . $row["Description"] . '</td>
              </tr>
              ';
            $Total = $x;
            $x++;
        }
    } else {
        $output .= '
             <tr>
              <td colspan="4" align="center">No Data Found</td>
             </tr>
             ';
    }
    echo $output;
    mysqli_close($connect);
} elseif ($mode == "Insert") {
    date_default_timezone_set("Europe/London");
    $id = $_POST['id'];
    $OfficerName = $_POST['OfficerName'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $curtime = date("Y-m-d h:i");
    $message = "Officer " . $OfficerName . " has reported an incident stating \'" . $description . "\'";
    $subject = "Officer " . $OfficerName . " has reported an incident";

    $query = "INSERT INTO `tbl_officer_report`(`OfficerId`, `OfficerName`, `Date`,`time`, `Location`, `Description`, `type`,`Status`) VALUES ('$id','$OfficerName','$date','$time','$location','$description','Officer','$type')";
//    echo $query;
    if (mysqli_query($connect, $query)) {
        echo 'Incident has been reported Successfullly';
        //Send Email to Controller

        $query = "INSERT INTO `tbl_emailbox`(`message_id`,`msglunch_time`, `msg_from`, `msg_text`, `send_at`, `msg_to`, `Status`,`Active`, `curtime`, `msg_type`, `to_name`,`subject`) "
                . "VALUES ('" . rand(30000, 40000) . "','$curtime','comms2@guardianfm.co.uk','" . $message . "','$curtime','comms@guardianfm.co.uk','PENDING','active','$curtime','Officer Incident Report','" . $OfficerName . "','" . $subject . "')";
        //        echo $query;
        if (mysqli_query($connect, $query)) {

//            echo 'Email has been sent Successfullly';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
}