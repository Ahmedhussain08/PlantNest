<?php 
session_start();
unset($_SESSION['adminloggedin']);
session_destroy();
header("location:login.php")
?>