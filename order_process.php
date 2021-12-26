<?php 
session_start();
require 'connect.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$customer_id = $_SESSION['customer_id'];
$receiver_name = $_POST['receiver_name'];
$receiver_phone = $_POST['receiver_phone'];
$receiver_address = $_POST['receiver_address'];
$note = $_POST['note'];
$order_time = date("d-m-Y h:i:s");

$status = 1;

$sql = "insert into receipts(customer_id,order_time,receiver_name,receiver_phone,receiver_address,note,status)
values ('$customer_id','$order_time','$receiver_name','$receiver_phone','$receiver_address','$note','$status')";
mysqli_query($connect,$sql);

$sql = "select id from receipts where customer_id = '$customer_id' and order_time = '$order_time'";
$result = mysqli_query($connect,$sql);
foreach ($result as $each) {
    $receipt_id = $each['id'];
}

$result = $_SESSION['cart'];
foreach ($result as $product_id => $each):
    $product_id = $each['id'];
    $quantity = $each['quantity'];
    
    $sql = "insert into receipt_detail(receipt_id, product_id, quantity)
    values ('$receipt_id','$product_id','$quantity')";

    mysqli_query($connect, $sql);
endforeach;

$_SESSION['order'][$receipt_id] = $_SESSION['cart'];
unset($_SESSION['cart']);
header('location:order.php');
mysqli_close($connect);
?>