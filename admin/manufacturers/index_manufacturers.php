<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../indexxx.css">
	<link rel="stylesheet" href="../style_validate.css">
</head>
<body>

<?php require '../connect_database.php';

$content_search_address = '';
$content_search_name = '';

if (isset($_GET['search'])) {
	$content_search_name = $_GET['search'];	
	$content_search_address = $_GET['search'];
}



$sql_command_select = "select * from manufacturers where name like '%$content_search_name%' or address like '%$content_search_address%'";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);


?>


 
<div class="all">
	<div class="left">
		<?php require '../menu.php'; ?>
	</div> 


	<div class="right">
		<div class="top">

			<div class = "search">
				<form class = "form_search">
					Tìm kiếm
					<button>
						<img src="../style/style_image/icon_search.png" width="50px">
					</button>
				</form>
			</div>

			<div class = "login">
				<a class = "login" href="https://google.com">Đăng nhập</a>
			</div>
		</div>


		<div class = "bot">

			<div class = "header">
				<h1 class =  "header" >NHÀ SẢN XUẤT</h1>
			</div>
			<br>
			<?php require '../validate.php' ?>
			<table class="table">
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
					<td><img src="<?php echo $array_manufacturers['image'] ?>" height = "100px"></td>
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

</div>


</body>
</html>