<?php require '../check_admin_login.php' ?>
<?php 

$id = $_GET['id'];

if (empty($id)){
	$_SESSION['error'] = 'Chưa nhập id sản phẩm cần xóa';
	header('location:form_insert_products.php');
	exit;
}

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

$error = mysqli_error($connect_database);
mysqli_close($connect_database);


//kiểm tra xem sản phẩm đó có trong giỏ hàng
if ( $error ) {
	$_SESSION['error'] = 'Không thể xóa vì có khách hàng đang đặt sản phẩm đó';
	header('location:index_products.php');
	exit;
}

//nếu không có trong giỏ hàng thì báo xóa sản phẩm
$_SESSION['success'] = 'Xóa sản phẩm thành công';
header('location:index_products.php');

 ?>