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
	SELECT customers.id as 'id_khach_hang', customers.name as 'ten_khach_hang', ifnull(SUM(receipts.total), 0) as 'tien_bo_ra' 
	FROM customers
	LEFT JOIN receipts on customers.id = receipts.customer_id 
	GROUP BY customers.id
	ORDER BY SUM(receipts.total) $type, customers.id $type
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
				<h1 class = "header">THỐNG KÊ KHÁCH HÀNG TIỀM NĂNG</h1>		
			</div>
			<?php require '../validate.php' ?>

			<form method="post" action = "index.php?type=asc">
				<button>Khách hàng tồi nhất</button>	
			</form>

			<form method="post" action = "index.php?type=desc">
				<button>Khách hàng thân thiết nhất</button>	
			</form>

			

			<table class = "table">
				<tr>
					<th>ID</th>
					<th>Tên tên khách hàng</th>
					<th>Số tiền khách hàng đã ủng hộ</th>
				</tr>

				<?php foreach ($query_sql_command_select as $array_products) :?>
				<tr>
					<td><?php echo $array_products['id_khach_hang'] ?></td>
					<td><?php echo $array_products['ten_khach_hang'] ?></td>
					<td><?php echo $array_products['tien_bo_ra'] ?></td>
				</tr>
				<?php endforeach ?>
			</table>


		</div>	

</body>
</html>