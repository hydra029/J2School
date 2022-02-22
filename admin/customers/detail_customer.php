<?php require '../check_super_admin_login.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
	<link rel="stylesheet" type="text/css" href="style_detail_customer.css">
</head>

<?php require '../connect_database.php';
$id = $_GET['id'];

$sql_select_customers = "
	SELECT customers.*, IFNULL(sum(receipts.total),0) as 'money', IFNULL(MAX(receipts.order_time), 'Chưa mua lần nào') as 'last_time'
	FROM receipts
	RIGHT JOIN customers ON receipts.customer_id = customers.id
	WHERE  customers.id = '$id'
	GROUP BY customers.id
";
$query_sql_select_customers = mysqli_query($connect_database, $sql_select_customers);
$each_customer = mysqli_fetch_array($query_sql_select_customers);

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
		<h1 class =  "header" >CHI TIẾT VỀ KHÁCH HÀNG</h1>
	</div>
	<br>
	<?php require '../validate.php' ?>
	<br><br>

	<div id="container">	
		
	<!-- Start	Product details -->
		<div class="product-details">
			
			<!-- 	Product Name -->
			<h1><?php echo $each_customer['name'] ?></h1>
			<span class="hint-star star">
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star-half-o" aria-hidden="true"></i>
				<i class="fa fa-star-o" aria-hidden="true"></i>
			</span>
				
			
		<!-- The most important information about the product -->
		<!-- 		<p class="information">" Especially good for container gardening, the Angelonia will keep blooming all summer even if old flowers are removed. Once tall enough to cut, bring them inside and you'll notice a light scent that some say is reminiscent of apples. "</p> -->

				
				
			<div class="control">
				<form action = "view_receipt.php" method = "get">
					<button class="btn">
						<input type="hidden" name="id" value = "<?php echo $each_customer['id'] ?>">
							<span class="buy">Xem chi tiết các hóa đơn khách đã đặt</span>
					</button>
				</form>
			</div>
					
			</div>
				
			<div class="product-image">
				
				<img src="https://sc01.alicdn.com/kf/HTB1Cic9HFXXXXbZXpXXq6xXFXXX3/200006212/HTB1Cic9HFXXXXbZXpXXq6xXFXXX3.jpg" alt="Omar Dsoky">
				
			<!-- 	product Information-->
			<div class="info">
				<h2>Chi tiết</h2>
				<ul>
					<li>
						<strong>Giới tính: </strong>
						<?php if ($each_customer['gender'] == 'male') {
							echo 'Nam';
						} else {
							echo 'Nữ';
						} ?>
					</li>
					<li><strong>Ngày sinh: </strong><?php echo $each_customer['dob'] ?></li>
					<li><strong>Email: </strong><?php echo $each_customer['email'] ?></li>
					<li><strong>Số tiền bỏ ra: </strong><?php echo $each_customer['money'] ?> đồng</li>
					<li><strong>Lần cuối mua hàng: </strong><?php echo $each_customer['last_time'] ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>

</body>
</html>