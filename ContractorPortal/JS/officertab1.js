/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var tblnameOff="`accountdtl`";
var OffID="id";
var tblnameOff2="`tbl_officers`";
 var prfx='OFF';

mode="";
//INPUT TEXT FLIED DECLARATIONS


var accounttype="ASSET";
//INPUT datetime-local FLIED DECLARATIONS
var OffTab1op_1=document.getElementById('OffTab1op_1'); // : Branch/Contractor Account
var OffTab1op_2=document.getElementById('OffTab1op_2'); // : Customer Account
var OffTab1txt_1=document.getElementById('OffTab1txt_1'); // : Location
var OffTab1txt_2=document.getElementById('OffTab1txt_2'); // : shortname
var OffTab1txt_3=document.getElementById('OffTab1txt_3'); //Address 1
var OffTab1txt_4=document.getElementById('OffTab1txt_4'); // Address 2
var OffTab1txt_5=document.getElementById('OffTab1txt_5'); // : City
var OffTab1txt_6=document.getElementById('OffTab1txt_6'); //Country
var OffTab1txt_7=document.getElementById('OffTab1txt_7'); //Postcode
var OffTab1txt_8=document.getElementById('OffTab1txt_8'); // Mobile
var OffTab1txt_9=document.getElementById('OffTab1txt_9'); // Telephone1
var OffTabtxt_10=document.getElementById('OffTab1txt_10'); // TelePhone 1
var OffTab1txt_11=document.getElementById('OffTab1txt_11'); // TelePhone2
var OffTab1txt_12=document.getElementById('OffTab1txt_12'); // Email
var OffTab1txt_13=document.getElementById('OffTab1txt_13'); // Notes
var radiobtn =document.getElementsByName('opradio1');
//second tab js is not seperate
var OffTab2txt_1=document.getElementById('OffTab2txt_1'); // Exclation details
var OffTab2txt_2=document.getElementById('OffTab2txt_2'); // Exclation person
var OffTab2txt_3=document.getElementById('OffTab2txt_3'); // Exclation Email
var OffTab2txt_4=document.getElementById('OffTab2txt_4'); // Exclation Procedure

var OffTab2dat_1=document.getElementById('OffTab2dat_1'); // Exclation Procedure


var selector = document.getElementById('OffTab1op_1');
var Offcont_id=selector[selector.selectedIndex].id;



var headname= "";

var OSrchid=0;



