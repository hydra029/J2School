<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$page = $_SESSION['page'];

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
//name_check
$name_regex = "/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*)*$/";
if (preg_match($name_regex, $name) == 0) {
	$_SESSION['error'] = 'Tên không hợp lệ';
	header("location:receiver_form.php?type=change&id=$id");
	exit;
}
//phone_check
$phone_regex = "/^(84|0[3|5|7|8|9])+([0-9]{8})$/";
if (preg_match($phone_regex, $phone) == 0) {
	$_SESSION['error'] = 'Số điện thoại không hợp lệ';
	header("location:receiver_form.php?type=change&id=$id");
	exit;
}

$sql = "update receivers 
set 
name = '$name',
phone = '$phone',
address = '$address'
where
id = '$id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
$_SESSION['success'] = "Đặt địa chỉ mặc định thành công";
if ($page == 'order') {
	unset($_SESSION['page']);
	header('location:order_form.php');
	exit;
}
header('location:receiver.php');
?>