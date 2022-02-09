<?php require '../check_super_admin_login.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
</head>


<?php require '../connect_database.php';
if ( empty($_GET['index_page']) ) {
	$index_page = 1;
} else {
	$index_page = $_GET['index_page'];
}


//lấy ra tổng số khách hàng
$sql_count_customers = "SELECT count(*) FROM customers";
$count_customers = mysqli_fetch_array(mysqli_query($connect_database, $sql_count_customers))['count(*)'];
//lấy ra số khách hàng trên 1 trang
$customers_per_page = 14;
//lấy ra số trang
$pages = ceil($count_customers / $customers_per_page);
//lấy ra số khách hàng bỏ qua khi chuyển trang
$customers_skipped = ( $index_page - 1) * $customers_per_page;


$sql_select_customers = "
	SELECT customers.id as 'id', customers.name as 'name', IFNULL(sum(receipts.total),0) as 'money', IFNULL(MAX(receipts.order_time), 'Chưa mua lần nào') as 'last_time'
	FROM receipts
	RIGHT JOIN customers ON receipts.customer_id = customers.id
	GROUP BY customers.id
	LIMIT $customers_per_page
	OFFSET $customers_skipped
";
$query_sql_select_customers = mysqli_query($connect_database, $sql_select_customers);

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
		<h1 class = "header" >KHÁCH HÀNG</h1>
	</div>
	<br>
	<?php require '../validate.php' ?>
	<table class = "table">
		<tr>
			<th>Mã</th>
			<th>Tên khách hàng</th>
			<th>Lần cuối mua hàng</th>
			<th>Số tiền bỏ ra</th>
			<th>Xem chi tiết</th>
		</tr>
		<?php foreach ($query_sql_select_customers as $each_customer) { ?>
		<tr>
			<td><?php echo $each_customer['id'] ?></td>
			<td><?php echo $each_customer['name'] ?></td>
			<td><?php echo $each_customer['last_time'] ?></td>
			<td><?php echo $each_customer['money'] ?></td>
			<td>
				<a href="detail_customer.php?id=<?php echo $each_customer['id'] ?>">Xem</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php for ( $i = 1; $i <= $pages; $i++) {  ?>
		<a href="?index_page=<?php echo $i ?>"><?php echo $i ?></a>
	<?php } ?>

</div>

</body>
</html>