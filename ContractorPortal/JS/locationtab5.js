/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




//INPUT TEXT FLIED DECLARATIONS

//INPUT datetime-local FLIED DECLARATIONS
var LocTab5op_1=document.getElementById('LocTab5op_1'); // : Contract List
var LocTab5op_2=document.getElementById('LocTab5op_2'); // : PB code
var LocTab5op_3=document.getElementById('LocTab5op_3'); // : Available list
var LocTab5op_4=document.getElementById('LocTab5op_4'); // : Selected List





$(document).ready(function() {
    

//EVENTS    
$(document).on('click', '#LocTab5btsave', function(){  
  
 
      LocTab5ajaxAddEditdata_db();
    
    })
    
$(document).on('click', '#LocTab5op_1', function(){  
 var obj = document.getElementById('LocTab5op_1');
 var objid=obj[obj.selectedIndex].id;
 
document.getElementById('LocTab5id').value=objid;

 var id ='LocTab5op_4';
 var selector = document.getElementById('txtid');
 var srchID="where ContId='" + objid + "'";
 var orderby ="order by id";
  
// alert(location_id+srchID+orderby);
     $.ajax({
                    url:"GetMutliOptionbox.php",
                    method:"POST",
                    data:{tblname:"tbl_locqual",criteria:srchID,orderby:orderby,column:"qualification",ID:"id"},
                    success:function(data)
                    {
                       
                    $('#'+id).html(data);
                    // alert (data);
                   
                    }
                   })
    
    })    
    
        
$(document).on('click', '#LocTab5btdel', function(){  
  
        LocTab5ajaxDeletedata_db();
    
    })     

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
      //  modal.style.display = "none";
    }
}


})



//TO ADD/EDIT DATA FROM DATABASE
function getLocQualifications(){


 // document.getElementById('id02').style.display='block';
 var id ='LocTab5op_1';
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
     
     //get the detail of contractwise qualification
     
     // document.getElementById('id02').style.display='block';
 

}
function LocTab5ajaxAddEditdata_db(){
   
    //This function refers to validate New and Edit records by calling other PHP
    var Locid=document.getElementById('txtid');
    var LocTab5id=document.getElementById('LocTab5id');
    
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
 selector = document.getElementById('LocTab5op_3');
 var qf_id=selector[selector.selectedIndex].id;
   
       mode='AddEdit';
        
    
      
//        var tblname="`tbl_siteforsearch`";
        //var column_edit="";
       var column_edit=" `Location_ID`='" + Locid.value + "'\n\
                        , `qf_id`='" + qf_id + "'\n\
                        , `qualification`='" + LocTab5op_3.value + "'\n\
                        , `ContId`='" + LocTab5id.value + "'\n\
                        ,`user_id`='" + user_id  + "'\n\
                        ,`username`='" + username  + "'";
                
 // alert(column_edit);
        var column_name=" `Location_ID`,\n\
                        `qf_id`\n\
                       , `qualification`\n\
                       , `ContId`\n\
                       , `user_id`\n\
                        , `username`";
      
        var val=   "" + Locid.value + "',\n\
                    '" + qf_id + "'\n\
                    ,'"+ LocTab5op_3.value + "'\n\
                    ,'" + LocTab5id.value + "'\n\
                    ,'" + user_id + "'\n\
                    ,'" + username + "" ;
        var condition="";
       
//       alert (val);
         
      $.ajax({  
                url:"db_multitableupdate.php",  
                method:"POST",  
                data:{id:LocTab3id.value, tblname:"tbl_locQual",val:val, column_name:column_name,mode:mode,condition:condition,ID:"id",column_edit:column_edit}, 
            
                dataType:"text",  
                success:function(data){  
                                 
                   
               // alert(data);  
                document.getElementById('LocTab5op_1').click();
                   
                }  
           });  
} 
//TO DELETE DATA FROM DATABASE
function LocTab5ajaxDeletedata_db(){
    mode="Delete";
//      var tblname="`tbl_siteforsearch`";
       var column_name="";
        var val="";
var selector = document.getElementById('LocTab5op_4');
 var qf_id=selector[selector.selectedIndex].id;
    
        
               var id=qf_id ;//qualification id
            var condition="";
        
            $.ajax({  
                      url:"db_multitableupdate.php",  
                      method:"POST",  
                      data:{id:id,condition:condition , tblname:"tbl_locQual",mode:mode,ID:'id'}, 
                    
                      dataType:"text",  
                      success:function(data){  
                      
                       
                          //  $('.post_msg').html( column_name +' Update SuccessFully">'+data)
                          alert(data);
                          document.getElementById('LocTab5op_1').click();
                      }  
                 });  
   
} 

function LocTab5refresh(){
    
     document.getElementById('LocTab5id').value="";
  
    
    LocTab5op_2.value="";
    LocTab5op_3.value="";
  

 
}

function LocTab5search(type,id){
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
        data: {id:id,tblname:"tbl_locQual",ID:'id',type:type,headname:headname}, // data to be sent to the process file
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



 
      
