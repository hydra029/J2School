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
	$sql = "update receivers set status = 0 where status <> 2 and customer_id = '$customer_id'";
	mysqli_query($connect,$sql);
	$sql = "update receivers set status = '$status' where id = '$id' and customer_id = '$customer_id'";
	mysqli_query($connect,$sql);
	$sql = "select * from receivers where customer_id = '$customer_id' and id = '$id'";
	$result = mysqli_query($connect,$sql);
	$rcv = mysqli_fetch_array($result);
	echo json_encode($rcv);
	exit;
}
?>