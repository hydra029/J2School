<?php 
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['product_id'];
$sql = "delete from receipt_detail where product_id = '$product_id' and receipt_id = '$receipt_id'";
mysqli_query($connect, $sql);
$_SESSION['success'] = "Xoá sản phẩm khỏi giỏ hàng thành công !";
mysqli_close($connect);
header('location:cart.php')
?>	 