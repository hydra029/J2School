<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
if (isset($_GET['type'])) {
	$status = 1;
	$id = $_GET['id'];
	$sql = "update receivers set status = 0";
	mysqli_query($connect,$sql);
	$sql = "update receivers set status = '$status' where id = '$id'";
	mysqli_query($connect,$sql);
	$_SESSION['success'] = "Đặt địa chỉ mặc định thành công";
} else {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	//name_check
	$name_regex = "/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*)*$/";
	if (preg_match($name_regex, $name) == 0) {
		$_SESSION['error'] = 'Tên không hợp lệ';
		header("location:receiver_form.php");
		exit;
	}
	//phone_check
	$phone_regex = "/^(84|0[3|5|7|8|9])+([0-9]{8})$/";
		if (preg_match($phone_regex, $phone) == 0) {
		$_SESSION['error'] = 'Số điện thoại không hợp lệ';
		header("location:receiver_form.php");
		exit;
	}

	$sql = "select * from receivers where customer_id = '$customer_id'";
	$result = mysqli_query($connect,$sql);
	$rows = mysqli_num_rows($result);
	$rows = (int)$rows;
	$id = $rows + 1;
	if ($rows == 0) {
		$status = 1;
	} else {
		$status = 0;
	}
	$sql = "insert into receivers(customer_id,id,name,phone,address,status)
	values ('$customer_id','$id','$name','$phone','$address','$status')";
	mysqli_query($connect,$sql);
	mysqli_close($connect);
	$_SESSION['success'] = "Thêm địa chỉ thành công";
}
header('location:receiver.php');
?>