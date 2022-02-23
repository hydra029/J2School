<?php require '../check_admin_login.php' ?>
<?php 

if (empty($_POST['id'])){
	$_SESSION['error'] = 'Chưa nhập id sản phẩm cần sửa';
	header('location:index_products.php');
	exit;
}

if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) ){
	$_SESSION['error'] = 'Chưa nhập đầy đủ thông tin';
	header('location:index_products.php');
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
	if ( $file_type != "jpeg" && $file_type != "jpg" && $file_type != "gif" && $file_type != "bmp" && $file_type != "png") {
		$_SESSION['error'] = 'Sai định dạng ảnh';
		header("location:form_update_products.php?id=$id");	
		exit();
	}
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
mysqli_close($connect_database); 

if (empty($error)) {
	if ( isset($_POST['type_id']) ) {
		$type_id = $_POST['type_id'];
		$header = "location:../hashtags/products_linked_hashtag.php?id=$type_id";
		header($header);
		exit();
	}
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "cập nhật";
	$object = "sản phẩm";
	$object_name = $name;
	require '../activity_log/insert_activity.php';
	$_SESSION['success'] = 'Sửa sản phẩm thành công';
	header('location:index_products.php');	
}else {
	$_SESSION['error'] = 'Lỗi truy vấn';
	header('location:index_products.php');	
}

mysqli_close($connect_database); 


 ?>