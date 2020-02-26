<?php

include 'dbconnection.php';
$x = 1;
$mode = $_POST['mode'];

if ($mode == "Fetch") {
    $sql = "SELECT tmp123.master AS Master,tmp123.id AS id,tbl_employee.EmployeeID,tbl_employee.firstname,tbl_employee.lastname,tbl_employee.shortname,tbl_employee.telephone,tbl_employee.add1,tbl_employee.city,tbl_employee.country,tbl_employee.postcode,tbl_employee.email,tbl_employee.sia,tbl_employee.siaexp,tbl_employee.bankname,tbl_employee.acctitle,tbl_employee.account,tbl_employee.sortcode FROM tbl_employee JOIN tmp123 on tmp123.col1=tbl_employee.sia ORDER BY `tbl_employee`.`sia` ASC";
//echo $sql;
    $result = mysqli_query($connect, $sql);

    $output = '';


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $output .= '
              <tr class="ID" style="text-align:center;">
                     <td  contenteditable>' . $row["EmployeeID"] . '-' . $row["id"] . '</td>
                     <td><input type="checkbox" ' . $row["Master"] . ' id="mastercheck" data-id="' . $row["EmployeeID"] . '"  data-tblid="' . $row["id"] . '" /></td>
                     <td  contenteditable id="firstname">' . $row['firstname'] . '</td>
                     <td  contenteditable id="lastname">' . $row['lastname'] . '</td>
                     <td  contenteditable id=shortname"">' . $row['shortname'] . '</td>
                     <td  contenteditable id="phone">' . $row['telephone'] . '</td>
                     <td  contenteditable id="address">' . $row['add1'] . '</td>
                     <td  contenteditable id="city">' . $row['city'] . '</td>
                     <td  contenteditable id="country">' . $row['country'] . '</td>
                     <td  contenteditable id="postcode">' . $row['postcode'] . '</td>
                     <td  contenteditable id="email">' . $row['email'] . '</td>
                     <td  contenteditable id="sia">' . $row['sia'] . '</td>
                     <td  contenteditable id="siaexp">' . $row['siaexp'] . '</td>
                     <td  contenteditable id="bank">' . $row['bankname'] . '</td>
                     <td  contenteditable id="acctitle">' . $row['acctitle'] . '</td>
                     <td  contenteditable id="acc">' . $row['account'] . '</td>
                     <td  contenteditable id="sort">' . $row['sortcode'] . '</td>
                     <td><a id="btn_save" href="#" data-id=' . $row['EmployeeID'] . '><i class="far fa-save" style="font-size:16px; color:black;" title="Save"></i> </td>
                    <td ><a id="btn_delete" href="#" data-id=' . $row['EmployeeID'] . '><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;" title="Delete"></i></a></td>
                   
              </tr>
              ';
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
} else if ($mode == "Update") {

    $id = $_POST['id'];
    $col = $_POST['col'];


    $sql = "SELECT * FROM `tbl_employee` where EmployeeID='" . $id . "'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        $sql = "UPDATE `tbl_employee` SET " . $col . " WHERE EmployeeID=" . $id . "";
        if (mysqli_query($connect, $sql)) {
            echo 'Record has been Updated Succesfully ';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
            echo $sql;
        };
    } else {
        echo 'No Data Found';
    }
} else if ($mode == "Delete") {

    $id = $_POST['id'];
    $sql = "DELETE FROM `tbl_employee` WHERE `EmployeeID`=" . $id . "";

    if (mysqli_query($connect, $sql)) {
        echo 'Record has been deleted';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
} else if ($mode == "Update-Master") {

    $master = $_POST['master'];
    $EmployeeID = $_POST['EmployeeID'];
    $id = $_POST['id'];

    $sql = "UPDATE `tmp123` SET `master`='" . $master . "',`EmployeeID`='" . $EmployeeID . "' WHERE `id`=" . $id . "";

    if (mysqli_query($connect, $sql)) {
        echo 'Record has been Updated Succesfully ';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
}

