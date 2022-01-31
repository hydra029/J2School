<?php require '../check_admin_login.php' ?>

<?php 
session_start();
if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id đơn hàng';
	header('location:index.php');
	exit;
}
if (empty($_GET['status'])){
	$_SESSION['error'] = 'Chưa nhập trạng thái sản phẩm muốn cập nhật';
	header('location:index.php');
	exit;
}

$id = $_GET['id'];
$status = $_GET['status'];
$person = $_SESSION['name'];

require '../connect_database.php';

if ($status == 4) {
	$sql_command_update = "update receipts set status = 4 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
	//insert vào bảng activity
	$activity_log = "$person đã cập nhật trạng thái của đơn hàng số $id thành trạng thái đang giao" ;
	require '../activity_log/insert_activity.php';
} else if ($status == 5 ) {
	$sql_command_update = "update receipts set status = 5 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
	//insert vào bảng activity
	$activity_log = "$person đã cập nhật trạng thái của đơn hàng số $id thành trạng thái đã giao" ;
require '../activity_log/insert_activity.php';
} else if ($status == 3 ) {
	$sql_command_update = "update receipts set status = 3 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
	//insert vào bảng activity
	$activity_log = "$person đã hủy đơn hàng số $id" ;
	require '../activity_log/insert_activity.php';
}

$error = mysqli_error($connect_database);
mysqli_close($connect_database);
if (empty($error)) {
	$_SESSION['success'] = 'Cập nhật hóa đơn thành công';
	header('location:index.php');
}else {
	$_SESSION['error'] = 'Lỗi truy vấn';
	header('location:index.php');
}