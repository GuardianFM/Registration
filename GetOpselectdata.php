<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbconnection.php';
$tblname = $_POST['tblname'];
$critertia = $_POST['criteria'];
$colname = $_POST['colname'];
$colid = $_POST['colid'];


$sql = "SELECT * FROM " . $tblname . "  " . $critertia . " ORDER BY $colname  DESC";

$result = mysqli_query($connect, $sql);
$i = 0;
$output = "";
// mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result)) {

    $output .= '<option id="' . $row["$colid"] . '" data-id="">' . $row["$colname"] . '</option>';
}
echo $output . $sql;
mysqli_close($connect);
