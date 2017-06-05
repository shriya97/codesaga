<?php

session_start();
//$current_file=$_SERVER['SCRIPT_NAME'];
//$current_file=$_SERVER['SCRIPT_NAME'];
//$http_referer=@($_SERVER['HTTP_REFERER']);
unset($_SESSION['name']);
session_destroy();
header('Location:index.php');
?>