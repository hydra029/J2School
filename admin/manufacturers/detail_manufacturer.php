<?php require '../check_super_admin_login.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
	<link rel="stylesheet" type="text/css" href="style_detail_manufacturer_1.css">
</head>

<?php require '../connect_database.php';
if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id nhà sản xuất cần sửa';
	header('location:index_manufacturers.php');
	exit;
}
$id = $_GET['id'];

$sql_select_manufacturers = "
	SELECT 
		manufacturers.*, 
		ifnull(SUM(products.price * receipt_detail.quantity), 0) AS 'total', 
		(SELECT products.name
		FROM products 
		LEFT JOIN receipt_detail ON receipt_detail.product_id = products.id 
		LEFT JOIN manufacturers ON manufacturers.id = products.manufacturer_id
		WHERE manufacturers.id = '$id'
		GROUP BY products.id
		ORDER BY SUM(products.price * receipt_detail.quantity) DESC LIMIT 1) AS 'top_product'
	FROM products
	LEFT JOIN manufacturers ON products.manufacturer_id = manufacturers.id
	LEFT JOIN receipt_detail ON receipt_detail.product_id = products.id
	LEFT JOIN receipts ON receipts.id = receipt_detail.receipt_id
	WHERE manufacturers.id = '$id'
	GROUP BY products.manufacturer_id
";
$query_sql_select_manufacturers = mysqli_query($connect_database, $sql_select_manufacturers);
$validate_rows = mysqli_num_rows($query_sql_select_manufacturers);
if ( empty($validate_rows) ) {
	$_SESSION['error'] = 'Sai id nhà sản xuất';
	header('location:index_manufacturers.php');
	exit();
}
$each_manufacturer = mysqli_fetch_array($query_sql_select_manufacturers);

?>

<body> 
<?php require '../menu.php'; ?>
<div class="top">
	<!-- <div class = "search">
		<form class = "form_search">
			Tìm kiếm
			<input type="search" name="search" value = "<?php echo $content_search ?>">
			<button>
				<img src="../style/style_image/icon_search.png" width="50px">
			</button>
		</form>
	</div> -->

	<div class = "login">
		<span>Xin chào <?php echo $_SESSION['name'] ?></span>
	</div>
</div>

<div class = "bot">
	<div class = "header">
		<h1 class =  "header" >CHI TIẾT VỀ <?php echo $each_manufacturer['name'] ?></h1>
	</div>
	<br>
	<?php require '../validate.php' ?>

	<div id="container">	
		<div class="product-details">
		<h1><?php echo $each_manufacturer['name'] ?></h1>
			
		<div class="control">
			<form action = "view_products_in_manufacturer.php" method = "get">
				<button class="btn">
					<input type="hidden" name="id" value = "<?php echo $each_manufacturer['id'] ?>">
					<span class="buy">Thống kê sản phẩm của <?php echo $each_manufacturer['name'] ?></span>
				</button>
			</form>
			<br>
			<form action = "form_update_manufacturers.php" method = "get">
				<button class="btn">
					<input type="hidden" name="id" value = "<?php echo $each_manufacturer['id'] ?>">
					<span class="buy">Sửa nhà sản xuất</span>
				</button>
			</form>
		</div>
				
		</div>
			
		<div class="product-image">
			<img src="<?php echo $each_manufacturer['image'] ?>">
			<div class="info">
				<br>
				<ul>
					<li>
						<strong>Xuất xứ: </strong>
						<?php echo $each_manufacturer['address'] ?> 
					</li>
					<li>
						<strong>Số điện thoại: </strong>
						<?php echo $each_manufacturer['phone'] ?> 
					</li>
					<li>
						<strong>Tổng só tiền thu được: </strong>
						<?php echo $each_manufacturer['total'] . ' đồng'?> 
					</li>
					<li>
						<strong>Sản phẩm hàng đầu: </strong>
						<?php echo $each_manufacturer['top_product'] ?> 
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

</body>
</html>