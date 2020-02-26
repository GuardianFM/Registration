<?php

$mode = $_POST['mode'];

include "./dbconnection.php"; // Load file connection.php

if ($mode == "fetch") {
    $i = 0;
    $x = 1;
    $count = 0;
    $from = $_POST['from'];
    $to = $_POST['to'];
    $id = $_POST['id'];
    $TotalHours = 0;

    $sql = "SELECT ROUND(SUM(`Hours`),2) AS TotalHours,`location` FROM `tbl_dutyschedule` WHERE `Branch_id`='$id' AND `DutyStart`>='$from' AND `DutyStart`<='$to' AND `duty_status`='Confirmed' GROUP BY `Location` ORDER BY SUM(`Hours`) DESC";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);

    $output = '';


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $output .= '
              <tr class="table-row" style="text-align:left;">    
                    <td class="col col-1" data-label="S No.">' . $x . '</td>
                    <td class="col col-2" data-label="Strength">' . $row['location'] . '</td>
                    <td class="col col-3" data-label="Country">' . $row['TotalHours'] . ' Hrs</td>
              </tr>
              ';
            $TotalHours += $row['TotalHours'];
            $x = $x + 1;
            $i = $i + 1;
        }
        $output .= '
              <tr class="table-row" style="text-align:left;">    
                    <td class="col col-1" data-label=""></td>
                    <td class="col col-2" data-label=""></td>
                    <td class="col col-3" data-label=""><b>Total : ' . $TotalHours . ' Hrs</b></td>
              </tr>
              ';
    } else {
        $output .= '
             <tr>
              <td colspan="14" align="center">No Data Found' . $sql . '</td>
             </tr>
             ';
    }
    echo $output;
}
?>