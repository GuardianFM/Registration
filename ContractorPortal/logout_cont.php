<?php

//logout.php  
session_start();
echo $_SESSION["username3"];
unset($_SESSION["username3"]);


//session_destroy();  
echo '<script>window.close();</script>';
//header("location:login_admin.php");
?>  

