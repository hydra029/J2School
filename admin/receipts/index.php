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
require '../connect_database.php';

if (isset($_GET['index'])) {
	$i = $_GET['index'];
} else {
	$i = 1;
}


//lấy ra tổng số hóa đơn
$sql_command_select_receipts = "select count(*) from receipts where status = 2 or status = 4";
$query_sql_command_select_receipts = mysqli_query($connect_database, $sql_command_select_receipts);
$count_receipts = mysqli_fetch_array($query_sql_command_select_receipts)['count(*)'];

//lấy ra số hóa đơn trên 1 trang
$receipts_on_page = 5;


//lấy ra số trang
$count_pages = ceil ($count_receipts / $receipts_on_page);

//lấy ra số trang bỏ qua theo thú tự trang
$skip_receipts_page = ( $i - 1 ) * $receipts_on_page;


$sql_command_select = "SELECT receipts.*, customers.name as 'customer_name', receivers.name as 'receiver_name', receivers.phone as 'receiver_phone', receivers.address as 'receiver_address'
from receipts
left JOIN receivers on receivers.id = receipts.receiver_id
join customers on customers.id = receipts.customer_id
where receipts.status in (2, 4)
GROUP BY receipts.id
limit $receipts_on_page offset $skip_receipts_page";

$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);

 ?>

<body>

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
		<h1 class =  "header" >ĐƠN HÀNG CHƯA XỬ LÍ</h1>
		-> <a href = "view_receipts_finished.php">XEM ĐƠN HÀNG ĐÃ XỬ LÍ</a>
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

			<?php foreach ($query_sql_command_select as $each_receipt) : ?>
			<?php if ($each_receipt['status'] == 2 || $each_receipt['status'] == 4 ) { ?>
			<tr>
				<td><?php echo $each_receipt['id'] ?></td>
				<td><?php echo $each_receipt['order_time'] ?></td>
				<td>
					<?php echo $each_receipt['receiver_name'] ?><br>
					<?php echo $each_receipt['receiver_phone'] ?><br>
					<?php echo $each_receipt['receiver_address'] ?><br>
				</td>
				<td>
					<?php echo $each_receipt['customer_name'] ?><br>
				</td>
				<td>
					<?php 
					switch ($each_receipt['status']) {
						case 2:
							echo 'Chưa duyệt';
							break;							
						case 4:
							echo 'Đang giao hàng';
							break;
					}
					 ?>
					
				</td>
				<td><?php echo $each_receipt['total'] ?></td>
				<td>
					<a href="detail_receipt.php?id=<?php echo $each_receipt['id'] ?>">Xem</a>
				</td>
				<td>
					<?php if ( $each_receipt['status'] == 2 ) { ?>
						<a href="update_receipt.php?id=<?php echo $each_receipt['id'] ?>&status=4">Duyệt đơn hàng</a>
					<?php } ?>
					<br>
					<?php if ( $each_receipt['status'] == 4 ) { ?>
						<a href="update_receipt.php?id=<?php echo $each_receipt['id'] ?>&status=5">Giao thành công</a>
					<?php } ?>
					<br>
					<a href="update_receipt.php?id=<?php echo $each_receipt['id'] ?>&status=3">Hủy đơn hàng</a>
				</td>
				
			</tr>
			<?php } ?>
			<?php endforeach ?>
			 
		</table>

		<?php for ($i = 1; $i <= $count_pages; $i++ ) { ?>
			<a href = "?index=<?php echo $i ?>">
				<?php echo $i ?>
			</a>
		<?php } ?>
</div>


</body>
</html>