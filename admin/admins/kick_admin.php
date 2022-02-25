<?php 
require '../check_super_admin_login.php';

if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id nhân viên';
	header('location:index.php');
	exit;
}
$id = $_GET['id'];

$check = mysqli_num_rows(mysqli_query($connect_database, "SELECT id FROM admins WHERE id = '$id' "));
if ( empty($check) ) {
	$_SESSION['error'] = 'Sai id nhân viên';
	header('location:index.php');
	exit;
}

require '../connect_database.php';
$sql_delete_admin = "UPDATE admins SET status = 0 WHERE id = '$id' ";

$query_sql_delete_admin = mysqli_query($connect_database, $sql_delete_admin);

$_SESSION['success'] = "Sa thải nhân viên thành công";
header('location:index.php');