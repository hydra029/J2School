<?php 
session_start();

require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['id'];
$type = $_GET['type'];
$page = $_GET['page'];
$sql = "select
products.*,
manufacturers.name as manufacturer_name
from products
join manufacturers on manufacturers.id = products.manufacturer_id
where products.id = '$product_id'";

$result = mysqli_query($connect,$sql);
if ($type == 'increase') {
	if (empty($_SESSION['cart'][$customer_id][$product_id])) {
		foreach ($result as $each):
			$_SESSION['cart'][$customer_id][$product_id]['id'] = $each['id'];
			$_SESSION['cart'][$customer_id][$product_id]['name'] = $each['name'];
			$_SESSION['cart'][$customer_id][$product_id]['description'] = $each['description'];
			$_SESSION['cart'][$customer_id][$product_id]['price'] = $each['price'];
			$_SESSION['cart'][$customer_id][$product_id]['image'] = $each['image'];
			$_SESSION['cart'][$customer_id][$product_id]['manufacturer_name'] = $each['manufacturer_name'];
			$_SESSION['cart'][$customer_id][$product_id]['quantity'] = 1;
		endforeach;
	} else {
		foreach ($result as $each):
			$_SESSION['cart'][$product_id]['quantity'] ++;
		endforeach;
	}
	$_SESSION['success'] = 'Thêm vào giỏ hàng thành công !';
} else {
	foreach ($result as $each):
		$_SESSION['cart'][$product_id]['quantity'] --;
	endforeach;
}
foreach ($result as $each):
	if ($_SESSION['cart'][$product_id]['quantity'] == 0) {
		unset($_SESSION['cart'][$product_id]);
	}	
endforeach;



if ($page == 'index') {
	header("location:index.php");
} else if ($page == 'product_detail') {
	header("location:product_detail.php?id='$product_id'");
} else {
	header("location:cart.php");
}
mysqli_close($connect);
?>