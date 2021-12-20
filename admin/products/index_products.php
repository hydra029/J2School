<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../indexx.css">
	<link rel="stylesheet" href="../style_validate.css">
</head>
<body>
<?php 

require '../connect_database.php';

$sql_command_select = "select products.*, manufacturers.name as 'manufacturers_name' from products join manufacturers on manufacturers.id = products.manufacturer_id";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);


?>


<div class = "all">
	<div class="top">
		<h1 class = "header">Đây là giao diện quản lí sản phẩm</h1>
		<div class = "login">
			<a href="https://google.com">Đăng nhập</a>
		</div>
		<form class = "form_search">
			Tìm kiếm
			<input type="search" name="search" placeholder="nồi, chổi, ...">
		</form>
	</div> 

	<div class="left">
		<?php require '../menu.php'; ?>
	</div>

	<div class = "right">
		<?php require '../validate.php' ?>
		<table class = table>
			<tr>
				<th>Mã</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Hình ảnh</th>
				<th>Nhà sản xuất</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
			<?php foreach ($query_sql_command_select as $array_products): ?>
			<tr>
				<td><?php echo $array_products['id'] ?></td>
				<td><?php echo $array_products['name'] ?></td>
				<td><?php echo $array_products['price'] ?></td>
				<td>
					<img src="<?php echo $array_products['image'] ?>" height = "100px">
				</td>
				<td><?php echo $array_products['manufacturers_name'] ?></td>
				<td>
					<a href="form_update_products.php?id=<?php echo $array_products['id'] ?>">Sửa</a>
				</td>
				<td>
					<a href="process_delete_products.php?id=<?php echo $array_products['id'] ?>">Xóa</a>
				</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>

</body>
</html>
