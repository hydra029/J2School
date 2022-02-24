<?php 
require '../check_admin_login.php';

if (empty($_GET['type_id'])){
	$_SESSION['error'] = 'Chưa nhập id thẻ để xóa thẻ vào sản phẩm';
	header('location:index.php');
	exit;
}
$type_id = $_GET['type_id'];

//kiểm tra id có hợp lệ
require '../connect_database.php';
$sql_check_type_id = "SELECT id FROM types WHERE id = '$type_id'";
$check_type_id = mysqli_fetch_array(mysqli_query($connect_database, $sql_check_type_id))['id'] ;
if ( empty($check_type_id) ) {
	$_SESSION['error'] = 'Sai id thẻ cần xóa thẻ vào sản phẩm';
	header('location:index.php');
	exit;
}


if (empty($_GET['product_id'])){
	$_SESSION['error'] = 'Chưa nhập id sản phẩm để thêm thẻ vào sản phẩm';
	$header = "location:products_linked_hashtag.php?id=" . $type_id;
	header($header);
	exit;
}
$product_id = $_GET['product_id'];

$sql_check_product_id = "SELECT id FROM products WHERE id = '$product_id'";
$check_product_id = mysqli_fetch_array(mysqli_query($connect_database, $sql_check_product_id))['id'] ;
if ( empty($check_product_id) ) {
	$_SESSION['error'] = 'Sai id sản phẩm cần xóa thẻ vào sản phẩm';
	$header = "location:products_linked_hashtag.php?id=" . $type_id;
	header($header);
	exit;	
}


$sql_delete = "
	DELETE FROM product_type WHERE product_id = '$product_id' AND type_id = '$type_id'
";
mysqli_query($connect_database, $sql_delete);

//insert vào bảng activity
$admin_id = $_SESSION['id'];
$admin_name = $_SESSION['name'];
$activity = "xóa";
$object = "thẻ";
$sql_select_product_name = "SELECT name FROM products WHERE id = '$product_id'";
$product_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_product_name))['name'];
$sql_select_type_name = "SELECT name FROM types WHERE id = '$type_id'";
$type_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_type_name))['name'];
$object_name = "$type_name khỏi sản phẩm $product_name" ;
require '../activity_log/insert_activity.php';

$_SESSION['success'] = "Xóa thẻ khỏi sản phẩm thành công";
$header_location = "location:products_linked_hashtag.php?id=$type_id";
header($header_location);