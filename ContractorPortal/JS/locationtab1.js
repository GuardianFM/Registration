/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



mode="";
//INPUT TEXT FLIED DECLARATIONS
var tblnameloc="`tbl_location`";
var LocID="Location_ID";

var accounttype="ASSET";
//INPUT datetime-local FLIED DECLARATIONS
var LocTab1op_1=document.getElementById('LocTab1op_1'); // : Branch/Contractor Account
var LocTab1op_2=document.getElementById('LocTab1op_2'); // : Customer Account
var LocTab1txt_1=document.getElementById('LocTab1txt_1'); // : Location
var LocTab1txt_2=document.getElementById('LocTab1txt_2'); // : shortname
var LocTab1txt_3=document.getElementById('LocTab1txt_3'); //Address 1
var LocTab1txt_4=document.getElementById('LocTab1txt_4'); // Address 2
var LocTab1txt_5=document.getElementById('LocTab1txt_5'); // : City
var LocTab1txt_6=document.getElementById('LocTab1txt_6'); //Country
var LocTab1txt_7=document.getElementById('LocTab1txt_7'); //Postcode
var LocTab1txt_8=document.getElementById('LocTab1txt_8'); // Mobile
var LocTab1txt_9=document.getElementById('LocTab1txt_9'); // Telephone1
var LocTabtxt_10=document.getElementById('LocTab1txt_10'); // TelePhone 1
var LocTab1txt_11=document.getElementById('LocTab1txt_11'); // TelePhone2
var LocTab1txt_12=document.getElementById('LocTab1txt_12'); // Email
var LocTab1txt_13=document.getElementById('LocTab1txt_13'); // Notes

//second tab js is not seperate
var LocTab2txt_1=document.getElementById('LocTab2txt_1'); // Exclation details
var LocTab2txt_2=document.getElementById('LocTab2txt_2'); // Exclation person
var LocTab2txt_3=document.getElementById('LocTab2txt_3'); // Exclation Email
var LocTab2txt_4=document.getElementById('LocTab2txt_4'); // Exclation Procedure

var LocTab2dat_1=document.getElementById('LocTab2dat_1'); // Exclation Procedure


var selector = document.getElementById('LocTab1op_1');
var cont_id=selector[selector.selectedIndex].id;

selector = document.getElementById('LocTab1op_2');
var customer_id=selector[selector.selectedIndex].id;

var headname= LocTab1op_2.value;
var modal = document.getElementById('id01');
var modal2=document.getElementById('id02');
var Srchid=0;



$(document).ready(function() {
    

//EVENTS    
$(document).on('click', '#LocTab1btsave', function(){  
  
 
      ajaxAddEditdata_db();
    
    })  
    
$(document).on('click', '#LocTab1btnew', function(){  
 
 
 
 refresh();
 
  
    })         
$(document).on('click', '#LocTab1btdel', function(){  
  
      ajaxDeletedata_db();
    
    })     
$(document).on('click', '#btn-select', function(){  
 
        LocTab1search("",Srchid); // Call search function 
         modal2.style.display = "none";
    })    
 $(document).on('click', '#t02 tr', function(){  
       
        $(this).addClass('selected');
        highlight_row("t02");
        Srchid= this.cells[0].innerHTML ;

       
})   
//==================================================================================================
   $(document).on('click', '#LocTab1btprv', function(){  
       var id= document.getElementById('txtid').value;
        LocTab1search("PREV",id); // Call search function 
    });

//=====================================================================================================    
   $(document).on('click', '#LocTab1btnxt', function(){  
       var id= document.getElementById('txtid').value;
        LocTab1search("NEXT",id); // Call search function 
    });    
    

// Get the modal
$(document).keyup(function(e) {
     if (e.key === "Escape") { // escape key maps to keycode `27`
        // <DO YOUR WORK HERE>
       // alert ("Escape press");
       if (modal2.style.display == "block")
       {
           modal2.style.display = "none";
       }else{
           modal.style.display = "none";}
            
    }
});

$(document).on('change', '#LocTab1op_2', function(){  
  
   selector = document.getElementById('LocTab1op_2');
 customer_id=selector[selector.selectedIndex].id;


      
    
    }) 
    
$('#txtid').focusout(function() {
var id= document.getElementById('txtid').value;
                  LocTab1search("",id);
   
});


$(document).on('change', '#LocTab1op_1', function(){  
   
  selector = document.getElementById('LocTab1op_1');
 cont_id=selector[selector.selectedIndex].id;

 // document.getElementById('id02').style.display='block';
// var id ='LocTab1op_2';
// var selector = document.getElementById('LocTab1op_1');
// var contractor_id=selector[selector.selectedIndex].id;
// var srchID="where contractor_id='" + contractor_id + "'";
// var orderby ="order by accountname";
//  
//// alert(location_id+srchID+orderby);
//     $.ajax({
//                    url:"GetMutliOptionbox.php",
//                    method:"POST",
//                    data:{tblname:"tbl_customers",criteria:srchID,orderby:orderby,column:"accountname",ID:"account_id"},
//                    success:function(data)
//                    {
//                       
//                  //  $('#'+id).html(data);
//                   //  alert (data);
//                   
//                    }
//                   })
     
});
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
      //  modal.style.display = "none";
    }
}




})


