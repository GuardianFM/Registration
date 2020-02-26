/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




//INPUT TEXT FLIED DECLARATIONS

//INPUT datetime-local FLIED DECLARATIONS
var OffTab3op_1=document.getElementById('OffTab3op_1'); // : Contract List



var OffTab3txt_1=document.getElementById('OffTab3txt_1'); // : Shortname
var OffTab3txt_2=document.getElementById('OffTab3txt_2'); // : name
var OffTab3txt_3=document.getElementById('OffTab3txt_3'); //tel1
var OffTab3txt_4=document.getElementById('OffTab3txt_4'); // start time
var OffTab3txt_5=document.getElementById('OffTab3txt_5'); // : tel2
var OffTab3txt_6=document.getElementById('OffTab3txt_6'); //finish time
var OffTab3txt_7=document.getElementById('OffTab3txt_7'); // : tel3
var OffTab3txt_8=document.getElementById('OffTab3txt_8'); // : d.order
var OffTab3txt_9=document.getElementById('OffTab3txt_9'); //report code
var OffTab3txt_10=document.getElementById('OffTab3txt_10'); // Usedfor
var OffTab3txt_11=document.getElementById('OffTab3txt_11'); // : CLI status1

var OffTab3dat_1=document.getElementById('OffTab3dat_1'); //report code
var OffTab3dat_2=document.getElementById('OffTab3dat_2'); // Usedfor
var OffTab3dat_3=document.getElementById('OffTab3dat_3'); // : CLI status1






//var LocTab3dat_1=document.getElementById('LocTab3dat_1'); // Contract start date
//var LocTab3dat_2=document.getElementById('LocTab3dat_2'); // Contract Finish Date



