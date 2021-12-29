<?php require '../check_admin_login.php' ?>
<?php 

$id = $_GET['id'];

if (empty($id)){
	header('location:form_insert_products.php?error=Chưa nhập id sản phẩm cần xóa');
	exit;
}

require '../connect_database.php';

$sql_command_delete = "delete from products where id = $id";
mysqli_query($connect_database, $sql_command_delete);

mysqli_close($connect_database);

header('location:index_products.php?success=Xóa sản phẩm thành công');

 ?>