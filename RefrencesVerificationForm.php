<!DOCTYPE html>
<html>
    <head>
        <title>Reference Verification Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            label{
                font-size:14px;
            }
            p{
                font-size:14px;
            }
        </style>  
    </head>

    <body>






    <center>
        <br>
        <div  class="w3-container" style=" margin-left: 2.5%; margin-right: 2.5%;">

            <table border='1' class="w3-table w3-centered w3-responsive w3-tiny w3-card" id="off_tbl" >
                <thead>
                    <tr>

                        <th colspan="6"><img src="assets/images/Gaurdian-Logo.png" width="250px;" height="80px;" style="border-radius: 15px;" ></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label>To</label></td>
                        <td colspan="2"><input type="text" class="w3-input w3-round-large w3-border" name="" id="to" value="GuardianFM" disabled /></td>
                        <td><label>From</label></td>
                        <td colspan="2"><input class="w3-input w3-round-large w3-border" type="text" name="" id="from" value="<?php echo $_GET['name'] ?>"/></td>                       
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                        <td colspan="2"> <input  class="w3-input w3-round-large w3-border" type="text" name="" id="email" value="hr@guardianfm.co.uk" disabled/></td>
                        <td ><label>Pages</label></td>
                        <td colspan="2"><input class="w3-input w3-round-large w3-border" type="text" name="" value="1" disabled /></td>                       
                    </tr>
                    <tr>
                        <td><label>Phone</label></td>
                        <td colspan="2"><input  class="w3-input w3-round-large w3-border" type="text" name="" id="phone" value="447491163504" disabled /></td>
                        <td><label>Date</label></td>
                        <td colspan="2"><input class="w3-input w3-round-large w3-border" type="text" name="" id="currdate" value="<?PHP echo date("Y-m-d"); ?>" disabled/></td>                       
                    </tr>
                    <tr>
                        <td><label>Re</label></td>
                        <td colspan="2"><input class="w3-input w3-round-large w3-border" type="text" name="" id="re" value="Urgent Employment Request" disabled/></td>
                        <td><label>CC</label></td>
                        <td colspan="2"><input class="w3-input w3-round-large w3-border" type="text" name="" id="cc" value="" /></td>                       
                    </tr>
                    <tr>
                        <td colspan="6"><h6 style="text-align: left;">Dear Sir/Madam,</h6></td>                                               
                    </tr>

                    <tr>
                        <td colspan="6"><h6 style="text-align: left;">The candidate named below has applied for the position of Security Officer and has given us permission to contact you for a reference. We would be grateful if you would kindly confirm the information given to us by the candidate and answer a few questions listed below. Your urgent confirmation of this information by return email, will assist this candidate.</h6></td>
                    </tr>
                    <tr>
                        <td colspan="3"><p>Candidate Name</p></td>  
                        <td colspan="3"><input class="w3-input w3-round-large w3-border" type="text" name="" id="officer" value="<?php echo $_GET['officername'] ?>" disabled/></td> 
                    </tr>
                    <tr>
                        <td colspan="3"><p>NI Number</p></td>  
                        <td colspan="3"><input class="w3-input w3-round-large w3-border" type="text" name="" id="ni_no"/></td> 
                    </tr>
                    <tr>
                        <td colspan="3"><p>Date Of Birth</p></td>  
                        <td colspan="3"><input class="w3-input w3-round-large w3-border" type="date" name="" id="dob"/></td> 
                    </tr>
                    <tr>
                        <td colspan="6"><p>If the employment details above are correct tick here <input type="checkbox" name="" id="dtlchk" /> If not please amend in the table below:</p></td>  

                    </tr>
                    <tr>
                        <td>From</td>
                        <td>To</td>
                        <td colspan="2">Job Title</td>
                        <td colspan="2">Reason For Leaving</td>
                    </tr>
                    <tr>
                        <td><input class="w3-input w3-round-large w3-border" type="date" name="" id="job_from" value="" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="date" name="" id="job_to" value="" /></td>
                        <td colspan="2"><input class="w3-input w3-round-large w3-border" type="text"  name="" id="job_title" value="" /> </td>
                        <td colspan="2">  <input class="w3-input w3-round-large w3-border" type="text" name="" id="job_leaving_reason" value="" /></td>
                    </tr>

                    <tr>
                        <td><p>Please Assess:</p></td>
                        <td><p>Excellent</p></td>
                        <td><p>Good</p></td>
                        <td><p>Fair</p></td>
                        <td><p>Poor</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>Honesty/Trustworthiness</p></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="honesty" id="honesty" value="Excellent" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="honesty" id="honesty" value="Good" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="honesty" id="honesty" value="Fair" /></td>
                        <td ><input class="w3-input w3-round-large w3-border" type="radio" name="honesty" id="honesty" value="Poor" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>Attendance/Timekeeping</p></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="attendance" id="attendance" value="Excellent" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="attendance" id="attendance" value="Good" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="attendance" id="attendance" value="Fair" /></td>
                        <td ><input class="w3-input w3-round-large w3-border" type="radio" name="attendance" id="attendance" value="Poor" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>Reliability</p></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="reliability" id="reliability" value="Excellent" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="reliability" id="reliability" value="Good" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="reliability" id="reliability" value="Fair" /></td>
                        <td ><input class="w3-input w3-round-large w3-border" type="radio" name="reliability" id="reliability" value="Poor" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>Health</p></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="health" id="health" value="Excellent" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="health" id="health" value="Good" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="health" id="health" value="Fair" /></td>
                        <td ><input class="w3-input w3-round-large w3-border" type="radio" name="health" id="health" value="Poor" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>Sobriety</p></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="sobriety" id="sobriety" value="Excellent" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="sobriety" id="sobriety" value="Good" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="sobriety" id="sobriety" value="Fair" /></td>
                        <td ><input class="w3-input w3-round-large w3-border" type="radio" name="sobriety" id="sobriety" value="Poor" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>Suitability for Position</p></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="suitability" id="suitability" value="Excellent" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="suitability" id="suitability" value="Good" /></td>
                        <td><input class="w3-input w3-round-large w3-border" type="radio" name="suitability" id="suitability" value="Fair" /></td>
                        <td ><input class="w3-input w3-round-large w3-border" type="radio" name="suitability" id="suitability" value="Poor" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="6"><p style="text-align: left;">Would you re-employ this person? <select id="select_re_employ"  class="w3-input w3-round-large w3-border"><option value="Yes">Yes</option><option value="No">No</option></select> If no is this Company Policy? <select id="select_policy"  class="w3-input w3-round-large w3-border"><option value="Yes">Yes</option><option value="No">No</option></select> Do you know of any reason why this person should not be employed in a position of trust and responsibility? <input  class="w3-input w3-round-large w3-border" type="text" name="" id="reason" value="" /></p></td>
                    </tr>
                    <tr>
                        <td><label>Name</label></td>
                        <td><input class="w3-input w3-round-large w3-border" type="text" name="" id="assessorname" value="" /></td>
                        <td><label>Position</label></td>
                        <td><input class="w3-input w3-round-large w3-border" type="text" name=" " id="assessorposition" value="" /></td>
                        <td><label>Date</label></td>
                        <td><input class="w3-input w3-round-large w3-border" type="date" name=" " id="assessmentdate" value="<?php echo date("Y-m-d") ?>" disabled /></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <button class="w3-button w3-white w3-border w3-border-green w3-round-large" id="btn_submit">Submit</button>
        <br>
        <br>
        <br>
        <br>
    </center>


