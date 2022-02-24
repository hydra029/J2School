<?php 
require '../check_admin_login.php';

if (empty($_GET['type_id'])){
	$_SESSION['error'] = 'Chưa nhập id thẻ để thêm thẻ vào sản phẩm';
	header('location:index.php');
	exit;
}
$type_id = $_GET['type_id'];



//kiểm tra id có hợp lệ
require '../connect_database.php';
$sql_check_type_id = "SELECT id FROM types WHERE id = '$type_id'";
$check_type_id = mysqli_fetch_array(mysqli_query($connect_database, $sql_check_type_id))['id'] ;
if ( empty($check_type_id) ) {
	$_SESSION['error'] = 'Sai id thẻ cần thêm thẻ vào sản phẩm';
	header('location:index.php');
	exit;	
}


if (empty($_GET['product_id'])){
	$_SESSION['error'] = 'Chưa nhập id sản phẩm để thêm thẻ vào sản phẩm';
	$header = "location:index_insert_products_to_hashtag.php?type_id=" . $type_id;
	header($header);
	exit;
}
$product_id = $_GET['product_id'];

$sql_check_product_id = "SELECT id FROM products WHERE id = '$product_id'";
$check_product_id = mysqli_fetch_array(mysqli_query($connect_database, $sql_check_product_id))['id'] ;
if ( empty($check_product_id) ) {
	$_SESSION['error'] = 'Sai id sản phẩm cần thêm thẻ vào sản phẩm';
	$header = "location:index_insert_products_to_hashtag.php?type_id=" . $type_id;
	header($header);
	exit;	
}


$sql_insert_product_type = "
	INSERT INTO product_type(product_id, type_id) VALUES('$product_id', '$type_id')
";
mysqli_query($connect_database, $sql_insert_product_type);

//insert vào bảng activity
$admin_id = $_SESSION['id'];
$admin_name = $_SESSION['name'];
$activity = "thêm";
$object = "thẻ";
$type_name = mysqli_fetch_array(mysqli_query($connect_database, "SELECT name FROM types WHERE id = '$type_id'"))['name'] ;
$product_name = mysqli_fetch_array(mysqli_query($connect_database, "SELECT name FROM products WHERE id = '$product_id'"))['name'] ;
$object_name = "$type_name vào sản phẩm $product_name";
require '../activity_log/insert_activity.php';

$_SESSION['success'] = "Thêm sản phẩm vào thẻ thành công";
$header =  "location:index_insert_products_to_hashtag.php?type_id=$type_id";
header($header);