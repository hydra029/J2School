<?php 
require '../check_admin_login.php';

if ( empty($_POST['id']) ) {
	$_SESSION['error'] = 'Chưa nhập id thẻ cần đổi tên';
	header('location:index.php');
	exit;
}
$id = $_POST['id'];

require '../connect_database.php';
$sql_check_exist_hashtag = "SELECT id FROM types WHERE id = '$id'";
$check = mysqli_query($connect_database, $sql_check_exist_hashtag);
if ( mysqli_num_rows($check) != 1 ) {
	$_SESSION['error'] = 'Sai id thẻ cần đổi tên';
	header('location:index.php');
	exit;
}

if ( empty($_POST['name']) ) {
	$_SESSION['error'] = 'Chưa nhập tên thẻ cần đổi tên';
	$header = "location:form_change_name.php?id=" . $_POST['id'];
	header($header);
	exit;
}
$name = $_POST['name'];



$sql_select_type_name = "SELECT name FROM types WHERE id = '$id'";
$type_name_old = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_type_name))['name'];

if ( $type_name_old == $name ) {
	$_SESSION['error'] = 'Trùng tên thẻ';
	$header = "location:form_change_name.php?id=" . $_POST['id'];
	header($header);
	exit;
}

$sql_update = "UPDATE types SET name = '$name' WHERE id = '$id'";
mysqli_query($connect_database, $sql_update);

$error = mysqli_error($connect_database);
if ( empty($error) ) {
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "đổi tên";
	$object = "thẻ";
	$object_name = "$type_name_old thành $name" ;
	require '../activity_log/insert_activity.php';
	$_SESSION['success'] = "Đổi tên thẻ thành công";
	header('location:index.php');
	exit();
} else {
	$_SESSION['error'] = 'Lỗi truy vấn';
	$header = "location:form_change_name.php?id=" . $_POST['id'];
	header($header);
	exit;
}