<?php require '../check_admin_login.php' ?>

<?php 

if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id đơn hàng';
	header('location:index.php');
	exit;
}
$id = $_GET['id'];

//kiểm tra xem có id hóa đơn đó không
require '../connect_database.php';
$sql_command_select = "select * from receipts where id = '$id' ";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$check = mysqli_num_rows($query_sql_command_select);
if ( $check != 1 ) {
	$_SESSION['error'] = 'Không tồn tại hóa đơn này';
	header('location:index.php');
	exit();
}

if (empty($_GET['status'])){
	$_SESSION['error'] = 'Chưa nhập trạng thái sản phẩm muốn cập nhật';
	header('location:index.php');
	exit;
}
$status = $_GET['status'];


//kiểm tra trạng thái của hóa đơn có hợp lệ
if ( $status != '4a' && $status != '0' && $status != 1 && $status != 2 && $status != 3 && $status != 4 && $status != 5 && $status != 6 && $status != 7 && $status != 8 && $status != '0' ) {
	$_SESSION['error'] = 'Trạng thái hóa đơn không hợp lệ';
	header('location:index.php');
	exit();
}

$id = $_GET['id'];
$status = $_GET['status'];
$person = $_SESSION['name'];

require '../connect_database.php';

if ($status == '4a' ) {
	$sql_command_update = "update receipts set status = 4 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "sửa trạng thái";
	$object = "đơn hàng";
	$object_name = "số $id";
	require '../activity_log/insert_activity.php';
} else if ($status == 5 ) {
	$sql_command_update = "update receipts set status = 5 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "hoàn thành";
	$object = "đơn hàng";
	$object_name = "số $id";
	require '../activity_log/insert_activity.php';
} else if ($status == 3 ) {
	$sql_command_update = "update receipts set status = 3 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "hủy";
	$object = "đơn hàng";
	$object_name = "số $id";
	require '../activity_log/insert_activity.php';
} else if ($status == 2 ) {
	$sql_command_update = "update receipts set status = 2 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "sửa trạng thái";
	$object = "đơn hàng";
	$object_name = "số $id";
	require '../activity_log/insert_activity.php';
} else if ($status == 4) {
	$sql_command_update = "update receipts set status = 4 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
	//insert vào bảng activity
	$admin_id = $_SESSION['id'];
	$admin_name = $_SESSION['name'];
	$activity = "duyệt";
	$object = "đơn hàng";
	$object_name = "số $id";
	require '../activity_log/insert_activity.php';
}

$error = mysqli_error($connect_database);
mysqli_close($connect_database);
if (empty($error)) {
	if ( isset($_GET['from']) ) {
		$from = $_GET['from'];
		$customer_id = $_GET['customer_id'];
		$_SESSION['success'] = 'Cập nhật hóa đơn thành công';
		$header = "location:../customers/view_receipts_finished.php?id=$customer_id";
		header($header);
		exit();
	}
	if ( isset($_GET['customer_id']) ) {
		$customer_id = $_GET['customer_id'];
		$_SESSION['success'] = 'Cập nhật hóa đơn thành công';
		$header = "location:../customers/view_receipt.php?id=$customer_id";
		header($header);
		exit();
	}
	if ( $_GET['status'] == 2 || $_GET['status'] == '4a' ) {
		$_SESSION['success'] = 'Cập nhật hóa đơn thành công';
		header('location:view_receipts_finished.php');
		exit();
	}
	$_SESSION['success'] = 'Cập nhật hóa đơn thành công';
	header('location:index.php');
}else {
	$_SESSION['error'] = 'Lỗi truy vấn';
	header('location:index.php');
}