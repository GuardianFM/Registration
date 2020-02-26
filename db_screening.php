<?php

$mode = $_POST['mode'];

include "./dbconnection.php"; // Load file connection.php

if ($mode == "fetch") {
    $Status = $_POST['Status'];
    $limit = $_POST['limit'];
    $i = 0;
    $x = 1;


    if ($Status == "fetch-newstaff") {
        $from = $_POST['from'];
        $to = $_POST['to'];

        $active = strtolower($_POST['active']);
        if ($limit == "All") {
            $sql = "SELECT * FROM `tbl_employee` WHERE Date(`regdate`)>='$from' AND Date(`regdate`)<='$to' AND `active`='$active' AND contractor_id=1120 ORDER BY regdate DESC ";
        } else {
            $sql = "SELECT * FROM `tbl_employee` WHERE Date(`regdate`)>='$from' AND Date(`regdate`)<='$to' AND `active`='$active' AND contractor_id=1120   ORDER BY regdate DESC LIMIT $limit";
            echo $sql;
        }
        $result = mysqli_query($connect, $sql);

        $output = '';


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

                $output .= '
              <tr class="table-row" style="text-align:center;">
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="ID">' . $row["EmployeeID"] . '</td>
                     <td class="col col-1" data-label="Short Name">' . $row["shortname"] . '</td>
                     <td class="col col-1" data-label="Steps Complete">' . $row["stepno"] . '</td>    
                     <td class="col col-1" data-label="Docs Completed">' . Docs($row['EmployeeID']) . '/6</td>
                     <td class="col col-4" data-label="Contact">' . $row['telephone'] . '</td>
                     <td class="col col-4" data-label="Email">' . $row['email'] . '</td>
                     <td class="col col-3" data-label="Address">' . $row["add1"] . '</td>
                     <td class="col col-3" data-label="Postcode">' . $row["postcode"] . '</td>
                     <td class="col col-2" data-label="SIA No.">' . $row["sia"] . '</td>
                     <td class="col col-3" data-label="Registration Date">' . $row["regdate"] . '</td>
                     <td class="col col-1" data-label="SMS" ><a href="#" id="SMS" class="SMS" data-id=' . $row['EmployeeID'] . '><i  class="far fa-comment" style="font-size:24px;color:green"></i></a></td>
              </tr>
              ';
                $x++;
                $i++;
            }
        } else {
            $output .= '
             <tr>
              <td colspan="11" align="center">No Data Found</td>
             </tr>
             ';
        }
        echo $output;
        mysqli_close($connect);
    } else if ($Status == "fetch-currentstaff") {
        $from = $_POST['from'];
        $to = $_POST['to'];


        if ($limit == "All") {
            $sql = "SELECT * FROM `tbl_employee` WHERE Date(`regdate`)>='$from' AND Date(`regdate`)<='$to' AND `active`='active' AND `agreement_status`='Accept' AND `verify`='verify' AND contractor_id=1120  ORDER BY regdate DESC  ";
        } else {
            $sql = "SELECT * FROM `tbl_employee` WHERE Date(`regdate`)>='$from' AND Date(`regdate`)<='$to' AND `active`='active' AND `agreement_status`='Accept' AND `verify`='verify' AND contractor_id=1120 ORDER BY regdate DESC LIMIT $limit";
        }
//        echo $sql;

        $result = mysqli_query($connect, $sql);

        $output = '';


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

                $output .= '
              <tr class="table-row" style="text-align:center;">
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="ID">' . $row["EmployeeID"] . '</td>
                     <td class="col col-1" data-label="Short Name">' . $row["shortname"] . '</td>
                     <td class="col col-1" data-label="Steps Complete">' . $row["stepno"] . '</td>
                     <td class="col col-1" data-label="Docs Completed">' . Docs($row['EmployeeID']) . '/6</td>
                     <td class="col col-4" data-label="Contact">' . $row['telephone'] . '</td>
                     <td class="col col-4" data-label="Email">' . $row['email'] . '</td>
                     <td class="col col-3" data-label="Address">' . $row["add1"] . '</td>
                     <td class="col col-3" data-label="Postcode">' . $row["postcode"] . '</td>
                     <td class="col col-2" data-label="SIA No.">' . $row["sia"] . '</td>
                     <td class="col col-3" data-label="Registration Date">' . $row["regdate"] . '</td>
                     <td class="col col-1" data-label="SMS" ><a href="#" id="SMS" class="SMS" data-id=' . $row['EmployeeID'] . '><i  class="far fa-comment" style="font-size:24px;color:green"></i></a></td>
              </tr>
              ';
                $x++;
                $i++;
            }

            echo $output . $sql;
        } else {
            $output .= '
             <tr>
              <td colspan="16" align="center">No Data Found</td>
             </tr>
             ';
        }
        mysqli_close($connect);
    } else if ($Status == "fetch-holdstaff") {
        $from = $_POST['from'];
        $to = $_POST['to'];

        if ($limit == "All") {
            $sql = "SELECT * FROM `tbl_employee` WHERE Date(`regdate`)>='$from' AND Date(`regdate`)<='$to' AND `active`='active' AND `agreement_status` ='Decline'  AND `verify`='unverify' AND contractor_id=1120 ORDER BY regdate DESC ";
//       echo $sql;
        } else {
            $sql = "SELECT * FROM `tbl_employee` WHERE Date(`regdate`)>='$from' AND Date(`regdate`)<='$to' AND `active`='active' AND `agreement_status`='Decline'  AND `verify`='unverify' AND contractor_id=1120 ORDER BY regdate DESC  LIMIT $limit";
        }
        $result = mysqli_query($connect, $sql);

        $output = '';


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

                $output .= '
              <tr class="table-row" style="text-align:center;">
                     <td class="col col-1" data-label="S No.">' . $x . '</td>
                     <td class="col col-2" data-label="ID">' . $row["EmployeeID"] . '</td>
                     <td class="col col-1" data-label="Short Name">' . $row["shortname"] . '</td>
                     <td class="col col-1" data-label="Steps Complete">' . $row["stepno"] . '</td>
                     <td class="col col-1" data-label="Docs Completed">' . Docs($row['EmployeeID']) . '/6</td>    
                     <td class="col col-4" data-label="Contact">' . $row['telephone'] . '</td>
                     <td class="col col-4" data-label="Email">' . $row['email'] . '</td>
                     <td class="col col-3" data-label="Address">' . $row["add1"] . '</td>
                     <td class="col col-3" data-label="Postcode">' . $row["postcode"] . '</td>
                     <td class="col col-2" data-label="SIA No.">' . $row["sia"] . '</td>
                     <td class="col col-3" data-label="Registration Date">' . $row["regdate"] . '</td>
                    <td class="col col-4" data-label="Agreement">' . $row['agreement_status'] . ' / ' . $row['verify'] . '</td>
                     <td class="col col-1" data-label="Action"><a href="#" title="Verify Officer" class="Verify" data-id="' . $row['EmployeeID'] . '">Verify</a></td>
                     <td class="col col-1" data-label="SMS" ><a href="#" id="SMS" class="SMS" data-id=' . $row['EmployeeID'] . '><i  class="far fa-comment" style="font-size:24px;color:green"></i></a></td>
              </tr>
              ';
                $x++;
                $i++;
            }

            echo $output . $sql;
        } else {
            $output .= '
             <tr>
              <td colspan="16" align="center">No Data Found</td>
             </tr>
             ';
        }
        mysqli_close($connect);
    } else if ($Status == "fetch-officerstrength") {
        $i = 0;
        $x = 1;
        if ($limit == "All") {
            $sql = "SELECT count(*) as Count,tbl_employee.country as Country,counties.county as County FROM `tbl_employee` JOIN counties ON tbl_employee.country_id=counties.id GROUP by counties.id ORDER BY `country_id` ASC";
//       echo $sql;
        } else {
            $sql = "SELECT count(*) as Count,tbl_employee.country as Country,counties.county as County FROM `tbl_employee` JOIN counties ON tbl_employee.country_id=counties.id GROUP by counties.id ORDER BY `country_id` ASC LIMIT $limit";
        }
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result);

        $output = '';


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

                $output .= '
              <tr class="table-row" style="text-align:center;">    
                    <td class="col col-1" data-label="S No.">' . $x . '</td>
                    <td class="col col-2" data-label="Strength">' . $row['Count'] . '</td>
                    <td class="col col-3" data-label="Country">' . $row['Country'] . '</td>
                    <td class="col col-4" data-label="County">' . $row['County'] . '</td>
                   
          
              </tr>
              ';
                $x = $x + 1;
                $i = $i + 1;
            }
            echo $output;
        } else {
            $output .= '
             <tr>
              <td colspan="14" align="center">No Data Found</td>
             </tr>
             ';
        }
    }
}

