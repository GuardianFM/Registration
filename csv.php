<?php

$data = Array();
$i = 0;
$x = 1;
include './dbconnection.php';
$tblname = $_POST['tblname'];
$criteria = $_POST['criteria'];
$limit = $_POST['limit'];
$collheader = explode(',', "S.No,Last Name,First Name,Short Name,Contact,Email,Address,Postcode,SIA License,Registration Date");
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
$file = fopen("php://output", "w");
fputcsv($file, $collheader);


$query = "SELECT  * FROM  $tblname $criteria ORDER BY regdate DESC $limit";
//echo $query;
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_assoc($result)) {

    $data[$i] = [$x, $row['lastname'], $row['firstname'],$row['shortname'],$row['telephone'],$row['email'],$row['add1'],$row['postcode'], $row['sia'],$row['regdate']];
    fputcsv($file, $data[$i]);
    $i = $i + 1;
    $x = $x + 1;
}

fclose($file);



$file = 'data.csv';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>