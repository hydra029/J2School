<?php 
require 'connect.php';
$email = '';
$type = '';
$cod = '';
$password = '';
if (isset($_GET['email'])) {
	$email = $_GET['email'];
}
if (isset($_GET['type'])) {
	$type = $_GET['type'];
}
if (isset($_GET['code'])) {
	$cod = $_GET['code'];
}
if (isset($_GET['password'])) {
	$password = $_GET['password'];
}
$password_regex = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8})/";
if (preg_match($password_regex, $password) == 0) {
	$_SESSION['error'] = 'Mật khẩu không hợp lệ';
	echo 0;
	exit;
}
$sql = "select *, count(*) as count from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
$cus = mysqli_fetch_array($result);
if ($cus['count'] == 0) {
	echo 0;
	exit;
}
if ($type == "code") {
	require 'mail.php';
	$code = uniqid('code_', true) . time();
	$sql = "update customers
	set
	code = '$code'
	where
	email = '$email'";
	$name = $cus['name'];
	$title = "Quên mật khẩu";
	$content = "Mã xác nhận của bạn là <b>'$code'</b>";
	mysqli_query($connect,$sql);
	send_mail($email, $name, $title, $content);
	echo 1;
	exit;
} else {
	$cod = $cus['code'];
	if ($cod == $code) {
		$sql = "update customers
		set
		password = '$password'
		where
		email = '$email' and code = '$code'";
		mysqli_query($connect, $sql);
		require 'mail.php';
		$code = '';
		$sql = "update customers
		set
		code = ''
		where
		email = '$email'";
		mysqli_query($connect,$sql);
		$name = $cus['name'];
		$title = "Thay đổi mật khẩu";
		$content = "Bạn đã thay đổi mật khẩu thành công";
		send_mail($email, $name, $title, $content);
		echo 2;
		exit;
	}
}
?>