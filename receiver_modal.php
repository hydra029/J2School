<?php 
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$sql = "select * from receivers where customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$rows = mysqli_num_rows($result);
$num = 0;
mysqli_close($connect);
?>
<div class="modal fade" id="modal-receiver">
	<div class="modal-dialog" style="width: 700px;">
		<div class="modal-content">
			<div class="modal-header">
				<h1 style="text-align: center ">
					Chọn địa chỉ nhận hàng
				</h1>
			</div>
			<div class="modal-body">
				<?php 
				if ($rows == 0) { ?>
					<h3  class="center">
						Chưa có thông tin người nhận, 
						<span>
							<a data-toggle="modal" href="#modal-receiver-form" id="btn-crt-rcv">
								mời tạo thêm !
							</a>
						</span>
					</h3>
					<?php
				} else { 
					?>
					<p>
						<a data-toggle="modal" href="#modal-receiver-form" id="btn-crt-rcv" class="center">
							Tạo thêm
						</a>
					</p>
					<table width="600px" class="border">
						<tr>
							<td>
								STT
							</td>
							<td>
								Tên người nhận:
							</td>
							<td>
								Số điện thoại:
							</td>
							<td width="200px" >
								Địa chỉ:
							</td>
							<td>
								Sửa
							</td>
							<td>
								Mặc đình
							</td>
						</tr>
						<?php 
						foreach ($result as $each):
							$num ++;
							?>
							<tr>
								<td>
									<?php echo $num ?>
								</td>
								<td>
									<?php echo $each['name'] ?>
								</td>
								<td>
									<?php echo $each['phone'] ?>
								</td>
								<td height="70px">
									<?php echo $each['address'] ?>
								</td>
								<td>
									<a data-toggle="modal" href="#modal-receiver-form-change" id="btn-receiver-form" data-id="<?php echo $each['id'] ?>" data-num="<?php echo $num ?>">
										Sửa
									</a>
								</td>
								<td class="center">
									<?php if ($each['status'] != 1) { ?>
										<button class="btn-rcv">
											<a class="btn-receiver" data-id="<?php echo $each['id'] ?>">
												Chọn
											</a>
										</button>
										<span style="display: none;" class="span-use">
											Đang dùng
										</span>
									<?php } else {?>
										<button style="display: none;" class="btn-rcv">
											<a class="btn-receiver" data-id="<?php echo $each['id'] ?>">
												Chọn
											</a>
										</button>
										<span class="span-use">
											Đang dùng
										</span>
									<?php } ?>
								</td>
							</tr>
							<?php
						endforeach;
					}
					?>
				</table>
				<br>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn-cancel" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>
					Cancel
				</button>
			</div>
		</div>
	</div>
</div>
<?php 					
include 'receiver_form.php';
include 'receiver_form_change.php';
?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-receiver").click(function() {
			event.preventDefault();
			let btn = $(this);
			let parent_tr = btn.parents("tr");
			let parent_tb = btn.parents("table");
			let id = btn.data('id');
			$.ajax({
				url: 'receiver_process.php',
				type: 'GET',
				dataType: 'json',
				data: {id},
			})
			.done(function(response) {
				$("#span-name").text(response["name"]);
				$("#span-phone").text(response["phone"]);
				$("#span-address").text(response["address"]);
				parent_tb.find('.btn-rcv').show();
				parent_tr.find('.btn-rcv').hide();
				parent_tb.find('.span-use').hide();
				parent_tr.find('.span-use').show();
			})
		});
		$("#btn-receiver-form").click(function() {
			event.preventDefault();
			<?php $_SESSION['modal'] = "rcv" ?>
			let btn = $(this);
			let id = btn.data('id');
			let num = btn.data('num');
			$.ajax({
				url: 'receiver_data.php',
				type: 'POST',
				dataType: 'json',
				data: {id, num,
				})
			.done(function(response) {
				$("#span_rcv_id").text(response["num"]);
				$("#rcv_id").attr('value', response["id"]);
				$("#rcv_name").attr('value', response["name"]);
				$("#rcv_phone").attr('value', response["phone"]);
				$("#rcv_address").attr('value', response["address"]);
			})
		});
		$("#btn-cancel").click(function(){
			event.preventDefault();
			$("#modal-receiver").modal('hide');
			$('#modal-order').modal('show');
		});
	});
</script>