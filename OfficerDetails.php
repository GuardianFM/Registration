<!DOCTYPE html>
<html>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>


    <style>
        table {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;

        }

        .circle {
            height: 200px;
            width: 200px;
            background-color:white;
            border-radius: 100%;
            border-style: solid;
            border-color: red;
            text-align: center;
            margin-bottom: 50px;
        }
        #span_{ 
            line-height:200px; 

        }
        div.b{
            vertical-align:middle; 
            display:inline-block; 

        }
        #officer_dtl td label{
            float: left;
        }

        .MainDiv{
            width:70%;

        }        
        .circle{
            width:200px;;
            height: 200px;
            /*float: right;*/
            margin-bottom: -5px;

        }
        div{
            /*border-style: solid;*/
        }

        button {
            background-color: #cc2900; /* Green */
            border: none;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width:25%;
            border-radius: 12px;
        }

        #mediacircle{
            display: none;
        }
        @media all and (max-width: 767px) {
            .MainDiv {
                width: 95%;

            }

            #mediacircle{
                display: block;
            }

            .circle{
                display: none;
            }
        }



    </style>
    <body>

        <div class="container">
            <div class="w3-light-grey" style="margin-left:15%; margin-right: 15%; margin-top: 5%; margin-bottom: 2%; border-radius: 15px; ">
                <div class="w3-green" style="height:26px; text-align: center; border-radius: 15px;"  id="percent"></div>
            </div>
        </div>



        <div class="container" >

            <center> <div class="MainDiv">         

                    <table class="w3-table-all w3-border w3-card w3-small w3-centered " id="officer_dtl" style="background-color: red; border-style:   double;">
                        <thead>
                        <th colspan="2"><h2>Personal Information</h2></th>

                        </thead>
                        <tbody>


                            <tr class="table-row">
                                <td><label >ID</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="officer_id" disabled=""></td>


                            </tr>
                            <tr>
                                <td><label>Last Name</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="lastname"></td>


                            </tr>
                            <tr>
                                <td><label>First Name</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="firstname"></td>


                            </tr>
                            <tr>
                                <td><label>User Name</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="username" disabled></td>


                            </tr>
                            <tr>
                                <td><label>Gender</label></td>
                                <td><select class="w3-input w3-round-large w3-border" id="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select></td>


                            </tr>
                            <tr>
                                <td><label>Date Of Birth</label></td>
                                <td><input type="date" class="w3-input w3-round-large w3-border" id="dob"></td>

                            </tr>
                            <tr>
                                <td><label>Email</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="email"></td>

                            </tr>
                            <tr>
                                <td><label>Password</label></td>
                                <td><input type="password" class="w3-input w3-round-large w3-border" id="password"></td>

                            </tr>
                            <tr>
                                <td><label>Confirm Password</label></td>
                                <td><input type="password" class="w3-input w3-round-large w3-border" id="confrmpassword"></td>
                            </tr>
                            <tr>
                                <td><label>Phone</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="phone" onblur="PhoneCheck(this.value);"></td>

                            </tr>
                            <tr>
                                <td><label>Postcode</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="postcode"></td>
                            </tr>
                            <tr>
                                <td><label>Address</label></td>
                                <td><select class="w3-input w3-round-large w3-border" id="address"><optgroup label="Select Address"></optgroup></select></td>

                            </tr>

                            <tr>
                                <td><label>County</label></td>
                                <td><select class="w3-input w3-round-large w3-border" id="region">
                                        <optgroup label="Select County"></optgroup>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><label>City</label></td>
                                <td><select class="w3-input w3-round-large w3-border" id="city"><optgroup label="Select City"></optgroup></select></td>
                            </tr>
                            <tr>
                                <td><label>Country</label></td>
                                <td><input type="text" class="w3-input w3-round-large w3-border" id="country"/></td>
                            </tr>

                            <tr>
                                <td><label>Type Of Officer</label></td>
                                <td><select class="w3-input w3-round-large w3-border" id="typeofofficer">
                                        <?php
                                        include 'dbconnection.php'; //get the contractors 
                                        $sql = "SELECT * FROM `typeofofficer` ORDER BY `type` ASC";
                                        $result = mysqli_query($connect, $sql);
                                        $i = 0;
                                        $row = mysqli_fetch_array($result);
                                        $contractor_id = 0;

                                        mysqli_data_seek($result, 0);

                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["type"] ?>"><?php echo $row["type"] ?></option>
                                            <?php
                                        }
                                        ?> 
                                    </select>        
                                </td>

                            </tr>
                            <tr>
                                <td><label>SIA License No.</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="license" maxlength="16"></td>

                            </tr>
                            <tr>
                                <td><label>SIA License Expiry Date</label></td>
                                <td><input type="date" class="w3-input w3-round-large w3-border" id="licenseexp"></td>

                            </tr>
                            <tr>
                                <td class="table-header"><label>Bank Name</label></td>
                                <td class="col col-2" data-label="Bank Name"><input class="w3-input w3-round-large w3-border" id="bankname" ></td>
                            </tr>
                            <tr>
                                <td><label>Account Title</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="accounttitle"></td>
                            </tr>
                            <tr>
                                <td><label>Sort Code</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="sortcode" maxlength="8"></td>
                            </tr>
                            <tr>
                                <td><label>Account Number</label></td>
                                <td><input class="w3-input w3-round-large w3-border" id="accountno"></td>
                            </tr>
                            <tr style="display: none;">
                                <td><label>Latitude</label></td>
                                <td>
                                    <input placeholder="Latitude" name="latitude" id="latitude"   class="w3-input w3-border w3-round-large">
                                </td>

                            </tr>
                            <tr style="display: none;">
                                <td><label>Longitude</label></td>
                                <td>
                                    <input placeholder="Longitude" name="longitude" id="longitude"   class="w3-input w3-border w3-round-large">
                                </td>

                            </tr>
                        </tbody>


                    </table>
                </div>
            </center>
        </div>
    </div>



    <br>
    <br>
