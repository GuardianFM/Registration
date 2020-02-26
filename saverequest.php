<?php

require_once "./dbconnection.php"; // Load file connection.php


$tableData = stripcslashes($_POST['pTableData']);
$Officer_id =$_POST['Officer_id'];
$OfficerName =  $_POST['OfficerName']  ;
$status = $_POST['status'];
$monthandyear = $_POST['monthandyear'];

//=============================================================deleting previous bills for this voucher no=========================================================
    $sql = "DELETE FROM tbl_officer_availibilty WHERE Officer_id = '".$Officer_id."'AND monthandyear ='".$monthandyear."' "; 
                //echo $sql;
                if(mysqli_query($connect, $sql))  
                {  
                   //  echo 'Bill Reference Deleted Successfully';  
                } else {echo  'ERROR IN QUERY'. $sql. $connect->error;} 


// Decode the JSON array
$tableData = json_decode($tableData,TRUE);
  $testAnswers = "";
  $ddate =  "2019-Feb-06";
  $newdate= date('Y-m-d', strtotime($ddate));
//  $Montharray= array();
  
foreach ($tableData as $question) {
    
    //$testAnswers .=  $question['taskNo'] . $question['date'].$question['description'].$question['task'];
    $sql = "INSERT INTO tbl_officer_availibilty( `Officer_id`, `OfficerName`,`DateFrom`,`monthandyear`, `Day1`, `Day2`, `Day3`, `Day4`, `Day5`, `Day6`, `Day7`, `Day8`"
            . ", `Day9`, `Day10`, `Day11`, `Day12`, `Day13`, `Day14`, `Day15`, `Day16`, `Day17`, `Day18`, `Day19`, `Day20`, `Day21`, `Day22`, `Day23`, `Day24`"
            . ", `Day25`, `Day26`, `Day27`, `Day28`, `Day29`, `Day30`, `Day31`,  `Status`) "
        . "VALUES( "
        . "'".$Officer_id."', "
        . "'".$OfficerName."', "
         . "'".$newdate."', "   
        . "'".$question['monthandyear']."', "
        . "'".$question['Day1']."', "
        . "'".$question['Day2']."', "
        . "'".$question['Day3']."', "
        . "'".$question['Day4']."', "
        . "'".$question['Day5']."', "
         . "'".$question['Day6']."', "
        . "'".$question['Day7']."', "
        . "'".$question['Day8']."', "
        . "'".$question['Day9']."', "
        . "'".$question['Day10']."', "
        . "'".$question['Day11']."', "
        . "'".$question['Day12']."', "
        . "'".$question['Day13']."', "
        . "'".$question['Day14']."', "
        . "'".$question['Day15']."', "
        . "'".$question['Day16']."', "
        . "'".$question['Day17']."', "
         . "'".$question['Day18']."', "
        . "'".$question['Day19']."', "
        . "'".$question['Day20']."', "
        . "'".$question['Day21']."', "
        . "'".$question['Day22']."', "
        . "'".$question['Day23']."', "
       . "'".$question['Day24']."', "
        . "'".$question['Day25']."', "
        . "'".$question['Day26']."', "
        . "'".$question['Day27']."', "
        . "'".$question['Day28']."', "
        . "'".$question['Day29']."', "
         . "'".$question['Day30']."', "
        . "'".$question['Day31']."', "
        . "'". $status."')";  
  //  echo $sql;
       $Montharray=array($question['Day1'],$question['Day2'],$question['Day3'],$question['Day4'],$question['Day5'],$question['Day6'],$question['Day7'],
           $question['Day8'],$question['Day9'],$question['Day10'],$question['Day11'],$question['Day12'],$question['Day13'],$question['Day14']
               ,$question['Day15'],$question['Day16'],$question['Day17'],$question['Day18'],$question['Day19'],$question['Day20']
               ,$question['Day21'],$question['Day22'],$question['Day23'],$question['Day24'],$question['Day25'],$question['Day26'],$question['Day27']
               ,$question['Day28'],$question['Day29'],$question['Day30'],$question['Day31']);
         //echo $_POST["OfficerName"];
        if(mysqli_query($connect, $sql))  
        {  
            // Splitmonth($question['monthandyear'],$Montharray);
            // echo ' table Successfully Inserted';  
              echo 'Your Availibity  Successfully Updated'; 
        } else {echo $sql. 'ERROR IN QUERY Table'. $connect->error;}; 
        
//    $testAnswers .=  $question['pmt_v_billno'] . " - ".$question['pmt_v_amount'];
   
//    echo $col1;
//    echo $col2;
      
};


