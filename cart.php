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
	<style type="text/css">
		th td {
			border:  1px solid black;
		}
	</style>
</head>
<body>
	<?php 
	require 'menu.php';
	require 'connect.php';
	$sql = "select * from carts where customer_id = $customer_id";
	$result = mysqli_query($connect,$sql);
	?>
	<div id="div_tong">
		<div id="div_tren">
			<h3>
				Đây là giỏ hàng cá nhân
			</h3>
		</div>
		<div id="div_giua">
			<table class="border" width="100%">
				<tr>
					<th>
						Tên sản phẩm
					</th>
					<th>
						Hình ảnh
					</th>
					<th>
						Nhà sản xuất
					</th>
					<th>
						Giá
					</th>
					<th>
						Sửa
					</th>
					<th>
						Xoá
					</th>
					<th>
						Thành tiền
					</th>
				</tr>
				<?php foreach ($result as $each): ?>
					<td>
						<?php echo $each['name'] ?>
					</td>
					<td>
						<?php echo $each['image'] ?>
					</td>
					<td>
						<?php echo $each['manufacturer_name'] ?>
					</td>
					<td>
						<?php echo $each['price'] ?>
					</td>		
					<td>
						<?php echo $each['quantity'] ?>
					</td>
					<td>
						<a href="update_cart_process.php?type=decrease">
							&nbsp - &nbsp
						</a>
						<input type="number" name="quantity" value="<?php echo $each['quantity'] ?>">
						<a href="update_cart_process.php?type=increase">
							+
						</a>
					</td>
					<td>
						<a href="delete.php">
							Xoá
						</a>
					</td>
					<td>
						<?php echo ($each['price'] * $each['quantity']) ?>
					</td> 
				<?php endforeach ?>
			</table>
		</div>
		<?php 
		require 'footer.php';
		?>
	</div>
</body>
</html>