<center>
    <button  id="btn-save">Update</button>
</center>
<br>
<br>

</div>

</body>
<script>

    var total = 0;
    var total_doc = 0;
    $(document).ready(function () {

        DocumentComplete();
        LoadEmpData();
        $(document).on('click', '#btn-save', function () {

            var id = document.getElementById('officer_id').value;
            if (Number.isInteger(parseInt(id))) {

                UpdateData();
            } else {
                alert("No id found")
            }
        });
        $("#sortcode").keyup(function () {
            if ($(this).val().length == 2) {
                $(this).val($(this).val() + "-");
            } else if ($(this).val().length == 5) {
                $(this).val($(this).val() + "-");
            }
        });
    });


    function PhoneCheck(val) {
        var phone = document.getElementById('phone');
        if (val.length == 12) {
        } else if (val.length == 13) {
            val = phone.value.replace("+", "");
            phone.value = val;
        } else if (val.length == 11) {
            phone.value = '44' + val.slice(1, phone.value.length);
        } else {
            phone.value = '';
        }
    }

    function ProfileComplete() {

        //    alert('<?php echo $_GET['id']; ?>')

        $.ajax({
            type: "POST", // The method of sending data can be with GET or POST
            url: "db_OfficerDetails.php", // Fill in url / php file path to destination
            //          

            data: {id: '<?php echo $_GET['id']; ?>', mode: 'ProfileCheck'}, // data to be sent to the process file
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {




                if (response.status == "success") {

                    // If the content of the status array is success
                    if (response.id != "") {
                        total++;
                    }
                    if (response.name != "") {
                        total++;
                    }
                    if (response.firstname != "") {
                        total++;
                    }
                    if (response.gender != "") {
                        total++;
                    }
                    if (response.phone != "") {
                        total++;
                    }
                    if (response.address != "") {
                        total++;
                    }
                    if (response.dob != "") {
                        total++;
                    }
                    if (response.postcode != "") {
                        total++;
                    }
                    if (response.country != "") {
                        total++;
                    }
                    if (response.email != "") {
                        total++;
                    }
                    if (response.license != "") {
                        total++;
                    }
                    if (response.licenseexpiry != "") {
                        total++;
                    }
                    if (response.shortname != "") {
                        total++;
                    }
                    if (response.password != "") {
                        total++;
                    }
                    if (response.conf_password != "") {
                        total++;
                    }
                    if (response.typeofofficer != "") {
                        total++;
                    }
                    if (response.bankname != "") {
                        total++;
                    }
                    if (response.acctitle != "") {
                        total++;
                    }
                    if (response.sortcode != "") {
                        total++;
                    }
                    if (response.accnum != "") {
                        total++;
                    }
                    if (response.region != "") {
                        total++;
                    }
                    if (response.city != "") {
                        total++;
                    }
                    //alert(total + '-' + total_doc);
                    var percentage = (((total + total_doc) / 27) * 100);
                    total = 0;
                    total_doc = 0;
                    document.getElementById('percent').innerHTML = percentage.toFixed(0) + "% Profile Completed";
                    document.getElementById('percent').style.width = percentage.toFixed(0) + '%';
                    if (percentage == 100) {
                        document.getElementById("circle").style.borderColor = "green";
                    } else {
                        document.getElementById("circle").style.borderColor = "red";
                    }
                } else { // If the contents of the status array are failed
                    //alert("No Record Found");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) { // When there is an error
                alert(xhr.responseText);
            }
        });
    }

    function LoadEmpData() {


        $.ajax({
            type: "POST", // The method of sending data can be with GET or POST
            url: "db_OfficerDetails.php", // Fill in url / php file path to destination
            //          

            data: {id: '<?php echo $_GET['id']; ?>', mode: 'fetch'}, // data to be sent to the process file
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {


                if (response.status == "success") {

                    // If the content of the status array is success
                    $("#officer_id").val(response.id); // set textbox with id name        
                    $("#lastname").val(response.name); // set textbox with id name
                    $("#firstname").val(response.firstname); // set textbox with id first name
                    $("#gender").val(response.gender); // set textbox with id gender
                    $("#phone").val(response.phone); // set textbox with id phone
                    $('#address').append(`<option value="${response.address}"> 
                                       ${response.address} 
                                  </option>`);
                    $("#dob").val(response.dob); // set textbox with id name
                    $("#postcode").val(response.postcode); // set textbox with id sex
                    $("#country").val(response.country); // set textbox with id phone
                    $("#email").val(response.email); // set textbox with id address
                    $("#license").val(response.license); // set textbox with id sex
                    $("#licenseexp").val(response.licenseexpiry); // set textbox with id phone
                    $("#username").val(response.shortname); // set textbox with id address
                    $("#password").val(response.password); // set textbox with id address
                    $("#confrmpassword").val(response.conf_password);
                    $("#typeofofficer").val(response.typeofofficer);
                    $("#bankname").val(response.bankname);
                    $("#accounttitle").val(response.acctitle);
                    $("#sortcode").val(response.sortcode);
                    $("#accountno").val(response.accnum);
                    $("#latitude").val(response.emp_latitude);
                    $("#longitude").val(response.emp_longitude);
                    $('#region').append(`<option value="${response.county}"> 
                                       ${response.county} 
                                  </option>`);
                    $('#city').append(`<option value="${response.city}"> 
                                       ${response.city} 
                                  </option>`);
                } else { // If the contents of the status array are failed
                    alert("No Record Found");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) { // When there is an error
                alert(xhr.responseText);
            }
        });
    }

    function UpdateData() {


        var id = document.getElementById('officer_id').value;
        var name = document.getElementById('lastname').value;
        var firstname = document.getElementById('firstname').value;
        var shortname = document.getElementById('username').value;
        var gender = document.getElementById('gender').value;
        var dob = document.getElementById('dob').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;
        var country = document.getElementById('country').value;
        var postcode = document.getElementById('postcode').value;
        var license = document.getElementById('license').value;
        var licenseexpiry = document.getElementById('licenseexp').value;
        var licensedate = new Date(licenseexp);
        var currdate = new Date();
        var password = document.getElementById('password').value;
        var conf_password = document.getElementById('confrmpassword').value;
        var typeofofficer = document.getElementById('typeofofficer').value;
        var bankname = document.getElementById('bankname').value;
        var acctitle = document.getElementById('accounttitle').value;
        var sortcode = document.getElementById('sortcode').value;
        var accnum = document.getElementById('accountno').value;
        var region = document.getElementById('region').value;
        var city = document.getElementById('city').value;
        var latitude = document.getElementById('latitude').value;
        var longitude = document.getElementById('longitude').value;
        if (conf_password == '')
        {
            alert("Enter Confirm Password ");
            return false;
        }

        if (password == '')
        {
            alert("Enter Password ");
            return false;
        }

        if (password != conf_password) {
            alert("Passwords does not match");
            return false;
        }
        if (postcode == '')
        {
            alert("Enter Postcode ");
            return false;
        }



        if (dob == '')
        {
            alert("Enter Valid Date Of Birth ");
            return false;
        }

        if (shortname == '')
        {
            alert("Enter User Name");
            return false;
        }

        if (typeofofficer == 'Security Guard') {
            if (licenseexpiry == '')
            {
                alert("Enter Valid SIA License Expiry Date ");
                return false;
            }
            if (licensedate < Date())
            {
                alert("Enter valid date");
                return false;
            }
            if (license == '')
            {
                alert("Enter SIA License No.");
                return false;
            }
        }


        // var newWindow=window.open("Successphp.php", '_self', 'location=yes,scrollbars=yes,status=yes');

        $.ajax({
            url: "db_OfficerDetails.php",
            method: "POST",
            data: {mode: 'update', id: id, name: name, firstname: firstname,
                shortname: shortname, gender: gender, dob: dob, email: email, phone: phone,
                address: address, country: country, postcode: postcode, typeofofficer: typeofofficer,
                license: license, licenseexpiry: licenseexpiry, password: password, conf_password: conf_password,
                accnum: accnum, sortcode: sortcode, acctitle: acctitle, bankname: bankname, region: region, city: city, latitude: latitude, longitude: longitude},
            dataType: "text",
            success: function (data)
            {
                alert(data);
                CheckInputs();
                DocumentComplete();
                setTimeout(function () {
                    ProfileComplete();
                }, 1000);
            }

        });
    }


    function DocumentComplete() {



        $.ajax({
            type: "POST", // The method of sending data can be with GET or POST
            url: "db_OfficerDetails.php", // Fill in url / php file path to destination
            data: {id: '<?php echo $_GET['id']; ?>', mode: 'DocumentCheck'}, // data to be sent to the process file
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {




                if (response.status == "success") {

                    // If the content of the status array is success
                    if (response.SIA_Front != "") {
                        total_doc++;
                    }

                    if (response.SIA_Rear != "") {
                        total_doc++;
                    }

                    if (response.Passport != "") {
                        total_doc++;
                    }

                    if (response.bill != "") {
                        total_doc++;
                    }

                    if (response.other != "") {
                        total_doc++;
                    }





                } else { // If the contents of the status array are failed
                    alert("No Record Found");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) { // When there is an error
                alert(xhr.responseText);
            }
        });
    }


    function ValidateEmail(mail)

    {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
        {
            return (true)
        } else {
            alert("You have entered an invalid email address!")
            return (false)
        }
    }

    setTimeout(function () {
        CheckInputs();
        // DocumentComplete();
        ProfileComplete();
    }, 1000);
    function CheckInputs() {

        var name = document.getElementById('lastname').value;
        var firstname = document.getElementById('firstname').value;
        var shortname = document.getElementById('username').value;
        var gender = document.getElementById('gender').value;
        var dob = document.getElementById('dob').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;
        var country = document.getElementById('country');
        //var country_id = country[country.selectedIndex].id;
        var country_name = country.value;
        var postcode = document.getElementById('postcode').value;
        var license = document.getElementById('license').value;
        var licenseexpiry = document.getElementById('licenseexp').value;
        var licensedate = new Date(licenseexp);
        var currdate = new Date();
        var password = document.getElementById('password').value;
        var conf_password = document.getElementById('confrmpassword').value;
        var typeofofficer = document.getElementById('typeofofficer').value;
        var bankname = document.getElementById('bankname').value;
        var acctitle = document.getElementById('accounttitle').value;
        var sortcode = document.getElementById('sortcode').value;
        var accnum = document.getElementById('accountno').value;
        var region = document.getElementById('region').value;
        var city = document.getElementById('city').value;

        if (name == "") {
            document.getElementById("lastname").className = document.getElementById("lastname").className + " w3-border-red"; // this adds the error class
            document.getElementById("lastname").placeholder = "Please enter Last Name";
        } else {
            $("#lastname").removeClass("w3-border-red");
            document.getElementById("lastname").className = document.getElementById("lastname").className + " w3-border";
        }

        if (firstname == "") {
            document.getElementById("firstname").className = document.getElementById("firstname").className + " w3-border-red"; // this adds the error class
            document.getElementById("firstname").placeholder = "Please enter First Name";
        } else {
            $("#firstname").removeClass("w3-border-red");
            document.getElementById("firstname").className = document.getElementById("firstname").className + " w3-border";
        }
        if (email == "") {
            document.getElementById("email").className = document.getElementById("email").className + " w3-border-red"; // this adds the error class
            document.getElementById("email").placeholder = "Please enter Email";
        } else {
            $("#email").removeClass("w3-border-red");
            document.getElementById("email").className = document.getElementById("email").className + " w3-border";
        }
        if (password == "") {
            document.getElementById("password").className = document.getElementById("password").className + " w3-border-red"; // this adds the error class
            document.getElementById("password").placeholder = "Please enter Password";
        } else {
            $("#password").removeClass("w3-border-red");
            document.getElementById("password").className = document.getElementById("password").className + " w3-border";
        }
        if (conf_password == "") {
            document.getElementById("confrmpassword").className = document.getElementById("confrmpassword").className + " w3-border-red"; // this adds the error class
            document.getElementById("confrmpassword").placeholder = "Please enter Confirm Password";
        } else {
            $("#confrmpassword").removeClass("w3-border-red");
            document.getElementById("confrmpassword").className = document.getElementById("confrmpassword").className + " w3-border";
        }

        if (phone == "") {
            document.getElementById("phone").className = document.getElementById("phone").className + " w3-border-red"; // this adds the error class
            document.getElementById("phone").placeholder = "Please enter Phone";
        } else {
            $("#phone").removeClass("w3-border-red");
            document.getElementById("phone").className = document.getElementById("phone").className + " w3-border";
        }
        if (address == "") {
            document.getElementById("address").className = document.getElementById("address").className + " w3-border-red"; // this adds the error class
            document.getElementById("address").placeholder = "Please enter Address";
        } else {
            $("#address").removeClass("w3-border-red");
            document.getElementById("address").className = document.getElementById("address").className + " w3-border";
        }

        if (postcode == "") {
            document.getElementById("postcode").className = document.getElementById("postcode").className + " w3-border-red"; // this adds the error class
            document.getElementById("postcode").placeholder = "Please enter Postcode";
        } else {
            $("#postcode").removeClass("w3-border-red");
            document.getElementById("postcode").className = document.getElementById("postcode").className + " w3-border";
        }

        if (license == "") {
            document.getElementById("license").className = document.getElementById("license").className + " w3-border-red"; // this adds the error class
            document.getElementById("license").placeholder = "Please enter License No.";
        } else {
            $("#license").removeClass("w3-border-red");
            document.getElementById("license").className = document.getElementById("license").className + " w3-border";
        }
        if (bankname == "") {
            document.getElementById("bankname").className = document.getElementById("bankname").className + " w3-border-red"; // this adds the error class
            document.getElementById("bankname").placeholder = "Please enter Bank Name";
        } else {
            $("#bankname").removeClass("w3-border-red");
            document.getElementById("bankname").className = document.getElementById("bankname").className + " w3-border";
        }


        if (acctitle == "") {
            document.getElementById("accounttitle").className = document.getElementById("accounttitle").className + " w3-border-red"; // this adds the error class
            document.getElementById("accounttitle").placeholder = "Please enter Account Title";
        } else {
            $("#accounttitle").removeClass("w3-border-red");
            document.getElementById("accounttitle").className = document.getElementById("accounttitle").className + " w3-border";
        }

        if (sortcode == "") {
            document.getElementById("sortcode").className = document.getElementById("sortcode").className + " w3-border-red"; // this adds the error class
            document.getElementById("sortcode").placeholder = "Please enter Sort Code";
        } else {
            $("#sortcode").removeClass("w3-border-red");
            document.getElementById("sortcode").className = document.getElementById("sortcode").className + " w3-border";
        }

        if (accnum == "") {
            document.getElementById("accountno").className = document.getElementById("accountno").className + " w3-border-red"; // this adds the error class
            document.getElementById("accountno").placeholder = "Please enter Account No.";
        } else {
            $("#accountno").removeClass("w3-border-red");
            document.getElementById("accountno").className = document.getElementById("accountno").className + " w3-border";
        }
        if (region == "") {
            document.getElementById("region").className = document.getElementById("region").className + " w3-border-red"; // this adds the error class
            document.getElementById("region").placeholder = "Please select county";
        } else {
            $("#region").removeClass("w3-border-red");
            document.getElementById("region").className = document.getElementById("region").className + " w3-border";
        }
        if (city == "") {
            document.getElementById("city").className = document.getElementById("city").className + " w3-border-red"; // this adds the error class
            document.getElementById("city").placeholder = "Please select county";
        } else {
            $("#city").removeClass("w3-border-red");
            document.getElementById("city").className = document.getElementById("city").className + " w3-border";
        }

        if (country_name == "") {
            document.getElementById("country").className = document.getElementById("country").className + " w3-border-red"; // this adds the error class
            document.getElementById("country").placeholder = "Please entry country name";
        } else {
            $("#country").removeClass("w3-border-red");
            document.getElementById("country").className = document.getElementById("country").className + " w3-border";
        }


    }
//
//    function PostCodeCheck2() {
//
//        var postcode = document.getElementById('postcode').value;
//
//
//        $.ajax({
//            url: "https://api.postcodes.io/postcodes/" + postcode,
//            type: "GET",
//            dataType: "json",
//            success: function (data)
//            {
//
//                document.getElementById('postcode').value = data['result']['postcode'];
//                document.getElementById('country').value = data['result']['country'];
//                document.getElementById('region').value = data['result']['parliamentary_constituency'];
//                document.getElementById('latitude').value = data['result']['latitude'];
//                document.getElementById('longitude').value = data['result']['longitude'];
//
//
//
//            }
//
//        });
//
//
//    }


    function PostCodeValidate() {
        var postcode = document.getElementById('postcode').value;
        $.ajax({
            url: "https://api.postcodes.io/postcodes/" + postcode + "/validate",
            type: "GET",
            dataType: "json",
            success: function (data)
            {
                if (data["result"] == true) {
                    document.getElementById('postcode').value = postcode.toUpperCase();
                    PostCodeCheck();
                } else {
                    alert("Please enter the valid postcode");
                    document.getElementById('postcode').value = "";
                    document.getElementById('address').value = "";
                    document.getElementById('Region').value = "";
                    document.getElementById('country').value = "";
                    document.getElementById('postcode').focus();
                }
            }

        });
    }

    function PostCodeCheck() {
        var postcode = document.getElementById('postcode').value;
        $.ajax({
            url: "PostCode_API_db.php",
            type: "GET",
            dataType: "json",
            data: {postcode: postcode},
            success: function (data)
            {
                var county = data['county'];
                var city = data['city'];
                //Emptying the select boxes
                $('#region')
                        .find('option')
                        .remove()
                        .end();
                $('#city')
                        .find('option')
                        .remove()
                        .end();
                $('#address')
                        .find('option')
                        .remove()
                        .end();
                document.getElementById('postcode').value = postcode;
                document.getElementById('latitude').value = data['lat'];
                document.getElementById('longitude').value = data['lon'];
                //Adding value in county Select
                $('#region').append(`<option value="${county.trim()}"> 
                                       ${county.trim()} 
                                  </option>`);
                //Adding value in City Select
                $('#city').append(`<option value="${city.trim()}"> 
                                       ${city.trim()} 
                                  </option>`);
                //No Value return for county then get values from database
                if (city.trim() == "") {

<?php
include 'dbconnection.php'; //get the contractors 
$sql = "SELECT * FROM `towns`";
$result = mysqli_query($connect, $sql);
$i = 0;
$row = mysqli_fetch_array($result);
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result)) {
    ?>
                        $('#city').append(`<option value="${'<?php echo $row["town"] ?>'}"> 
                                                                                                                                                                                                       ${'<?php echo $row["town"] ?>'} 
                                                                                                                                                                                                  </option>`);
    <?php
}
?>
                }

                if (county.trim() == "") {

<?php
include 'dbconnection.php'; //get the contractors 
$sql = "SELECT * FROM `counties`";
$result = mysqli_query($connect, $sql);
$i = 0;
$row = mysqli_fetch_array($result);
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_array($result)) {
    ?>

                        $('#region').append(`<option value="${'<?php echo $row["county"] ?>'}"> 
                                                                                                                                                                                                       ${'<?php echo $row["county"] ?>'} 
                                                                                                                                                                                                  </option>`);
    <?php
}
?>
                }
//                document.getElementById("address").options.length = 0;
                for (var i = 0; i <= data['totalAddresses']; i++) {
                    var x = document.getElementById("address");
                    var option = document.createElement("option");
                    option.text = data ["addresses"][i]["fullAddress"];
                    x.add(option);
                }
            }
        });
    }



    $("#postcode").focusout(function () { // When the user clicks the Search button
        PostCodeValidate();
    });
</script>
</html>
