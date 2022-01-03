<?php 
session_start();
$customer_id = $_SESSION['customer_id'];
$id = $_GET['id'];
$status = $_GET['status'];
require 'connect.php';
$sql = "update receipts set status = '8' where id = '$id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
$_SESSION['success'] = "Xoá đơn hàng thành công";
if ($status == 2) {
  header('location:order.php?status=2');
} else {
  header('location:order.php?status=3');
}
?>