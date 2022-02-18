<?php 
session_start();
require 'connect.php';
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "insert into customers(name, gender, dob, email, password, token)
values ('$name', '$gender', '$dob', '$email', '$password', '')";
$result = mysqli_query($connect,$sql);
$_SESSION['notify'] = "Đăng ký thành công";
echo 1;
exit();
?>