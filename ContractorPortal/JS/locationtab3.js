/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




//INPUT TEXT FLIED DECLARATIONS

//INPUT datetime-local FLIED DECLARATIONS
var LocTab3op_1=document.getElementById('LocTab3op_1'); // : Contract List
var LocTab3op_2=document.getElementById('LocTab3op_2'); // : PB code
var LocTab3op_3=document.getElementById('LocTab3op_3'); // : Bill Group

var LocTab3txt_1=document.getElementById('LocTab3txt_1'); // : Cont Reference
var LocTab3txt_2=document.getElementById('LocTab3txt_2'); // : Cont Hrs
var LocTab3txt_3=document.getElementById('LocTab3txt_3'); //Vat rate
var LocTab3txt_4=document.getElementById('LocTab3txt_4'); // Service type
var LocTab3txt_5=document.getElementById('LocTab3txt_5'); // : Service Descrip
var LocTab3txt_6=document.getElementById('LocTab3txt_6'); //Pmt Terms


var LocTab2txt_1=document.getElementById('LocTab2txt_1'); // Exclation details
var LocTab2txt_2=document.getElementById('LocTab2txt_2'); // Exclation person
var LocTab2txt_3=document.getElementById('LocTab2txt_3'); // Exclation Email
var LocTab2txt_4=document.getElementById('LocTab2txt_4'); // Exclation Procedure

var VLocTab3dat_1=document.getElementById('LocTab3dat_1'); // Contract start date
var VLocTab3dat_2=document.getElementById('LocTab3dat_2'); // Contract Finish Date



$(document).ready(function() {
    

//EVENTS    
$(document).on('click', '#LocTab3btsave', function(){  
  
 
      LocTab3ajaxAddEditdata_db();
    
    })
    
$(document).on('click', '#LocTab3op_1', function(){  
 var obj = document.getElementById('LocTab3op_1');
 var objid=obj[obj.selectedIndex].id;
 
document.getElementById('LocTab3id').value=objid;
        LocTab3search("", objid);
    
    })    
    
$(document).on('click', '#LocTab3btnew', function(){  
 
 
 
 LocTab3refresh();
 
  
    })         
$(document).on('click', '#LocTab3btdel', function(){  
  
        LocTab3ajaxDeletedata_db();
    
    })     

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
      //  modal.style.display = "none";
    }
}


})



