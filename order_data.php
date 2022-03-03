<?php 
session_start();
require 'connect.php';
$receipt_id = $_POST['id'];
$customer_id = $_SESSION['customer_id'];
$sql = "select * from receipts
where customer_id = '$customer_id' and id = '$receipt_id'";
$result = mysqli_query($connect,$sql);
$order = mysqli_fetch_array($result);
$receiver_id = $order['receiver_id'];
$sql = "select * from receivers where id = '$receiver_id' and customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$receiver = mysqli_fetch_array($result);
$arr = $order;
$arr['total'] = number_format($arr['total']);
$arr['name'] = $receiver['name'];
$arr['phone'] = $receiver['phone'];
$arr['address'] = $receiver['address'];
$sql = "select * from receipt_detail
where receipt_id = '$receipt_id'";
$result = mysqli_query($connect,$sql);
$i = 0;
foreach ($result as $each) {
	$arr[$i] = $each;
	$i++;
	$arr['num'] = $i;
}
for ($i = 0; $i < $arr['num']; $i++) {
	$id = $arr[$i]['product_id'];
	$sql = "select * from products where id = '$id'";
	$result = mysqli_query($connect,$sql);
	foreach ($result as $each) {
		$arr[$i]['product'] = $each;
		$arr[$i]['price'] = number_format($arr[$i]['product']['price']);
	}
}


echo json_encode($arr);
?>