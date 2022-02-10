<?php 
require '../check_admin_login.php';

$type_id = $_GET['type_id'];
$product_id = $_GET['product_id'];

require '../connect_database.php';

$sql_insert_product_type = "
	INSERT INTO product_type(product_id, type_id) VALUES('$product_id', '$type_id')
";
mysqli_query($connect_database, $sql_insert_product_type);
$header =  "location:index_insert_products_to_hashtag.php?type_id=$type_id";
header($header);