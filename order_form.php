<?php 
require 'check_account.php';
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
	?>
	<div id="div_tong">
		<?php 
		require 'menu.php';
		?>
		<div id="div_tren">
			<h1 style="text-align: center; ">
				Đặt hàng
			</h1>
			<form>
				<input type="search" name="tim_kiem" value="" placeholder="tìm kiếm">
			</form>
		</div>
		<div id="div_giua" class="center">
			<form method="post" action="order_process.php">
				<table width="700px" height="300px"	class="border left">
					<tr>
						<?php
						$sql = "select * from receivers where status = '1'";
						$result = mysqli_query($connect,$sql);
						$rows = mysqli_num_rows($result);
						if ($rows == 0) { ?>
							<td style=" vertical-align: text-top; text-align: right;" colspan="2">
								<a href="receiver.php?page=order">
									Chọn địa chỉ
								</a>
							</td>
							<?php
						} else {
							?>
							<td >
								<?php
								foreach ($result as $each) : ?>
									Người nhận:
									<br>
									<?php echo $each['name'] ?>
									<br>
									<?php echo $each['phone'] ?>
									<br>
									<?php echo $each['address'];
								endforeach;
								?>
							</td>
							<td style=" vertical-align: text-top; text-align: right;">
								<a href="receiver.php">
									Thay dổi
								</a>
							</td>	
						<?php } ?>
					</tr>
					<tr>
						<td class="left" colspan="2">
							Ghi chú:
							<br>
							<textarea name="note">
							</textarea>
						</td>	
					</tr>
					<tr>
						<td>
							Sản phẩm:
						</td>
					</tr>
					<?php 
					$sql = "select
					receipt_detail.*,
					products.name as product_name,
					products.price as product_price,
					products.image as product_image,
					receipts.total as total
					from receipt_detail
					join receipts on receipts.id = receipt_detail.receipt_id
					join products on products.id = receipt_detail.product_id
					where
					customer_id = '$customer_id' and status = '1'";
					$result = mysqli_query($connect,$sql);
					$receipt = mysqli_fetch_array($result);
					foreach ($result as $each) {
						$sum = $each['quantity'] * $each['product_price'];
						?>
						<tr>
							<td class="border" style=" vertical-align: text-top; text-align: left;">
								<?php echo $each['product_name'] ?>
								<br>
								<img width="100px" height="50px" src="admin/products/<?php echo $each['product_image']; ?>">
							</td>
							<td class="border" style=" vertical-align: text-top; text-align: right;">
								<?php echo number_format($each['product_price']) ?> VNĐ
								
								<br>
								x
								<?php echo $each['quantity'] ?>
								<br>
								<?php echo number_format($sum) ?> VNĐ


							</td>
						</tr>
						
						<?php  
					}
					?>
					<tr>
						<td class="border" >
							Tổng tiền
						</td>
						<td class="border right">
							<?php echo number_format($receipt['total']) ?> VNĐ
						</td>
					</tr>
					<tr>
						<td colspan="2" class="center">
							<button>
								Đặt hàng
							</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="div_duoi">
			<?php 
			require 'footer.php';
			?>
		</div>
	</div>
</body>
</html>