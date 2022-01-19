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
	<title></title>
</head>
<body>
	<?php 
	require 'connect.php';
	$id = $_GET['id'];
	$sql = "select * from products where id = $id";
	$result = mysqli_query($connect, $sql);
	?>
	<div id="div_tong">
		<?php 
		require 'menu.php';
		if (isset($_SESSION['error'])) {
			?>
			<span class="error">
				<?php echo $_SESSION['error'] ?>
			</span>
			<?php 
			unset($_SESSION['error']);	
		}
		?>
		<?php
		if (isset($_SESSION['success'])) {
			?>
			<span class="success">
				<?php echo $_SESSION['success'] ?>
			</span>
			<?php 
			unset($_SESSION['success'])	
			?>
			<?php
		}
		
		?>
		<div id="div_tren">
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
				<p>
					<?php 
					echo number_format($each['price']); 
					?>
					VNĐ
				</p>
				<?php 
				if (isset($_SESSION['customer_id'])) { 
					?>
					<br>
					<button class="btn-add-to-cart" data-id="<?php echo $each['id'] ?>"" data-type="increase">
						Thêm vào giỏ hàng
					</button>
					<?php
				}
				?>
				<p>
					<?php echo $each['description']; ?>
				</p>
			<?php endforeach ?>
		</div>
		<div id="div_duoi">
			<?php 
			require 'footer.php';
			?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
					alert('Thêm vào giỏ hàng thành công');
				})
				.fail(function() {
					alert('Thêm vào giỏ hàng thất bại');
				})		
			});
		});
	</script>
</body>
</html>