/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




//INPUT TEXT FLIED DECLARATIONS

//INPUT datetime-local FLIED DECLARATIONS
var VLocTab4op_1=document.getElementById('LocTab4op_1'); // : Contract List
var VLocTab4op_2=document.getElementById('LocTab4op_2'); // : Post type
var VLocTab4op_3=document.getElementById('LocTab4op_3'); // : PB Rule


var VLocTab4txt_1=document.getElementById('LocTab4txt_1'); // : Shortname
var VLocTab4txt_2=document.getElementById('LocTab4txt_2'); // : name
var VLocTab4txt_3=document.getElementById('LocTab4txt_3'); //tel1
var VLocTab4txt_4=document.getElementById('LocTab4txt_4'); // start time
var VLocTab4txt_5=document.getElementById('LocTab4txt_5'); // : tel2
var VLocTab4txt_6=document.getElementById('LocTab4txt_6'); //finish time
var VLocTab4txt_7=document.getElementById('LocTab4txt_7'); // : tel3
var VLocTab4txt_8=document.getElementById('LocTab4txt_8'); // : d.order
var VLocTab4txt_9=document.getElementById('LocTab4txt_9'); //report code
var VLocTab4txt_10=document.getElementById('LocTab4txt_10'); // Usedfor
var VLocTab4txt_11=document.getElementById('LocTab4txt_11'); // : CLI status1
var VLocTab4txt_12=document.getElementById('LocTab4txt_12'); //site training
var VLocTab4txt_13=document.getElementById('LocTab4txt_13'); // : CLI Status2
var VLocTab4txt_14=document.getElementById('LocTab4txt_14'); // : Active
var VLocTab4txt_15=document.getElementById('LocTab4txt_15'); //CLI Status3
var VLocTab4txt_16=document.getElementById('LocTab4txt_16'); // Geo Map
var VLocTab4txt_17=document.getElementById('LocTab4txt_17'); // : Postcode
var VLocTab4txt_18=document.getElementById('LocTab4txt_18'); //Raduis
var VLocTab4txt_19=document.getElementById('LocTab4txt_19'); // : Latitiude
var VLocTab4txt_20=document.getElementById('LocTab4txt_20'); //Longitude
var VLocTab4txt_21=document.getElementById('LocTab4txt_21'); //hours




//var LocTab3dat_1=document.getElementById('LocTab3dat_1'); // Contract start date
//var LocTab3dat_2=document.getElementById('LocTab3dat_2'); // Contract Finish Date



$(document).ready(function() {
    

//EVENTS    
$(document).on('click', '#LocTab4btsave', function(){  
  
 
      LocTab4ajaxAddEditdata_db();
    
    })
    

$(document).on('click', '#LocTab4btnew', function(){  
 
 
 
 LocTab4refresh();
 
  
    })         
$(document).on('click', '#LocTab4btdel', function(){  
  
        LocTab4ajaxDeletedata_db();
    
    })     


$(document).on('click', '#LocTab4op_1', function(){  
  
   
    
        var obj = document.getElementById('LocTab4op_1');
        var objid=obj[obj.selectedIndex].id;

        document.getElementById('LocTab4id').value=objid;
          LocTab4search("", objid);
    
    // alert(objid);
    })    
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
      //  modal.style.display = "none";
    }
}


})