//VALIDATIONS CHECK
function InputfldValidations(){
    //Text Felids 
    if (LocTab1txt_1.value ==""){
        alert ("Please Enter Location!");
        LocTab1txt_1.focus();
        return false;       
    }else {return true;}
     if (LocTab1txt_2.value ==""){
        alert ("Please Enter Shortname!");
        LocTab1txt_2.focus();
        return false;       
    }else {return true;}
    if (isNan(LocTab1txt_4.value) ==""){
        alert ("Please Enter Hours in Number Format!");
        LocTab1txt_4.focus();
        return false;       
    }else {return true;}
    if (LocTab1txt_4.value ==""){
        alert ("Please Enter No of SIA required!");
        LocTab1txt_4.focus();
        return false;       
    }else {return true;}
    
 
} 

//TO ADD/EDIT DATA FROM DATABASE

function ajaxAddEditdata_db(){
    //This function refers to validate New and Edit records by calling other PHP
    if (LocTab1txt_1.value ==""){
        alert ("Please Enter Location Name!");
        LocTab1txt_1.focus();
        return false;       
    }
     if (LocTab1txt_2.value ==""){
        alert ("Please Enter Short Name!");
        LocTab1txt_2.focus();
        return false;       
    }
//      if (LocTab1txt_3.value ==""){
//        alert ("Please Enter last Name!");
//        LocTab1txt_3.focus();
//        return false;       
//    }
var selector = document.getElementById('LocTab1op_1');
 cont_id=selector[selector.selectedIndex].id;
 selector = document.getElementById('LocTab1op_2');
 customer_id=selector[selector.selectedIndex].id;
    alert (cont_id+ customer_id);
       mode='AddEdit';
        var id=document.getElementById('txtid').value; //document.getElementById('id').value;
       var  txt1=LocTab1txt_1.value;
       var txt2=LocTab1txt_2.value;
      
//        var tblname="`tbl_siteforsearch`";
        //var column_edit="";
       var column_edit=" `Location`='" + txt1.trim() + "'\n\
                        , `shortname`='" + txt2.trim() + "'\n\
                        , `address1`='" + LocTab1txt_3.value + "'\n\
                        , `address2`='" + LocTab1txt_4.value + "'\n\
                        , `city`='" + LocTab1txt_5.value + "'\n\
                        ,  `country`='" + LocTab1txt_6.value + "'\n\
                        , `postcode`='" + LocTab1txt_7.value + "'\n\
                        ,`mobile`='" + LocTab1txt_8.value  + "'\n\
                        ,`tel1`='" + LocTab1txt_9.value  + "'\n\
                        ,`tel2`='" + LocTab1txt_10.value  + "'\n\
                        ,`email`='" + LocTab1txt_11.value  + "'\n\
                        , `customer_id`='" + customer_id + "'\n\
                        ,`customername`='" + LocTab1op_2.value  + "'\n\
                        ,`contractor_id`='" + cont_id  + "'\n\
                        ,`contractorname`='" + LocTab1op_1.value  + "'\n\
                        ,`user_id`='" + user_id  + "'\n\
                        ,`username`='" + username  + "'\n\
                        ,`txtnotes`='" + LocTab1txt_13.value  + "'\n\
                        ,`excldetails`='" + LocTab2txt_1.value  + "'\n\
                        ,`exclperson`='" + LocTab2txt_2.value  + "'\n\
                        ,`excldate`='" + LocTab2dat_1.value  + "'\n\
                        ,`exclprocedure`='" + LocTab2txt_4.value  + "'\n\
                        ,`exclemail`='" + LocTab2txt_3.value  + "'\n\
                        ,`active`='" + LocTab1txt_12.checked + "'";
                
//     alert(column_edit);
        var column_name=" `Location`,\n\
                        `shortname`\n\
                       , `address1`\n\
                       , `address2`\n\
                       , `city`\n\
                       , `country`\n\
                       , `postcode`\n\
                       , `mobile`\n\
                       , `tel1`\n\
                        , `tel2`\n\
                        , `email`\n\
                        , `customer_id`\n\
                        , `customername`\n\
                        , `contractor_id`\n\
                        , `contractorname`\n\
                        , `user_id`\n\
                        , `username`\n\
                        , `txtnotes`\n\
                        , `excldetails`\n\
                        , `exclperson`\n\
                        , `exclprocedure`\n\
                        , `exclemail`\n\
                        , `excldate`\n\
                        , `active`";
      
        var val="" + txt1.trim() + "',\n\
                    '" + txt2.trim() + "'\n\
                    ,'" + LocTab1txt_3.value + "'\n\
                    ,'"+ LocTab1txt_4.value + "'\n\
                    ,'" + LocTab1txt_5.value + "'\n\
                    ,'" + LocTab1txt_6.value + "'\n\
                    ,'" + LocTab1txt_7.value + "'\n\
                    ,'" + LocTab1txt_8.value + "'\n\
                   ,'" + LocTab1txt_9.value + "'\n\
                    ,'" + LocTab1txt_10.value + "'\n\
                    ,'" + LocTab1txt_11.value + "'\n\
                    ,'" + customer_id + "'\n\
                   ,'" + LocTab1op_2.value + "'\n\
                    ,'" + cont_id + "'\n\
                    ,'" + LocTab1op_1.value + "'\n\
                    ,'" + user_id + "'\n\
                    ,'" + username + "'\n\
                    ,'" + LocTab1txt_13.value + "'\n\
                     ,'" + LocTab2txt_1.value + "'\n\
                    ,'" + LocTab2txt_2.value + "'\n\
                    ,'" + LocTab2txt_4.value + "'\n\
                    ,'" + LocTab2txt_3.value + "'\n\
                    ,'" + LocTab2dat_1.value + "'\n\
                    ,'" + LocTab1txt_12.checked + "" ;
        var condition="";
       
       
         
      $.ajax({  
                url:"db_multitableupdate.php",  
                method:"POST",  
                data:{id:id, tblname:tblnameloc,val:val, column_name:column_name,mode:mode,condition:condition,ID:LocID,column_edit:column_edit}, 
            
                dataType:"text",  
                success:function(data){  
                                 
                   
                alert(data);  
                refresh();
                   
                }  
           });  
} 
//TO DELETE DATA FROM DATABASE
function ajaxDeletedata_db(){
    mode="Delete";
//      var tblname="`tbl_siteforsearch`";
       var column_name="";
        var val="";
//        var ID="ID"
    if (confirm ("Are you sure you want to deleted this record!!")){
        
               var id=document.getElementById('txtid').value;
            var condition="";
        
            $.ajax({  
                      url:"db_multitableupdate.php",  
                      method:"POST",  
                      data:{id:id,condition:condition ,tblname:tblnameloc,mode:mode,ID:LocID}, 
                    
                      dataType:"text",  
                      success:function(data){  
                      
                       
                          //  $('.post_msg').html( column_name +' Update SuccessFully">'+data)
                          alert(data);
                          refresh();
                      }  
                 });  
    }
} 

