<?php require '../check_super_admin_login.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" href="../style_validate1.css">
</head>
<body>

<?php require '../connect_database.php';


$content_search = '';

if (isset($_GET['search'])) {
	$content_search = $_GET['search'];	
}

if (isset($_GET['page'])) {
	$index_page = $_GET['page'];
} else {
	$index_page = 1 ;
}



//lấy ra tổng số nhà sản xuất
$sql_command_count_manufacturers = "select count(*) from manufacturers where name like '%$content_search%'";
$query_sql_command_count_manufacturers = mysqli_query($connect_database, $sql_command_count_manufacturers);
$count_manufacturers = mysqli_fetch_array($query_sql_command_count_manufacturers)['count(*)'];



//tổng số nhà sản xuất trên 1 trang => 4
$manufacturers_per_page = 4;

//tổng số trang
$count_pages = ceil($count_manufacturers / $manufacturers_per_page);

//số nhà sx bỏ qua trên 1 trang

$count_skip_manufacturers = ($index_page - 1 ) * $manufacturers_per_page;

$sql_command_select = "select * from manufacturers where name like '%$content_search%' limit $manufacturers_per_page offset $count_skip_manufacturers";
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
					<input type="search" name="search" value = "<?php echo $content_search ?>">
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
		<?php for ($index_page = 1; $index_page <= $count_pages; $index_page++) { ?>
			<a href="?page=<?php echo $index_page?>&search=<?php $content_search ?>">
				<?php echo $index_page ?>
			</a>
		
		<?php } ?>


		</div>

	</div>

</div>


</body>
</html>