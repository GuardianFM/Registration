<?php

include './dbconnection.php';

$i = 0;
$Total = 0;
$sql = "";
$id = ''; //12764;



$sql = "SELECT * FROM `tbl_officers_document`";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

        $sia_f = $row['SIA_Front'];
        $sia_r = $row['SIA_Rear'];
        $passp = $row['Passport'];
        $bill = $row['bill'];


        if ($sia_f != "") {
            $Total += 1;
        }

        if ($sia_r != "") {
            $Total += 1;
        }

        if ($passp != "") {
            $Total += 1;
        }

        if ($passp != "") {
            $Total += 1;
        }

        /* ===========================================Updateing Documents In tbl_employee=========================================== */
   
        $sql = "UPDATE `tbl_employee` SET Doc_Count='" . $Total . "' WHERE EmployeeID=" . $row['OID'] . "";

        if (mysqli_query($connect, $sql)) {
//            echo 'Record has been Updated Succesfully';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
        /* ===========================================END============================================================================ */
        $i = $i + 1;
        $Total = 0;
    }
} else {
    echo 'No Data Found';
}    

    
