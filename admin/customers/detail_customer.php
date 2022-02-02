<?php require '../check_super_admin_login.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" href="../style_validate1.css">
</head>
<body>

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





 
<div class="all">
	<div class="left">
		<?php require '../menu.php'; ?>
	</div> 


	<div class="right">
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
			<table class = "table">
				<tr>
					<td>Mã</td>
					<td><?php echo $each_customer['id'] ?></td>
				</tr>
				<tr>
					<td>Tên khách hàng</td>
					<td><?php echo $each_customer['name'] ?></td>
				</tr>
				<tr>
					<td>Giới tính</td>
					<td><?php echo $each_customer['gender'] ?></td>
				</tr>
				<tr>
					<td>Ngày sinh</td>
					<td><?php echo $each_customer['dob'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $each_customer['email'] ?></td>
				</tr>
				<tr>
					<td>Lần cuối mua hàng</td>
					<td><?php echo $each_customer['last_time'] ?></td>
				</tr>
				<tr>
					<td>Số tiền bỏ ra</td>
					<td><?php echo $each_customer['money'] ?></td>
				</tr>
			</table>
				

		</div>

	</div>

</div>


</body>
</html>