<?php

include './dbconnection.php';

$mode = $_POST['mode'];

if ($mode == "Fetch") {
    $x = 1;
    $id = $_POST['id'];
    $paid_status = $_POST['paid_status'];
    $paid_status_from = $_POST['paid_status_from'];
    $paid_status_to = $_POST['paid_status_to'];
    $TotalHours = 0;
    $TotalAmount = 0;
    $TotalExpense = 0;
    $TotalNetAmount = 0;
    $DueDateClass = '';
    $StatusClass = '';
    $account_id = 0;

    $sql = "SELECT * FROM `tbl_dutyschedule` WHERE `Officer_id`='$id' AND `paid_status`='$paid_status' AND `DutyStart`>='$paid_status_from' AND `DutyStart`<='$paid_status_to' AND `duty_status`='Confirmed' ORDER BY `duedate`,`DutyStart` ASC";


//    echo $sql;

    $result = mysqli_query($connect, $sql);
    $output = '';


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $account_id = $row['account_id'];
            if ($row['paid_status'] == 'UNPAID') {
                $DueDateClass = 'blinkingpending';
                $StatusClass = 'blinkingunpaid';
            } elseif ($row['paid_status'] == 'PAID') {
                $DueDateClass = 'blinkingdelivered';
                $StatusClass = 'blinkingpaid';
            }
            $output .= '
              <tr>
                     <td>' . $x . '</td>
                     <td>' . $row["Location"] . '</td>
                     <td>' . date_format(date_create($row["DutyStart"]), "Y-m-d") . '</td>
                     <td>' . date_format(date_create($row["DutyStart"]), "H:i") . ' - ' . date_format(date_create($row["DutyFinish"]), "H:i") . '</td>
                    <td>' . $row["Hours"] . '</td>
                    <td>' . $row["shiftexpense"] . '</td>
                     <td>' . $row['Rate'] * $row["Hours"] . '</td>
                     <td>' . (($row['Rate'] * $row["Hours"]) - $row["shiftexpense"]) . '</td>
                     <td class="' . $DueDateClass . '">' . $row['duedate'] . '</td>
                     <td class="' . $StatusClass . '">' . $row['paid_status'] . '</td>
             </tr>
              ';
            $x++;
            $TotalHours += $row["Hours"];
            $TotalAmount += $row['Rate'] * $row["Hours"];
            $TotalNetAmount += ($row['Rate'] * $row["Hours"]) - $row["shiftexpense"];
            $TotalExpense += $row["shiftexpense"];
        }
        $output .= '
              <tr>
                     <td colspan="4"><b>Total</b></td>
                    <td><b>' . $TotalHours . '</b></td>
                    <td><b>' . $TotalExpense . '£</b></td>
                     <td><b>' . $TotalAmount . '£</b></td>
                     <td><b>' . $TotalNetAmount . '£</b></td>
                     <td colspan="3"><input type="hidden" class="form-control" id="account_id" value="' . $account_id . '"/></td>
             </tr>
              ';
    } else {
        $output .= '
             <tr>
              <td colspan="10" align="center">No Data Found</td>
             </tr>
             ';
    }
    echo $output;
    mysqli_close($connect);
} else if ($mode == "Payment-Details") {

    $x = 1;
    $id = $_POST['id'];

    $sql = "SELECT * FROM `tbl_pmt_dtl` WHERE `account_id`='$id' ORDER BY `pmt_v_date` DESC";

//    echo $sql;

    $result = mysqli_query($connect, $sql);
    $output = '';


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $output .= '
              <tr>
                     <td>' . $x . '</td>
                     <td>' . $row["pmt_v_date"] . '</td>
                     <td>' . $row["pmt_v_amount"] . '</td>
                    <td>' . GetAccountInfo($row['pmt_v_billno'])[0] . '</td>
                    <td>' . GetAccountInfo($row['pmt_v_billno'])[1] . '</td>
             </tr>
              ';
            $x++;
        }
    } else {
        $output .= '
             <tr>
              <td colspan="5" align="center">No Data Found</td>
             </tr>
             ';
    }
    echo $output;
    mysqli_close($connect);
}

function GetAccountInfo($bill_id) {
    include './dbconnection.php';
    $array = [];

    $sql = "SELECT * FROM `tbl_bills_payables` WHERE `Bill_ID`='$bill_id' ";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $array[0] = $row['AccountNo'];
        $array[1] = $row['SortCode'];

        return $array;
    } else {
        echo 'No Data Found';
    }
}
