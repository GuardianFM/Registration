<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            * {
                box-sizing: border-box;
            }
            body{
                background-color: #404040 ;
            }
            input[type=text], select, textarea, [type=date], [type=checkbox]{
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                float: left;




            }

            label {
                /*padding: 12px 12px 12px 0;*/
                display: inline-block;
                margin-left: 10px; 

            }

            button{
                background-color: orangered;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-top: 10px;
                width:350px;


            }

            button[type=submit]:hover {
                background-color: #45a049;
            }

            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;


            }

            /*            .col-25 {
                            float: left;
                            width: 25%;
                            margin-top: 6px;
                        }
            
                        .col-75 {
                            float: left;
                            width: 75%;
                            margin-top: 6px;
                        }*/

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
                .col-25, .col-75, input[type=submit] {
                    /*width: 100%;*/
                    margin-top: 0;
                }
            }

            section {
                display: none;
                padding: 20px 0 0;
                border-top: 1px solid #abc;
            }

            input[type="radio"] {
                display: none;
            }

            label {
                /*                display: inline-block;
                                margin: 0 0 -1px;
                                padding: 15px 25px;
                                font-weight: 600;
                                text-align: center;
                                color: #abc;
                                border: 1px solid transparent;*/
            }

            label:before {
                font-family: fontawesome;
                font-weight: normal;
                margin-right: 10px;
            }

            label[for*='1']:before { content: '\f1cb'; }
            label[for*='2']:before { content: '\f17d'; }
            label[for*='3']:before { content: '\f16c'; }
            label[for*='4']:before { content: '\f171'; }

            label:hover {
                color: #789;
                cursor: pointer;
            }

            input:checked + label {
                color: black;
                border: 1px solid #abc;
                border-top: 2px solid #0af;
                border-bottom: 1px solid #fff;
            }

            #tab1:checked ~ #content1,
            #tab2:checked ~ #content2,
            #tab3:checked ~ #content3,
            #tab4:checked ~ #content4 {
                display: block;
            }
            .col-25 {
                float: left;
                width: 25%;
                margin: 2px 0px 0px;
            }

            .col-75 {
                float: left;
                width: 75%;
                margin-top: 6px;
            }

            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-top: 10px;

            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }
            input[type=submit]:hover {
                background-color: #45a049;
            }
            
            @media only screen and (max-width: 1440px) {
                /* styles for browsers larger than 1440px; */

                .container {
                    width: auto;

                }

            }

            @media only screen and (max-width: 2000px) {
                /* for sumo sized (mac) screens */
                .container {
                    /*width: 1000px;*/
                    height: auto;
                }
                .col-25, .col-75, input[type=submit] {
                    /*width: 60%;*/

                    margin-top: 0;
                 

                }

            }
            @media only screen and (max-width: 960px) {
                /* styles for browsers larger than 960px; */
                .container {
                    width: auto;
                }             

            }
.container {
                border-radius: 5px;
                background-color: #f2f2f2;
                /*padding: 20px;*/
/*                width:70%;*/
                width:100%;
            }