//TO ADD/EDIT DATA FROM DATABASE
function getLocContracts(){


 // document.getElementById('id02').style.display='block';
 var id ='LocTab3op_1';
 var selector = document.getElementById('txtid');
 var srchID="where Location_ID='" + selector.value + "'";
 var orderby ="order by id";
  
// alert(location_id+srchID+orderby);
     $.ajax({
                    url:"GetMutliOptionbox.php",
                    method:"POST",
                    data:{tblname:"tbl_loccontracts",criteria:srchID,orderby:orderby,column:"contstart",ID:"id"},
                    success:function(data)
                    {
                       
                    $('#'+id).html(data);
                   //  alert (data);
                   
                    }
                   })
     

}
function LocTab3ajaxAddEditdata_db(){
    
    //This function refers to validate New and Edit records by calling other PHP
    var Locid=document.getElementById('txtid');
    var LocTab3id=document.getElementById('LocTab3id');
    
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
   
       mode='AddEdit';
        
    
      
//        var tblname="`tbl_siteforsearch`";
        //var column_edit="";
       var column_edit=" `Location_ID`='" + Locid.value + "'\n\
                        , `contreference`='" + LocTab3txt_1.value + "'\n\
                        , `contPBcode`='" + LocTab3op_2.value + "'\n\
                        , `contBillgroup`='" + LocTab3op_3.value + "'\n\
                        , `contstart`='" + VLocTab3dat_1.value + "'\n\
                        ,  `contends`='" + VLocTab3dat_2.value + "'\n\
                        , `conthrs`='" + parseFloat(LocTab3txt_2.value) + "'\n\
                        ,`vatrate`='" + parseFloat(LocTab3txt_3.value)  + "'\n\
                        ,`servicetype`='" + LocTab3txt_4.value  + "'\n\
                        ,`serviceDescip`='" + LocTab3txt_5.value  + "'\n\
                        ,`pmtterms`='" + LocTab3txt_6.value  + "'\n\
                        ,`user_id`='" + user_id  + "'\n\
                        ,`username`='" + username  + "'";
                
  alert(column_edit);
        var column_name=" `Location_ID`,\n\
                        `contreference`\n\
                       , `contPBcode`\n\
                       , `contBillgroup`\n\
                       , `contstart`\n\
                       , `contends`\n\
                       , `conthrs`\n\
                       , `vatrate`\n\
                       , `servicetype`\n\
                        , `serviceDescip`\n\
                        , `pmtterms`\n\
                        , `user_id`\n\
                        , `username`";
      
        var val=   "" + Locid.value + "',\n\
                    '" + LocTab3txt_1.value + "'\n\
                    ,'" + LocTab3op_2.value + "'\n\
                    ,'"+ LocTab3op_3.value + "'\n\
                    ,'" + VLocTab3dat_1.value + "'\n\
                    ,'" + VLocTab3dat_2.value + "'\n\
                    ,'" + parseFloat(LocTab3txt_2.value) + "'\n\
                    ,'" + parseFloat(LocTab3txt_3.value) + "'\n\
                   ,'" + LocTab3txt_4.value + "'\n\
                    ,'" + LocTab3txt_5.value + "'\n\
                    ,'" + LocTab3txt_6.value + "'\n\
                    ,'" + user_id + "'\n\
                    ,'" + username + "" ;
        var condition="";
       
//       alert (val);
         
      $.ajax({  
                url:"db_multitableupdate.php",  
                method:"POST",  
                data:{id:LocTab3id.value, tblname:"tbl_loccontracts",val:val, column_name:column_name,mode:mode,condition:condition,ID:"id",column_edit:column_edit}, 
            
                dataType:"text",  
                success:function(data){  
                                 
                   
                alert(data);  
                LocTab3refresh();
                   
                }  
           });  
} 
//TO DELETE DATA FROM DATABASE
function LocTab3ajaxDeletedata_db(){
    mode="Delete";
//      var tblname="`tbl_siteforsearch`";
       var column_name="";
        var val="";
//        var ID="ID"
    if (confirm ("Are you sure you want to deleted this record!!")){
        
               var id=document.getElementById('LocTab3id').value;
            var condition="";
        
            $.ajax({  
                      url:"db_multitableupdate.php",  
                      method:"POST",  
                      data:{id:id,condition:condition , tblname:"tbl_loccontracts",mode:mode,ID:'id'}, 
                    
                      dataType:"text",  
                      success:function(data){  
                      
                       
                          //  $('.post_msg').html( column_name +' Update SuccessFully">'+data)
                          alert(data);
                          LocTab3refresh();
                      }  
                 });  
    }
} 

function LocTab3refresh(){
    
     document.getElementById('LocTab3id').value="";
    LocTab3txt_1.value="";
    LocTab3txt_2.value="";
    LocTab3txt_3.value="";
    LocTab3txt_4.value="";
    LocTab3txt_5.value="";
    LocTab3txt_6.value="";
    
    LocTab3op_2.value="";
    LocTab3op_3.value="";
    
    LocTab3dat_1="";
    LocTab3dat_2="";

 
}

function LocTab3search(type,id){
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
        data: {id:id,tblname:"tbl_loccontracts",ID:'id',type:type,headname:headname}, // data to be sent to the process file
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
    },
    success: function(response){ // When the submission process is successful
          //  $("#loading").hide(); // Hide loading
           
            if(response.status == "success"){ // If the content of the status array is success
        $("#LocTab3id").val(response.col_0); // set Contract id   
        $("#LocTab3txt_1").val(response.col_2); // set Reference
        $("#LocTab3txt_2").val(response.col_7); // set COnt hrs
        $("#LocTab3txt_3").val(response.col_8); // set Vat Rate
        $("#LocTab3txt_4").val(response.col_9); // set Service TYpe
        $("#LocTab3txt_5").val(response.col_10); // set Service Descrp        
        $("#LocTab3txt_6").val(response.col_11); // set pmt terms
     
           $("#LocTab3dat_1").val(response.col_5); // Start Date
           $("#LocTab3dat_2").val(response.col_6); // Ends Date
      
        if (response.col_13=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById('LocTab1txt_12').checked=bool; // set checkbox active permissions 
         
        
        $("#LocTab3op_2").val(response.col_3); // set textbox with id control account
        $("#LocTab3op_3").val(response.col_4); // set textbox with id control account
       
        
       
       
       
        
      }else{ // If the contents of the status array are failed
        alert("No Record Found");
      }
    },
        error: function (xhr, ajaxOptions, thrownError) { // When there is an error
      alert(xhr.responseText);
        }
    });
}



 
      
