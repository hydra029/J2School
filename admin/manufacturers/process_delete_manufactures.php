<?php 

$id = $_GET['id'];

if (empty($id)){
	header('location:form_insert_manufacturers.php?error=Chưa nhập id nhà sản xuất cần xóa');
	exit;
}
require '../connect_database.php';

$sql_command_delete = "delete from manufacturers where id = '$id'";
mysqli_query($connect_database, $sql_command_delete);

header('location:index_manufacturers.php?success=Xóa nhà sản xuất thành công');

mysql_close($connect_database);

 ?>