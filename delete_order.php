<?php 
session_start();
$customer_id = $_SESSION['customer_id'];
require 'connect.php';
$sql = "select id from receipts where customer_id = '$customer_id' and status = '2'";
$result = mysqli_query($connect,$sql);
$id = $result['id'];
$sql = "update receipts set status = '0' where id = '$id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
$_SESSION['success'] = "Xoá đơn hàng thành công";
header('location:order.php');
 ?>