<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

        <style>
            label{
                font-family: "Times New Roman", Times, serif;
                font-size: 16px;
            }
            #submitBtn{
                background-color: #57b846;
                color: white;
                width: 250px;
                height: 50px;
                border-radius: 30px;
            }
            #submitBtn:hover{
                background-color: gray;
                cursor: pointer;
            }
            #myProgress {
                width: 80%;
                background-color: #ddd;
                border-radius: 15px;
            }

            #myBar {
                width: 1%;
                height: 30px;
                background-color: #4CAF50;
                border-radius: 15px;
            }

            * {
                box-sizing: border-box;
            }

            body {
                font: 16px Arial;  
            }

            /*the container must be positioned relative:*/
            .autocomplete {
                position: relative;
                display: inline-block;
            }

            .autocomplete-items {
                position: absolute;
                border: 1px solid #d4d4d4;
                border-bottom: none;
                border-top: none;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 100%;
                left: 0;
                right: 0;
            }

            .autocomplete-items div {
                padding: 10px;
                cursor: pointer;
                background-color: #fff; 
                border-bottom: 1px solid #d4d4d4; 
            }

            /*when hovering an item:*/
            .autocomplete-items div:hover {
                background-color: #e9e9e9; 
            }

            /*when navigating through the items using the arrow keys:*/
            .autocomplete-active {
                background-color: DodgerBlue !important; 
                color: #ffffff; 
            }
        </style>


    </head>
    <body>




    <center>


        <div class="w3-responsive  w3-animate-zoom" style="border-radius: 15px;" >
            <table  style="width:80%; background-color: #f1f1f1; border-radius: 1em;"  class="w3-table  w3-card-4 w3-small w3-centered"> 
                <thead>
                    <tr><h1><i class='fas fa-user-shield' style='font-size:38px'></i>&nbsp;&nbsp;Officer Registration </h1></tr>
                <tr class="header">
                    <th width='25%'></th>
                    <th width='25%'></th>
                    <th width='25%'></th>
                    <th width='25%'></th>

                </tr>

                </thead> 
                <tbody>
                <td><label>First Name</label></td>
                <td><input placeholder="First name..." name="fname" id="fname" maxlength="32" class="w3-input w3-border w3-round-large"></td>
