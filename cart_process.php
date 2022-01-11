<?php 
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['id'];
$type = $_GET['type'];
$page = $_GET['page'];
$status = '1';
$quantity = '1';

$sql = "select * from receipts where customer_id = $customer_id and status = '$status'";
$result = mysqli_query($connect,$sql);
$rows = mysqli_num_rows($result);

//check có giỏ hàng chưa
if ($rows != 1) {
	$sql = "insert into receipts(customer_id, status)
	values ('$customer_id', '$status')";

	mysqli_query($connect, $sql);
	$sql = "select * from receipts where customer_id = $customer_id and status = '$status'";
	$result = mysqli_query($connect, $sql);
	$cart = mysqli_fetch_array($result);
	$receipt_id = $cart['id'];

	$sql = "insert into receipt_detail(receipt_id, product_id, quantity)
	values ('$receipt_id', '$product_id', '$quantity')";

	mysqli_query($connect, $sql);
	$_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
} else {									 //đã có giỏ hàng
	
	$sql = "select * from receipts where customer_id = $customer_id and status = '$status'";
	$result = mysqli_query($connect, $sql);
	$cart = mysqli_fetch_array($result);
	$receipt_id = $cart['id'];
	$sql = "select * from receipt_detail where product_id = '$product_id' and receipt_id = '$receipt_id'";
	$result = mysqli_query($connect, $sql);
	$rows = mysqli_num_rows($result);
	//check có sản phẩm
	if ($rows == 1 ) { 
		$cart = mysqli_fetch_array($result);
		$quantity = $cart['quantity'];				
		
		if ($type == 'decrease') {
			$quantity --;
			$_SESSION['success'] = "Giảm sản phẩm khỏi giỏ hàng thành công !";
		} else if ($type == 'increase') {
			$quantity ++;
			$_SESSION['success'] = "Thêm sản phẩm vào giỏ hàng thành công !";
		} else {
			$quantity = 0;
			$_SESSION['success'] = "Xoá sản phẩm khỏi giỏ hàng thành công !";
		}
		if ($quantity > 0) {
			$sql = "update receipt_detail
			set
			quantity = '$quantity'
			where
			receipt_id = '$receipt_id' and product_id = '$product_id'";
			mysqli_query($connect,$sql);
		} else {
			$sql = "delete from receipt_detail where receipt_id = '$receipt_id' and product_id = '$product_id'";
			mysqli_query($connect,$sql);
		}
	} else {
		$sql = "insert into receipt_detail(receipt_id, product_id, quantity)
		values ('$receipt_id', '$product_id', '$quantity')";
		mysqli_query($connect,$sql);
		$_SESSION['success'] = "Thêm sản phẩm vào giỏ hàng thành công !";
	}
}


if ($page == 'index') {
	header("location:index.php");
} else if ($page == 'product_detail') {
	header("location:product_detail.php?id=$product_id");
} else {
	header("location:cart.php");
}
mysqli_close($connect);
?>
