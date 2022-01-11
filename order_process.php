<?php 
session_start();
require 'connect.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$customer_id = $_SESSION['customer_id'];

$note = $_POST['note'];
$order_time = date("d-m-Y h:i:s");

$status = 1;
$sql = "select id from receipts where customer_id = '$customer_id' and status = '$status'";
$result = mysqli_query($connect,$sql);
$receipt = mysqli_fetch_array($result);
$receipt_id = $receipt['id'];

$sql = "select * from receivers where customer_id = '$customer_id' and status = '$status'";
$result = mysqli_query($connect,$sql);
$receiver = mysqli_fetch_array($result);
$receiver_id = $receiver['id'];

$status = 2;
$sql = "update receipts
set 
order_time = CURRENT_TIMESTAMP,
receiver_id = '$receiver_id',
note = '$note',
status = '$status'
where
id = $receipt_id";
mysqli_query($connect,$sql);

$sql = "select * from receipts where customer_id = '$customer_id' and status = '$status'";
$result = mysqli_query($connect,$sql);
$receipt = mysqli_fetch_array($result);
$receipt_id = $receipt['id'];
$sql = "select * from receipt_detail where receipt_id = '$receipt_id'";
$result = mysqli_query($connect,$sql);

foreach ($result as $product_id => $each):
    $product_id = $each['product_id'];
    $quantity = $each['quantity'];
    $sql = "insert into receipt_detail(receipt_id, product_id, quantity)
    values ('$receipt_id','$product_id','$quantity')";
    mysqli_query($connect, $sql);
endforeach;

$_SESSION['success'] = "Đơn hàng đang chờ xét duyệt";
header('location:order.php?status=2');
mysqli_close($connect);
?>