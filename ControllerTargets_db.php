<?php

$mode = $_POST['mode'];
include "./dbconnection.php"; // Load file connection.php

if ($mode == "Fetch") {
    $i = 0;
    $output = '';

    $sql = "SELECT COUNT(*) AS Count, tbl_employee.county FROM `tbl_employee` JOIN `counties` ON counties.county= tbl_employee.county WHERE tbl_employee.`county`!='' GROUP BY tbl_employee.`county` ORDER BY Count DESC ";

    $result = mysqli_query($connect, $sql);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $target = 25 + $row['Count'];
            $percent = ($row['Count'] / $target) * 100;
            $output .= '
              <tr>    
                <td>
                
            <div class="container">
            <div class="row">
                <div class="col-sm-2 col-xs-2">
                    <p style="float:left; font-size:12px;">' . $row['county'] . '</p>
                </div>
                <div class="col-sm-8 col-xs-8">
               
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow=' . $percent . ' aria-valuemin="0" aria-valuemax="100" style="width:' . $percent . '%">
                            ' . round($percent, 2) . '%
                        </div>
                    </div>  
                   
                </div>
                <div class="col-sm-2 col-xs-2">
                    <p style="float:right;font-size:12px;">Target : ' . $target . '</p>
                </div>
            </div>
        </div>            
                
             
              </td>                    
              </tr>
              ';
            $i = $i + 1;
        }
    } else {
        $output .= '
             <tr>
              <td colspan="1" align="center">No Data Found</td>
             </tr>';
    }
    echo $output;
}