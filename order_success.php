<?php 
session_start();
$customer_id = $_SESSION['customer_id'];
require 'connect.php';
$sql = "select * from receipts where customer_id = '$customer_id' and status = '6'";
$result = mysqli_query($connect,$sql);
$order = mysqli_fetch_array($result);
$id = $order['id'];
$sql = "update receipts set status = '7' where id = '$id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
$_SESSION['success'] = "Xác nhận nhận hàng thành công";
header('location:order.php?status=7');
 ?>