$(document).ready(function() {
    

//EVENTS    
$(document).on('click', '#OffTab3btsave', function(){  
  
 
      OffTab3ajaxAddEditdata_db();
    
    })
    

$(document).on('click', '#OffTab3btnew', function(){  
 
 
 
 OffTab3refresh();
 
  
    })         
$(document).on('click', '#OffTab3btdel', function(){  
  
        OffTab3ajaxDeletedata_db();
    
    })     


$(document).on('click', '#OffTab3op_1', function(){  
  
   
    
        var obj = document.getElementById('OffTab3op_1');
        var objid=obj[obj.selectedIndex].id;

        document.getElementById('OffTab3id').value=objid;
          OffTab3search("", objid);
    
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
 var id ='OffTab3op_1';
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
function OffTab3ajaxAddEditdata_db(){
   
    //This function refers to validate New and Edit records by calling other PHP
    var Locid = document.getElementById('OffTab1id');
    var OffTab3id = document.getElementById('OffTab1id2');
    
    if (Locid.value ==""){
        alert ("Please Select Officer to make contract!");
       
        return false;       
    }
     if (Locid.value ==0){
        alert ("Please Select Officer to make contract!");
        
        return false;       
    }
//      if (LocTab1txt_3.value ==""){
//        alert ("Please Enter last Name!");
//        LocTab1txt_3.focus();
//        return false;       
//    }




       mode='AddEdit';
        
    alert(OffTab3id.value);
      
//        var tblname="`tbl_siteforsearch`";
        //var column_edit="";
       var column_edit=" `officer_id`='" + OffTab3id.value + "'\n\
                        , `NInumber`='" + OffTab3txt_1.value + "'\n\
                        , `Dob`='" + OffTab3dat_1.value + "'\n\
                        , `national`='" + OffTab3txt_2.value + "'\n\
                        , `martial`='" + OffTab3op_1.value + "'\n\
                        , `discreference`='" + OffTab3txt_4.value + "'\n\
                        ,`disclevel`='" + OffTab3txt_5.value + "'\n\
                        ,`discdate`='" + OffTab3dat_2.value  + "'\n\
                        ,`discreturn`='" + OffTab3dat_3.value  + "'\n\
                        ,`postcode`='" + OffTab3txt_6.value  + "'\n\
                        , `mobile`='" + OffTab3txt_7.value + "'\n\
                        ,`tel1`='" + OffTab3txt_8.value  + "'\n\
                        ,`tel2`='" + OffTab3txt_9.value  + "'\n\
                        ,`email`='" + OffTab3txt_10.value  + "'\n\
                        ,`notes`='" + OffTab3txt_11.value  + "'\n\
                        ,`user_id`='" + user_id  + "'\n\
                        ,`username`='" + username  + "'";
                
     alert(column_edit);
        var column_name=" `officer_id`,\n\
                        `NInumber`\n\
                       , `Dob`\n\
                       , `national`\n\
                       , `martial`\n\
                       , `discrerference`\n\
                       , `disclevel`\n\
                       , `discdate`\n\
                       , `discreturn`\n\
                        , `postcode`\n\
                        , `mobile`\n\
                        ,`tel1`\n\
                       , `tel2`\n\
                       , `email`\n\
                       , `notes`\n\
                        , `user_id`\n\
                        , `username`";
      
        var val=   "" + OffTab3id.value + "',\n\
                    '" + OffTab3txt_1.value + "'\n\
                    ,'" + OffTab3dat_1.value + "'\n\
                    ,'"+ OffTab3txt_2.value + "'\n\
                    ,'" + OffTab3op_1.value + "'\n\
                    ,'" + OffTab3txt_4.value + "'\n\
                    ,'" + OffTab3txt_5.value + "'\n\
                    ,'" + OffTab3dat_2.value + "'\n\
                   ,'" + OffTab3dat_3.value + "'\n\
                    ,'" + OffTab3txt_6.value + "'\n\
                    ,'" + OffTab3txt_7.value + "'\n\
                      ,'" + OffTab3txt_8.value + "'\n\
                    ,'" + OffTab3txt_9.value + "'\n\
                    ,'" + OffTab3txt_10.value + "'\n\
                    ,'" + OffTab3txt_11.value + "'\n\
                    ,'" + user_id + "'\n\
                    ,'" + username + "" ;
        var condition="";
       
      alert(val);
         
      $.ajax({  
                url:"db_multitableupdate.php",  
                method:"POST",  
                data:{id:OffTab3id.value, tblname:"tbl_officerhr",val:val, column_name:column_name,mode:mode,condition:condition,ID:"officer_id",column_edit:column_edit}, 
            
                dataType:"text",  
                success:function(data){  
                                 
                   
                alert(data);  
                OffTab3refresh();
                   
                }  
           });  
} 
//TO DELETE DATA FROM DATABASE
function OffTab3ajaxDeletedata_db(){
    mode="Delete";
//      var tblname="`tbl_siteforsearch`";
       var column_name="";
        var val="";
//        var ID="ID"
    if (confirm ("Are you sure you want to deleted this record!!")){
        
               var id=document.getElementById('OffTab3id').value;
            var condition="";
        
            $.ajax({  
                      url:"db_multitableupdate.php",  
                      method:"POST",  
                      data:{id:id,condition:condition , tblname:"tbl_officerhr",mode:mode,ID:'officer_id'}, 
                    
                      dataType:"text",  
                      success:function(data){  
                      
                       
                          //  $('.post_msg').html( column_name +' Update SuccessFully">'+data)
                          alert(data);
                          OffTab3refresh();
                      }  
                 });  
    }
} 

function OffTab3refresh(){
    
     document.getElementById('OffTab3id').value=0;
     
    OffTab3txt_1.value="";
    OffTab3txt_2.value="";
    OffTab3txt_3.value="";
    OffTab3txt_4.value="";
    OffTab3txt_5.value="";
    OffTab3txt_6.value="";
    OffTab3txt_7.value="";
    OffTab3txt_8.value="";
    OffTab3txt_9.value="";
    OffTab3txt_10.value="";    
    OffTab3txt_11.value="";   
    
    alert("test");
    OffTab3dat_1.value="";
    OffTab3dat_2.value="";
    OffTab3dat_3.value="";
    
    
   
 
 
 
}

function OffTab3search(type,id){
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
        data: {id:id,tblname:"tbl_officerhr",ID:'officer_id',type:type,headname:headname}, // data to be sent to the process file
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
    },
    success: function(response){ // When the submission process is successful
          //  $("#loading").hide(); // Hide loading
           
            if(response.status == "success"){ // If the content of the status array is success
//        $("#OffTab3id").val(response.col_24); // set Contract id   
        $("#OffTab3txt_1").val(response.col_1); // set shortname
        $("#OffTab3txt_2").val(response.col_2); // set name
        $("#OffTab3txt_3").val(response.col_4); // set tel1
        $("#OffTab3txt_4").val(response.col_5); // set start time
        $("#OffTab3txt_5").val(response.col_6); // set tel2        
        $("#OffTab3txt_6").val(response.col_7); // set finish time
        $("#OffTab3txt_7").val(response.col_8); // set tel3
        $("#OffTab3txt_8").val(response.col_10); // set d.order
        $("#OffTab3txt_9").val(response.col_11); // set report code
         if (response.col_12=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById("OffTab3txt_10").checked=bool // set usedfor
      
         if (response.col_14=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById("OffTab3txt_12").checked=bool // set sitetraining
     
          
           if (response.col_15=='false'){ var bool =false; }else{var bool = true;}
        document.getElementById("OffTab3txt_14").checked=bool; // set active
  
        var val=response.col_13;
          $("[name=locpost]").val([val]);// set clisstatus3
          
          if (response.col_16=='false'){ var bool =false; }else{var bool = true;}
          document.getElementById("OffTab3txt_16").checked=bool; // set Geo Map 
        $("#OffTab3txt_17").val(response.col_17); // set Postcode         
        $("#OffTab3txt_18").val(response.col_18); // set radius
         $("#OffTab3txt_19").val(response.col_19); // set lat
        $("#OffTab3txt_20").val(response.col_20); // set long
        $("#OffTab3txt_21").val(response.col_9); // set hours        
       
  
      
      
         
        
       // $("#LocTab1op_2").val(response.col_3); // set textbox with id control account
        $("#OffTab3op_3").val(response.col_3); // set textbox with id control account
      
        
       
       
       
        
      }else{ // If the contents of the status array are failed
        alert("No Record Found");
                OffTab3refresh();
      }
    },
        error: function (xhr, ajaxOptions, thrownError) { // When there is an error
      alert(xhr.responseText);
        }
    });
}



 
      
