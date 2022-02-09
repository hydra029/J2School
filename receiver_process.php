<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$type = $_GET['type'];
if ($type == 'dfl') {
	$status = 2;
	$id = $_GET['id'];
	$sql = "update receivers set status = 0";
	mysqli_query($connect,$sql);
	$sql = "update receivers set status = '$status' where id = '$id' and customer_id = '$customer_id'";
	mysqli_query($connect,$sql);
	exit;
} else if ($type == 'slc') {
	$status = 1;
	$id = $_GET['id'];
	$sql = "update receivers set status = 0";
	mysqli_query($connect,$sql);
	$sql = "update receivers set status = '$status' where id = '$id' and customer_id = '$customer_id'";
	mysqli_query($connect,$sql);
	$sql = "select * from receivers where customer_id = '$customer_id'";
	$result = mysqli_query($connect,$sql);
	$arr = [];
	foreach ($result as $each) {
		$arr[] = $each;
	}
	echo json_encode($arr);
	exit;
}else {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$sql = "select * from receivers where customer_id = '$customer_id'";
	$result = mysqli_query($connect,$sql);
	$rows = mysqli_num_rows($result);
	$rows = (int)$rows;
	$id = $rows + 1;
	if ($rows == 0) {
		$status = 1;
	} else {
		$status = 0;
	}
	$sql = "insert into receivers(customer_id,id,name,phone,address,status)
	values ('$customer_id','$id','$name','$phone','$address','$status')";
	mysqli_query($connect,$sql);
	mysqli_close($connect);
}
?>