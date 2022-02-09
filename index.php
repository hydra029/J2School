<?php 
session_start();
if (isset($_SESSION['customer_id'])) {
	$customer_id = $_SESSION['customer_id'];
} else if (isset($_SESSION['admin_id'])) {
	header('location:admin/root/index_admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title></title>
	<style type="text/css">
		a {
			text-decoration: none;
		}
		a:link {
			color: blue;
		}
		a:visited {
			color: blue;
		}
		a:hover {
			color: red;			
			text-decoration: underline;
		}
		a:active {
			color: yellow;
		}
		#div_tong {
			padding-bottom: 50px;
			background: aliceblue;
			min-height: 800px;
			max-height: 6000px;
			position: relative;
			margin: auto;
		}
		#div_tren {
			text-align: center;
			height: 150px;
		}
		#div_giua {
			max-height: 4900px;
		}
		#div_duoi {
			height: 100px;
			background: aliceblue;
			text-align: center;
			bottom: 5px;
		}
		.right {
			text-align: right;
		}	
		.left {
			text-align: left;
		}
		.center {
			text-align: center;
		}
		.border {
			border: 1px solid black;
		}
		.no_border {
			border: none;
		}
		table {
			margin: auto	;
		}
		.error {
			color: red;
			text-align: left;
		}
		.success {
			color: green;
		}
		ul {
			list-style-type: none;
			padding: 0;
		}
		ul li ul li {
			background: ghostwhite;
			border-color: black;
			text-align: center;
		}
		ul li ul {
			width: 700px;
			text-align: center;
			position: absolute;

		}
		ul > li:hover ul {
			margin-top: 0;
			position: absolute;
			top: 51px;
			left: -153px;
			text-align: center;
		}
		ul li {	
			float: left;
			position:  relative;
			background: lightgray;
			width: 150px;
			border: 1px solid black;
			height: 50px;
			text-align: center;
		}
		td {
			height: 40px;
		}
	</style>
</head>
<body>
	<div id="div_tong" class="container">
		<?php 
		require 'connect.php';

		$trang = 1;
		if (isset($_GET['trang'])) {
			$trang = $_GET['trang'];
		}  
		$tim_kiem = '';
		if (isset($_GET['tim_kiem'])) {
			$tim_kiem = $_GET['tim_kiem'];
		}
		$sql_so_san_pham = "select count(*) from products
		where
		name like '%$tim_kiem%'";
		$mang_so_san_pham = mysqli_query($connect,$sql_so_san_pham);
		$ket_qua_so_san_pham = mysqli_fetch_array($mang_so_san_pham);
		$so_san_pham = $ket_qua_so_san_pham['count(*)'];
		$so_san_pham_1_trang = 8;
		$so_trang = ceil($so_san_pham/$so_san_pham_1_trang);
		$bo_qua = $so_san_pham_1_trang*($trang-1);
		
		require 'menu.php';
		$sql = "select * from products
		where
		products.name like '%$tim_kiem%'
		limit $so_san_pham_1_trang offset $bo_qua";
		$result = mysqli_query($connect, $sql);

		?>
		<div id="div_tren">
			<h1 style="text-align: center; background: lightblue;">
				Chào mừng đến với Website của chúng tôi
			</h1>
			<form>
				<input type="search" name="tim_kiem" value="" placeholder="tìm kiếm">
			</form>
		</div>
		<div id="div_giua">
			<?php foreach ($result as $each): ?>
				<?php
				?>
				<ul>
					<li style="width: 25%; height: 300px; text-align: center;">
						<?php 
						if (isset($_SESSION['customer_id'])) { 
							?>
							<div style="height: 13%">
								<?php echo $each['name'] ?>
							</div>
							<div style="height: 60%">
								<img height="170px" width="170px" src="admin/products/<?php echo $each['image']; ?>">
							</div>
							<div style="height: 9%">
								<?php echo number_format($each['price']) ?> VNĐ
							</div>
							<div style="height: 9%">
								<a href="product_detail.php?id=<?php echo $each['id'] ?>">
									Xem chi tiết >>>
								</a>
							</div>
							<div style="height: 9%">
								<button class="btn-add-to-cart" data-id="<?php echo $each['id'] ?>"" data-type="increase">
									Thêm vào giỏ hàng
								</button>
							</div>
							<?php
						} else {
							?>
							<div style="height: 15%">
								<?php echo $each['name'] ?>
							</div>
							<div style="height: 65%">
								<img height="170px" src="admin/products/<?php echo $each['image']; ?>">
							</div>
							<div style="height: 10%">
								<?php echo number_format($each['price']) ?> VNĐ
							</div>
							<div style="height: 10%">
								<a href="product_detail.php?id=<?php echo $each['id'] ?>">
									Xem chi tiết >>>
								</a>
							</div>
						<?php } ?>
					</li>
				</ul>
			<?php endforeach ?>
		</div>
	</div>
	<div id="div_duoi" class="container">
		<div>
			<?php for ($i = 1; $i <= $so_trang ; $i++) { ?>
				<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
					<?php echo $i ?>
				</a>
			<?php } ?>
		</div>
		<br>
		<div>
			<?php
			mysqli_close($connect);
			require 'footer.php';
			?>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-add-to-cart").click(function(event) {
			let id = $(this).data('id');
			let type = $(this).data('type');
			$.ajax({
				url: 'cart_process.php',
				type: 'GET',
				data: {id, type},
			})	
		});
	});
</script>