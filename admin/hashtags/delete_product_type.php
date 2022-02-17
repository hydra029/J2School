<?php 
require '../check_super_admin_login.php'; 

$product_id = $_GET['product_id'];
$type_id = $_GET['type_id'];

require '../connect_database.php';
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


$header_location = "location:products_linked_hashtag.php?id=$type_id";
header($header_location);