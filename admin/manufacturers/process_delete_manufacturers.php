<?php require '../check_super_admin_login.php' ?>
<?php 


if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id nhà sản xuất cần xóa';
	header('location:index_manufacturers.php');
	exit;
}

$id = $_GET['id'];

require '../connect_database.php';

//kiểm tra xem có id cần xóa không
$sql_command_select = "select * from manufacturers where id = '$id'";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$array_manufacturers = mysqli_fetch_array($query_sql_command_select);
$count_rows = mysqli_num_rows($query_sql_command_select);
if ($count_rows !== 1){
	$_SESSION['error'] = 'Sai id nhà sản xuất';
	header('location:index_manufacturers.php');
	exit();
}

$sql_command_delete = "delete from manufacturers where id = '$id'";
mysqli_query($connect_database, $sql_command_delete);

$error = mysqli_error($connect_database);

mysqli_close($connect_database);

if ( empty($error) ) {
	$_SESSION['success'] = 'Xóa nhà sản xuất thành công';
	header('location:index_manufacturers.php');	
	exit();
} else {
	echo '<h1>Lỗi câu truy vấn</h1>';
	exit();
}





 ?>