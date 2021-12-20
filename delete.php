<?php 
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['product_id'];
$sql = "delete from carts where product_id = '$product_id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
$_SESSION['success'] = 'Xoá khỏi giỏ hàng thành công';
mysqli_close($connect);
header('location:cart.php')
?>