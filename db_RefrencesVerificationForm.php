<?php

include './dbconnection.php';

$to = $_POST['to'];
$from = $_POST['from'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$currdate = $_POST['currdate'];
$re = $_POST['re'];
$cc = $_POST['cc'];
$officer = $_POST['officer'];
$ni = $_POST['ni'];
$dob = $_POST['dob'];
$dtlchk = $_POST['dtlchk'];
$job_from = $_POST['job_from'];
$job_to = $_POST['job_to'];
$job_title = $_POST['job_title'];
$job_leaving_reason = $_POST['job_leaving_reason'];
$honesty = $_POST['honesty'];
$attendance = $_POST['attendance'];
$reliability = $_POST['reliability'];
$health = $_POST['health'];
$sobriety = $_POST['sobriety'];
$suitability = $_POST['suitability'];
$reemploy = $_POST['reemploy'];
$policy = $_POST['policy'];
$reason = $_POST['reason'];
$assessorname = $_POST['assessorname'];
$assessorposition = $_POST['assessorposition'];
$assessmentdate = $_POST['assessmentdate'];



$sql = "INSERT INTO `tbl_officers_reference_verification` (`To`, `From`, `Email`, `Phone`, `CurrentDate`, `Re`, `CC`,`OfficerName`, `NINo.`, `DOB`, `DetailsCheck`,`FromVerification`,"
        . " `ToVerification`, `JobTitleVerification`, `ReasonForLeaving`,`Honesty`, `Attendance`, `Reliability`, `Health`, `Sobriety`, `SuitabilityforPosition`,"
        . " `Re_Employ`, `CompanyPolicy`, `ReasonNotEmploy`, `AssessorName`, `AssessorPosition`, `AssessmentDate`) "
        . "VALUES('$to','$from','$email','$phone','$currdate','$re','$cc','$officer','$ni','$dob','$dtlchk','$job_from','$job_to','$job_title','$job_leaving_reason','$honesty'"
        . ",'$attendance','$reliability','$health','$sobriety','$suitability','$reemploy','$policy','$reason','$assessorname','$assessorposition','$assessmentdate') ";



if (mysqli_query($connect, $sql)) {
    echo "Thank you for your precious time, information has been updated successfully.";
} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