</body>

<script>
    $(document).ready(function () {

        $('#btn_submit').click(function () {

            var to = document.getElementById('to').value;
            var from = document.getElementById('from').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var currdate = document.getElementById('currdate').value;
            var re = document.getElementById('re').value;
            var cc = document.getElementById('cc').value;
            var officer = document.getElementById('officer').value;
            var ni = document.getElementById('ni_no').value;
            var dob = document.getElementById('dob').value;
            var dtlchk = document.getElementById('dtlchk').checked;
            var job_from = document.getElementById('job_from').value;
            var job_to = document.getElementById('job_to').value;
            var job_title = document.getElementById('job_title').value;
            var job_leaving_reason = document.getElementById('job_leaving_reason').value;
            var honesty = $("input[name='honesty']:checked").val();
            var attendance = $("input[name='attendance']:checked").val();
            var reliability = $("input[name='reliability']:checked").val();
            var health = $("input[name='health']:checked").val();
            var sobriety = $("input[name='sobriety']:checked").val();
            var suitability = $("input[name='suitability']:checked").val();
            var reemploy = document.getElementById('select_re_employ').value;
            var policy = document.getElementById('select_policy').value;
            var reason = document.getElementById('reason').value;
            var assessorname = document.getElementById('assessorname').value;
            var assessorposition = document.getElementById('assessorposition').value;
            var assessmentdate = document.getElementById('assessmentdate').value;


            $.ajax({

                url: "db_RefrencesVerificationForm.php",
                method: "POST",
                data: {to: to, from: from, email: email, phone: phone, currdate: currdate, re: re, cc: cc, officer: officer, ni: ni, dob: dob, dtlchk: dtlchk,
                    job_from: job_from, job_to: job_to, job_title: job_title, job_leaving_reason: job_leaving_reason, honesty: honesty, attendance: attendance, reliability: reliability,
                    health: health, sobriety: sobriety, suitability: suitability, reemploy: reemploy, policy: policy, reason: reason, assessorname: assessorname, assessorposition: assessorposition, assessmentdate: assessmentdate},
                dataType: "text",
                success: function (data)
                {

                    alert(data);

                }

            });
        })
    });
</script>
</html>