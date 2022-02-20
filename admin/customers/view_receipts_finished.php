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

$sql_select_name = "SELECT name FROM customers WHERE id = '$id'";
$name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_name))['name'] ;

if (isset($_GET['index'])) {
	$i = $_GET['index'];
} else {
	$i = 1;
}


//lấy ra tổng số hóa đơn
$sql_command_select_receipts = "select count(*) from receipts where (status = 3 or status = 7 or status = 5) and customer_id = '$id' ";
$query_sql_command_select_receipts = mysqli_query($connect_database, $sql_command_select_receipts);
$count_receipts = mysqli_fetch_array($query_sql_command_select_receipts)['count(*)'];

//lấy ra số hóa đơn trên 1 trang
$receipts_on_page = 5;


//lấy ra số trang
$count_pages = ceil ($count_receipts / $receipts_on_page);

//lấy ra số trang bỏ qua theo thú tự trang
$skip_receipts_page = ( $i - 1 ) * $receipts_on_page;


$sql_command_select = "
	SELECT receipts.*, customers.name as 'customer_name', receivers.name as 'receiver_name', receivers.phone as 'receiver_phone', receivers.address as 'receiver_address'
	from receipts
	left JOIN receivers on receivers.id = receipts.receiver_id
	join customers on customers.id = receipts.customer_id
	WHERE receipts.customer_id = '$id' and receipts.status in (3, 5, 7)
	GROUP BY receipts.id
	limit $receipts_on_page offset $skip_receipts_page
";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
if ( mysqli_num_rows($query_sql_command_select) != 0 ) {
	$customer_id = mysqli_fetch_array($query_sql_command_select)['customer_id'];
}

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
		<h1 class =  "header" >ĐƠN HÀNG ĐÃ XỬ LÍ CỦA <?php echo $name ?></h1>
	</div>
	-> <a href = "view_receipt.php?id=<?php echo $id ?>">XEM ĐƠN HÀNG CHƯA XỬ LÍ <?php echo $name ?></a>
	<br>

	<?php require '../validate.php' ?>
	<table class = "table">
		<tr>
			<th>Mã</th>
			<th>Thời gian đặt</th>
			<th>Người nhận</th>
			<th>Người đặt</th>
			<th>Trạng thái</th>
			<th>Tổng tiền</th>
			<th>Xem chi tiết</th>
			<th>Sửa chữa lỗi lầm</th>
		</tr>

		<?php foreach ($query_sql_command_select as $each_receipt) : ?>
		<?php if ($each_receipt['status'] == 3 || $each_receipt['status'] == 5 || $each_receipt['status'] == 7 ) { ?>
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
					case 3:
						echo 'Shop đã hủy';
						break;							
					case 7:
						echo 'Người dùng đã hủy';
						break;
					case 5:
						echo 'Giao thành công';
						break;
				}
				 ?>
			</td>
			<td><?php echo $each_receipt['total'] ?></td>
			<td>
				<a href="../receipts/detail_receipt.php?id=<?php echo $each_receipt['id'] ?>">Xem</a>
			</td>
			<td>
				<?php if ( $each_receipt['status'] == 5 ) { ?>
					<a href="../receipts/update_receipt.php?id=<?php echo $each_receipt['id'] ?>&status=4a&from=customer_receipt_finished&customer_id=<?php echo $customer_id ?>">Chưa giao xong</a>
				<?php } else if ( $each_receipt['status'] == 3 ) { ?>
					<a href="../receipts/update_receipt.php?id=<?php echo $each_receipt['id'] ?>&status=2&from=customer_receipt_finished&customer_id=<?php echo $customer_id ?>">Không hủy nữa</a>
				<?php } ?>
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