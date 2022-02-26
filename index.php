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
			min-height: 1100px;
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
			min-height: 1090px;
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
				$tim_kiem = '';
				$type = '';
				$brand = '';
				if (isset($_GET['trang'])) {
					$trang = $_GET['trang'];
				}
				if (isset($_GET['tim_kiem'])) {
					$tim_kiem = $_GET['tim_kiem'];
				}
				if (isset($_GET['type'])) {
					$type = $_GET['type'];
				}
				if (isset($_GET['brand'])) {
					$brand = $_GET['brand'];
				}
				$sql_so_san_pham = "select products.*
				from products 
				left join product_type on product_type.product_id = products.id
				join manufacturers on manufacturers.id = products.manufacturer_id
				where
				products.name like '%$tim_kiem%' and product_type.type_id like '%$type%' and products.manufacturer_id like '%$brand%'
				group by products.id";
				$mang_so_san_pham = mysqli_query($connect,$sql_so_san_pham);
				$so_san_pham = mysqli_num_rows($mang_so_san_pham);
				$so_san_pham_1_trang = 12;
				$so_trang = ceil($so_san_pham/$so_san_pham_1_trang);
				$bo_qua = $so_san_pham_1_trang*($trang-1);
				require 'menu.php';
				?>
			</div>
			<form style="width: 300px; margin: auto; padding: 20px 5px;">
				<input  class="form-control" type="search" name="tim_kiem" placeholder="Tìm kiếm">
			</form>
		</div>
		<div id="div_giua">
			<div class="search">
				<h4 class="center" id="abc">
					<b>
						Lọc sản phẩm
					</b>
				</h4>
				<form id="search">
					<div>
						<div class="form-control center tag">
							Thương hiệu
						</div>
						<?php 
						$sql = "select * from manufacturers";
						$result = mysqli_query($connect,$sql);
						foreach ($result as $each) { ?>
							<div class="form-control tags">
								<input type="radio" name="brand" class="brand" value="<?php echo $each['id'] ?>"  <?php if($brand == $each['id']){ echo "checked=checked";}  ?>>
								<?php echo $each['name'] ?>
							</div>
							<?php
						}
						?>
						<div class="form-control center tag">
							Thể loại
						</div>
						<?php 
						$sql = "select * from types";
						$result = mysqli_query($connect,$sql);
						foreach ($result as $each) { ?>
							<div class="form-control tags">
								<input type="radio" name="type" class="type" value="<?php echo $each['id'] ?>" <?php if($type == $each['id']){ echo "checked=checked";}  ?>>
								<?php echo $each['name'] ?>
							</div>
							<?php
						}
						?>
					</div>
					<button class="form-control" type="submit">Lọc</button>
					<button class="form-control" type="button" id="uncheck">Bỏ lọc</button>
				</form>
			</div>
			<div class="content">
				<?php
				mysqli_close($connect);
				require 'connect.php';
				$sql = "select
				products.*,
				product_type.type_id as type_id,
				ifnull(sum(receipt_detail.quantity),0) as sold
				from products
				left join receipt_detail on receipt_detail.product_id = products.id
				left join product_type on product_type.product_id = products.id
				join manufacturers on manufacturers.id = products.manufacturer_id
				where
				products.name like '%$tim_kiem%' and product_type.type_id like '%$type%' and products.manufacturer_id like '%$brand%'
				group by products.id
				order by sold desc
				limit $so_san_pham_1_trang offset $bo_qua";
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
				<?php
				$location = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
				if ($_SERVER["SERVER_PORT"] != "80") {
					$location .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
				} else {
					$location .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
				}
				for ($i = 1; $i <= $so_trang ; $i++) { 
					?>
					<a href="?tim_kiem=<?php echo $tim_kiem ?>&brand=<?php echo $brand ?>&type=<?php echo $type ?>&trang=<?php echo $i ?>">
						<?php echo $i ?>
					</a>
				<?php } ?>
			</div>
		</div>
		<div id="div_duoi" style="background: sandybrown;">
			<br>
			<div>
				<?php
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
			let brand = "";
			let type = "";
			if ($('input[name="brand').is(':checked')) {
				brand = $('input[name="brand"]:checked').val();
			}
			if ($('input[name="type"]').is(':checked')) {
				type = $('input[name="type"]:checked').val();
			}
			let header = "index.php?search=<?php echo $tim_kiem ?>&brand=" + brand + "&type=" + type;
			window.location = header;
		});
		$("#uncheck").click(function(event) {
			event.preventDefault();
			$('.brand').prop('checked', false);
			$('.type').prop('checked', false);
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
<?php if (isset($_SESSION["error"])) { ?>
	<script type="text/javascript">
		if ("<?php echo $_SESSION['error'] ?>" != "") {
			$.error("<?php echo $_SESSION['error'] ?>", "error");
			<?php unset($_SESSION['error']) ?>
		}
	</script>
<?php } ?>