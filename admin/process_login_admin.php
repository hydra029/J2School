<?php 
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

require 'connect_database.php';

$sql_command_select = "select * from admins where email = '$email' and password = '$password' limit 1";

$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);

if ( mysqli_num_rows($query_sql_command_select) == 1) {
	$array_admin = mysqli_fetch_array($query_sql_command_select);
	$_SESSION['id'] = $array_admin['id'];
	$_SESSION['name'] = $array_admin['name'];
	$_SESSION['level'] = $array_admin['level'];	
	header('location:root/index_admin.php');
	exit();
} 


header('location:index.php?error=Sai tài khoản hoặc mật khẩu');
