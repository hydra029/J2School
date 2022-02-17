<?php 
require '../check_admin_login.php';

$type_id = $_GET['type_id'];
$product_id = $_GET['product_id'];

require '../connect_database.php';

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


$header =  "location:index_insert_products_to_hashtag.php?type_id=$type_id";
header($header);