$(document).ready(function() {
    

//EVENTS    
$(document).on('click', '#OffTab1btsave', function(){  
  
 
      OffTab1ajaxAddEditdata_db();
    
    })  
    
$(document).on('click', '#OffTab1btnew', function(){  
 

 
 OffTab1refresh();
 
  
    })         
$(document).on('click', '#OffTab1btdel', function(){  
  
      OffTab1ajaxDeletedata_db();
    
    })     
$(document).on('click', '#btn-select', function(){  
 
        OffTab1search("",OSrchid); // Call search function 
         modal2.style.display = "none";
    })    
 $(document).on('click', '#t02 tr', function(){  
       
        $(this).addClass('selected');
        highlight_row("t02");
        OSrchid= this.cells[0].innerHTML ;

       
})   
//==================================================================================================
   $(document).on('click', '#OffTab1btprv', function(){  
       var id= document.getElementById('OffTab1id').value;
        OffTab1search("PREV",id); // Call search function 
    });

//=====================================================================================================    
   $(document).on('click', '#OffTab1btnxt', function(){  
       var id= document.getElementById('OffTab1id').value;
        OffTab1search("NEXT",id); // Call search function 
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

$(document).on('change', '#OffTab1op_2', function(){  
  
   selector = document.getElementById('OffTab1op_2');
 customer_id=selector[selector.selectedIndex].id;


      
    
    }) 
    
$('#OffTab1id').focusout(function() {
var id= document.getElementById('OffTab1id').value;
                  OffTab1search("",id);
   
});


$(document).on('change', '#OffTab1op_1', function(){  
   
  selector = document.getElementById('OffTab1op_1');
 Offcont_id=selector[selector.selectedIndex].id;

 // document.getElementById('id02').style.display='block';
// var id ='OffTab1op_2';
// var selector = document.getElementById('OffTab1op_1');
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





//TO ADD/EDIT DATA FROM DATABASE

function OffTab1ajaxAddEditdata_db(){
    var Off_id=document.getElementById('OffTab1id');
    
   
    //This function refers to validate New and Edit records by calling other PHP
    if (OffTab1txt_1.value ==""){
        alert ("Please Enter Location Name!");
        OffTab1txt_1.focus();
        return false;       
    }
     if (OffTab1txt_2.value ==""){
        alert ("Please Enter Short Name!");
        OffTab1txt_2.focus();
        return false;       
    }
//      if (Off_id.value ==""){
//        alert ("Please Enter last Name!");
//        OffTab1txt_3.focus();
//        return false;       
//    }
        var selector = document.getElementById('OffTab1op_1');
        Offcont_id=selector[selector.selectedIndex].id;
        
//        alert (Offcont_id);
        mode='AddEdit';
        var id=document.getElementById('OffTab1id').value; //document.getElementById('id').value;
       
        var gender =$('input:radio[name=opradio1]:checked').val();
//alert(gender);
       var column_edit=" `contractor_id`='" + Offcont_id + "'\n\
                        , `contractorname`='" + OffTab1op_1.value + "'\n\
                        , `head_id`='" + Ohead_id + "'\n\
                        , `last_name`='" + OffTab1txt_1.value + "'\n\
                        , `first_name`='" + OffTab1txt_2.value + "'\n\
                        , `accountname`='" + OffTab1txt_3.value + "'\n\
                        ,  `Gender`='" + gender + "'\n\
                        , `address1`='" + OffTab1txt_4.value + "'\n\
                        ,`address2`='" + OffTab1txt_5.value  + "'\n\
                        ,`city`='" + OffTab1txt_6.value  + "'\n\
                        ,`country`='" + OffTab1txt_7.value  + "'\n\
                        ,`Postcode`='" + OffTab1txt_8.value  + "'\n\
                        , `mobile`='" + OffTab1txt_9.value + "'\n\
                        ,`tel1`='" + OffTab1txt_10.value  + "'\n\
                        ,`tel2`='" + OffTab1txt_11.value  + "'\n\
                        ,`email`='" + OffTab1txt_12.value  + "'\n\
                        ,`notes`='" + OffTab1txt_14.value  + "'\n\
                        ,`user_id`='" + user_id  + "'\n\
                        ,`username`='" + username  + "'\n\
                        ,`active`='" + OffTab1txt_13.checked  + "'";
              
    alert(column_edit);
        var column_name=" `contractor_id`,\n\
                        `contractorname`\n\
                        , `head_id`\n\
                       , `last_name`\n\
                       , `first_name`\n\
                       , `accountname`\n\
                       , `Gender`\n\
                       , `address1`\n\
                       , `address2`\n\
                       , `city`\n\
                        , `country`\n\
                        , `Postcode`\n\
                        , `mobile`\n\
                        , `tel1`\n\
                        , `tel2`\n\
                        , `email`\n\
                        , `notes`\n\
                        , `user_id`\n\
                        , `username`\n\
                        , `active`";
      
        var val="" + Offcont_id + "',\n\
                    '" + OffTab1op_1.value + "'\n\
                    ,'" + Ohead_id + "'\n\
                    ,'" + OffTab1txt_1.value + "'\n\
                    ,'"+ OffTab1txt_2.value + "'\n\
                    ,'" + OffTab1txt_3.value + "'\n\
                    ,'" + gender + "'\n\
                    ,'" + OffTab1txt_4.value + "'\n\
                    ,'" + OffTab1txt_5.value + "'\n\
                    ,'" + OffTab1txt_6.value + "'\n\
                   ,'" + OffTab1txt_7.value + "'\n\
                    ,'" + OffTab1txt_8.value + "'\n\
                    ,'" + OffTab1txt_9.value + "'\n\
                    ,'" + OffTab1txt_10.value + "'\n\
                   ,'" + OffTab1txt_11.value + "'\n\
                    ,'" + OffTab1txt_12.value + "'\n\
                    ,'" + OffTab1txt_14.value + "'\n\
                    ,'" + user_id + "'\n\
                    ,'" + username + "'\n\
                    ,'" + OffTab1txt_13.checked + "" ;
        var condition="";
       
       
         
      $.ajax({  
                url:"dbaddofficers.php",  
                method:"POST",  
                data:{id:id, tblname:tblnameOff,val:val, column_name:column_name,mode:mode,condition:condition,ID:OffID,column_edit:column_edit,tblname2:tblnameOff2,prfx:prfx}, 
            
                dataType:"text",  
                success:function(data){  
                                 
                   
                alert(data);  
                refreshOfficers();
                    OffTab1refresh();
                
                   
                }  
           });  
} 
//TO DELETE DATA FROM DATABASE
function OffTab1ajaxDeletedata_db(){
    mode="Delete";
//      var tblname="`tbl_siteforsearch`";
       var column_name="";
        var val="";
//        var ID="ID"
    if (confirm ("Are you sure you want to deleted this record!!")){
        
               var id=document.getElementById('OffTab1id').value;
            var condition="";
        
            $.ajax({  
                      url:"dbaddofficers.php",  
                      method:"POST",  
                      data:{id:id,condition:condition ,tblname:tblnameOff,mode:mode,ID:OffID,tblname2:tblnameOff2,prfx:prfx}, 
                    
                      dataType:"text",  
                      success:function(data){  
                      
                       
                          //  $('.post_msg').html( column_name +' Update SuccessFully">'+data)
                          alert(data);
                          refreshOfficers();
                          OffTab1refresh();
                         
                          
                      }  
                 });  
    }
} 
function refreshOfficers(){
    
    // document.getElementById('id02').style.display='block';
 var id2 ='opOfficerList'; 
 var selector = document.getElementById('OpSelectbranch');
 var contractor_id=selector[selector.selectedIndex].id;
  var srchID="where contractor_id='" + contractor_id + "'";
 var  orderby ="order by accountname";
  
// alert(location_id+srchID+orderby);
     $.ajax({
                    url:"GetMutliOptionbox.php",
                    method:"POST",
                    data:{tblname:"tbl_Officers",criteria:srchID,orderby:orderby,column:"accountname",ID:"account_id"},
                    success:function(data)
                    {
                       
                    $('#'+id2).html(data);
                   //  alert (data);
                   
                    }
                   })
     


}
function OffTab1refresh(){
     document.getElementById('OffTab1id').value=0;
     document.getElementById('OffTab1id2').value="";
    OffTab1txt_1.value="";
    OffTab1txt_2.value="";
    OffTab1txt_3.value="";
    OffTab1txt_4.value="";
    OffTab1txt_5.value="";
    OffTab1txt_6.value="";
    OffTab1txt_7.value="";
    OffTab1txt_8.value="";
    OffTab1txt_9.value="";
    OffTab1txt_10.value="";
    OffTab1txt_11.value='';
    OffTab1txt_12.value='';
    OffTab1txt_13.checked=true;
    OffTab1txt_14.value='';

 
}
//TO SELECT SEARCH DATA
function OffTab1ajaxSearch_db(){
    document.getElementById('id02').style.display='block';
     $.ajax({
                    url:"GetmultiaccesstblData.php",
                    method:"POST",
                    data:{headname:headname,tblname:tblnameOff,ID:OffID},
                    success:function(data)
                    {
                    $('#t02 tbody').html(data);
                    // alert (data);
                    }
                   })
} 
function OffTab1search(type,id){
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
        data: {id:id,tblname:tblnameOff2,ID:OffID,type:type,headname:headname}, // data to be sent to the process file
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
    },
    success: function(response){ // When the submission process is successful
          //  $("#loading").hide(); // Hide loading
           
            if(response.status == "success"){ // If the content of the status array is success
        $("#OffTab1id").val(response.col_0); // set location   
            $("#OffTab1op_1").val(response.col_2); // set Contractor
            
            $("#OffTab1txt_1").val(response.col_4); // set Last Name
            $("#OffTab1txt_2").val(response.col_5); // set First Name
            $("#OffTab1txt_3").val(response.col_6); // set Shortname
            var gender= response.col_7;
            $("[name=opradio1]").val([gender]); 
            $("#OffTab1txt_5").val(response.col_8); // set address1        
            $("#OffTab1txt_6").val(response.col_9); // set address2
            $("#OffTab1txt_7").val(response.col_10); // set city
            $("#OffTab1txt_7").val(response.col_11); // set country
            $("#OffTab1txt_8").val(response.col_12); // set postcode
            $("#OffTab1txt_9").val(response.col_13); // set mobile        
            $("#OffTab1txt_10").val(response.col_14); // set tel1
            $("#OffTab1txt_11").val(response.col_15); // tel2
            $("#OffTab1txt_12").val(response.col_16); // email
            $("#OffTab1txt_14").val(response.col_17); // notes
            
            
     
        if (response.col_18=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById('OffTab1txt_13').checked=bool; // set checkbox active permissions 
         
        
       
      
       
        
       
       
       
        
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
