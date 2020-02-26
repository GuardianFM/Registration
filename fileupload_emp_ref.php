<?php

include './dbconnection.php';


$id = $_POST['file_name'];

$con = mysqli_connect("etaksi.co.uk.mysql", "etaksi_co_uk_myapplication_db", "Security2009", "etaksi_co_uk_myapplication_db");
if (!$con) {
    echo "Failed";
}



$ext = pathinfo($_FILES['file_1']['name'], PATHINFO_EXTENSION);
$new_file_name = $id . "." . $ext;
$path = "uploads/EmployementRefrence/" . $new_file_name;
if (file_exists("uploads/EmployementRefrence/" . $new_file_name)) {
    unlink("uploads/EmployementRefrence/" . $new_file_name);
    move_uploaded_file($_FILES['file_1']['tmp_name'], 'uploads/EmployementRefrence/' . $new_file_name);
    echo 'File has been successfully overrite';
} else {

    move_uploaded_file($_FILES['file_1']['tmp_name'], 'uploads/EmployementRefrence/' . $new_file_name);
    echo 'File has been successfully uploaded';
    $query = mysqli_query($connect, "UPDATE tbl_officers_employement SET file='$path' WHERE id='$id'");
}
?>