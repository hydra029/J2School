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
$id = $_GET['id'];

require '../connect_database.php';

//kiểm tra xem có id hóa đơn đó không
$sql_command_select = "select * from receipts where id = '$id' ";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$check = mysqli_num_rows($query_sql_command_select);
if ( $check !== 1 ) {
	$_SESSION['error'] = 'Không tồn tại hóa đơn này';
	header('location:index_receipts.php');
	exit();
}


$sql_command_select = "select * from receipt_detail join products on receipt_detail.product_id = products.id where receipt_detail.receipt_id = $id";

$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$money_of_all = 0;

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
		<h1 class =  "header" >CHI TIẾT ĐƠN HÀNG</h1>			
	</div>
	<br>

	<?php require '../validate.php' ?>
	<table class = "table">
		<tr>
			<th>Ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Tổng tiền</th>
		</tr>


		<?php foreach ($query_sql_command_select as $array_receipts) : ?>
		<tr>
			<td>
				<img src="../products/<?php echo $array_receipts['image'] ?>" height = "100px">
			</td>
			<td><?php echo $array_receipts['name'] ?></td>
			<td><?php echo $array_receipts['price'] ?></td>
			<td><?php echo $array_receipts['quantity'] ?></td>
			<td><?php echo $array_receipts['quantity'] * $array_receipts['price'] ?></td>
		</tr>
		
		<?php $money_of_all += $array_receipts['quantity'] * $array_receipts['price'] ?>

		<?php endforeach ?>
	</table>

	<h1>
		Tổng tiền là: <?php echo $money_of_all ?>
	</h1>

</div>

</body>
</html>