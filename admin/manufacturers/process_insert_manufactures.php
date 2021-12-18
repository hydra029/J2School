<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$image = $_POST['image'];

if (empty($name) || empty($phone) || empty($address) || empty($image)){
	header('location:form_insert_manufacturers.php?error=Chưa nhập đầy đủ thông tin');
	exit;
}

require '../connect_database.php';

$sql_command_insert = "insert into manufacturers (name, phone, address, image)
values ('$name', '$phone', '$address', '$image')";
mysqli_query($connect_database, $sql_command_insert);

$error = mysqli_error($connect_database);

if (empty($error)) {
	header('location:index_manufacturers.php?success=Thêm nhà sản xuất thành công');	
}else {
	header('location:index_manufacturers.php?error=Lỗi truy vấn');	
}
 

mysql_close($connect_database);
 ?>