<?php require '../check_admin_login.php' ?>
<?php 

if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id sản phẩm cần xóa';
	header('location:form_insert_products.php');
	exit;
}

$id = $_GET['id'];


require '../connect_database.php';

//kiểm tra id nhập vào có đúng
$sql_command_select = "select * from products where id = '$id' ";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$array_products = mysqli_fetch_array($query_sql_command_select);
$check = mysqli_num_rows($query_sql_command_select);
if ( $check !== 1 ) {
	$_SESSION['error'] = 'Sai id sẩn phẩm';
	header('location:index_products.php');
	exit();
}
$sql_command_delete = "delete from products where id = $id";
mysqli_query($connect_database, $sql_command_delete);

//insert vào bảng activity
$name = $array_products['name'];
$person = $_SESSION['name'];
$activity_log = "$person đã xóa sản phẩm $name" ;
require '../activity_log/insert_activity.php';



$error = mysqli_error($connect_database);
mysqli_close($connect_database);


//kiểm tra xem sản phẩm đó có trong giỏ hàng
if ( $error ) {
	$_SESSION['error'] = 'Không thể xóa vì có khách hàng đang đặt sản phẩm đó';
	header('location:index_products.php');
	exit;
}

//nếu không có trong giỏ hàng thì báo xóa sản phẩm
if ( isset($_GET['type_id']) ) {
	$type_id = $_GET['type_id'];
	$header = "location:../hashtags/products_linked_hashtag.php?id=$type_id";
	header($header);
	exit();
}
$_SESSION['success'] = 'Xóa sản phẩm thành công';
header('location:index_products.php');

 ?>