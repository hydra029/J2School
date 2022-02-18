<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "update receivers 
set 
name = '$name',
phone = '$phone',
address = '$address'
where
id = '$id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
$sql = "select * from receivers where id = '$id' and customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$rcv = mysqli_fetch_array($result);
	$_SESSION['notify'] = "Thay đổi thông tin thành công";

echo json_encode($rcv);
exit;
?>