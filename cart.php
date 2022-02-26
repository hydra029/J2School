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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
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
			<div id='div_menu' style="background: sandybrown; padding: 10px 20px 10px 10px;">
				<?php
				$total = 0;
				require 'connect.php';
				require 'notify.php';
				require 'menu.php';
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
			</div>
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
				<h4 class="center" id="empty"></h4>
				<table class="border" width="100%" style="border: 1px solid black; margin: auto;" id="cart">
					<tr>
						<td width="20%">
							<b>
								Tên sản phẩm
							</b>
						</td>
						<td>
							<b>
								Hình ảnh
							</b>
						</td>
						<td>
							<b>
								Nhà sản xuất
							</b>
						</td>
						<td>
							<b>
								Giá
							</b>
						</td>
						<td>
							<b>
								Số lượng
							</b>
						</td>
						<td>
							<b>
								Xoá
							</b>
						</td>
						<td width="15%">
							<b>
								Thành tiền
							</b>
						</td>
					</tr>
					<?php foreach ($result as $each): ?>
						<?php 
						$sum = $each['price'] * $each['quantity'];
						?>
						<tr>
							<td>
								<a href="product_detail.php?id=<?php echo $each['id'] ?>">
									<span class="span-name">
										<?php echo $each['name'] ?>
									</span>
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
							<button id="btn-order-form" type="button" data-toggle="modal" data-target="#modal-order">
								Đặt hàng
							</button>
						</td>
					</tr>
				</table>
				<?php 
			}
			?>
		</div>
		<div id="div_duoi">
			<br>
			<?php
			require 'footer.php';
			?>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-incre").click(function(event) {
			let btn = $(this);
			let id = btn.data('id');
			let type = btn.data('type');
			$.ajax({
				url: 'cart_process.php',
				type: 'GET',
				data: {id, type},
			})
			.done(function() {
				let parent_tr = btn.parents("tr");
				let name = parseFloat(parent_tr.find('.span-name').text());
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
				$('#form_order .span_total').text(total);
				$('.span-total').text(total);
				for (var i = 0; i < $('#cart tr').length - 3; i++) {
					let quantity = $('#cart .span-quantity').eq(i).text();
					let sum = $('#cart .span-sum').eq(i).text();
					$('#form_order .span_quantity').eq(i).text(quantity);
					$('#form_order .span_sum').eq(i).text(sum);
				}
				$.notify("Đã thêm một sản phẩm", "success");
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
				let parent_tr = btn.parents("tr");
				let quantity = parseFloat(parent_tr.find('.span-quantity').text());
				let price = parseFloat((parent_tr.find('.span-price').text()).replace(/,/g, ''));
				quantity --;
				let sum = price * quantity;
				sum = sum.toLocaleString();
				parent_tr.find('.span-quantity').text(quantity);
				parent_tr.find('.span-sum').text(sum);
				let total = 0;
				$(".span-sum").each(function() {
					total += parseFloat(($(this).text()).replace(/,/g, ''));
				});
				total = total.toLocaleString();
				for (var i = 0; i < $('#cart tr').length - 3; i++) {
					let quantity = $('#cart .span-quantity').eq(i).text();
					let sum = $('#cart .span-sum').eq(i).text();
					$('#form_order .span_quantity').eq(i).text(quantity);
					$('#form_order .span_sum').eq(i).text(sum);
					if (quantity == 0) {
						let j = i+3;
						$('#form_order tr').eq(j).remove();
					}
				}
				$('#form_order .span_total').text(total);
				$('.span-total').text(total);
				if (sum == 0) {
					parent_tr.remove();
				}
				if (total == 0) {
					$("#table").hide();
					$("#empty").text("Giỏ hàng không có gì !!!" );
				}
				$.notify("Đã giảm một sản phẩm", "success");
			})
		});
		$(".btn-del").click(function(event) {
			let btn = $(this);
			let id = btn.data('id');
			let type = btn.data('type');
			$.ajax({
				url: 'cart_process.php',
				type: 'GET',
				data: {id, type},
			})
			.done(function() {
				let parent_tr = btn.parents("tr");
				let quantity = 0;
				let price = parseFloat((parent_tr.find('.span-price').text()).replace(/,/g, ''));
				let sum = price * quantity;
				sum = sum.toLocaleString();
				parent_tr.find('.span-quantity').text(quantity);
				parent_tr.find('.span-sum').text(sum);
				let total = 0;
				$(".span-sum").each(function() {
					total += parseFloat(($(this).text()).replace(/,/g, ''));
				});
				for (var i = 0; i < $('#cart tr').length - 3; i++) {
					let quantity = $('#cart .span-quantity').eq(i).text();
					let sum = $('#cart .span-sum').eq(i).text();
					$('#form_order .span_quantity').eq(i).text(quantity);
					$('#form_order .span_sum').eq(i).text(sum);
					if (quantity == 0) {
						let j = i+3;
						$('#form_order tr').eq(j).remove();
					}
				}
				if (sum == 0) {
					parent_tr.remove();
				}
				if (total == 0) {
					$("#cart").hide();
					$("#empty").text("Giỏ hàng không có gì !!!" );
				}
				total = total.toLocaleString();
				$('#form_order .span_total').text(total);
				$('.span-total').text(total);
				$.notify("Xoá khỏi giỏ thành công", "success");
			})
		});
	});
</script>
<?php 
include 'order_form.php';
include 'receiver_modal.php';
?>