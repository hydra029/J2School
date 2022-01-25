<?php require '../check_admin_login.php' ?>
<?php 

if (empty($_POST['id'])){
	$_SESSION['error'] = 'Chưa nhập id sản phẩm cần sửa';
	header('location:form_update_products.php');
	exit;
}

if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) ){
	$_SESSION['error'] = 'Chưa nhập đầy đủ thông tin';
	header('location:form_update_products.php');
	exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image_new = $_FILES['image_new'];
$manufacturer_id = $_POST['manufacturer_id'];

if ($image_new['size'] > 0) {
	$folder = 'images/';
	$file_type = explode('.', $image_new["name"])[1];
	$file_name = time() . '.' . $file_type;
	$file_path = $folder . $file_name;
	move_uploaded_file($image_new["tmp_name"], $file_path);
} else {
	$file_path = $_POST['image_old'];	


}

require '../connect_database.php';
$sql_command_update = "update products set 
name = '$name',
description = '$description',
price = '$price',
image = '$file_path',
manufacturer_id = '$manufacturer_id' where id = '$id' ";

mysqli_query($connect_database, $sql_command_update);

$error = mysqli_error($connect_database);

if (empty($error)) {
	$_SESSION['success'] = 'Sửa sản phẩm thành công';
	header('location:index_products.php');	
}else {
	$_SESSION['error'] = 'Lỗi truy vấn';
	header('location:index_products.php');	
}

mysqli_close($connect_database); 


 ?>