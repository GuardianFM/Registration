<?php

include './dbconnection.php';

$oid = $_POST['file_name'];

$con = mysqli_connect("etaksi.co.uk.mysql", "etaksi_co_uk_myapplication_db", "Security2009", "etaksi_co_uk_myapplication_db");
if (!$con) {
    echo "Failed";
}



$ext = pathinfo($_FILES['file_2']['name'], PATHINFO_EXTENSION);
$new_file_name = $oid . "." . $ext;
$path = "http://etaksi.co.uk/Etaksi/Guardianfm_new/Registeration/uploads/SIA(Front)/" . $new_file_name;
if (file_exists("uploads/SIA(Front)/" . $new_file_name)) {
    unlink("uploads/SIA(Front)/" . $new_file_name);
    move_uploaded_file($_FILES['file_2']['tmp_name'], 'uploads/SIA(Front)/' . $new_file_name);
    echo 'File has been successfully overrite';
} else {

    move_uploaded_file($_FILES['file_2']['tmp_name'], 'uploads/SIA(Front)/' . $new_file_name);
    echo 'File has been successfully uploaded';


    $sql = "SELECT * FROM `tbl_officers_document` where OID='$oid'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $query = mysqli_query($connect, "UPDATE tbl_officers_document SET SIA_Front='$path' WHERE OID='$oid'");
    } else {
        $query = mysqli_query($connect, "INSERT INTO tbl_officers_document (`SIA_Front`,`OID`) VALUES('$path','$oid')");
    }



//    echo $query;
}
?>