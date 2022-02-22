<?php
session_start();
if (isset($_SESSION['customer_id'])) { 
	$customer_id = $_SESSION['customer_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="menu.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
	<script src="notify/notify.js"></script>
	<script src="notify/notify.min.js"></script>
	<title></title>
	
</head>
<body>
	<div id="div_tong" class="container">
		<?php 
		require 'connect.php';
		require 'menu.php';
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			header("location:index.php");
		}
		$sql = "select * from products where id = '$id'";
		$result = mysqli_query($connect, $sql);

		?>
		<div id="div_tren" >
			<h1 style="text-align: center; ">
				Thông tin sản phẩm
			</h1>
			<form>
				<input type="search" name="tim_kiem" value="" placeholder="tìm kiếm">
			</form>
		</div>
		<div id="div_giua" class="center">
			<?php foreach ($result as $each): ?>
				<h2>
					<?php echo $each['name'] ?>
				</h2>
				<img height="300px" src="admin/products/<?php echo $each['image'] ?>">
				<br>
				<br>
				<p>
					<?php 
					echo number_format($each['price']); 
					?>
					VNĐ
				</p>
				<?php 
				if (isset($_SESSION['customer_id'])) { 
					?>
					<button class="btn-add-to-cart" data-id="<?php echo $each['id'] ?>"" data-type="increase">
						Thêm vào giỏ hàng
					</button>
					<?php
				}
				?>
				<div class="btn-cus" style="display: none;">
					<button class="btn-add-to-cart" data-id="<?php echo $each['id'] ?>"" data-type="increase">
						Thêm vào giỏ hàng
					</button>
				</div>
				<br>
				<br>
				<p>
					<?php echo $each['description']; ?>
				</p>
			<?php endforeach ?>
		</div>
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
				.done(function() {
					$.notify("Thêm vào giỏ hàng thành công", "success");
				})
			});
		});
	</script>
</body>
</html>