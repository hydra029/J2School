<?php 
require '../check_super_admin_login.php'; 

$product_id = $_GET['product_id'];
$type_id = $_GET['type_id'];

require '../connect_database.php';
$sql_delete = "
	DELETE FROM product_type WHERE product_id = '$product_id' AND type_id = '$type_id'
";

mysqli_query($connect_database, $sql_delete);
$header_location = "location:products_linked_hashtag.php?id=$type_id";
header($header_location);