function Splitmonth($m,$Montharray){
     include "./connection_db.php"; // Load file connection.php
      $sql = "DELETE FROM tbl_officerstatus WHERE OfficerName = '".$_POST['OfficerName']."'AND monthandyear='". $m."'"; 
//                echo $sql;
                if(mysqli_query($connect, $sql))  
                {  
                   //  echo 'Bill Reference Deleted Successfully';  
                } else {echo  'ERROR IN QUERY'. $sql. $connect->error;} 

   
$splitmonth= substr($m, 0,3); //month
$splityear= substr($m, 5,8); //year
$ddate= $splityear ."-" . $splitmonth ."-"."0" . "1"; 
$newdate= date('Y-m-d', strtotime($ddate));
//echo $ddate;
$date = new DateTime($ddate);
$week = $date->format("W");
//echo "Weeknummer:". $week;
$weeknext="";
$Maxdays="";
$week2="";
$week3="";
$week4="";
$week1days="";
$week2days="";
$week3days="";
$week4days="";
$weekno1="";
$weekno2="";
$weekno3="";
$weekno4="";
if ($splitmonth == 'Jan'||$splitmonth == 'Mar'||$splitmonth == 'May'||$splitmonth == 'Jul'||$splitmonth == 'Aug'||$splitmonth == 'Oct'||$splitmonth == 'Dec' ){
    $Maxdays=31;
}elseif ($splitmonth == 'Apr'||$splitmonth == 'Jun'||$splitmonth == 'Sep'||$splitmonth == 'Nov' ){
   $Maxdays=30;
}elseif ($splitmonth == 'Feb' ){
    $Maxdays=28;
}
for ($x = 1; $x <= $Maxdays; $x++) {
    
     if($x<10) {
                $xx = '0'.$x;
                } 

                if($x>=10) {
                $xx = $x;
                } 
    $ddate= $splityear ."-" . $splitmonth ."-". $xx;
//    echo $ddate;
    $newdate= date('Y-m-d', strtotime($ddate));
    $date = new DateTime($ddate);
    $week = $date->format("W");
    $day= $date->format("D");
    $dayval="";
//    $Montharray[$x-1];
    //triger insert Officer_id,OfficerName,Date,Day,Weekno,Status,Remarks
    
    $sql="INSERT INTO `tbl_officerstatus`(`Officer_id`, `OfficerName`, `Date`,  `Day`, `Weekno`,  `Status` ,`monthandyear`) VALUES"
            . " ('". $_POST['Officer_id'] ."','".$_POST['OfficerName']."','".$newdate."','".$day."','".$week."','".$Montharray[$x-1]."','".$m."'  )";
  //  echo $sql;
     if ($connect ->query($sql) === TRUE) {
         
                } else {
                echo ("Error: " . $sql . "<br>" . $connect->error);
                }
} 

//echo "(". $week1 .")"."(". $week2 .")"."(". $week3 .")"."(". $week4 .")";
}

//function insertWeekdata($OfficerName,$m,$val,$days,$weekno){
//    
//    echo "its reach  !" .$weekno .$val .$days;
//    if ($x<=7 ){
//        //join string till week no is 41 if 
//         $week1 .=  ','  . $Montharray[$x-1];
//         $week1days .= "," . $day;
//         $weekno1=$week;
//       // echo   $week1days ; 
//          if ($x==7){
//             insertWeekdata($_POST['OfficerName'],$m,$week1,$week1days,$weekno1);
//            }
//    }else if ($x>=8 && $x<=14){
//        //write insert code here to update week wise data 
//         $week2 .=',' . $Montharray[$x-1]; 
//         $week2days .= "," . $day;
//         $weekno2=$week;
//         if ($x==14){
//             insertWeekdata($_POST['OfficerName'],$m,$week2,$week2days,$weekno2);
//            }
////         echo  "(" .$week2 .")"; 
//        
//    }else if ($x>=15 && $x<=21){
//         $week3 .=',' . $Montharray[$x-1]; 
//         $week3days .= "," . $day;
//         $weekno3=$week;
//         if ($x==21){
//             insertWeekdata($_POST['OfficerName'],$m,$week3,$week3days,$weekno3);
//            }
////          echo  "(" .$week3 .")"; 
//        
//        
//    }else if ($x>=22 && $x<=31){
//         $week4 .=',' . $Montharray[$x-1]; 
//         $week4days .= "," . $day;
//         $weekno4=$week;
//         if ($x==31){
//             insertWeekdata($_POST['OfficerName'],$m,$week4,$week4days,$weekno4);
//            }
////          echo  "(" .$week4 .")"; 
//                
//    }
//}
