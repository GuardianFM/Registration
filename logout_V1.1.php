<?php

//logout.php  
session_start();
 unset($_SESSION["username"]);
 
 
 //session_destroy();  
 header("location:index_V1.1.php");
 
 ?>  

