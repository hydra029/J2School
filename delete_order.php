<?php 
session_start();
$customer_id = $_SESSION['customer_id'];
$id = $_POST['id'];
require 'connect.php';
$sql = "update receipts set status = '7' where id = '$id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
$_SESSION['notify'] = "Xoá đơn hàng thành công";

?>