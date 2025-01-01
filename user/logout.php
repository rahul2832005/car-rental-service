<?php
session_start(); 
session_destroy(); 
// destroy session
header("location:dis_car.php");
 echo '<script>alert("hello");</script>';
?>