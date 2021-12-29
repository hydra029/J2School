<?php require '../check_admin_login.php' ?>
<?php 
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image_new = $_FILES['image_new'];
$manufacturer_id = $_POST['manufacturer_id'];

if (empty($id)){
	header('location:index_products.php?error=Chưa nhập id bài cần sửa');
	exit;
}

if (empty($name) || empty($description) || empty($price) ){
	header('location:index_products.php?error=Chưa nhập đầy đủ thông tin');
	exit;
}



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
	header('location:index_products.php?success=Sửa sản phẩm thành công');	
}else {
	header('location:index_products.php?error=Lỗi truy vấn');	
}

mysqli_close($connect_database); 


 ?>