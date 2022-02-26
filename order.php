<?php 
require 'check_account.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="notify/notify.js"></script>
	<script src="notify/notify.min.js"></script>
	<style type="text/css">
		th, td {
			border:  1px solid black;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="div_tong" class="container">
		<div id="div_tren">
			<div style="background: sandybrown; padding: 10px 20px 10px 10px;">
				<?php require 'menu.php'; ?>
			</div>
			<br>
			<br>
			<table class="border" width="90%">
				<tr>
					<td width="16.6%">
						<a href="order.php?status=2">Chờ xét duyệt</a>
					</td>
					<td width="16.6%">
						<a href="order.php?status=3">Không duyệt</a>
					</td>
					<td width="16.6%">
						<a href="order.php?status=4">Đang giao hàng</a>
					</td>
					<td width="16.6%">
						<a href="order.php?status=5">Đã giao</a>
					</td>
					<td width="16.6%">
						<a href="order.php?status=6">Thành công</a>
					</td>
					<td width="16.6%">
						<a href="order.php?status=7">Đã huỷ</a>
					</td>
				</tr>
			</table>
		</div>
		<div id="div_giua" >
			<div style="text-align: center; margin: 0px;">
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
						Đơn hàng đang chờ xét duyệt !
					</h3>
					<?php 
					break;
					case '3': 
					?>
					<h3>
						Đơn hàng không qua xét duyệt !
					</h3>
					<?php 
					break;
					case '4': 
					?>
					<h3>
						Đơn hàng đang giao hàng !
					</h3>
					<?php 
					break;
					case '5': 
					?>
					<h3>					
						Đơn hàng đã giao hàng!
					</h3>				
					<?php 
					break;
					case '6': 
					?>
					<h3>
						Đơn hàng thành công!
					</h3>
					<?php 
					break;
					case '7': 
					?>
					<h3>
						Đơn hàng đã huỷ !
					</h3>
					<?php 
					break;
					default:
					?>
					<h3>
						Đơn hàng đang chờ xét duyệt !
					</h3>
					<?php
					break;
				}
				?>
			</div>
			<br>
			<?php 
			require 'connect.php';
			require 'notify.php';
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
					<br>
					<br>
					<table class="border" width="100%">
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
								<td height="155px">
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
									<a href="" id="btn-order-delete" data-id="<?php echo $each['receipt_id'] ?>">
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
								<a data-toggle="modal" href="#modal-order-detail" id="btn-order-detail">
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
			<br>
			<?php 
			require 'footer.php';
			include 'order_detail.php';
			?>
		</div>
	</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/uuid@latest/dist/umd/uuidv4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/html2canvas@1.3.2/dist/html2canvas.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn-order-delete").click(function() {
			let btn = $(this);
			let id = btn.data('id');
			let parent_tb = btn.parents('table');
			$.ajax({
				url: 'delete_order.php',
				type: 'POST',
				data: {id},
			})
			.done(function(response) {
				parent_tb.remove();
			})
		});
	});

</script>