<?php
include "./dbconnection.php"; // Load file connection.php
$Officer_id = $_POST['Officer_id']; // Retrieve id data sent via AJAX
$OfficerName=$_POST['OfficerName'];
$monthandyear=$_POST['monthandyear'];



$query = mysqli_query($connect, "SELECT * FROM tbl_officer_availibilty WHERE Officer_id = ".$Officer_id." AND monthandyear ='".$monthandyear."' ORDER BY DateFrom "); // Show student data with the id
//$query = mysqli_query($connect, "SELECT * FROM tbl_officer_availibilty WHERE Officer_id = ". 97 ."  ORDER BY DateFrom "); // Show student data with the id
//echo "".$query;

$row = mysqli_num_rows($query); // Calculate how much data from the $query execution results
if($row > 0){ // If the data is more than 0
  $data = mysqli_fetch_array($query); // take the student's data
  
  // BUat sebuah array
//echo "SELECT * FROM tbl_officer_availibilty WHERE OfficerName = '".$OfficerName."' AND monthandyear ='".$monthandyear."'";
  $callback = array(
    'status' => 'success', // Set array status with success
    'Officer_id' => $data['Officer_id'], // Set array name with the contents of the name field in the student table  
    'OfficerName' => $data['OfficerName'], // Set array name with the contents of the name field in the student table     
    'monthandyear' => $data['monthandyear'], // Set array name with the contents of the name field in the student table  
    'Day1' => $data['Day1'], // Set array name with the contents of the name field in the student table
    'Day2' => $data['Day2'], // Set the sex array with the contents of the sex column in the student table
    'Day3' => $data['Day3'], // Set the sex array with the contents of the sex column in the student table  
    'Day4' => $data['Day4'], // Set array phone with phone column contents in student table
    'Day5' => $data['Day5'], // Set the address array with the contents of the address field in the student table
    'Day6' => $data['Day6'], // Set the address array with the contents of the address field in the student table  
    'Day7' => $data['Day7'], // Set array name with the contents of the name field in the student table
    'Day8' => $data['Day8'], // Set the sex array with the contents of the sex column in the student table
    'Day9' => $data['Day9'], // Set array phone with phone column contents in student table
    'Day10' => $data['Day10'], // Set the address array with the contents of the address field in the student table 
    'Day11' => $data['Day11'], // Set the address array with the contents of the address field in the student table 
    'Day12' => $data['Day12'], // Set array name with the contents of the name field in the student table
    'Day13' => $data['Day13'], // Set the sex array with the contents of the sex column in the student table
    'Day14' => $data['Day14'], // Set the sex array with the contents of the sex column in the student table  
    'Day15' => $data['Day15'], // Set array phone with phone column contents in student table
    'Day16' => $data['Day16'], // Set the address array with the contents of the address field in the student table
    'Day17' => $data['Day17'], // Set the address array with the contents of the address field in the student table  
    'Day18' => $data['Day18'], // Set array name with the contents of the name field in the student table
    'Day19' => $data['Day19'], // Set the sex array with the contents of the sex column in the student table
    'Day20' => $data['Day20'], // Set array phone with phone column contents in student table
    'Day21' => $data['Day21'], // Set the address array with the contents of the address field in the student table 
    'Day22' => $data['Day22'], // Set the address array with the contents of the address field in the student table   
    'Day23' => $data['Day23'], // Set the address array with the contents of the address field in the student table 
    'Day24' => $data['Day24'], // Set the address array with the contents of the address field in the student table 
    'Day25' => $data['Day25'], // Set array name with the contents of the name field in the student table
    'Day26' => $data['Day26'], // Set the sex array with the contents of the sex column in the student table
    'Day27' => $data['Day27'], // Set the sex array with the contents of the sex column in the student table  
    'Day28' => $data['Day28'], // Set array phone with phone column contents in student table
    'Day29' => $data['Day29'], // Set the address array with the contents of the address field in the student table
    'Day30' => $data['Day30'], // Set the address array with the contents of the address field in the student table  
    'Day31' => $data['Day31'], // Set array name with the contents of the name field in the student table
   
  );
  echo json_encode($callback); // converting varibel $callback to JSON
}else{
  $callback = array('status' => 'failed'); // set the status array with failed
  echo json_encode($callback);
}
//echo json_encode($callback); // converting varibel $callback to JSON
?>