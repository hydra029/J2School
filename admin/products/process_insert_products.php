<?php require '../check_admin_login.php' ?>
<?php 

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['image'];
$manufacturers_id = $_POST['manufacturer_id'];

if (empty($name) || empty($description) || empty($price) || empty($image) || empty($manufacturers_id) ) {
	$_SESSION['error'] = 'Chưa điền đầy đủ thông tin';
	header('location:form_insert_products.php');
	exit();
}

$folder = 'images/';
$file_type = explode('.', $image["name"])[1];

$file_name = time() . '.' . $file_type;

$file_path = $folder . $file_name;

move_uploaded_file($image["tmp_name"], $file_path);

require '../connect_database.php';
$sql_command_insert = "insert into products(name, description, price, image, manufacturer_id) 
values('$name', '$description', '$price', '$file_path', '$manufacturers_id') ";


mysqli_query($connect_database, $sql_command_insert);

$error = mysqli_error($connect_database);

if (empty($error)) {
	$_SESSION['success'] = 'Thêm sản phẩm thành công';
	header('location:index_products.php');	
}else {
	$_SESSION['error'] = 'Lỗi truy vấn';
	header('location:index_products.php');	
}
 
mysqli_close($connect_database);

 ?>