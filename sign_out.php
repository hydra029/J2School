<?php 
session_start();
unset($_SESSION['customer_id']);
unset($_SESSION['customer_name']);
unset($_SESSION['admin_id']);
unset($_SESSION['admin_name']);
header('location:index.php')
 ?>