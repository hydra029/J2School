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
$type_id = $_GET['type_id'];
$sql_select_type_name = "SELECT name FROM types WHERE id = '$type_id'";
$type_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_type_name))['name'];

$sql_select = "
	SELECT products.*, manufacturers.name AS 'manufacturers_name', IFNULL(product_type.type_id, 'Chưa có thẻ nào') AS 'type_id', types.name AS 'type_name'
	FROM products
	JOIN manufacturers ON manufacturers.id = products.manufacturer_id
	LEFT JOIN product_type ON product_type.product_id = products.id
	LEFT JOIN types ON types.id = product_type.type_id
	WHERE types.id <> '$type_id' OR types.id IS NULL
";
$query_sql_select = mysqli_query($connect_database, $sql_select);

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
		<a class = "login" href="https://google.com">Đăng nhập</a>
	</div> 
</div>

<div class = "bot">
	<div class = "header">
		<h1 class =  "header" >CHỌN SẢN PHẨM ĐỂ THÊM THẺ <?php echo $type_name ?></h1>
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
			<th>Thêm thẻ <?php echo $type_name ?></th>
		</tr>
		<?php foreach ($query_sql_select as $each_product): ?>
		<tr>
			<td><?php echo $each_product['id'] ?></td>
			<td><?php echo $each_product['name'] ?></td>
			<td><?php echo $each_product['price'] ?></td>
			<td>
				<img src="../products/<?php echo $each_product['image'] ?>" height = "100px">
			</td>
			<td><?php echo $each_product['manufacturers_name'] ?></td>
			<td>
				<a href = "process_insert_products_to_hashtag.php?product_id=<?php echo $each_product['id'] ?>&type_id=<?php echo $type_id ?>">
					Thêm thẻ
				</a>
			</td>
		</tr>
		<?php endforeach ?>
	</table>


</div>

</body>
</html>
