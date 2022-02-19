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
	$sql = "select * from admins where email = '$email' and password = '$password'";
	$result = mysqli_query($connect,$sql);
	$rows = mysqli_num_rows($result);
	$admin = mysqli_fetch_array($result);
	if ($rows == 1) {
		session_start();
		$_SESSION['admin_id'] = $admin['id'];
		$_SESSION['admin_name'] = $admin['name'];
		$token = '';
		if ($remember) {
			$token = uniqid('user_',true) + time();
			$sql = "update admins
			set
			token = '$token'
			where
			id = '$id'";
			setcookie('remember', $token, time() + 60*60*24);
			mysqli_query($connect,$sql);
		}
		echo $admin['name'];
		// header('location:index.php');
	} else {
		session_start();
		echo 1;
		// header('location:sign_in.php');
	}
}
?>