<!--                <td></td>-->
                <td><label>Last Name</label></td>
                <td><input placeholder="Last name..." name="lname" id="lname" maxlength="32" class="w3-input w3-border w3-round-large"></td>

                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" placeholder="E-mail..." name="email" id="email" class="w3-input w3-border w3-round-large"></td>
                    <td><label>Phone</label></td>
                    <td><input placeholder="Phone..." name="phone" id="phone" maxlength="12" class="w3-input w3-border w3-round-large"></td>

                </tr>
                <tr>
                    <td><label>Address</label></td>
                    <td><input placeholder="Address..." name="address" id="address" class="w3-input w3-border w3-round-large"></td>
                    <td><label>Postcode</label></td>
                    <td>
                        <input id="postcode" class="w3-input w3-border w3-round-large" type="text" name="postcode" placeholder="Postcode(For example : CA24,LU1..)" >
                    </td>
                </tr>
                <tr>
                    <td><label>Country</label></td>
                    <td><input id="country" class="w3-input w3-border w3-round-large" type="text" name="Town" placeholder="Country"/></td>
                    <td><label>Region</label></td>
                    <td>
                        <input id="Region" class="w3-input w3-border w3-round-large" type="text" name="Region" placeholder="Region">
                    </td>
                </tr>
                <tr>

                    <td><label>Gender</label></td>
                    <td><select placeholder="Gender.." name="gender" id="gender" class="w3-input w3-border w3-round-large">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select></td>

                    <td><label>Birthday</label></td>
                    <td><input type="date" name="birthday" id="birthday" class="w3-input w3-border w3-round-large"></td>
                </tr>



                <tr>

                    <td><label>User Name</label></td>
                    <td><input placeholder="Username..."  name="uname" id="uname"  class="w3-input w3-border w3-round-large"></td>
                    <td><label>Password</label></td>
                    <td><input placeholder="Password..."  name="pword" type="password" id="pword" class="w3-input w3-border w3-round-large"></td>
                </tr>
                <tr>


                    <td><label>Confirm Password</label></td>
                    <td><input placeholder="Confirm Password..."  name="cnfpword" id="cnfpword" type="password" class="w3-input w3-border w3-round-large"></td>

                    <td><label>Type Of License</label></td>
                    <td><select name="typofficer" id="typofficer" class="w3-input w3-border w3-round-large">
                            <option value="SIA">SIA</option>
                            <option value="Steward">Steward</option>
                        </select></td>
                </tr>

                <tr>
                    <td><div id="license-div-lbl"><label>SIA License No.</label></div></td>
                    <td><div id="license-div">
                            <p><input placeholder="SIA License Number..." name="sia_no" id="sia_no"  minlength="16" maxlength="16" class="w3-input w3-border w3-round-large"></p>
                        </div></td>
                    <td><div id="license-exp-div-lbl"><label>SIA License Expiry</label></div></td>
                    <td><div id="license-exp-div">
                            <p><input type="date" placeholder="SIA License Expiry..." name="sia_exp" id="sia_exp" class="w3-input w3-border w3-round-large">
                            </p>
                        </div></td>
                </tr>
                <tr style="display: none;">
                    <td><label>Latitude</label></td>
                    <td>
                        <input placeholder="Latitude" name="latitude" id="latitude"   class="w3-input w3-border w3-round-large">
                    </td>
                    <td><label>Longitude</label></td>
                    <td>
                        <input placeholder="Longitude" name="longitude" id="longitude"   class="w3-input w3-border w3-round-large">
                    </td>
                </tr>
                <tr>

                    <td></td>
                    <td><p><input name="mode" id="mode" type="text" value="Insert" hidden></p></td>
                </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="4"></td>

                    </tr>

                </tfoot>

            </table>
            <br>
            <br>
            <div id="myProgress" style="display:none;">
                <div id="myBar"></div>
            </div>
            <br>
            <br>
            <button type="button" id="submitBtn" value="Submit" >Register</button>

        </div>
    </center>

    <script>
        $(document).ready(function () {


            $(document).ajaxStart(function () {
                $("#myProgress").css("display", "block");
                move();
            });
            $(document).ajaxComplete(function () {
                $("#myProgress").css("display", "none");
            });
            function move() {
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);
                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                    } else {
                        width++;
                        elem.style.width = width + '%';
                    }
                }
            }


            $("#email").focusout(function () {

                document.getElementById('uname').value = this.value;
            });

            $("#submitBtn").click(function () {

                var firstname = document.getElementById('fname').value;
                var lastname = document.getElementById('lname').value;
                var email = document.getElementById('email').value;
                var phone = document.getElementById('phone').value;
                var address = document.getElementById('address').value;
                var postcode = document.getElementById('postcode').value;
                var Region = document.getElementById('Region').value;
                var country = document.getElementById('country').value;
                var gender = document.getElementById('gender').value;
                var dob = document.getElementById('birthday').value;
                var typeofofficer = document.getElementById('typofficer').value;
                var sia_no = document.getElementById('sia_no').value;
                var sia_exp = document.getElementById('sia_exp').value;

                var shortname = document.getElementById('uname').value;
                var password = document.getElementById('pword').value;
                var conf_password = document.getElementById('cnfpword').value;
                var latitude = document.getElementById('latitude').value;
                var longitude = document.getElementById('longitude').value;
                
                if (latitude == '')
                {
                    latitude = 0;
                }
                if (longitude == '')
                {
                    longitude = 0;
                }
                if (firstname == '')
                {
                    alert("Enter First Name ");
                    document.getElementById('fname').focus();
                    return false;
                }
                if (lastname == '')
                {
                    alert("Enter Last Name ");
                    document.getElementById('lname').focus();
                    return false;
                }
                if (email == '')
                {
                    ValidateEmail(email);
//                    document.getElementById('email').focus();
                    return false;
                }
                if (phone == '')
                {
                    alert("Enter Phone No.");
                    document.getElementById('phone').focus();
                    return false;
                }
                if (address == '')
                {
                    alert("Enter Address");
                    document.getElementById('address').focus();
                    return false;
                }
                if (postcode == '')
                {
                    alert("Enter Postcode");
                    document.getElementById('postcode').focus();
                    return false;
                }
                if (country == '')
                {
                    alert("Enter Country");
                    document.getElementById('country').focus();
                    return false;
                }
                if (Region == '')
                {
                    alert("Enter Region");
                    document.getElementById('Region').focus();
                    return false;
                }
                if (dob == '')
                {
                    alert("Enter Valid Date Of Birth ");
                    document.getElementById('birthday').focus();
                    return false;
                }
                if (typeofofficer == "SIA" && sia_no == '')
                {
                    alert("Enter SIA No.");
                    document.getElementById('sia_no').focus();
                    return false;
                }
                if (typeofofficer == "SIA" && sia_exp == '')
                {
                    alert("Enter SIA Expiry Date");
                    document.getElementById('sia_exp').focus();
                    return false;
                }

                if (shortname == "") {
                    alert("Please enter username");
                    document.getElementById('uname').focus();
                    return false;

                }
                if (password == "") {
                    alert("Please enter password");
                    document.getElementById('pword').focus();
                    return false;
                }
                if (conf_password == "") {
                    alert("Please enter confirm password");
//                    document.getElementById('cnfpword').focus();
                    document.getElementById('cnfpword').style.color = 'red';
                    return false;
                }
                if (typeofofficer == "Steward") {
                    var sia_no = "";
                    var sia_exp = "";
                }



//                alert(postcode + "-" + Region);

                $.ajax({

                    url: "insert_new.php",
                    method: "POST",
                    data: {mode: 'Insert', lastname: lastname, firstname: firstname,
                        shortname: shortname, gender: gender, dob: dob, email: email, phone: phone, address: address,
                        country: country, Region: Region, postcode: postcode, typeofofficer: typeofofficer, sia_no: sia_no,
                        sia_exp: sia_exp, password: password, conf_password: conf_password, latitude: latitude, longitude: longitude},
                    dataType: "text",
                    success: function (data)
                    {

                        alert(data);

                    }

                });
            });
            $("#typofficer").change(function () {

                var a = document.getElementById('typofficer').value;
                if (a == "Steward") {
                    $("#license-div-lbl").fadeOut();
                    $("#license-div").fadeOut();
                    $("#license-exp-div").fadeOut();
                    $("#license-exp-div-lbl").fadeOut();
                } else {
                    $("#license-div").fadeIn();
                    $("#license-div-lbl").fadeIn();
                    $("#license-exp-div").fadeIn();
                    $("#license-exp-div-lbl").fadeIn();
                }
            });



            function PostCodeCheck() {
                var postcode = document.getElementById('postcode').value;


                $.ajax({
                    url: "https://api.postcodes.io/postcodes/" + postcode,
                    type: "GET",
                    dataType: "json",
                    success: function (data)
                    {

                        document.getElementById('postcode').value = data['result']['postcode'];
                        document.getElementById('country').value = data['result']['country'];
                        document.getElementById('Region').value = data['result']['parliamentary_constituency'];
                        document.getElementById('latitude').value = data['result']['latitude'];
                        document.getElementById('longitude').value = data['result']['longitude'];


                    }

                });


            }

            /*--------------------------------------------Validations-----------------------------------------*/


            $("#postcode").focusout(function () { // When the user clicks the Search button
                PostCodeCheck();
            });



            $("#cnfpword").focusout(function () { // When the user clicks the Search button

                var pwd1 = document.getElementById('pword').value;
                var pwd2 = document.getElementById('cnfpword').value;
                if (pwd1 != pwd2)
                {
                    document.getElementById('cnfpword').style.color = 'red';
                    alert('Passwords does not match');
                    document.getElementById("submitBtn").style.display = "none";
                } else
                {
                    document.getElementById('cnfpword').style.color = 'green';
                    document.getElementById('pword').style.color = 'green';
                    document.getElementById("submitBtn").style.display = "inline";
                }


            });
            $(document).on('keypress', '#sia_no', function (event) {
                var regex = new RegExp("^[0-9 ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });
        });
        $(document).on('keypress', '#phone', function (event) {
            var regex = new RegExp("^[0-9 ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $("#sia_exp").focusout(function () {
            var sia_exp = this.value;
            var licensedate = new Date(sia_exp);
            var currdate = new Date();
            if (licensedate < currdate)
            {
                alert("You can not register because your license is expired");
                document.getElementById('sia_exp').value = "";
            }
        });
        $("#birthday").focusout(function () {
            var birthday = this.value;
            var birthday = new Date(birthday);
            var currdate = new Date();
            var byear = birthday.getFullYear();
            var cyear = currdate.getFullYear();
            if (byear >= cyear)
            {
                alert("Please enter valid birth date");
                document.getElementById('birthday').value = "";
            }
        });
        $("#email").focusout(function () {
            ValidateEmail(this.value);
        });
        /*---------------------------------------------Function--------------------------------------------------------------*/
        function isValidUsername(myStr, pattern) {
            var pattern1 = "[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}";
            var StringMatches = myStr.match(pattern.toString());
            if (StringMatches) {
                return true;
            } else {
                return false;
            }
        }

        function ValidateEmail(mail)

        {
            if (mail == "") {
                alert("Enter Email");
                document.getElementById('email').style.color = 'red';
                return false;
            } else {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
                {
                    document.getElementById('email').style.color = 'green';
                    return (true)
                } else {
                    alert("You have entered an invalid email address!");
                    document.getElementById('email').value = "";
                    document.getElementById('email').style.color = 'red';
                    return (false)

                }
            }


        }


        function ValidateSIA(SIA)

        {
            if (/^[0-9]*$/.test(SIA))
            {
                return (true)
            } else {
                alert("You have entered an invalid SIA License No!")
                return (false)
            }
        }

        function Validatephone(phone)

        {
            if (/^[0-9]*$/.test(phone))
            {
                return (true)
            } else {
                alert("You have entered an invalid Phone No!")
                return (false)
            }
        }




    </script>

</body>
</html>