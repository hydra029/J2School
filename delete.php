<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
header('location:index.php')
?>