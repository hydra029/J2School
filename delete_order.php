<?php 
session_start();
$customer_id = $_SESSION['customer_id'];
unset($_SESSION['order'][$customer_id]);
$_SESSION['success'] = "Xoá đơn hàng thành công";
header('location:order.php')
 ?>