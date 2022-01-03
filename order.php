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
			<table class="border" width="900px">
				<tr>
					<td width="12.3%">
						<a href="order.php?status=2">Chờ xét duyệt</a>
					</td>
					<td width="12.3%">
						<a href="order.php?status=3">Không duyệt</a>
					</td>
					<td width="12.3%">
						<a href="order.php?status=4">Đã duyệt</a>
					</td>
					<td width="12.3%">
						<a href="order.php?status=5">Đang giao hàng</a>
					</td>
					<td width="12.3%">
						<a href="order.php?status=6">Đã giao</a>
					</td>
					<td width="12.3%">
						<a href="order.php?status=7">Thành công</a>
					</td>
					<td width="12.3%">
						<a href="order.php?status=8">Đã huỷ</a>
					</td>
				</tr>
			</table>
			<?php 
			if (empty($_GET['status'])) {
				$status = 2;
			} else {
				$status = $_GET['status'];
			}
			switch ($status) {
				case '2': 
				?>
				<h3>
					Đây là đơn hàng đang chờ xét duyệt !
				</h3>
				<?php 
				break;
				case '3': 
				?>
				<h3>
					Đây là đơn hàng không qua xét duyệt !
				</h3>
				<?php 
				break;
				case '4': 
				?>
				<h3>
					Đây là đơn hàng đang giao hàng !
				</h3>
				<?php 
				break;
				case '5': 
				?>
				<h3>					
					Đây là đơn hàng đã giao hàng!
				</h3>				
				<?php 
				break;
				case '6': 
				?>
				<h3>
					Đây là đơn hàng thành công!
				</h3>
				<?php 
				break;
				case '7': 
				?>
				<h3>
					Đây là đơn hàng đã huỷ !
				</h3>
				<?php 
				break;
				default:
				?>
				<h3>
					Đây là đơn hàng đang chờ xét duyệt !
				</h3>
				<?php
				break;
			}
			?>
		</div>
		<div id="div_giua" >
			<?php 
			require 'connect.php';

			$customer_id = $_SESSION['customer_id'];
			$sql = "select * from receipts where customer_id = '$customer_id' and status = '$status'";
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
									<a href="product_detail.php?id=<?php echo $each['product_id'] ?>">
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
								<?php 
								switch ($status) {
									case '2':
									case '3':
									?>
									<a href="delete_order.php?id=<?php echo $receipt_id ?>&status=<?php echo $status ?>">
										Huỷ
									</a>
									<?php
									break;
									case '5':
										// code...
									break;
									case '6':
									?>
									<a href="order_success.php">
										Xác nhận
									</a>
									<?php
									break;
									
									default:
										// code...
									break;
								}
								?>
							</td>
							<td>
								<a href="order_detail.php?id=<?php echo $each['receipt_id'] ?>">
									Xem chi tiết >>>
								</a>
							</td>
						</tr>
					</table>
					<br>
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