if ($mode == "vet") {
    $officer = $_POST['officer'];
    $officer_id = $_POST['officer_id'];
    $Status = $_POST['Status'];
    if ($Status == "vet_per_ref") {
        $sql = "SELECT * FROM `tbl_officers_reference` WHERE `OID`='" . $officer_id . "'";
//       echo $sql;
        $result = mysqli_query($connect, $sql);
        $output = '';
        $i = 0;

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

                $output .= '
              <tr class="ID" style="text-align:center;" class="table-row">
                  
                    <td contenteditable id="per_ref_refname_u" class="col col-1" data-label="Name">' . $row['RefName'] . '</td>
                    <td contenteditable id="per_ref_refphone_u" class="col col-2" data-label="Ref. Phone">' . $row['RefPhone'] . '</td>
                    <td contenteditable id="per_ref_refemail_u" class="col col-3" data-label="Ref. Email">' . $row['RefEmail'] . '</td>
                    <td class="col col-1" data-label="Save"><a id="btn_save_per_ref_u" data-id=' . $row['id'] . '><i class="far fa-save" style="font-size:16px; color:black;"></i> </td>
                    <td class="col col-2" data-label="Delete"><a id="btn_delete_per_ref_u" href="#" data-id=' . $row['id'] . '><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a></td>
              </tr>
              ';
                $i = $i + 1;
            }
            $output .= '  
           <tr class="table-row">   
                    <td contenteditable id="per_ref_refname_i" class="col col-1" data-label="Name"></td>
                    <td contenteditable id="per_ref_refphone_i" class="col col-2" data-label="Ref. Phone"></td>
                    <td contenteditable id="per_ref_refemail_i" class="col col-3" data-label="Ref. Email"></td>
                    <td class="col col-1" data-label="Save"><a href="#" id="btn_save_per_ref_i"><i class="far fa-save" style="font-size:16px; color:black;"></i> </td>
                    <td class="col col-2" data-label="Delete"><a id="btn_delete_per_ref_i" href="#" ><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a></td>
           </tr>  
      ';
        } else {
            $output .= '  
           <tr >   
                <td contenteditable id="per_ref_refname_n" class="col col-1" data-label="Name"></td>
                    <td contenteditable id="per_ref_refphone_n" class="col col-2" data-label="Ref. Phone"></td>
                    <td contenteditable id="per_ref_refemail_n" class="col col-3" data-label="Ref. Email"></td>
                    <td class="col col-1" data-label="Save"><a href="#" id="btn_save_per_ref_n"><i class="far fa-save" style="font-size:16px; color:black;"></i> </td>
                    <td class="col col-2" data-label="Delete"><a id="btn_delete_per_ref_n" href="#"><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a><td>
           </tr>  
      ';
        }
        echo $output;
        mysqli_close($connect);
    } else if ($Status == "vet_education") {
        $officer_id = $_POST['officer_id'];
        $sql = "SELECT * FROM `tbl_officers_education`  WHERE `OID`='" . $officer_id . "'";
//       echo $sql;
        $result = mysqli_query($connect, $sql);
//        $row = mysqli_fetch_array($result);


        $output = '';
        $i = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
              <tr style="text-align:center;" class="table-row">
                  
                   
                    <td contenteditable id="edu_school_u" class="col col-1" data-label="School">' . $row['School'] . '</td>
                    <td contenteditable id="edu_address_u" class="col col-2" data-label="Address">' . $row['Address'] . '</td>
                    <td contenteditable id="edu_postcode_u" class="col col-3" data-label="Postcode"> ' . $row['Postcode'] . '</td>
                    <td contenteditable class="col col-4" data-label="Attended From" ><input  id="edu_att_from_u" maxlength="4" type="date" value="' . $row['AttendedFrom'] . '" ></input></td>
                    <td contenteditable class="col col-1" data-label="Attended To"><input  id="edu_att_to_u" maxlength="4" type="date" value="' . $row['AttendedTo'] . '" ></input></td>
                    <td contenteditable class="col col-2" data-label="Course Details" id="edu_course_u">' . $row['CourseDetails'] . '</td>
                    <td class="col col-3" data-label="Save"><a href="#" id="btn_save_edu_u" data-id=' . $row['id'] . '><i class="far fa-save" style="font-size:16px; color:black;"  ></i></a> </td>
                    <td class="col col-4" data-label="Delete"><a id="btn_delete_edu_u" href="#" data-id=' . $row['id'] . '><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a></td>
</tr>
              ';
                $i = $i + 1;
            }
            $output .= '  
           <tr class="table-row" style="text-align:center;">
                  
                   
                    <td contenteditable id="edu_school_i" class="col col-1" data-label="School"></td>
                    <td contenteditable id="edu_address_i" class="col col-2" data-label="Address"></td>
                    <td contenteditable id="edu_postcode_i" class="col col-3" data-label="Postcode"></td>
                    <td contenteditable class="col col-4" data-label="Attended From"><input  id="edu_att_from_i" maxlength="4" type="date" value="" ></input></td>
                    <td contenteditable class="col col-1" data-label="Attended To"><input  id="edu_att_to_i" maxlength="4" type="date" value="" ></input></td>
                    <td contenteditable class="col col-2" data-label="Course Details" id="edu_course_i"></td>
                    <td class="col col-3" data-label="Save"><a href="#" id="btn_save_edu_i"><i class="far fa-save" style="font-size:16px; color:black;"></i></a> </td>
                    <td class="col col-4" data-label="Delete"><a id="btn_delete_edu_i" href="#"><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a></td>
              </tr>
              ';
        } else {
            $output .= '  
           <tr class="table-row" style="text-align:center;">
                  
                   
                    <td contenteditable class="col col-1" data-label="School" id="edu_school_n"></td>
                    <td contenteditable class="col col-2" data-label="Address" id="edu_address_n"></td>
                    <td contenteditable class="col col-3" data-label="Postcode" id="edu_postcode_n"></td>
                    <td contenteditable class="col col-4" data-label="Attended From"><input  id="edu_att_from_n" maxlength="4" type="date" value="" ></input></td>
                    <td contenteditable class="col col-1" data-label="Attended To"><input  id="edu_att_to_n" maxlength="4" type="date" value="" ></input></td>
                    <td contenteditable id="edu_course_n" class="col col-2" data-label="Course Details" id="edu_course_i"></td>
                    <td class="col col-3" data-label="Save"><a href="#" id="btn_save_edu_n" ><i class="far fa-save" style="font-size:16px; color:black;"></i></a> </td>
                    <td class="col col-4" data-label="Delete"><a id="btn_delete_edu_n" href="#"><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a></td>
              </tr>
              ';
        }
        echo $output;
        mysqli_close($connect);
    } else if ($Status == "vet_emp_ref") {
        $officer_id = $_POST['officer_id'];
//        $sql = "SELECT tbl_officers_employement.Name,`tbl_officers_employement`.`Company`,`tbl_officers_employement.id,`JobTitle`,tbl_officers_employement.Email ,tbl_officers_employement.id,tbl_officers.phone as Phone,`EmpFrom`,`EmpTo`,`RefRecieved`,`EmpDateConf`,`LastReq`,`RefPhone` FROM `tbl_officers_employement` JOIN tbl_officers ON tbl_officers.id=tbl_officers_employement.OID WHERE `tbl_officers`.`id`='" . $officer_id . "'";
        $sql = "SELECT * From tbl_officers_employement WHERE `OID`='" . $officer_id . "'";
//       echo $sql;


        $result = mysqli_query($connect, $sql);
        $i = 0;
        $output = '';


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
                $output .= '
              <tr class="ID" style="text-align:center;">
                  
                    <td contenteditable id="emp_ref_name" class="col col-1" data-label="Ref. Name">' . $row['RefName'] . '</td>
                    <td contenteditable id="emp_ref_company" class="col col-1" data-label="Ref. Name">' . $row['Company'] . '</td>
                    <td contenteditable id="emp_ref_job" class="col col-3" data-label="Job Title">' . $row['JobTitle'] . '</td>
                    <td contenteditable id="emp_ref_phone" class="col col-4" data-label="Phone No.">' . $row['Phone'] . '</td>
                    <td contenteditable id="emp_ref_email" class="col col-1" data-label="Email">' . $row['Email'] . '</td>
                    <td class="col col-2" data-label="Employed From"><input  id="emp_ref_date_from" maxlength="4" type="date" value="' . $row['EmpFrom'] . '" ></input></td>
                    <td class="col col-3" data-label="Employed To"><input  id="emp_ref_date_to" maxlength="4" type="date" value="' . $row['EmpTo'] . '" ></input></td>
                    
                    <td class="col col-4" data-label="File Upload"><a href="#" id="file_upload" title="Upload" data-id=' . $row['id'] . '><i class="far fa-file" style="font-size: 16px;"></i></a></td>
                    
                    
                    
                    
                    
                    <td contenteditable id="emp_ref_refphone" class="col col-1" data-label="Ref. Phone">' . $row['RefPhone'] . '</td>
                    <td  class="col col-2" data-label="Save"><a id="btn_save_emp_ref_u" href="#" data-id=' . $row['id'] . '><i class="far fa-save" style="font-size:16px; color:black;" ></i></a> </td>
                    <td  class="col col-3" data-label="Delete"><a id="btn_delete_emp_ref_u" href="#" data-id=' . $row['id'] . '><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a> </td>
                   
              </tr>
              ';
                $i = $i + 1;
            }
            $output .= '  
           <tr >   
                    <td contenteditable id="emp_ref_name_i" class="col col-1" data-label="Ref. Name"></td>
                    <td contenteditable id="emp_ref_company_i" class="col col-1" data-label="Company"></td>
                    <td contenteditable id="emp_ref_job_i" class="col col-3" data-label="Job Title"></td>
                    <td contenteditable id="emp_ref_phone_i" class="col col-4" data-label="Phone No."></td>
                    <td contenteditable id="emp_ref_email_i" class="col col-1" data-label="Email"></td>
                    <td class="col col-2" data-label="Employed From" ><input  id="emp_ref_date_from_i"  maxlength="4" type="date" value="" ></input></td>
                    <td class="col col-3" data-label="Employed To"><input  id="emp_ref_date_to_i" maxlength="4"  type="date" value="" ></input></td>
                    <td class="col col-4" data-label="File Upload"><i class="far fa-file" style="font-size: 16px;"></i></td>
                    <td contenteditable id="emp_ref_refphone_i" class="col col-1" data-label="Ref. Phone"></td>
                    <td  class="col col-2" data-label="Save"><a id="btn_save_emp_ref_i"  href="#"><i class="far fa-save" style="font-size:16px; color:black;" ></i></a> </td>
                    <td  class="col col-3" data-label="Delete"><a id="btn_delete_emp_ref_i" href="#" ><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a> </td>
           </tr>  
      ';
        } else {
            $output .= '  
           <tr >   
                    <td contenteditable id="emp_ref_name_n" class="col col-1" data-label="Ref. Name"></td>
                    <td contenteditable id="emp_ref_company_n" class="col col-1" data-label="Company"></td>
                    <td contenteditable id="emp_ref_job_n" class="col col-3" data-label="Job Title"></td>
                    <td contenteditable id="emp_ref_phone_n" class="col col-4" data-label="Phone No."></td>
                    <td contenteditable id="emp_ref_email_n" class="col col-1" data-label="Email"></td>
                    <td class="col col-2" data-label="Employed From"><input  id="emp_ref_date_from_n" maxlength="4" type="date" value="" ></input></td>
                    <td class="col col-3" data-label="Employed To"><input  id="emp_ref_date_to_n" maxlength="4" type="date" value="" ></input></td>
                    <td class="col col-4" data-label="File Upload"><i class="far fa-file" style="font-size: 16px;"></i></td>
                    <td contenteditable id="emp_ref_refphone_n" class="col col-1" data-label="Ref. Phone"></td>
                    <td class="col col-2" data-label="Save"><a id="btn_save_emp_ref_n" href="#"><i class="far fa-save" style="font-size:16px; color:black;" ></i></a> </td>
                    <td class="col col-3" data-label="Delete"><a id="btn_delete_emp_ref_n" href="#" ><i class="fa fa-trash" aria-hidden="true" style="font-size:16px; color:red;"></i></a> </td>
                    
</tr>  
      ';
        }
        echo $output;
        mysqli_close($connect);
    } else if ($Status == "vet_bank_info") {
        $officer_id = $_POST['officer_id'];
        $sql = "SELECT * FROM `tbl_employee`  WHERE `EmployeeID`='" . $officer_id . "' AND contractor_id=1120";



        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0) {
            $output = '
              <tr class="table-row" style="text-align:center;">
                  
                   
                    <td class="col col-1" data-label="Bank Name" >' . $row['bankname'] . '</td>
                    <td  class="col col-2" data-label="Account Title">' . $row['acctitle'] . '</td>
                    <td class="col col-3" data-label="Sort Code">' . $row['sortcode'] . '</td>
                    <td class="col col-4" data-label="Account Number">' . $row['account'] . '</td>
</tr>
              ';
        } else {
            $output = '
                    <tr class="table-row" style="text-align:center;">
                    <td  colspan="4" class="col col-1">No Data Found</td>
                    </tr>
              ';
        }

        echo $output;
        mysqli_close($connect);
    } else if ($Status == "vet_further_info") {
        $officer_id = $_POST['officer_id'];
        $sql = "SELECT * FROM `tbl_employee`  WHERE `EmployeeID`='" . $officer_id . "' AND contractor_id=1120";



        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0) {
            $output = '
              <tr class="ID" style="text-align:center;">
                  
                   
                    <td class="col col-1" data-label="Phone" >' . $row['telephone'] . '</td>
                    <td class="col col-2" data-label="Email" >' . $row['email'] . '</td>
                    <td class="col col-3" data-label="Address">' . $row['add1'] . '</td>
                    <td class="col col-4" data-label="Postcode">' . $row['postcode'] . '</td>
                        
                    <td class="col col-1" data-label="Type Of Officer" >' . $row['typeofofficer'] . '</td>
                    <td class="col col-2" data-label="License No.">' . $row['sia'] . '</td>
                    <td class="col col-3" data-label="License Expiry">' . $row['siaexp'] . '</td>
                    
</tr>
              ';
        } else {
            $output = '
                    <tr class="table-row" style="text-align:center;">
                    <td class="col col-1" data-label="" colspan="4">No Data Found</td>
                    </tr>
              ';
        }

        echo $output;
        mysqli_close($connect);
    }
}
if ($mode == 'Update') {
    $id = $_POST['id'];

    $sql = "UPDATE `tbl_employee` SET `verify`='verify' WHERE EmployeeID=" . $id . "";

    if (mysqli_query($connect, $sql)) {
        echo 'Officer Has Been Verified Succesfully ';
    } else {
        echo "ERROR IN QUERY" . $connect->error;
    };
}

function Docs($id) {

    include './dbconnection.php';

    $total = 0;

    $sql = "SELECT * FROM tbl_officers_document WHERE `OID`='" . $id . "'";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {

        if ($row['SIA_Front'] != "") {
            $total++;
        }
        if ($row['SIA_Rear'] != "") {
            $total++;
        }
        if ($row['Passport'] != "") {
            $total++;
        }
        if ($row['bill'] != "") {
            $total++;
        }
        if ($row['other'] != "") {
            $total++;
        }
        if ($row['selfie'] != "") {
            $total++;
        }
        return $total;
    } else {
        return 0;
    }
}

?>