<?php

include "./dbconnection.php"; // Load file connection.php
$id = $_POST['id']; // Retrieve id data sent via AJAX
$mode = $_POST['mode'];

if ($mode == 'fetch') {

    $query = mysqli_query($connect, "SELECT * FROM tbl_employee WHERE `EmployeeID`='" . $id . "'"); // Show student data with the id}



    $row = mysqli_num_rows($query); // Calculate how much data from the $query execution results
    if ($row > 0) { // If the data is more than 0
        $data = mysqli_fetch_array($query); // take the student's data
        // BUat sebuah array
        $callback = array(
            'status' => 'success', // Set array status with success
            'id' => $data['EmployeeID'], // Set array name with the contents of the name field in the student table  
            'firstname' => $data['firstname'], // Set array name with the contents of the name field in the student table         
            'regdate' => $data['regdate'], // Set array name with the contents of the name field in the student table  
            'name' => $data['lastname'], // Set array name with the contents of the name field in the student table
            'gender' => $data['gender'], // Set the sex array with the contents of the sex column in the student table
            'email' => $data['email'], // Set the sex array with the contents of the sex column in the student table  
            'phone' => $data['telephone'], // Set array phone with phone column contents in student table
            'address' => $data['add1'], // Set the address array with the contents of the address field in the student table
            'postcode' => $data['postcode'], // Set the address array with the contents of the address field in the student table  
            'dob' => $data['dob'], // Set array name with the contents of the name field in the student table
            'shortname' => $data['shortname'], // Set the sex array with the contents of the sex column in the student table
            'country' => $data['country'], // Set array phone with phone column contents in student table
            'license' => $data['sia'], // Set the address array with the contents of the address field in the student table 
            'licenseexpiry' => $data['siaexp'], // Set the address array with the contents of the address field in the student table 
            'password' => $data['password'],
            'conf_password' => $data['conf_password'],
            'typeofofficer' => $data['typeofofficer'],
            'bankname' => $data['bankname'],
            'acctitle' => $data['acctitle'],
            'sortcode' => $data['sortcode'],
            'accnum' => $data['account'],
            'emp_latitude' => $data['emp_latitude'],
            'emp_longitude' => $data['emp_longitude'],
            'region' => $data['region']
        );
    } else {
        $callback = array('status' => 'failed'); // set the status array with failed
    }
//echo json_encode($callback); // converting varibel $callback to JSON
    echo json_encode($callback); // converting varibel $callback to JSON
} else if ($mode == 'update') {


    $id = $_POST['id'];
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $shortname = $_POST['shortname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $license = $_POST['license'];
    $licenseexpiry = $_POST['licenseexpiry'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];
    $typeofofficer = $_POST['typeofofficer'];
    $bankname = $_POST['bankname'];
    $acctitle = $_POST['acctitle'];
    $sortcode = $_POST['sortcode'];
    $accnum = $_POST['accnum'];
    $region = $_POST['region'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $fullname = $firstname . " " . $name;
    $errors = array();



    $record_check_query = "SELECT * FROM tbl_employee WHERE `EmployeeID`='$id'  LIMIT 1";

    $result = mysqli_query($connect, $record_check_query);

    $user = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) { // if user exists
        $user_check_query = "SELECT * FROM tbl_employee WHERE EmployeeID != '$id' AND ( fullname='$fullname' OR sia ='$license' ) LIMIT 1";

        $result = mysqli_query($connect, $user_check_query);

        $user = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) > 0) { // if user exists
            if ($user['lastname'] == $name) {
                echo "Officername already exists";
                return false;
                array_push($errors, "Officername already exists");
            }

            if ($user['shortname'] == $shortname) {
                echo "User Name already exists";
                return false;
                array_push($errors, "email already exists");
            }

            if ($user['sia'] == $license) {
                echo "License No already exists";
                return false;
                array_push($errors, "email already exists");
            }
        }

        if (count($errors) == 0) {


            $query = "UPDATE `tbl_employee` SET `lastname`='$name',`firstname`='$firstname',`fullname`='$fullname',`email`='$email',`password`='$password',`conf_password`='$conf_password',`dob`='$dob',`postcode`='$postcode',"
                    . "`telephone`='$phone',`add1`='$address',`gender`='$gender',`country`='$country',`shortname`='$shortname',`typeofofficer`='$typeofofficer',`sia`='$license',"
                    . "`siaexp`='$licenseexpiry',`bankname`='$bankname',`acctitle`='$acctitle',`sortcode`='$sortcode',`account`='$accnum',`region`='$region',`emp_latitude`='$latitude',`emp_longitude`='$longitude'   WHERE EmployeeID='$id' ";

            if (mysqli_query($connect, $query)) {
                //  $InsertID = mysqli_insert_id ($connect);
                echo 'Officer details has been updated succesfully!';
            } else {
                array_push($errors, "ERROR IN QUERY");
            };
            //  sendmail();
        }
    } else {
        echo 'No Record Found for this ID';
    }
} else if ($mode == 'ProfileCheck') {

    $query = mysqli_query($connect, "SELECT * FROM tbl_employee WHERE `EmployeeID`='" . $id . "'"); // Show student data with the id}



    $row = mysqli_num_rows($query); // Calculate how much data from the $query execution results
    if ($row > 0) { // If the data is more than 0
        $data = mysqli_fetch_array($query); // take the student's data
        // BUat sebuah array
        $callback = array(
        'status' => 'success', // Set array status with success
        'id' => $data['EmployeeID'], // Set array name with the contents of the name field in the student table  
        'firstname' => $data['firstname'], // Set array name with the contents of the name field in the student table         
        'regdate' => $data['regdate'], // Set array name with the contents of the name field in the student table  
        'name' => $data['lastname'], // Set array name with the contents of the name field in the student table
        'gender' => $data['gender'], // Set the sex array with the contents of the sex column in the student table
        'email' => $data['email'], // Set the sex array with the contents of the sex column in the student table  
        'phone' => $data['telephone'], // Set array phone with phone column contents in student table
        'address' => $data['add1'], // Set the address array with the contents of the address field in the student table
        'postcode' => $data['postcode'], // Set the address array with the contents of the address field in the student table  
        'dob' => $data['dob'], // Set array name with the contents of the name field in the student table
        'shortname' => $data['shortname'], // Set the sex array with the contents of the sex column in the student table
        'country' => $data['country'], // Set array phone with phone column contents in student table
        'license' => $data['sia'], // Set the address array with the contents of the address field in the student table 
        'licenseexpiry' => $data['siaexp'], // Set the address array with the contents of the address field in the student table 
        'password' => $data['password'],
        'conf_password' => $data['conf_password'],
        'typeofofficer' => $data['typeofofficer'],
        'bankname' => $data['bankname'],
        'acctitle' => $data['acctitle'],
        'sortcode' => $data['sortcode'],
        'accnum' => $data['account'],
        'region' => $data['region']
        );
    } else {
        $callback = array('status' => 'failed'); // set the status array with failed
    }
//echo json_encode($callback); // converting varibel $callback to JSON
    echo json_encode($callback); // converting varibel $callback to JSON
} else if ($mode == 'DocumentCheck') {

    $query = mysqli_query($connect, "SELECT * FROM tbl_officers_document WHERE `OID`='" . $id . "'"); // Show student data with the id}



    $row = mysqli_num_rows($query); // Calculate how much data from the $query execution results
    if ($row > 0) { // If the data is more than 0
        $data = mysqli_fetch_array($query); // take the student's data
        // BUat sebuah array
        $callback = array(
            'status' => 'success', // Set array status with success
            'id' => $data['OID'], // Set array name with the contents of the name field in the student table  
            'SIA_Front' => $data['SIA_Front'], // Set array name with the contents of the name field in the student table         
            'SIA_Rear' => $data['SIA_Rear'], // Set array name with the contents of the name field in the student table  
            'Passport' => $data['Passport'], // Set array name with the contents of the name field in the student table
            'bill' => $data['bill'], // Set the sex array with the contents of the sex column in the student table
            'other' => $data['other'],
        );
    } else {
        $callback = array('status' => 'failed'); // set the status array with failed
    }
//echo json_encode($callback); // converting varibel $callback to JSON
    echo json_encode($callback); // converting varibel $callback to JSON
}
?>