<?php 
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['id'];
$type = $_GET['type'];
$page = $_GET['page'];

$sql = "select * from carts where product_id = '$product_id'";
$result = mysqli_query($connect, $sql);

$rows = mysqli_num_rows($result);
$cart = mysqli_fetch_array($result);

if ($rows < 1) {
	if ($type = 'increase') {
		$quantity = 1;
		$sql = "insert into carts(customer_id,product_id,quantity)
		values ('$customer_id','$product_id','$quantity')";
		mysqli_query($connect,$sql);
		$_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
	} 
}else {
	$quantity = $cart['quantity'];
	if ($quantity == 1) {
		if ($type == 'decrease') {
			$sql = "delete from carts where product_id = '$product_id' and customer_id = '$customer_id'";
			mysqli_query($connect,$sql);
			$_SESSION['success'] = 'Xoá khỏi giỏ hàng thành công';
		} else {
			$quantity ++;
			$_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
		}
	} else {
		if ($type == 'increase') {
			$quantity ++;
			$_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
		} else {
			$quantity --;
			$_SESSION['success'] = 'Xoá khỏi giỏ hàng thành công';
		}
	} 
}
$sql = "update carts 
set
quantity = '$quantity'
where
customer_id = '$customer_id' and product_id = '$product_id'";
mysqli_query($connect,$sql);

if ($page == 'index') {
	header("location:index.php");
} else if ($page == 'product_detail') {
	header("location:product_detail.php?id='$product_id'");
} else {
	header("location:cart.php");
}
mysqli_close($connect);
?>
