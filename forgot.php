<?php 
require 'connect.php';
$email = '';
$type = '';
$cod = '';
$password = '';
if (isset($_POST['email'])) {
	$email = $_POST['email'];
}
if (isset($_POST['type'])) {
	$type = $_POST['type'];
}
if (isset($_POST['code'])) {
	$cod = $_POST['code'];
}
if (isset($_POST['password'])) {
	$password = $_POST['password'];
}
$sql = "select name from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
$cus = mysqli_fetch_array($result);
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
} else {
	$sql = "select code from customers where email = '$email'";
	$result = mysqli_query($connect, $sql);
	$cus = mysqli_fetch_array($result);
	$code = $cus['code'];
	if ($cod == $code) {
		$sql = "update customers
		set
		password = '$password'
		where
		email = '$email' and code = '$code'";
		mysqli_query($connect, $sql);
		echo 2;
	}
}
echo 0;
?>