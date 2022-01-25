<?php

require '../check_super_admin_login.php';

 ?>

<?php 

if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['image'])){
	$_SESSION['error'] = 'Chưa nhập đầy đủ thông tin';
	header('location:form_insert_manufacturers.php');
	exit;
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$image = $_POST['image'];

require '../connect_database.php';

$sql_command_insert = "insert into manufacturers (name, phone, address, image)
values ('$name', '$phone', '$address', '$image')";
mysqli_query($connect_database, $sql_command_insert);

$error = mysqli_error($connect_database);

mysqli_close($connect_database);

if (empty($error)) {
	$_SESSION['success'] = 'Thêm nhà sản xuất thành công';
	header('location:index_manufacturers.php');	
}else {
	$_SESSION['error'] = 'Lỗi truy vấn';
	header('location:index_manufacturers.php');	
}
 
 ?>