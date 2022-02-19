<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$num = $_GET['id'];
$sql = "select status from receivers where customer_id = '$customer_id' and id = '$num'";
$result = mysqli_query($connect,$sql);
$status = $result['status'];
$sql = "select * from receivers where customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$rows = mysqli_num_rows($result);
$sql = "delete from receivers where id = '$num' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
$rows = (int)$rows;
for ($i = $num + 1 ; $i <= $rows; $i++ ) {
	$id = $i - 1; 
	$sql = "update receivers set id = '$id' where id = '$i'";
	$result = mysqli_query($connect,$sql);
}
if ($status != 1) {
	$sql = "update receivers set status = '1' where id = '1'";
	mysqli_query($connect,$sql);
}
$_SESSION['notify'] = "Xoá địa chỉ thành công thành công";
header("location:receiver.php")
?>