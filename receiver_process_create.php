<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "select * from receivers where customer_id = '$customer_id' and status <> '2'";
$result = mysqli_query($connect,$sql);
$rows = mysqli_num_rows($result);
if ($rows == 0) {
	$status = 1;
} else {
	$status = 0;
}
$sql = "select * from receivers where customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$rows = mysqli_num_rows($result);
$rows = (int)$rows;
$id = $rows + 1;
$sql = "insert into receivers(customer_id,id,name,phone,address,status)
values ('$customer_id','$id','$name','$phone','$address','$status')";
mysqli_query($connect,$sql);
echo 1;
$_SESSION['notify'] = "Thêm địa chỉ thành công";
?>