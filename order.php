<?php 
require 'check_account.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		th, td {
			border:  1px solid black;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php 
	require 'announce.php';
	?>

	<div id="div_tong">
		<?php require 'menu.php'; ?>
		<div id="div_tren">
			<h3>
				Đây là đơn hàng đã đặt
			</h3>
		</div>
		<div id="div_giua" >
			<?php 
			require 'connect.php';
			$customer_id = $_SESSION['customer_id'];
			$sql = "select * from receipts where customer_id = '$customer_id' and status = '2'";
			$result = mysqli_query($connect,$sql);
			$rows = mysqli_num_rows($result);
			if ($rows == 0) { 
				?>
				<h4 class="center">
					Không có đơn hàng !!
				</h4>
				<?php	
			} else {	
				$num = 0;


				foreach ($result as $receipt):			
					$num ++;
					$receipt_id = $receipt['id'];
					$sql = "select
					receipt_detail.*,
					products.name as name,
					products.price as price,
					products.image as image,
					manufacturers.name as manufacturer_name,
					receipts.total as total
					from receipt_detail
					join receipts on receipts.id = receipt_detail.receipt_id
					join products on products.id = receipt_detail.product_id
					join manufacturers on manufacturers.id = products.manufacturer_id
					where receipt_id = '$receipt_id'";

					$result = mysqli_query($connect,$sql);
					$order = mysqli_fetch_array($result);
					$total = $order['total'];
					?>

					<table class="border" width="900px">
						<tr>
							<th colspan="6">
								<?php echo "Đơn hàng số " . $num ?>
							</th>
						</tr>
						<tr>
							<td width="20%">
								Tên sản phẩm
							</td>
							<td>
								Hình ảnh
							</td>
							<td>
								Nhà sản xuất
							</td>
							<td>
								Giá
							</td>
							<td>
								Số lượng
							</td>
							<td width="15%">
								Thành tiền
							</td>
						</tr>
						<?php

						foreach ($result as $each): 
							$sum = $each['price'] * $each['quantity'];
							?>
							<tr>
								<td>
									<a href="product_detail.php?id=<?php echo $each['id'] ?>">
										<?php echo $each['name'] ?>
									</a>
								</td>
								<td>
									<img width="200px" height="150px" src="admin/products/<?php echo $each['image']; ?>">
								</td>
								<td>
									<?php echo $each['manufacturer_name'] ?>
								</td>
								<td>
									<?php echo number_format($each['price']) ?> VNĐ
								</td>		
								<td>
									<?php echo $each['quantity'] ?>
								</td>
								<td>
									<?php echo number_format($sum)?> VNĐ
								</td> 
							</tr>
							
						<?php endforeach ?>
						<tr>
							<td colspan="5" class="left" >
								Tổng cộng:
							</td>
							<td>
								<?php 
								echo number_format($total ) . " VNĐ";
								?>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								
							</td>
							<td>
								<a href="delete_order.php">
									Xoá
								</a>
							</td>
							<td>
								<a href="order_detail.php">
									Xem chi tiết >>>
								</a>
							</td>
						</tr>
					</table>
					<br>
					<?php
				endforeach; 
			} ?>
		</div>
		<div id="div_duoi">
			<?php 
			require 'footer.php';
			?>
		</div>
	</div>
</body>
</html>