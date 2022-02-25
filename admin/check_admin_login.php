<?php 

session_start();

if (!isset($_SESSION['level'])) {
	header('location:../index.php?error=Chưa đăng nhập');
	exit();
}
$id = $_SESSION['id'];

require 'connect_database.php';
$sql_select_admin = "SELECT status FROM admins WHERE id = '$id'";
$query = mysqli_query($connect_database, $sql_select_admin);
$status = mysqli_fetch_array($query)['status'];

if ( $status != 1 ) {
	$_SESSION['error'] = "Tài khoản đã bị khóa";
	header('location:../index.php?error=Taikhoanbikhoa');
	exit();
}