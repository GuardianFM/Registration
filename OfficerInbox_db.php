<?php

include './dbconnection.php';

$id = $_POST['id'];

$i = 0;
$x = 1;
$output = '';

$sql = "SELECT * FROM `tbl_employee` WHERE `EmployeeID` = '$id'";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($result);
if (mysqli_num_rows($result) > 0) {
    $officer_number = $row['telephone'];
} else {
    echo 'No Data Found';
}


$sql = "SELECT * FROM `outbox` WHERE Date(`sent_at`)<= '" . date("y-m-d") . "' AND `msg_to`='$officer_number' ORDER BY `sent_at` DESC";

$result = mysqli_query($connect, $sql);




if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

        $output .= '
              <tr class="table-row" style="text-align:center;">
                  
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="Contact">' . $row['msg_to'] . '</td>
                     <td class="col col-3" data-label="Message">' . $row['msg_text'] . '</td>
                     <td class="col col-4" data-label="Status">' . $row['msg_status'] . '</td>
                     <td class="col col-1" data-label="Time">' . $row['sent_at'] . '</td>
                    
                         
              </tr>
              ';
        $x++;
        $i++;
    }
    // echo $output;
} else {
    /* $output .= '
      <tr>
      <td colspan="5" align="center">No Data Found</td>
      </tr>
      '; */
}

$sql = "SELECT * FROM `tbl_outboxque` WHERE Date(`send_at`)<= '" . date("y-m-d") . "' AND `msg_to`='$officer_number' ORDER BY `send_at` DESC";

$result = mysqli_query($connect, $sql);

//$output = '';


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

        $output .= '
              <tr class="item" style="text-align:center;">
                  
                     <td>' . $x . '</td>
                     <td>' . $row['msg_to'] . '</td>
                     <td>' . $row['msg_text'] . '</td>
                     <td>' . $row['Status'] . '</td>
                     <td>' . $row['send_at'] . '</td>
                    
                         
              </tr>
              ';
        $x++;
        $i++;
    }
} else {
    /*  $output .= '
      <tr>
      <td colspan="5" align="center">No Data Found</td>
      </tr>
      '; */
}


echo $output;
mysqli_close($connect);
