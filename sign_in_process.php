<?php
require 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['remember']) ) {
	$remember = true;
} else {
	$remember = false;
}

//check tài khoản khách hàng
$sql = "select customers.*, count(*) as count from customers where email = '$email' and password = '$password'";
$result = mysqli_query($connect,$sql);
$customer = mysqli_fetch_array($result);
$rows = $customer['count'];
$id = $customer['id'];
if ($rows == 1) {
	session_start();
	$_SESSION['customer_id'] = $customer['id'];
	$_SESSION['customer_name'] = $customer['name'];
	if ($remember == true) {
		$token = uniqid('user_', true) . time();
	} else {
		$token = '';
	}
	$sql = "update customers
	set
	token = '$token'
	where
	id = '$id'";
	mysqli_query($connect,$sql);
	setcookie('remember', $token, time() + 60*60*24);
	echo $customer['name'] . " ";
} else {
	//check tài khoản admin
	$sql_command_select = "select * from admins where email = '$email' and password = '$password' limit 1";

	$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);

	if ( mysqli_num_rows($query_sql_command_select) == 1) {
		$array_admin = mysqli_fetch_array($query_sql_command_select);
		$_SESSION['id'] = $array_admin['id'];
		$_SESSION['name'] = $array_admin['name'];
		$_SESSION['level'] = $array_admin['level'];	
		header('location:root/index.php');
		exit();
	} 
} else {
	session_start();
	echo 1;
		// header('location:sign_in.php');
}
}
?>

