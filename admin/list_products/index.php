<?php require '../check_admin_login.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" href="../style_validate1.css">
</head>
<body>

<?php 
require '../connect_database.php';

if (!isset($_GET['type'])) {
	$_GET['type'] = 'desc';
}
$type = $_GET['type'];

$sql_command_select = "
	SELECT products.id as 'id', products.name as 'name', ifnull(sum(receipt_detail.quantity), 0) as 'count_products' 
	FROM products 
	LEFT JOIN receipt_detail ON receipt_detail.product_id = products.id 
	LEFT JOIN receipts ON receipts.id = receipt_detail.receipt_id
	WHERE receipts.status = 6 or receipts.status is null
	GROUP BY products.id
	ORDER BY sum(receipt_detail.quantity) $type, products.id $type
";

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
<!-- 					<input type="search" name="search"> -->
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
				<h1 class = "header">THỐNG KÊ SẢN PHẨM</h1>		
			</div>
			<?php require '../validate.php' ?>

			<form method="post" action = "index.php?type=asc">
				<button>Sản phẩm bán ế nhất</button>	
			</form>

			<form method="post" action = "index.php?type=desc">
				<button>Sản phẩm bán chạy nhất</button>	
			</form>

			

			<table class = "table">
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Số sản phẩm bán được</th>
				</tr>

				<?php foreach ($query_sql_command_select as $array_products) :?>
				<tr>
					<td><?php echo $array_products['id'] ?></td>
					<td><?php echo $array_products['name'] ?></td>
					<td><?php echo $array_products['count_products'] ?></td>
				</tr>
				<?php endforeach ?>
			</table>


		</div>	

</body>
</html>