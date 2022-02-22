<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$num = $_GET['id'];
$sql = "update receivers set status = '2' where customer_id = '$customer_id' and id = '$num'";
mysqli_query($connect,$sql);

$sql = "select * from receivers where customer_id = '$customer_id' and status <> '2' limit 1";
$result = mysqli_query($connect,$sql);
$rcv = mysqli_fetch_array($result);
$id = $rcv['id'];
$sql = "update receivers set status = '1' where id = '$id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);

$_SESSION['notify'] = "Xoá địa chỉ thành công thành công";
?>