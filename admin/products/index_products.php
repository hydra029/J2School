<?php require '../check_admin_login.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
</head>

<?php

require '../connect_database.php';

if (isset($_GET['search'])) {
	$content_search = $_GET['search'];
} else {
	$content_search = '';
}

if (isset($_GET['page'])) {
	$index_page = $_GET['page'];
} else {
	$index_page = 1;
}


//lấy ra tổng số bài
$sql_command_count_products = "select count(*) from products where name like '%$content_search%' ";
$query_sql_command_count_products = mysqli_query($connect_database, $sql_command_count_products);
$count_products = mysqli_fetch_array($query_sql_command_count_products)['count(*)'];


//lấy ra số bài trên 1 trang
$products_per_page = 4;


//lấy ra tổng số trang
$count_pages = ceil($count_products / $products_per_page);

//lấy ra số trang bỏ qua
$count_skip_products = ($index_page - 1) * $products_per_page;


$sql_command_select = "select products.*, manufacturers.name as 'manufacturers_name' from products join manufacturers on manufacturers.id = products.manufacturer_id where products.name like '%$content_search%' limit $products_per_page offset $count_skip_products ";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
mysqli_close($connect_database);


?>


<body> 
<?php require '../menu.php'; ?>
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
		<span>Xin chào <?php echo $_SESSION['name'] ?></span>
	</div>
</div>

<div class = "bot">
	<div class = "header">
		<h1 class =  "header" >SẢN PHẨM</h1>			
	</div>
	<br>

	<?php require '../validate.php' ?>
	<table class = "table">
		<tr>
			<th>Mã</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Hình ảnh</th>
			<th>Nhà sản xuất</th>
			<th>Xem chi tiết</th>
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
				<a href = "detail_product.php?id=<?php echo $array_products['id'] ?>">Xem chi tiết</a>
			</td>
			<td>
				<a href="form_update_products.php?id=<?php echo $array_products['id'] ?>">Sửa</a>
			</td>
			<td>
				<a href="process_delete_products.php?id=<?php echo $array_products['id'] ?>">Xóa</a>
			</td>
		</tr>
		<?php endforeach ?>
	</table>

	<?php for ($index_page = 1; $index_page <= $count_pages; $index_page++) { ?>
		<a href="?page=<?php echo $index_page?>&search=<?php echo $content_search ?>">
			<?php echo $index_page ?>
		</a>


	<?php } ?>


</div>

</body>
</html>
