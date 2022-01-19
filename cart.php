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
	$total = 0;
	require 'announce.php';
	require 'connect.php';
	$status = '1';
	$sql = "select
	products.id as id,
	products.name as name,
	products.image as image,
	manufacturers.name as manufacturer_name,
	products.price as price,
	receipt_detail.quantity as quantity,
	receipts.customer_id as customer_id,
	receipts.id as receipt_id,
	receipts.status as status	
	from receipt_detail
	join receipts on receipts.id = receipt_detail.receipt_id
	join products on products.id = receipt_detail.product_id
	join manufacturers on products.manufacturer_id = manufacturers.id
	where receipts.customer_id = $customer_id and receipts.status = '$status'";
	$result = mysqli_query($connect,$sql);
	$rows = mysqli_num_rows($result);
	?>
	<div id="div_tong">
		<?php require 'menu.php'; ?>
		<div id="div_tren">
			<h3>
				Đây là giỏ hàng cá nhân
			</h3>
		</div>
		<div id="div_giua">
			<?php if ($rows == 0) { ?>
				<h4 class="center">
					Giỏ hàng không có gì !!!
				</h4>
				<?php	
			} else {
				$cart = mysqli_fetch_array($result);
				$receipt_id = $cart['receipt_id'];
				?>
				<h4 class="center empty"></h4>
				<table class="border table" width="100%">
					<tr>
						<th width="20%">
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
							Số lượng
						</th>
						<th>
							Xoá
						</th>
						<th width="15%">
							Thành tiền
						</th>
					</tr>
					<?php foreach ($result as $each): ?>
						<?php 
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
								<span class="span-price">
									<?php echo number_format($each['price']) ?> VNĐ
								</span>
							</td>		
							<td width=10%>
								<button class="btn-decre" data-id="<?php echo $each['id'] ?>" data-type="decrease">
									-
								</button>
								<span class="span-quantity">
									<?php echo $each['quantity'] ?>
								</span>
								<button class="btn-incre" data-id="<?php echo $each['id'] ?>" data-type="increase">
									+
								</button>
							</td>
							<td>
								<button class="btn-del" data-id="<?php echo $each['id'] ?>" data-type="delete">
									Xoá
								</button>
							</td>
							<td>
								<span class="span-sum">
									<?php echo number_format($sum)?>
								</span>
								VNĐ
							</td> 
						</tr>
						<?php 
						$total +=  $sum;
						$sql = "update receipts set total = '$total' where id = '$receipt_id'";
						mysqli_query($connect,$sql);
						?>
					<?php endforeach ?>
					<tr>
						<td colspan="6" class="left" >
							Tổng cộng:
						</td>
						<td>
							<span id="total">
								<span class="span-total">
									<?php 
									echo number_format($total);
									?>
								</span>
								VNĐ
							</span>
						</td>
					</tr>
					<tr>
						<td colspan="6" class="right" >
						</td>
						<td>
							<button>
								<a href="order_form.php">
									Đặt hàng
								</a>
							</button>
						</td>
					</tr>
				</table>
				<?php 
			}
			?>
		</div>
		<div id="div_duoi">
			<?php 
			require 'footer.php';
			mysqli_close($connect);
			?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".btn-del").click(function() {
				let btn = $(this);
				let id = btn.data('id');
				let type = btn.data('type');
				$.ajax({
					url: 'cart_process.php',
					type: 'GET',
					data: {id, type},
				})
				.done(function() {
					let table_row = $(".table > tbody > tr").length;
					if (table_row == 4) {
						btn.parents('table').remove();
						$(".empty").text("Giỏ hàng không có gì !!");
					} else {
						btn.parents('tr').remove();
						$(".span-del").each(function() {
							total += parseFloat(($(this).text()).replace(/,/g, ''));
						});
						total = total.toLocaleString();
						$('.span-total').text(total);
					}
				})
			});
			$(".btn-incre").click(function() {
				let btn = $(this);
				let id = btn.data('id');
				let type = btn.data('type');
				$.ajax({
					url: 'cart_process.php',
					type: 'GET',
					data: {id, type},
				})
				.done(function() {
					let parent_tr = btn.parents('tr');
					let quantity = parseFloat(parent_tr.find('.span-quantity').text());
					let price = parseFloat((parent_tr.find('.span-price').text()).replace(/,/g, ''));
					quantity ++;
					let sum = price * quantity;
					sum = sum.toLocaleString();
					parent_tr.find('.span-quantity').text(quantity);
					parent_tr.find('.span-sum').text(sum);
					let total = 0;
					$(".span-sum").each(function() {
						total += parseFloat(($(this).text()).replace(/,/g, ''));
					});
					total = total.toLocaleString();
					$('.span-total').text(total);
				})
			});
			$(".btn-decre").click(function(event) {
				let btn = $(this);
				let id = btn.data('id');
				let type = btn.data('type');
				$.ajax({
					url: 'cart_process.php',
					type: 'GET',
					data: {id, type},
				})
				.done(function() {
					let parent_tr = btn.parents('tr');
					let quantity = parseFloat(parent_tr.find('.span-quantity').text());
					let price = parseFloat((parent_tr.find('.span-price').text()).replace(/,/g, ''));
					quantity --;
					if (quantity == 0) {
						let table_row = $(".table > tbody > tr").length;
						if (table_row == 4) {
							btn.parents('table').remove();
							$(".empty").text("Giỏ hàng không có gì !!");
						} else {
							parent_tr.remove();
						}
					} else {
						let sum = price * quantity;
						sum = sum.toLocaleString();
						parent_tr.find('.span-quantity').text(quantity);
						parent_tr.find('.span-sum').text(sum);
					}
					let total = 0;
					$(".span-sum").each(function() {
						total += parseFloat(($(this).text()).replace(/,/g, ''));
					});
					total = total.toLocaleString();
					$('.span-total').text(total);
					let table_row = ($('.table')).rows.length;
					$('.span-total').text(table_row);
				})
			});
		});
	</script>
</body>
</html>