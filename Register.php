<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
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
                padding: 20px;
                width:70%;
                  

            }
/*            #image_div{
                background-image: url("assets/images/background2.jpg");
                background-repeat: no-repeat;
                background-size:     cover;
                background-position: center;
                border:1px solid black;
            display:block;
            width: 100px;
            height:900px;
            overflow:hidden;
                
            }*/
            @media only screen and (max-width: 728px) {

                /* default iPad screens */

                .container {
                    width: 700px;

                }
                #image_div2{
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
                #image_div2{
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
                #image_div2{
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
                #image_div2{
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
                #image_div2{
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
                #image_div2{
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
            
              .iframe-container {
                /*overflow-y: scroll;*/
                /*Calculated from the aspect ration of the content (in case of 16:9 it is 9/16= 0.5625)*/
                /*padding-top: 56.25%;*/
                position: relative;
             
            }

            .iframe-container .iframe {
                border: 0;
                height: 1000px;
                left: 0;
                position: absolute;
                top: 0;
                width: 100%;
                border-color: red;
                 display:inline-block;
               
                   
            }

        </style>


    </head>
    <body>
 <h1 style="text-transform: capitalize; color: white;">Guardian<span style="font-size:26px; font-weight: bold; color: #C03A1C;">FM</span></h1>
        <div style="height:950px; ">
        
        <img src="assets/images/background2.jpg" class="w3-round" alt="Norway" style="  float: left; background-color: orange; width:30%;  overflow: hidden; height: 100%;" id='image_div2'>
        <!--<div class="container w3-animate-zoom" style=" float: right;" id='content_div' >-->  
<!--        <div class= "container iframe-container " style=" float: right;" id='content_div'>
                            <h1 class="mt-4">Simple Sidebar</h1>
                            <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>



                    <iframe id="myframe" class="iframe" src="RegisterOfficer.php"  ></iframe>        
                </div>-->
<div class="container iframe-container" style=" float: right; " id='content_div'>
 
    <iframe id="myframe" class="iframe"  src="RegisterOfficer.php"  ></iframe>  
</div>
</div>>
<!--</div>-->  


<script>
   
    $('#image_div').height(screen.height);
//      $('#myframe').height(screen.height+200);
//    alert($('#myframe').height());
</script>



</body>
</html>