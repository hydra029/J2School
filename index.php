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
			background: Cornsilk;
			min-height: 100vh;
			max-height: 6000px;
			position: relative;
			margin: auto;
		}
		#div_search {
			width: 200px;
			float: right;
			height: 100%;
		}
		#div_content {
			width: 75%;
		}
		#div_tren {
			text-align: center;
			min-height: 10vh;
		}
		#div_giua {
			max-height: 4900px;
			min-height: 84vh;
		}
		#div_duoi {
			height: 10vh;
			background: aliceblue;
			text-align: center;
			bottom: 5px;
		}
		#div_giua > .search {
			width: 19%;
			float: left;
			min-height: 735px;
			background: NavajoWhite;
			height: 100%;
			border-radius: 20px;
			border: 1px solid Sienna;
			padding: 0.5%;
			margin: 0.5%;
		}
		#div_giua > .content {
			width: 80%;
			height: 98%;
			float: left;
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
		
		td {
			height: 40px;
		}
		button:hover {
			transform: scale(0.95);
			border-radius: 5px;
		}
		.tags {
			background: Cornsilk;
		}
		.tag {
			background: Bisque;
		}
	</style>
	<link rel="stylesheet" href="card.css">
</head>
<body style="background: WhiteSmoke">
	<div id="div_tong" class="container">
		<div id="div_tren">
			<div style="background: sandybrown; padding: 5px;">
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
				<div class="left" style="padding: 5px 5px 5px;">
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
			</div>
			
			<form style="width: 300px; margin: auto; padding: 20px 5px;">
				<input  class="form-control" type="search" name="tim_kiem" value="" placeholder="Tìm kiếm">
			</form>
		</div>
		<div id="div_giua">
			<div class="search">
				<h4 class="center">
					<b>
						Lọc sản phẩm
					</b>
				</h4>
				<form form="search" method="get" action="index.php">
					<div>
						<div class="form-control center tag">
							Thương hiệu
						</div>
						<?php 
						$sql = "select * from manufacturers";
						$result = mysqli_query($connect,$sql);
						foreach ($result as $each) { ?>
							<div class="form-control tags">
								<input type="checkbox" name="brand" class="brand" value="<?php echo $each['name'] ?>">
								<?php echo $each['name'] ?>
							</div>
							<?php
						}
						?>
					</div>
					<button class="form-control" type="submit">Lọc</button>
				</form>
			</div>
			<div class="content">
				<?php
				if ($type_id == "") {
					$sql = "select
					products.*,
					ifnull(sum(receipt_detail.quantity),0) as sold
					from products
					left join receipt_detail on receipt_detail.product_id = products.id
					where
					products.name like '%$tim_kiem%'
					group by products.id
					order by sold desc
					limit $so_san_pham_1_trang offset $bo_qua";
				} else {
					$sql = "select
					products.*,
					product_type.type_id as type_id,
					ifnull(sum(receipt_detail.quantity),0) as sold
					from products
					join product_type on product_type.product_id = products.id
					left join receipt_detail on receipt_detail.product_id = products.id
					where
					products.name like '%$tim_kiem%' and product_type.type_id like '%$type_id%'
					group by products.id
					order by sold desc
					limit $so_san_pham_1_trang offset $bo_qua";
				}
				$result = mysqli_query($connect, $sql);
				?>
				<?php foreach ($result as $each): ?>

					<div class="card">
						<div class="card_name">
							<?php if (strlen($each['name']) > 50 ) {
								echo substr(($each['name']), 0, 50) . '...';
							} else {
								echo $each['name'];
							}?>
						</div>
						<div >
							<img  class="card_img" height="180px" width="180px" src="admin/products/<?php echo $each['image']; ?>">
						</div>
						<div class="card_price">
							<?php echo number_format($each['price']) ?> VNĐ
						</div>
						<div class="card_detail">
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
					</div>	
				<?php endforeach ?>
			</div>
			<div style="text-align: center;" class="page">
				<?php for ($i = 1; $i <= $so_trang ; $i++) { ?>
					<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>&type_id=<?php echo $type_id ?>">
						<?php echo $i ?>
					</a>
				<?php } ?>
			</div>
		</div>
		<div id="div_duoi" style="background: sandybrown;">
			<br>
			<div>
				<?php
				mysqli_close($connect);
				require 'footer.php';
				?>
			</div>
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
		$("#search").submit(function(event) {
			event.preventDefault();
			var content = $(".brand").val();
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