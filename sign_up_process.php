<?php 
session_start();
require 'connect.php';
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];


//name_check
$name_regex = "/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*)*$/";
if (preg_match($name_regex, $name) == 0) {
	$_SESSION['error'] = 'Tên không hợp lệ';
	header("location:sign_up.php");
	exit;
}
//email_check
$email_regex = "/^\w([\.]?\w)*@[a-z]*\.[a-z]*/";
if (preg_match($email_regex, $email) == 0) {
	$_SESSION['error'] = 'Email không hợp lệ';
	echo 0;
	exit;
}
//password_check
$password_regex = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8})/";
if (preg_match($password_regex, $password) == 0) {
	$_SESSION['error'] = 'Mật khẩu ít nhất 8 kí tự, bao gồm chữ hoa, chữ thường, số';
	echo 0;	
	exit;
}
$email = preg_replace("/[^A-Za-z0-9@\.]/", "", $email);
$password = preg_replace("/[^A-Za-z0-9]/", "", $password);
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