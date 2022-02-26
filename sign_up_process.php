<?php 
session_start();
require 'connect.php';
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select count(*) as count from customers where email = '$email'";
$result = mysqli_query($connect,$sql);
$rows = mysqli_fetch_array($result);
if ($rows == 1) {
	echo 0;
	exit();
} else {
	$sql = "insert into customers(name, gender, dob, email, password, token)
	values ('$name', '$gender', '$dob', '$email', '$password', '')";
	$result = mysqli_query($connect,$sql);
	$_SESSION['notify'] = "Đăng ký thành công";
	require 'mail.php';
	$title = 'Chúc mừng bạn đăng ký tài khoản thành công';
	$content = 'Bạn đã đăng ký thành công tài khoản Website ABC !!';
	send_mail($email, $name, $title, $content);
	echo 1;
	exit();
}
?>