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
	<title></title>
</head>
<body>
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
	$sql = "select * from products
	where
	products.name like '%$tim_kiem%'
	limit $so_san_pham_1_trang offset $bo_qua";
	$result = mysqli_query($connect, $sql);
	require 'menu.php';
	if (isset($_SESSION['customer_name'])) { ?>
		<p style="color: green;">
			Chào mừng 
			<?php 
			echo $_SESSION['customer_name']; 
			?>
			đã quay trở lại
		</p>
		<?php
	}
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
	<div id="div_tong">
		<div id="div_tren">
			<h1 style="text-align: center; ">
				Chào mừng đến với Website của chúng tôi
			</h1>
			<form>
				<input type="search" name="tim_kiem" value="" placeholder="tìm kiếm">
			</form>

		</div>
		<div id="div_giua">
			<?php foreach ($result as $each): ?>
				<ul>
					<li style="width: 24.8%; height: 300px; text-align: center;">
						<?php echo $each['name'] ?>
						<br>
						<img height="200px" src="admin/products/<?php echo $each['image']; ?>">
						<br>
						<?php echo number_format($each['price']) ?> VNĐ
						<br>
						<a href="product_detail.php?id=<?php echo $each['id'] ?>">
							Xem chi tiết >>>
						</a>
						<?php 
						if (isset($_SESSION['customer_id'])) { 
							?>
							<br>
							<a href="add_to_cart.php?id=<?php echo $each['id'] ?>&type=increase&page=index">
								Thêm vào giỏ hàng
							</a> 
							<?php
						}
						?>
					</li>
				</ul>
			<?php endforeach ?>
		</div>
		<br>
		
		<?php for ($i = 1; $i <= $so_trang ; $i++) { ?>
			<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
				<?php echo $i ?>
			</a>
		<?php } ?>
		
		<?php
		mysqli_close($connect);
		require 'footer.php';
		?>

	</div>
</body>
</html>