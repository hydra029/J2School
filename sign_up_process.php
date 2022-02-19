<?php 
session_start();
require 'connect.php';
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select count(*) as count from customers where email = '$email' and password = '$password' ";
$result = mysqli_query($connect,$sql);
$rows = mysqli_fetch_array($result);
if (condition) {
	echo 0;
	exit();
} else {
	$sql = "insert into customers(name, gender, dob, email, password, token)
	values ('$name', '$gender', '$dob', '$email', '$password', '')";
	$result = mysqli_query($connect,$sql);
	$_SESSION['notify'] = "Đăng ký thành công";
	echo 1;
	exit();
}
?>