function refresh(){
     document.getElementById('txtid').value="";
    LocTab1txt_1.value="";
    LocTab1txt_2.value="";
    LocTab1txt_3.value="";
    LocTab1txt_4.value="";
    LocTab1txt_5.value="";
    LocTab1txt_6.value="";
    LocTab1txt_7.value="";
    LocTab1txt_8.value="";
    LocTab1txt_9.value="";
    LocTab1txt_10.value="";
    LocTab1txt_11.value='';
    LocTab1txt_12.value='';
    LocTab1txt_13.value='';

 
}
//TO SELECT SEARCH DATA
function ajaxSearch_db(){
    document.getElementById('id02').style.display='block';
     $.ajax({
                    url:"GetmultiaccesstblData.php",
                    method:"POST",
                    data:{headname:headname,tblname:tblnameloc,ID:LocID},
                    success:function(data)
                    {
                    $('#t02 tbody').html(data);
                    // alert (data);
                    }
                   })
} 
function LocTab1search(type,id){
       mode='AddEdit';
       
        var type=type;
        
        if (id==0){
          var  id=id;
            
        }
         
 // $("#loading").show(); // Show  the loading
 
  $.ajax({
        type: "POST", // The method of sending data can be with GET or POST
        url: "Getmultiaccessdata.php", // Fill in url / php file path to destination
      //  alert ($("#id").val());
        data: {id:id,tblname:"tbl_location",ID:LocID,type:type,headname:headname}, // data to be sent to the process file
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
    },
    success: function(response){ // When the submission process is successful
          //  $("#loading").hide(); // Hide loading
           
            if(response.status == "success"){ // If the content of the status array is success
        $("#txtid").val(response.col_0); // set location   
          $("#LocTab1txt_1").val(response.col_1); // set location
        $("#LocTab1txt_2").val(response.col_2); // set shortname
        $("#LocTab1txt_3").val(response.col_3); // set address1
        $("#LocTab1txt_4").val(response.col_4); // set address2
        $("#LocTab1txt_5").val(response.col_5); // set city        
        $("#LocTab1txt_6").val(response.col_7); // set country
        $("#LocTab1txt_7").val(response.col_8); // set postcode
         $("#LocTab1txt_8").val(response.col_9); // set mobile
         $("#LocTab1txt_9").val(response.col_10); // set tel1        
        $("#LocTab1txt_10").val(response.col_11); // set tel2
        $("#LocTab1txt_11").val(response.col_12); // email
         $("#LocTab1txt_13").val(response.col_18); // email
       $("#LocTab2txt_1").val(response.col_19); // Exclation details      
        $("#LocTab2txt_2").val(response.col_20); // Excl Person
        $("#LocTab2txt_3").val(response.col_22); // Excl Email
         $("#LocTab2txt_4").val(response.col_23); // email
           $("#LocTab2dat_1").val(response.col_21); // Excl Date
      
        if (response.col_13=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById('LocTab1txt_12').checked=bool; // set checkbox active permissions 
         
        
        $("#LocTab1op_1").val(response.col_15); // set textbox with id control account
        $("#LocTab1op_2").val(response.col_17); // set textbox with id control account
       
        
       
       
       
        
      }else{ // If the contents of the status array are failed
        alert("No Record Found");
      }
    },
        error: function (xhr, ajaxOptions, thrownError) { // When there is an error
      alert(xhr.responseText);
        }
    });
}
function todaydate(today){
   var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();

                if(dd<10) {
                dd = '0'+dd
                } 

                if(mm<10) {
                mm = '0'+mm
                } 

           //     today = dd + '-' + mm + '-' + yyyy;
            today = yyyy + '-' + mm + '-' + dd;
            return today;
}
function fn_DateCompare(DateA, DateB) {     // this function is good for dates > 01/01/1970

    var a = new Date(DateA);
    var b = new Date(DateB);

    var msDateA = Date.UTC(a.getFullYear(), a.getMonth()+1, a.getDate(),);
    var msDateB = Date.UTC(b.getFullYear(), b.getMonth()+1, b.getDate());

    if (parseFloat(msDateA) < parseFloat(msDateB))
      return -1;  // lt
    else if (parseFloat(msDateA) == parseFloat(msDateB))
      return 0;  // eq
    else if (parseFloat(msDateA) > parseFloat(msDateB))
      return 1;  // gt
    else
      return null;  // error
}
 $(document).ready(function(){  
           $('#txtsearch').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#t02 tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                  if (this.rowIndex >=1) {
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     } 
                 }
                });  
           }  
      });  
 
function highlight_row(tabl) {
 
     var table = document.getElementById(tabl);
    var cells = table.getElementsByTagName('td');

    for (var i = 0; i < cells.length; i++) {
        // Take each cell
        var cell = cells[i];
        // do something on onclick event for cell
        cell.onclick = function () {
            // Get the row id where the cell exists
            var rowId = this.parentNode.rowIndex;

            var rowsNotSelected = table.getElementsByTagName('tr');
            for (var row = 0; row < rowsNotSelected.length; row++) {
                rowsNotSelected[row].style.backgroundColor = "";
             rowsNotSelected[row].classList.remove('selected');
            }
            
            var rowSelected = table.getElementsByTagName('tr')[rowId];
            rowSelected.style.backgroundColor = "#d9edf7";
            rowSelected.className += " selected";
            
           // msg = 'The ID of the company is: ' + rowSelected.cells[0].innerHTML;
           // msg += '\nThe cell value is: ' + this.innerHTML;
           
        }
    }

} //end of function      
