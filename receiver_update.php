<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "select * from receivers where id = '$id' and customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$rcv = mysqli_fetch_array($result);
$status = $rcv['status'];

$sql = "update receivers set status = '2' where customer_id = '$customer_id' and id = '$id'";
mysqli_query($connect,$sql);

$sql = "select * from receivers where customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$rows = mysqli_num_rows($result);
$rows = (int)$rows;
$id = $rows + 1;

$sql = "insert into receivers(customer_id,id,name,phone,address,status)
values ('$customer_id','$id','$name','$phone','$address','$status')";
mysqli_query($connect,$sql);

$sql = "select * from receivers where id = '$id' and customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$rcv = mysqli_fetch_array($result);
$_SESSION['notify'] = "Thay đổi thông tin thành công";

echo json_encode($rcv);
exit;
?>