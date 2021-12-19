<?php 

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$image = $_POST['image'];


if (empty($id)){
	header('location:index_manufacturers.php?error=Chưa nhập id bài cần sửa');
	exit;
}

if (empty($name) || empty($phone) || empty($address) || empty($image)){
	header('location:index_manufacturers.php?error=Chưa nhập đầy đủ thông tin');
	exit;
}



require '../connect_database.php';

$sql_command_update = "update manufacturers set
name = '$name',
phone = '$phone',
address = '$address',
image = '$image' where id = '$id' ";

mysqli_query($connect_database, $sql_command_update);



$error = mysqli_error($connect_database);

if (empty($error)) {
	header('location:index_manufacturers.php?success=Sửa thành công');
}else {
	header('location:index_manufacturers.php?error=Lỗi truy vấn');	
}


mysql_close($connect_database);