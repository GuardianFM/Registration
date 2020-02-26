<?php

//logout.php  
 //unset isset();
 session_start();  
 session_destroy();  
// header("location:../../index.php");
 echo "<script>window.close();</script>";
 ?>  

