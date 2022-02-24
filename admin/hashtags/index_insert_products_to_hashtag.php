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
if (empty($_GET['type_id'])){
	$_SESSION['error'] = 'Chưa nhập id thẻ để thêm thẻ vào sản phẩm';
	header('location:index.php');
	exit;
}
$type_id = $_GET['type_id'];

require '../connect_database.php';

//kiểm tra id có hợp lệ
$sql_check_type_id = "SELECT id FROM types WHERE id = '$type_id'";
$check_type_id = mysqli_fetch_array(mysqli_query($connect_database, $sql_check_type_id))['id'] ;
if ( empty($check_type_id) ) {
	$_SESSION['error'] = 'Sai id thẻ cần thêm thẻ vào sản phẩm';
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
	SELECT products.name
	FROM products 
	LEFT JOIN product_type ON product_type.product_id = products.id 
	WHERE (products.name not in ( select products.name FROM products JOIN product_type ON product_type.product_id = products.id JOIN types ON types.id = product_type.type_id where type_id = '50') OR product_type.type_id IS NULL) AND name like '%$content_search%'
	GROUP BY products.id
";
$query_sql_command_count_products = mysqli_query($connect_database, $sql_command_count_products);
$count_products = mysqli_num_rows($query_sql_command_count_products);
//lấy ra số bài trên 1 trang
$products_per_page = 3;
//lấy ra tổng số trang
$count_pages = ceil($count_products / $products_per_page);
//lấy ra số trang bỏ qua
$count_skip_products = ($index_page - 1) * $products_per_page;


//lấy ra tên thẻ
$sql_select_type_name = "SELECT name FROM types WHERE id = '$type_id'";
$type_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_type_name))['name'];


//lấy ra các sản phẩm chưa có thẻ đó
$sql_select = "
	SELECT products.*, manufacturers.name AS 'manufacturers_name', IFNULL(product_type.type_id, 'Chưa có thẻ nào') AS 'type_id', types.name AS 'type_name'
	FROM products
	LEFT JOIN manufacturers ON manufacturers.id = products.manufacturer_id
	LEFT JOIN product_type ON product_type.product_id = products.id
	LEFT JOIN types ON types.id = product_type.type_id
	WHERE (products.name not in (
        select products.name
		FROM products 
        JOIN product_type ON product_type.product_id = products.id
        JOIN types ON types.id = product_type.type_id
        where type_id = '$type_id') OR product_type.type_id IS NULL) AND products.name like '%$content_search%' 
        GROUP BY products.id
        limit $products_per_page offset $count_skip_products
	
";

$query_sql_select = mysqli_query($connect_database, $sql_select);

?>


<body> 
<?php require '../menu.php'; ?>
<div class="top">
	<div class = "search">
		<form class = "form_search" id= "form-search">
			Tìm kiếm
			<input type="search" name="search" value = "<?php echo $content_search ?>" id="input-search">
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
		-> <a href = "products_linked_hashtag.php?id=<?php echo $type_id ?>">XEM SẢN PHẨM ĐƯỢC GẮN THẺ <?php echo $type_name ?></a>
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
	<?php for ($index_page = 1; $index_page <= $count_pages; $index_page++) { ?>
		<a href="index_insert_products_to_hashtag.php?type_id=<?php echo $type_id ?>&page=<?php echo $index_page?>&search=<?php echo $content_search ?>">
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
		var header = "index_insert_products_to_hashtag.php?type_id=<?php echo $type_id ?>&search=" + content_search
		window.location = header
	})
})
</script>

</body>
</html>
