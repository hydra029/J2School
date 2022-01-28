<?php require '../check_admin_login.php' ?>
<?php 

if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_FILES['image']) || empty($_POST['manufacturer_id']) ) {
	$_SESSION['error'] = 'Chưa điền đầy đủ thông tin';
	header('location:form_insert_products.php');
	exit();
}

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['image'];
$manufacturers_id = $_POST['manufacturer_id'];
$types_name = explode(',', $_POST['types_name']);

$folder = 'images/';
$file_type = explode('.', $image["name"])[1];

$file_name = time() . '.' . $file_type;

$file_path = $folder . $file_name;

move_uploaded_file($image["tmp_name"], $file_path);

require '../connect_database.php';
$sql_command_insert = "insert into products(name, description, price, image, manufacturer_id) 
values('$name', '$description', '$price', '$file_path', '$manufacturers_id') ";

mysqli_query($connect_database, $sql_command_insert);

$product_id = mysqli_insert_id($connect_database);


foreach ($types_name as $type_name) {
	$sql_select_type = "select * from types where name = '$types_name' ";
	$query_sql_select_type = mysqli_query($sql_select_type);
	$type = mysqli_fetch_array($query_sql_select_type);
	if ( empty($type)) {
		$sql_insert_type = "insert into types(name) values('$type_name')";
		mysqli_query($connect_database, $sql_insert_type);
		$type_id = mysqli_insert_id($connect_database);
	} else {
		$type_id = $type['id'];
	}
	$sql_command_insert = "insert into product_type(product_id, type_id)
	values('$product_id', '$type_id')";
	mysqli_query($connect_database, $sql_command_insert);
}


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