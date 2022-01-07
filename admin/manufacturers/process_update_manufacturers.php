<?php require '../check_super_admin_login.php' ?>
<?php 

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$image = $_POST['image'];


if (empty($id)){
	$_SESSION['error'] = 'Chưa nhập id bài cần sửa';
	header('location:index_manufacturers.php');
	exit;
}

if (empty($name) || empty($phone) || empty($address) || empty($image)){
	$_SESSION['error'] = 'Chưa nhập đầy đủ thông tin';
	header('location:index_manufacturers.php');
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

mysqli_close($connect_database);

if (empty($error)) {
	$_SESSION['success'] = 'Sửa thành công';
	header('location:index_manufacturers.php');
	exit();
}else {
	$_SESSION['success'] = 'Lỗi truy vấn';
	header('location:index_manufacturers.php');	
	exit();
}


