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

if (isset($_GET['index'])) {
	$i = $_GET['index'];
} else {
	$i = 1;
}


//lấy ra tổng số hóa đơn
$sql_command_select_receipts = "select count(*) from receipts";
$query_sql_command_select_receipts = mysqli_query($connect_database, $sql_command_select_receipts);
$count_receipts = mysqli_fetch_array($query_sql_command_select_receipts)['count(*)'];

//lấy ra số hóa đơn trên 1 trang
$receipts_on_page = 5;


//lấy ra số trang
$count_pages = ceil ($count_receipts / $receipts_on_page);

//lấy ra số trang bỏ qua theo thú tự trang
$skip_receipts_page = ( $i - 1 ) * $receipts_on_page;


$sql_command_select = "select receipts.*, customers.name as 'customer_name', receivers.name as 'receiver_name', receivers.phone as 'receiver_phone', receivers.address as 'receiver_address'  from receipts join customers on receipts.customer_id = customers.id join receivers on receivers.customer_id = customers.id limit $receipts_on_page offset $skip_receipts_page";
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
				<h1 class =  "header" >ĐƠN HÀNG</h1>			
			</div>
			<br>

			<?php require '../validate.php' ?>
			<table class = "table">
				<tr>
					<th>Mã</th>
					<th>Thời gian đặt</th>
					<th>Thông tin người nhận</th>
					<th>Thông tin người đặt</th>
					<th>Trạng thái</th>
					<th>Tổng tiền</th>
					<th>Xem chi tiết</th>
					<th>Duyệt</th>
				</tr>

				<?php foreach ($query_sql_command_select as $array_receipts) : ?>
				<?php if ($array_receipts['status'] == 2 || $array_receipts['status'] == 5 || $array_receipts['status'] == 6 ) { ?>
				<tr>
					<td><?php echo $array_receipts['id'] ?></td>
					<td><?php echo $array_receipts['order_time'] ?></td>
					<td>
						<?php echo $array_receipts['receiver_name'] ?><br>
						<?php echo $array_receipts['receiver_phone'] ?><br>
						<?php echo $array_receipts['receiver_address'] ?><br>
					</td>
					<td>
						<?php echo $array_receipts['customer_name'] ?><br>
					</td>
					<td>
						<?php 
						switch ($array_receipts['status']) {
							case 2:
								echo 'Chưa duyệt';
								break;
							case 3:
								echo 'Đã hủy';
								break;								
							case 5:
								echo 'Đang giao hàng';
								break;
							case 6:
								echo 'Đã giao hàng';
								break;
						}
						 ?>
						
					</td>
					<td><?php echo $array_receipts['total'] ?></td>
					<td>
						<a href="detail_receipt.php?id=<?php echo $array_receipts['id'] ?>">Xem</a>
					</td>
					<td>
						<a href="update_receipt.php?id=<?php echo $array_receipts['id'] ?>&status=5">Duyệt đơn hàng</a>
						<br>
						<a href="update_receipt.php?id=<?php echo $array_receipts['id'] ?>&status=6">Hoàn thành đơn hàng</a>
						<br>
						<a href="update_receipt.php?id=<?php echo $array_receipts['id'] ?>&status=3">Hủy đơn hàng</a>
					</td>
					<?php } ?>
				</tr>
				
				<?php endforeach ?>
				 
			</table>

			<?php for ($i = 1; $i <= $count_pages; $i++ ) { ?>
				<a href = "?index=<?php echo $i ?>">
					<?php echo $i ?>
				</a>
			<?php } ?>
		</div>
	</div>
</div>


</body>
</html>