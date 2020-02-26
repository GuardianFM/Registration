<?php

$mode = $_POST['mode'];

include "./dbconnection.php"; // Load file connection.php



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
    }
}
?>