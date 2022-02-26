<?php 
require 'connect.php';
?>
<div class="modal fade" id="modal-order" >
	<div class="modal-dialog" style="width: 800px;">
		<div class="modal-content">
			<div class="modal-header">
				<h1 style="text-align: center; ">
					Đặt hàng
				</h1>
			</div>
			<div class="modal-body">
				<form method="post" action="order_process.php">
					<table width="700px" height="300px"	class="border left" id="form_order">
						<tr>
							<?php
							$sql = "select * from receivers where status = '1' and customer_id = '$customer_id'";
							$result = mysqli_query($connect,$sql);
							$rows = mysqli_num_rows($result);
							if ($rows == 0) { ?>
								<td style=" vertical-align: text-top; text-align: right;" colspan="2">
									<a data-toggle="modal" href="#modal-receiver" id="btn-receiver">
										Chọn địa chỉ
									</a>
								</td>
								<?php
							} else {
								?>
								<td class="left" id="rcv">
									<?php
									foreach ($result as $each) : ?>
										Người nhận:
										<br>
										<span id="span-name"><?php echo $each['name'] ?></span>
										<br>
										<span id="span-phone"><?php echo $each['phone'] ?></span>
										<br>
										<span id="span-address"><?php echo $each['address'] ?></span>
										<?php
									endforeach;
									?>
								</td>
								<td style=" vertical-align: text-top; text-align: right;">
									<a data-toggle="modal" href="#modal-receiver" id="btn-chg-rcv">
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
									<span class="span_name">
										<?php echo $each['product_name'] ?>
									</span>
									<br>
									<img width="100px" height="50px" class="img" src="admin/products/<?php echo $each['product_image']; ?>">
								</td>
								<td class="border" style="vertical-align: text-top; text-align: right;">
									<span class="span_price">
										<?php echo number_format($each['product_price']) ?>
									</span> VNĐ
									<br>
									x
									<span class="span_quantity">
										<?php echo $each['quantity'] ?>
									</span>
									<br>
									<span class="span_sum">
										<?php echo number_format($sum)  ?>
									</span> VNĐ
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
								<span class="span_total">
									<?php echo number_format($receipt['total']) ?>
								</span>
								 VNĐ
							</td>
						</tr>
						<tr>
							<td colspan="2" class="center">
								<button class="btn-order">
									Đặt hàng
								</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>
					Cancel
				</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		
			
		$("#btn-chg-rcv").click(function() {
			$('#modal-order').modal('hide');
		});
		$('#form-order').submit(function(event) {
			event.preventDefault();
			if ($('#btn-receiver').text)
				$.ajax({
					url: 'order_process.php',
					type: 'POST',
					dataType: 'html',
					data: $(this).serializeArray(),
				})
			.done(function(response) {
			})
		});
		if(window.location.href.indexOf('#modal-receiver') != -1) {
			$('#modal-receiver').modal('toggle');
		}
	});
</script>