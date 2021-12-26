<?php 
session_start();
require 'connect.php';
$product_id = $_GET['product_id'];
unset($_SESSION['cart'][$product_id]);
$_SESSION['success'] = 'Xoá khỏi giỏ hàng thành công';
mysqli_close($connect);
header('location:cart.php')
?>