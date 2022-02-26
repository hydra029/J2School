<?php require '../check_admin_login.php'; 

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
///
$sql_select_cash_earned = "
	SELECT sum(total) as 'tong_tien' from receipts
	where status = 6
	AND DATE(order_time) >= (CURDATE() - INTERVAL '30' DAY)
";
$query_sql_command_select = mysqli_query($connect_database, $sql_select_cash_earned);
$money = mysqli_fetch_array($query_sql_command_select)['tong_tien'];

///
$sql_command_select = "
	SELECT products.id as 'id', products.name as 'name', ifnull(sum(receipt_detail.quantity), 0) as 'count_products' 
	FROM products 
	LEFT JOIN receipt_detail ON receipt_detail.product_id = products.id 
	LEFT JOIN receipts ON receipts.id = receipt_detail.receipt_id
	WHERE receipts.status = 6 or receipts.status is null
	AND DATE(order_time) >= (CURDATE() - INTERVAL '30' DAY)
	GROUP BY products.id
	ORDER BY sum(receipt_detail.quantity) desc, products.id desc
	LIMIT 5
";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);

//
$sql_count_receitps = "SELECT count(*) from receipts
	where status = 6
	AND DATE(order_time) >= (CURDATE() - INTERVAL '30' DAY)
";
$query_sql_count_receitps = mysqli_query($connect_database, $sql_count_receitps);
$count_receipts = mysqli_fetch_array($query_sql_count_receitps)['count(*)'];

//
$sql_select_vip_customer = "
	SELECT customers.id as 'id_khach_hang', customers.name as 'ten_khach_hang', ifnull(SUM(receipts.total), 0) as 'tien_bo_ra' 
	FROM customers
	LEFT JOIN receipts on customers.id = receipts.customer_id 
	WHERE DATE(order_time) >= (CURDATE() - INTERVAL '30' DAY)
	GROUP BY customers.id
	ORDER BY SUM(receipts.total) desc, customers.id desc
	LIMIT 5
";
$query_sql_select_vip_customer = mysqli_query($connect_database, $sql_select_vip_customer);

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
		<h1 class = "header" >IN PDF</h1>
		<button id='js-download-pdf'>
			IN
		</button>
		
	</div>
	<br>
	<?php require '../validate.php' ?>
		<div id="element_to_print">
		<h1 align="center">BÁO CÁO 30 NGÀY QUA</h1>
		<br>
		<hr>
		<h1 align="center">DOANH THU</h1>
		<h3 align="center" style="font-size: 25px">Số tiền thu được 30 ngày qua: <?php echo $money ?> đồng</h3>
		<br>
		<h1 align="center">ĐƠN HÀNG</h1>
		<h3 align="center" style="font-size: 25px">
			Số hóa đơn thành công trong 30 ngày qua: <?php echo $count_receipts ?> đơn
		</h3>
		<br>

		<h1 align="center">KHÁCH HÀNG THÂN THIẾT</h1>
		<table class = "table" align="center">
			<tr>
				<th>Tên khách hàng</th>
				<th>Số tiền khách hàng bỏ ra</th>
			</tr>

			<?php foreach ($query_sql_select_vip_customer as $array_products) :?>
				<tr>
					<td><?php echo $array_products['ten_khach_hang'] ?></td>
					<td><?php echo $array_products['tien_bo_ra'] ?> đồng</td>
				</tr>
			<?php endforeach ?>
		</table>

		<br>

		<h1 align="center">SẢN PHẨM BÁN CHẠY</h1>
		<table class = "table" align="center">
			<tr>
				<th>Tên sản phẩm</th>
				<th>Số sản phẩm bán được</th>
			</tr>

			<?php foreach ($query_sql_command_select as $array_products) :?>
				<tr>
					<td><?php echo $array_products['name'] ?></td>
					<td><?php echo $array_products['count_products'] ?> cái</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>


</div>


	<script src="https://cdn.jsdelivr.net/npm/uuid@latest/dist/umd/uuidv4.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
	<script src="https://unpkg.com/html2canvas@1.3.2/dist/html2canvas.min.js"></script>
	<script>
		(() => {
			const downloadPDFElement = document.getElementById("js-download-pdf");

			downloadPDFElement.addEventListener("click", (event) => {
				const doc = new jspdf.jsPDF({
					format: "a4",
					orientation: "portrait",
					unit: "mm"
				});

				html2canvas(document.getElementById("element_to_print")).then((canvas) => {
					const imgData = canvas.toDataURL('image/png');
					const imgProps= doc.getImageProperties(imgData);
					const pdfWidth = doc.internal.pageSize.getWidth();
					const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
					doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
					doc.save(`Báo cáo-${new Date().toLocaleDateString("vi-VN")}.pdf`);
				})
			})

		})();
	</script>
</body>
</html>