//TO ADD/EDIT DATA FROM DATABASE
function getLocPosts(){


 // document.getElementById('id02').style.display='block';
 var id ='LocTab4op_1';
 var selector = document.getElementById('txtid');
 var srchID="where Location_ID='" + selector.value + "'";
 var orderby ="order by id";
  
// alert(location_id+srchID+orderby);
     $.ajax({
                    url:"GetMutliOptionbox.php",
                    method:"POST",
                    data:{tblname:"tbl_loccontracts",criteria:srchID,orderby:orderby,column:"contreference",ID:"id"},
                    success:function(data)
                    {
                       
                    $('#'+id).html(data);
                   // alert (data);
                   
                    }
                   })
     

}
function LocTab4ajaxAddEditdata_db(){
    //This function refers to validate New and Edit records by calling other PHP
    var Locid = document.getElementById('txtid');
    var VLocTab4id = document.getElementById('LocTab4id');
    
    if (Locid.value ==""){
        alert ("Please Select Location to make contract!");
       
        return false;       
    }
     if (Locid.value ==0){
        alert ("Please Select Location to make contract!");
        
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
  var radios = document.getElementsByName('choice');
   var clistatus =$('input:radio[name=locpost]:checked').val();   
       mode='AddEdit';
        
    
      
//        var tblname="`tbl_siteforsearch`";
        //var column_edit="";
       var column_edit=" `Location_ID`='" + Locid.value + "'\n\
                        , `shortname`='" + VLocTab4txt_1.value + "'\n\
                        , `name`='" + VLocTab4txt_2.value + "'\n\
                        , `starttime`='" + VLocTab4txt_4.value + "'\n\
                        , `endtime`='" + VLocTab4txt_6.value + "'\n\
                        , `displayorder`='" + parseInt(VLocTab4txt_8.value) + "'\n\
                        ,`PBcode`='" + document.getElementById('LocTab4op_3').value + "'\n\
                        ,`tel1`='" + VLocTab4txt_3.value  + "'\n\
                        ,`tel2`='" + VLocTab4txt_5.value  + "'\n\
                        ,`tel3`='" + VLocTab4txt_7.value  + "'\n\
                        , `reportcode`='" + VLocTab4txt_9.value + "'\n\
                        ,`Usdforjobs`='" + VLocTab4txt_10.checked  + "'\n\
                        ,`sitetraining`='" + VLocTab4txt_12.checked  + "'\n\
                        ,`active`='" + VLocTab4txt_14.checked  + "'\n\
                        ,`clistatus`='" + clistatus  + "'\n\
                        ,`postcode`='" + VLocTab4txt_17.value  + "'\n\
                        , `radius`='" + parseFloat(VLocTab4txt_18.value) + "'\n\
                        ,`latitude`='" + parseFloat(VLocTab4txt_19.value)  + "'\n\
                        ,`longitude`='" + parseFloat(VLocTab4txt_20.value)  + "'\n\
                        ,`hours`='" + VLocTab4txt_21.value  + "'\n\
                        ,`ContId`='" + VLocTab4id.value  + "'\n\
                        ,`user_id`='" + user_id  + "'\n\
                        ,`username`='" + username  + "'";
                
     alert(column_edit);
        var column_name=" `Location_ID`,\n\
                        `shortname`\n\
                       , `name`\n\
                       , `PBcode`\n\
                       , `tel1`\n\
                       , `starttime`\n\
                       , `tel2`\n\
                       , `endtime`\n\
                       , `tel3`\n\
                        , `hours`\n\
                        , `displayorder`\n\
                        ,`reportcode`\n\
                       , `Usdforjobs`\n\
                       , `clistatus`\n\
                       , `sitetraining`\n\
                       , `active`\n\
                       , `GeoMap`\n\
                        , `postcode`\n\
                        , `radius`\n\
                        , `latitude`\n\
                       , `longitude`\n\
                       , `ContId`\n\
                       , `user_id`\n\
                        , `username`";
      
        var val=   "" + Locid.value + "',\n\
                    '" + VLocTab4txt_1.value + "'\n\
                    ,'" + VLocTab4txt_2.value + "'\n\
                    ,'"+ VLocTab4op_3.value + "'\n\
                    ,'" + VLocTab4txt_3.value + "'\n\
                    ,'" + VLocTab4txt_4.value + "'\n\
                    ,'" + VLocTab4txt_5.value + "'\n\
                    ,'" + VLocTab4txt_6.value + "'\n\
                   ,'" + VLocTab4txt_7.value + "'\n\
                    ,'" + VLocTab4txt_21.value + "'\n\
                    ,'" + VLocTab4txt_8.value + "'\n\
                      ,'" + VLocTab4txt_9.value + "'\n\
                    ,'" + VLocTab4txt_10.checked + "'\n\
                    ,'" + clistatus + "'\n\
                    ,'" + VLocTab4txt_12.checked + "'\n\
                   ,'" + VLocTab4txt_14.checked + "'\n\
                    ,'" + VLocTab4txt_16.checked + "'\n\
                    ,'" + VLocTab4txt_17.value + "'\n\
                    ,'" + parseFloat(VLocTab4txt_18.value) + "'\n\
                    ,'" + parseFloat(VLocTab4txt_19.value) + "'\n\
                    ,'" + parseFloat(VLocTab4txt_20.value) + "'\n\
                    ,'" + VLocTab4id.value + "'\n\
                    ,'" + user_id + "'\n\
                    ,'" + username + "" ;
        var condition="";
       
      
         
      $.ajax({  
                url:"db_multitableupdate.php",  
                method:"POST",  
                data:{id:VLocTab4id.value, tblname:"tbl_locposts",val:val, column_name:column_name,mode:mode,condition:condition,ID:"ContId",column_edit:column_edit}, 
            
                dataType:"text",  
                success:function(data){  
                                 
                   
                alert(data);  
                LocTab4refresh();
                   
                }  
           });  
} 
//TO DELETE DATA FROM DATABASE
function LocTab4ajaxDeletedata_db(){
    mode="Delete";
//      var tblname="`tbl_siteforsearch`";
       var column_name="";
        var val="";
//        var ID="ID"
    if (confirm ("Are you sure you want to deleted this record!!")){
        
               var id=document.getElementById('LocTab4id').value;
            var condition="";
        
            $.ajax({  
                      url:"db_multitableupdate.php",  
                      method:"POST",  
                      data:{id:id,condition:condition , tblname:"tbl_locposts",mode:mode,ID:'ContId'}, 
                    
                      dataType:"text",  
                      success:function(data){  
                      
                       
                          //  $('.post_msg').html( column_name +' Update SuccessFully">'+data)
                          alert(data);
                          VLocTab4refresh();
                      }  
                 });  
    }
} 

function LocTab4refresh(){
    
//     document.getElementById('LocTab4id').value=0;
    VLocTab4txt_1.value="";
    VLocTab4txt_2.value="";
    VLocTab4txt_3.value="";
    VLocTab4txt_4.value="";
    VLocTab4txt_5.value="";
    VLocTab4txt_6.value="";
    VLocTab4txt_7.value="";
    VLocTab4txt_8.value="";
    VLocTab4txt_9.value="";
    VLocTab4txt_10.value="";    
    VLocTab4txt_12.value="";   
    VLocTab4txt_14.checked=true;
    VLocTab4txt_15.checked=true;
    VLocTab4txt_16.value="";
    VLocTab4txt_17.value="";
    VLocTab4txt_18.value=0.0;
    VLocTab4txt_19.value=0;
    VLocTab4txt_20.value=0;
    VLocTab4txt_21.value=0;
    
    VLocTab4op_1="";
    VLocTab4op_2="";
    VLocTab4op_3="";
 
 
 
}

function LocTab4search(type,id){
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
        data: {id:id,tblname:"tbl_locposts",ID:'ContId',type:type,headname:headname}, // data to be sent to the process file
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
    },
    success: function(response){ // When the submission process is successful
          //  $("#loading").hide(); // Hide loading
           
            if(response.status == "success"){ // If the content of the status array is success
//        $("#LocTab4id").val(response.col_24); // set Contract id   
        $("#LocTab4txt_1").val(response.col_1); // set shortname
        $("#LocTab4txt_2").val(response.col_2); // set name
        $("#LocTab4txt_3").val(response.col_4); // set tel1
        $("#LocTab4txt_4").val(response.col_5); // set start time
        $("#LocTab4txt_5").val(response.col_6); // set tel2        
        $("#LocTab4txt_6").val(response.col_7); // set finish time
        $("#LocTab4txt_7").val(response.col_8); // set tel3
        $("#LocTab4txt_8").val(response.col_10); // set d.order
        $("#LocTab4txt_9").val(response.col_11); // set report code
         if (response.col_12=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById("LocTab4txt_10").checked=bool // set usedfor
      
         if (response.col_14=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById("LocTab4txt_12").checked=bool // set sitetraining
     
          
           if (response.col_15=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById("LocTab4txt_14").checked=bool; // set active
  
        var val=response.col_13;
          $("[name=locpost]").val([val]);// set clisstatus3
          
          if (response.col_16=='false'){ var bool =false; }else{var bool = true;}
          document.getElementById("LocTab4txt_16").checked=bool; // set Geo Map 
        $("#LocTab4txt_17").val(response.col_17); // set Postcode         
        $("#LocTab4txt_18").val(response.col_18); // set radius
         $("#LocTab4txt_19").val(response.col_19); // set lat
        $("#LocTab4txt_20").val(response.col_20); // set long
        $("#LocTab4txt_21").val(response.col_9); // set hours        
       
  
      
      
         
        
       // $("#LocTab1op_2").val(response.col_3); // set textbox with id control account
        $("#LocTab4op_3").val(response.col_3); // set textbox with id control account
      
        
       
       
       
        
      }else{ // If the contents of the status array are failed
        alert("No Record Found");
                LocTab4refresh();
      }
    },
        error: function (xhr, ajaxOptions, thrownError) { // When there is an error
      alert(xhr.responseText);
        }
    });
}



 
      
