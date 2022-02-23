<?php require '../check_super_admin_login.php' ?>
<?php

if (empty($_POST['id'])){
	$_SESSION['error'] = 'Chưa nhập id bài cần sửa';
	header('location:index_manufacturers.php');
	exit;
}

if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['image'])){
	$_SESSION['error'] = 'Chưa nhập đầy đủ thông tin';
	header('location:index_manufacturers.php');
	exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$image = $_POST['image'];


require '../connect_database.php';

$sql_command_update = "update manufacturers set
name = '$name',
phone = '$phone',
address = '$address',
image = '$image' where id = '$id' ";
mysqli_query($connect_database, $sql_command_update);




$error = mysqli_error($connect_database);
mysqli_close($connect_database);

if (empty($error)) {
	$_SESSION['success'] = 'Sửa thành công';
	header('location:index_manufacturers.php');
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "cập nhật";
	$object = "nhà cung cấp";
	$object_name = $name;
	require '../activity_log/insert_activity.php';
	exit();
}else {
	$_SESSION['success'] = 'Lỗi truy vấn';
	header('location:index_manufacturers.php');	
	exit();
}


