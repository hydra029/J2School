<?php require '../check_super_admin_login.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
	<link rel="stylesheet" type="text/css" href="style_detail_product.css">
</head>

<?php require '../connect_database.php';
$id = $_GET['id'];

$sql_select_customers = "
	SELECT 
		products.*, 
		manufacturers.name AS 'manufacturers_name', 
		IFNULL(types.name, 'Không có thẻ nào') AS'type_name', 
		IFNULL(MAX(receipts.order_time), 'Chưa có ai mua') AS 'last_time',
		(SELECT IFNULL(SUM(receipt_detail.quantity), 0) AS 'quantity'
		FROM receipt_detail
		JOIN products ON products.id = receipt_detail.product_id
		WHERE products.id = '$id') AS 'quantity', 
		(SELECT IFNULL(SUM(receipt_detail.quantity * products.price), 0) AS 'total'
		FROM receipt_detail
		JOIN products ON products.id = receipt_detail.product_id
		WHERE products.id = '$id') AS 'total'
	FROM products
	JOIN manufacturers ON manufacturers.id = products.manufacturer_id
	LEFT JOIN product_type ON product_type.product_id = products.id
	LEFT JOIN types ON types.id = product_type.type_id
	LEFT JOIN receipt_detail ON  receipt_detail.product_id = products.id
	LEFT JOIN receipts ON receipts.id = receipt_detail.receipt_id
	WHERE products.id = '$id'
	GROUP BY types.name
";
$query_sql_select_products = mysqli_query($connect_database, $sql_select_customers);
$each_product = mysqli_fetch_array($query_sql_select_products);

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
		<h1 class =  "header" >CHI TIẾT VỀ <?php echo $each_product['name'] ?></h1>
	</div>
	<br>
	<?php require '../validate.php' ?>

	<div id="container">	
		<div class="product-details">
		<h1><?php echo $each_product['name'] ?></h1>
		<span class="hint-star star">
			<i class="fa fa-star" aria-hidden="true">
				$ <?php echo $each_product['price'] ?> đồng
			</i>
		</span>
		
	<!-- The most important information about the product -->
			<p class="information">
				<?php echo $each_product['description'] ?>
			</p>
			
		<div class="control">
			<form action = "form_update_products.php" method = "get">
			<button class="btn">
				<input type="hidden" name="id" value = "<?php echo $each_product['id'] ?>">
				<span class="buy">Sửa sản phẩm</span>
			</button>
			</form>
		</div>
				
		</div>
			
		<div class="product-image">
			<img src="<?php echo $each_product['image'] ?>" alt="Omar Dsoky">
			<div class="info">
				<br>
				<ul>
					<li>
						<strong>Nhà sản xuất: </strong>
						<?php echo $each_product['manufacturers_name'] ?>
					</li>
					<li>
						<strong>Các thẻ được gắn: </strong>
						<?php 
						foreach ($query_sql_select_products as $each) {
							echo $each['type_name'] . ', ';
						} ?>
					</li>
					<li>
						<strong>Số sản phẩm bán được: </strong>
						<?php echo $each_product['quantity'] ?> cái
					</li>
					<li>
						<strong>Tổng số tiền thu được: </strong>
						<?php echo $each_product['total'] ?> đồng
					</li>
					<li>
						<strong>Lần cuối được mua: </strong>
						<?php echo $each_product['last_time'] ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

</body>
</html>