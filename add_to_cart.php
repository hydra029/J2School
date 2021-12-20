<?php 
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['id'];
$type = $_GET['type'];

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
	if ($type == 'increase') {
		$quantity ++;
		$sql = "update carts 
		set
		quantity = '$quantity'
		where
		customer_id = '$customer_id' and product_id = '$product_id'";
		mysqli_query($connect,$sql);
		$_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
	} else if ($type == 'decrease') {
		if ($quantity == 1) {
			$sql = "delete from carts where product_id = '$product_id' and customer_id = '$customer_id'";
			mysqli_query($connect,$sql);
		} else {
			$quantity --;
			$sql = "update carts 
			set
			quantity = '$quantity'
			where
			customer_id = '$customer_id' and product_id = '$product_id'";
			mysqli_query($connect,$sql);
			print_r($quantity);
			exit;
			$_SESSION['success'] = 'Xoá khỏi giỏ hàng thành công';
		}
	}
}


header('location:cart.php');
mysqli_close($connect);
?>
