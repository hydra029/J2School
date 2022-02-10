<?php require '../check_super_admin_login.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="style_chart.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
</head>


<?php 
$id = $_GET['id'];


require '../connect_database.php';
$sql_select_type = "SELECT name FROM types WHERE id = '$id' ";
$type_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_type))['name'];


$sql_select_type_name = "SELECT name FROM types WHERE id = '$id'";
$type_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_type_name))['name'] ;
$sql_select = "
	SELECT products.*, product_type.type_id as 'type_id', types.name as 'type_name', manufacturers.name as 'manufacturers_name'
	FROM products
	LEFT JOIN product_type ON product_type.product_id = products.id
	JOIN types ON types.id = product_type.type_id
	JOIN manufacturers ON manufacturers.id = products.manufacturer_id
	WHERE product_type.type_id = '$id'
";
$query_sql_select = mysqli_query($connect_database, $sql_select);
$type = mysqli_fetch_array($query_sql_select);
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
		<?php if ( empty($type) ) { ?>
			<h1 class =  "header" >KHÔNG CÓ SẢN PHẨM NÀO ĐƯỢC GẮN THẺ <?php echo $type_name ?></h1>
		<?php } else { ?>
			<h1 class =  "header" >CÁC SẢN PHẨM ĐƯỢC GẮN THẺ <?php echo $type['type_name'] ?></h1>
		<?php } ?>
		<br>
		-> <a href = "index_insert_products_to_hashtag.php?type_id=<?php echo $id ?>">THÊM SẢN PHẨM VÀO THẺ <?php echo $type_name ?> TẠI ĐÂY</a>
	</div>
	<br>
	<?php require '../validate.php' ?>
	<br>
	<table>
		<tr>
			<th>Mã</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Hình ảnh</th>
			<th>Nhà sản xuất</th>
			<th>Xóa thẻ khỏi sản phẩm</th>
			<th>Sửa sản phẩm</th>
			<th>Xóa sản phẩm</th>
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
				<a href = "delete_product_type.php?product_id=<?php echo $each_product['id'] ?>&type_id=<?php echo $each_product['type_id'] ?>">Xóa thẻ</a>
			</td>
			<td>
				<a href="../products/form_update_products.php?id=<?php echo $each_product['id'] ?>&type_id=<?php echo $each_product['type_id'] ?>">Sửa</a>
			</td>
			<td>
				<a href="../products/process_delete_products.php?id=<?php echo $each_product['id'] ?>&type_id=<?php echo $each_product['type_id'] ?>">Xóa</a>
			</td>
		</tr>
		<?php endforeach ?>
	</table>

</div>



</body>
</html>