<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../indexx.css">
</head>
<body bgcolor="ABB1BA">


<?php require '../connect_database.php';

$sql_command_select = "select * from manufacturers";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);



?>


 
<div class="all">
	<div class="top">
		<div class = "login">
			<a href="https://google.com">Đăng nhập</a>
		</div>
	</div> 

	<div class = "left">
		<?php require '../menu.php'; ?>
	</div>
	<div class="right">
		<h1 style="text-align: center;">Đây là trang chủ của quản lí nhà sản xuất</h1>
		<?php require '../validate.php' ?>
		<table border="1px solid black" width="100%">
			<tr>
				<th>Mã</th>
				<th>Tên nhà sản xuất</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<th>Hình ảnh</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
			<?php foreach ($query_sql_command_select as $array_manufacturers): ?>
			<tr>
				<td><?php echo $array_manufacturers['id'] ?></td>
				<td><?php echo $array_manufacturers['name'] ?></td>
				<td><?php echo $array_manufacturers['phone'] ?></td>
				<td><?php echo $array_manufacturers['address'] ?></td>
				<td><img src="<?php echo $array_manufacturers['image'] ?>" height = "200px"></td>
				<td>
					<a href="form_update_manufacturers.php?id=<?php echo $array_manufacturers['id'] ?>">Sửa</a>
				</td>
				<td>
					<a href="process_delete_manufacturers.php?id=<?php echo $array_manufacturers['id'] ?>">Xóa</a>
				</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>

</div>


</body>
</html>