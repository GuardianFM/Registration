<?php

//logout.php  
 //unset isset();
 session_start();  
 session_destroy();  
 //header("location:../../LandingPage.php");  
 echo "<script>window.close();</script>"; 
 ?>  

