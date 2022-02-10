<?php 
$product_id = $_POST['id'];
$types_name = explode(',', $_POST['types_name']);

$array= [];

require '../connect_database.php';
foreach ($types_name as $each_type_name) {
	$sql_select_types = "SELECT * FROM types WHERE name LIKE '%$each_type_name%' LIMIT 1";
	$type = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_types));
	if ( empty($type) ) {
		$sql_insert_types = "INSERT INTO types(name) VALUES('$each_type_name')";
		mysqli_query($connect_database, $sql_insert_types);
		$type_id = mysqli_insert_id($connect_database);
	} else {
		$type_id = $type['id'];
	}
	$sql_insert_product_type = "
		INSERT INTO product_type(product_id, type_id)
		VALUES('$product_id', '$type_id');
	";
	mysqli_query($connect_database, $sql_insert_product_type);
}

header('location:index.php');