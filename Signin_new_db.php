<?php

include './dbconnection.php';

$mode = $_POST['mode'];
if ($mode == "Update") {
    $stepno = $_POST['steps'];
    $id = $_POST['id'];
    $contractor_id = '1120';
    $contractor = 'MAIN';
    $active = 'inactive';


//Step No. 0
    $typofficer = $_POST['typofficer'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $shortname = $_POST['shortname'];
    $password = $_POST['password'];
    $cnfpassword = $_POST['cnfpassword'];
    $email = $_POST['email'];

//Step No. 1
    $postcode = $_POST['postcode'];
    $add1 = $_POST['address'];
    $region = $_POST['Region'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $telephone = $_POST['phone'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

//Step No. 2
    $sia = $_POST['sia_no'];
    $siaexp = $_POST['sia_exp'];

//Step No. 3
//Documents Upload
//Step No. 4
    $credentials = $_POST['credential'];
    $agreement = $_POST['agreement'];
//Step No. 5
//Finish


    $record_check_query = "SELECT * FROM `tbl_employee` WHERE EmployeeID =" . $id . "  LIMIT 1";
// echo $record_check_query;

    $result = mysqli_query($connect, $record_check_query);

    $user = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        /* Update Block */
        $query = "UPDATE `tbl_employee` SET `stepno`='$stepno',`firstname`='$firstname',`lastname`='$lastname',`telephone`='$telephone',`email`='$email'"
                . ",`add1`='$add1',`county`='$region',`city`='$city',`gender`='$gender',`typeofofficer`='$typofficer',`credentials`='$credentials',"
                . "`country`='$country',`postcode`='$postcode',`contractor`='$contractor',`dob`='$dob',"
                . "`contractor_id`='$contractor_id',`shortname`='$shortname',`sia`='$sia',`siaexp`='$siaexp',`emp_latitude`='$latitude',`emp_longitude`='$longitude' "
                . " WHERE EmployeeID='" . $id . "'"; //data update in main table
        if (mysqli_query($connect, $query)) {
            echo 'Record has been Updated Succesfully ';
        } else {
            echo "ERROR IN QUERY" . $connect->error;
        };
        /* ========================================================== */
    } else {
        echo "No Data Found" . $connect->error;
    }
} elseif ($mode == "Fetch") {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `tbl_employee` WHERE EmployeeID =" . $id . "  LIMIT 1";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        echo json_encode($row);
    } else {
        echo 'No Data Found';
    }
}
?>  