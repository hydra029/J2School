<?php 
require '../check_admin_login.php';

if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id thẻ cần xóa';
	header('location:index.php');
	exit;
}

$id = $_GET['id'];

require '../connect_database.php';
$sql_select = "SELECT * FROM types WHERE id = '$id'";
$query_sql_select = mysqli_query($connect_database, $sql_select);
$check_num_rows = mysqli_num_rows($query_sql_select);
if ( $check_num_rows != 1 ) {
	$_SESSION['error'] = 'Sai id thẻ cần xóa';
	header('location:index.php');
	exit;
}

$sql_select_hashtag_name = "SELECT name FROM types WHERE id = '$id'";
$object_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_hashtag_name))['name'];

$sql_delete = "DELETE FROM types WHERE id = '$id'";
mysqli_query($connect_database, $sql_delete);

$error = mysqli_error($connect_database);
if ( empty($error) ) {
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "xóa";
	$object = "thẻ";
	require '../activity_log/insert_activity.php';
	$_SESSION['success'] = "Xóa thẻ thành công";
	header('location:index.php');
	exit();
} else {
	$_SESSION['error'] = "Lỗi truy vấn";
	header('location:index.php');
}