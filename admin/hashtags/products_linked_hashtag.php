<?php 
require '../check_admin_login.php';

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
if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id thẻ cần xem sản phẩm';
	header('location:index.php');
	exit;
}

$id = $_GET['id'];


require '../connect_database.php';

//kiểm tra id có hợp lệ
$sql_check_type_id = "SELECT id FROM types WHERE id = '$id'";
$check_type_id = mysqli_fetch_array(mysqli_query($connect_database, $sql_check_type_id))['id'] ;
if ( empty($check_type_id) ) {
	$_SESSION['error'] = 'Sai id thẻ cần xem sản phẩm';
	header('location:index.php');
	exit;	
}


// tìm kiếm và phân trang
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
$sql_command_count_products = "
	select count(*) from products 
	LEFT JOIN product_type ON product_type.product_id = products.id
	where name like '%$content_search%' and product_type.type_id = '$id'
";
$query_sql_command_count_products = mysqli_query($connect_database, $sql_command_count_products);
$count_products = mysqli_fetch_array($query_sql_command_count_products)['count(*)'];
//lấy ra số bài trên 1 trang
$products_per_page = 3;
//lấy ra tổng số trang
$count_pages = ceil($count_products / $products_per_page);
//lấy ra số trang bỏ qua
$count_skip_products = ($index_page - 1) * $products_per_page;


//lấy ra tên của thẻ
$sql_select_type_name = "SELECT name FROM types WHERE id = '$id'";
$type_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_type_name))['name'] ;

//kiểm tra xem có sản phẩm trong thẻ không
$sql_check = "
	SELECT type_id FROM product_type
	WHERE type_id = '$id'
";
$check = mysqli_num_rows(mysqli_query($connect_database, $sql_check)) ;


//lấy ra các sản phẩm được gắn thẻ đó
$sql_select = "
	SELECT products.*, product_type.type_id as 'type_id', types.name as 'type_name', manufacturers.name as 'manufacturers_name'
	FROM products
	LEFT JOIN product_type ON product_type.product_id = products.id
	JOIN types ON types.id = product_type.type_id
	JOIN manufacturers ON manufacturers.id = products.manufacturer_id
	WHERE product_type.type_id = '$id' and products.name like '%$content_search%' limit $products_per_page offset $count_skip_products
";
$query_sql_select = mysqli_query($connect_database, $sql_select);



?>
	
<body> 
<?php require '../menu.php'; ?>
<div class="top">
	<div class = "search">
		<form class = "form_search" id="form-search">
			Tìm kiếm
			<input type="search" name="search" value = "<?php echo $content_search ?>" id = "input-search">
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
		<?php if ( empty($check) ) { ?>
			<h1 class =  "header" >KHÔNG CÓ SẢN PHẨM NÀO ĐƯỢC GẮN THẺ <?php echo $type_name ?></h1>
		<?php } else { ?>
			<h1 class =  "header" >CÁC SẢN PHẨM ĐƯỢC GẮN THẺ <?php echo $type_name ?></h1>
		<?php } ?>
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
		</tr>
		<?php endforeach ?>
	</table>
	<?php for ($index_page = 1; $index_page <= $count_pages; $index_page++) { ?>
		<a href="?id=<?php echo $id ?>&page=<?php echo $index_page?>&search=<?php echo $content_search ?>">
			<?php echo $index_page ?>
		</a>
	<?php } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$("#form-search").submit(function(event) {
		event.preventDefault()
		var content_search = $("#input-search").val()
		var header = "products_linked_hashtag.php?id=<?php echo $id ?>&search=" + content_search
		window.location = header
	})
})
</script>

</body>
</html>