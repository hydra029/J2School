<?php
require 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['remember']) ) {
	$remember = true;
} else {
	$remember = false;
}
$email = preg_replace("/[^A-Za-z0-9@\.]/", "", $email);
$password = preg_replace("/[^A-Za-z0-9]/", "", $password);
//email_check
$email_regex = "/^\w([\.]?\w)*@[a-z]*\.[a-z]*/";
if (preg_match($email_regex, $email) == 0) {
	$_SESSION['error'] = 'Email không hợp lệ';
	echo 1;
	exit;
}
//password_check
$password_regex = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8})/";
if (preg_match($password_regex, $password) == 0) {
	$_SESSION['error'] = 'Mật khẩu ít nhất 8 kí tự, bao gồm chữ hoa, chữ thường, số';
	echo 1;
	exit;
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
	session_start();
	echo 1;
		// header('location:sign_in.php');
}
?>
