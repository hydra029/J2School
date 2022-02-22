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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
	<script src="notify/notify.js"></script>
	<script src="notify/notify.min.js"></script>
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
			padding-bottom: 15px;
			background: aliceblue;
			min-height: 700px;
			max-height: 6000px;
			position: relative;
			margin: auto;
		}
		#div_tren {
			text-align: center;
			height: 100px;
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
		<div id="div_tren">
			<?php 
			require 'connect.php';
			$sql = "SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))";
			mysqli_query($connect, $sql);
			$trang = 1;
			if (isset($_GET['trang'])) {
				$trang = $_GET['trang'];
			}  
			$tim_kiem = '';
			$type_id = '';
			if (isset($_GET['tim_kiem'])) {
				$tim_kiem = $_GET['tim_kiem'];
			}
			if (isset($_GET['type_id'])) {
				$type_id = $_GET['type_id'];
			}
			if ($type_id == "") {
				$sql_so_san_pham = "select count(*) from products
				where
				name like '%$tim_kiem%'";
			} else {
				$sql_so_san_pham = "select count(*)
				from products join product_type on product_type.product_id = products.id
				where
				products.name like '%$tim_kiem%' and product_type.type_id like '%$type_id%'
				group by products.name";
			}
			$mang_so_san_pham = mysqli_query($connect,$sql_so_san_pham);
			$ket_qua_so_san_pham = mysqli_fetch_array($mang_so_san_pham);
			$so_san_pham = $ket_qua_so_san_pham['count(*)'];
			$so_san_pham_1_trang = 8;
			$so_trang = ceil($so_san_pham/$so_san_pham_1_trang);
			$bo_qua = $so_san_pham_1_trang*($trang-1);
			require 'menu.php';
			?>
			<div class="left">
				Phân loại sản phẩm: 
				<span>
					<a href="index.php">Tất cả</a>
				</span>
				<?php 
				require "connect.php";
				$sql = "select * from types";
				$result = mysqli_query($connect,$sql);
				foreach ($result as $each) {
					?>
					<a href="index.php?tim_kiem=<?php echo $tim_kiem ?>&type_id=<?php echo $each['id'] ?>">
						| <?php echo $each["name"] ?>
					</a>
					<?php
				}
				?>
			</div>
			<?php
			if ($type_id == "") {
				$sql = "select * from products
				where
				products.name like '%$tim_kiem%'
				limit $so_san_pham_1_trang offset $bo_qua";
			} else {
				$sql = "select
				products.*,
				product_type.type_id as type_id
				from products
				join product_type on product_type.product_id = products.id
				where
				products.name like '%$tim_kiem%' and product_type.type_id like '%$type_id%'
				group by products.name
				limit $so_san_pham_1_trang offset $bo_qua";
			}
			$result = mysqli_query($connect, $sql);
			?>
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
						<?php 
						if (isset($_SESSION['customer_id'])) { 
							?>
							<button class="btn-add-to-cart" data-id="<?php echo $each['id'] ?>"" data-type="increase">
								Thêm vào giỏ hàng
							</button>
							<?php
						}
						?>
						<div class="btn-cus" style="height: 9%; display: none;">
							<button class="btn-add-to-cart" data-id="<?php echo $each['id'] ?>"" data-type="increase">
								Thêm vào giỏ hàng
							</button>
						</div>
					</li>
				</ul>
			<?php endforeach ?>
		</div>
	</div>
	<div style="text-align: center; background: aliceblue" class="container">
		<div>
			<?php for ($i = 1; $i <= $so_trang ; $i++) { ?>
				<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>&type_id=<?php echo $type_id ?>">
					<?php echo $i ?>
				</a>
			<?php } ?>
		</div>
		<br>
	</div>
	<div id="div_duoi" class="container" style="background: sandybrown;">
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
			.done(function(response) {
				$.notify("Thêm vào giỏ hàng thành công", "success");
			})
		});
	});
</script>
<?php if (isset($_SESSION["notify"])) { ?>
	<script type="text/javascript">
		if ("<?php echo $_SESSION['notify'] ?>" != "") {
			$.notify("<?php echo $_SESSION['notify'] ?>", "success");
			<?php unset($_SESSION['notify']) ?>
		}
	</script>
	<?php } ?>