/*            #image_div{
                background-image: url("assets/images/background2.jpg");
                background-repeat: no-repeat;
                background-size:     cover;
                background-position: center;
                width:30%;
                height: 110%;
                position: absolute; 
                
                
            }*/
            @media only screen and (max-width: 728px) {

                /* default iPad screens */

                .container {
                    width: 700px;

                }
                #image_div{
                    display:none;

                }

                #content_div{
                    width:100%;
                }

            }
            @media screen and (max-width: 600px) {
                .col-25, .col-75, input[type=submit] {
                    width: 100%;
                    margin-top: 0;
                }
                #image_div{
                    display:none;

                }
                #content_div{
                    width:100%;
                }
            }
            @media only screen and (max-width: 480px) {
                /* styles for mobile browsers smaller than 480px; (iPhone) */
                .container {
                    width: auto;

                }
                #image_div{
                    display:none;

                }
                #content_div{
                    width:100%;
                }
            }

            @media only screen and (max-width: 414px) {
                /* styles for mobile browsers smaller than 480px; (iPhone) */
                .container {
                    width: auto;


                }
                #image_div{
                    display:none;

                }
                #content_div{
                    width:100%;
                }
            }

            @media only screen and (max-width: 375px) {
                /* styles for mobile browsers smaller than 480px; (iPhone) */
                .container {
                    width: auto;


                }
                #image_div{
                    display:none;

                }
                #content_div{
                    width:100%;
                }
            }
            @media only screen and (max-width: 320px) {
                /* styles for mobile browsers smaller than 480px; (iPhone) */
                .container {
                    width: auto;


                }
                #image_div{
                    display:none;

                }
                #content_div{
                    width:100%;
                }
            }     

            @media screen and (max-width: 600px) {
                .col-25, .col-75, button {
                    width: 80%;
                    margin-top: 5px;
                }
                #image_div{
                    display:none;

                }
                #content_div{
                    width:100%;
                }
            }
            .autocomplete {
                position: relative;
                display: inline-block;
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


            div{
                /*border-style: solid;*/
            }
        </style>


    </head>
    <body>


       
        <div class="container " style=" float: right;" id='content_div' >  
            <h1><i class='fas fa-user-shield' style='font-size:38px; '> &nbsp;&nbsp; Registration</i> </h1>
            <?php
            if (isset($message)) {
                echo '<label class="text-danger">' . $message . '</label>';
            }
            ?>  

            <form method="post" autocomplete="off">






                <div >  



                    <div class="row">
                        <div class="col-25">
                            <label for="fname">First Name</label>
                        </div>
                        <div class="col-75">
                            <input placeholder="First name..." name="fname" id="fname" maxlength="32" class="w3-input w3-border w3-round-large">


                        </div>
                    </div>





                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Last Name</label>
                        </div>
                        <div class="col-75">
                            <input placeholder="Last name..." name="lname" id="lname" maxlength="32" class="w3-input w3-border w3-round-large">
                        </div>
                    </div>
<div class="row">
                        <div class="col-25">
                            <label for="fname">Full Name</label>
                        </div>
                        <div class="col-75">
                            <input placeholder="Full name..." name="fullname" id="fullname" maxlength="32" class="w3-input w3-border w3-round-large">
                        </div>
                    </div>
  <div class="row">
                    <div class="col-25">
                        <label for="fname">Email</label>
                    </div>
                    <div class="col-75">
                        <input type="email" placeholder="E-mail..." name="email" id="email" class="w3-input w3-border w3-round-large">
                    </div>
                </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">User Name</label>
                        </div>
                        <div class="col-75">

                            <input placeholder="Username..."  name="uname" id="uname"  class="w3-input w3-border w3-round-large">
                            <input placeholder="Password..."  name="pword" type="password" id="pword" class="w3-input w3-border w3-round-large">
                            <input placeholder="Confirm Password..."  name="cnfpword" id="cnfpword" type="password" class="w3-input w3-border w3-round-large">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Postcode</label>
                        </div>
                        <div class="col-75">

                            <input id="postcode" class="w3-input w3-border w3-round-large" type="text" name="postcode" placeholder="Postcode(For example : CA24,LU1..)" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Address</label>
                        </div>
                        <div class="col-75">
                            <input placeholder="Address..." name="address" id="address" class="w3-input w3-border w3-round-large">

                        </div>
                    </div>





                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Region</label>
                        </div>
                        <div class="col-75">
                            <input id="Region" class="w3-input w3-border w3-round-large" type="text" name="Region" placeholder="Region">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Country</label>
                    </div>
                    <div class="col-75">

                        <input id="country" class="w3-input w3-border w3-round-large" type="text" name="Town" placeholder="Country"/>

                    </div>
                </div>


              

                <div class="row">
                    <div class="col-25">
                        <label for="fname">Phone</label>
                    </div>
                    <div class="col-75">
                        <input placeholder="Phone..." name="phone" id="phone" maxlength="12" class="w3-input w3-border w3-round-large">


                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Gender</label>
                    </div>
                    <div class="col-75">
                        <select placeholder="Gender.." name="gender" id="gender" class="w3-input w3-border w3-round-large">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>


                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">DOB</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="birthday" id="birthday" class="w3-input w3-border w3-round-large">


                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Job Role</label>
                    </div>
                    <div class="col-75">
                        <select name="typofficer" id="typofficer" class="w3-input w3-border w3-round-large">
                            <option value="SIA">SIA</option>
                            <option value="Steward">Steward</option>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">License</label>
                    </div>
                    <div class="col-75">
                        <input placeholder="SIA License Number..." name="sia_no" id="sia_no"  minlength="16" maxlength="16" class="w3-input w3-border w3-round-large">


                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="fname">Expiry</label>
                    </div>
                    <div class="col-75">
                        <input type="date" placeholder="SIA License Expiry..." name="sia_exp" id="sia_exp" class="w3-input w3-border w3-round-large">


                    </div>
                </div>
                <div class="row" hidden>
                    <div class="col-25">
                        <label for="fname">Lat</label>
                    </div>
                    <div class="col-75">
                        <input placeholder="Latitude" name="latitude" id="latitude"   class="w3-input w3-border w3-round-large">


                    </div>
                </div>
                <div class="row" hidden>
                    <div class="col-25">
                        <label for="fname">Long</label>
                    </div>
                    <div class="col-75">
                        
                        <input placeholder="Longitude" name="longitude" id="longitude"   class="w3-input w3-border w3-round-large"> 
                        <input name="mode" id="mode" type="text" value="Insert" hidden>
                    </div>
                </div>


<div class="row" >
                    <div class="col-25">
                        <label for="fname"> </label>
                    </div>
                    <div class="col-75">
                        
                      <button type="button" id="submitBtn" value="Submit" >Register</button>
                    </div>
                </div>
               
               
        </div>

    </form>
</div>  





<script>
    $(document).ready(function () {

$("#fname").focusout(function(){
   var txt=this.value;
   
   this.value=txt.toUpperCase();
});
//
$("#lname").focusout(function(){
  var txt=this.value;
   
   this.value=txt.toUpperCase();
});

$("#lname , #fname").blur(function(){
var txt= $("#fname").val()+' '+$("#lname").val();

    $("#fullname").val(txt)
});  
  
$('#image_div').height($('#content_div').height());
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
            var fullname = document.getElementById('fullname').value;
            
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
            if (fullname == '')
            {
                alert("Enter Full Name ");
                document.getElementById('fullname').focus();
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



               // alert(latitude + "-" + longitude);

            $.ajax({

                url: "insert_new.php",
                method: "POST",
                data: {mode: 'Insert', lastname: lastname, firstname: firstname,
                    shortname: shortname, gender: gender, dob: dob, email: email, phone: phone, address: address,
                    country: country, Region: Region, postcode: postcode, typeofofficer: typeofofficer, sia_no: sia_no,
                    sia_exp: sia_exp, password: password, conf_password: conf_password, latitude: latitude, longitude: longitude,fullname:fullname},
                dataType: "text",
                success: function (data)
                {

                    alert(data);
                    
                $('form :input').val('');
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
                    document.getElementById('address').value = data['result']['admin_ward'] + ' ' + data['result']['parliamentary_constituency']+' '+ data['result']['region'] + ' ' + data['result']['country'];
                    

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