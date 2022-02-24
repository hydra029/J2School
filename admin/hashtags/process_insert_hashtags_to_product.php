<?php require '../check_admin_login.php'; ?>
<?php 

if (empty($_POST['id'])){
	$_SESSION['error'] = 'Chưa nhập id sản phẩm cần thêm thẻ vào';
	header('location:index_insert_hashtags_to_product.php');
	exit;
}
$product_id = $_POST['id'];

require '../connect_database.php';
$sql_check_exist_hashtag = "SELECT id FROM products WHERE id = '$product_id'";
$check = mysqli_query($connect_database, $sql_check_exist_hashtag);
if ( mysqli_num_rows($check) != 1 ) {
	$_SESSION['error'] = 'Sai id sản phẩm cần thêm thẻ vào';
	header('location:index_insert_hashtags_to_product.php');
	exit;
}

if ( empty($_POST['types_name']) ) {
	$_SESSION['error'] = 'Chưa điền tên thẻ';
	$header =  "location:index_insert_hashtags_to_product.php?id=" . $product_id;
	header($header);
	exit;	
}
$types_name = explode(',', $_POST['types_name']);


$array= [];
foreach ($types_name as $each_type_name) {
	$sql_select_types = "SELECT * FROM types WHERE name LIKE '%$each_type_name%' LIMIT 1";
	$type = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_types));
	$error = mysqli_error($connect_database);
	if ( empty($error) ) {
		if ( empty($type) ) {
			$sql_insert_types = "INSERT INTO types(name) VALUES('$each_type_name')";
			mysqli_query($connect_database, $sql_insert_types);
			$type_id = mysqli_insert_id($connect_database);

			//insert vào bảng activity
			$admin_id = $_SESSION['id'];
			$admin_name = $_SESSION['name'];
			$activity = "thêm";
			$object = "thẻ";
			$object_name = $each_type_name;
			require '../activity_log/insert_activity.php';
		} else {
			$type_id = $type['id'];
		}
		$sql_insert_product_type = "
		INSERT INTO product_type(product_id, type_id)
		VALUES('$product_id', '$type_id');
		";
		mysqli_query($connect_database, $sql_insert_product_type);

		//insert vào bảng activity
		$activity = "thêm";
		$object = "thẻ";
		$sql_select_product_name = "SELECT name FROM products WHERE id = '$product_id'";
		$product_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_product_name))['name'] ;
		$object_name = "$each_type_name vào sản phẩm $product_name";
		require '../activity_log/insert_activity.php';

	} else {
		$_SESSION['error'] = 'Tên thẻ có vấn đề';
		$header =  "location:form_insert_hashtags_to_product.php?id=" . $product_id;
		header($header);
		exit;
	}
	
}
$_SESSION['success'] = "Thêm thẻ vào sản phẩm thành công";
header('location:index.php');