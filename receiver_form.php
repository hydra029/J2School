<?php 
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
?>
<div class="modal fade" id="modal-receiver-form">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<?php 
				$sql = "select * from receivers where customer_id = '$customer_id'";
				$result = mysqli_query($connect,$sql);
				$rows = mysqli_num_rows($result);
				$rows = (int)$rows;
				$num = $rows + 1;
				?>
				<h3 style="text-align: center; ">
					Thêm thông tin người nhận hàng
				</h3>
			</div>
			<div class="modal-body">
				<form id="form-receiver">
					<table height="300px" class="border" width="400px">
						<input type="hidden" name="id" value="<?php echo $num ?>">
						<tr>
							<th colspan="2" class="center">
								Thông tin số <?php echo $num ?>
							</th>
						</tr>
						<tr>
							<td class="left">
								Tên người nhận:
							</td>
							<td>
								<input type="text" name="name" id="name"">
							</td>
						</tr>
						<tr>
							<td class="left">
								Số điện thoại người nhận:
							</td>
							<td>
								<input type="text" name="phone" id="phone">
							</td>
						</tr>
						<tr>
							<td class="left">
								Địa chỉ người nhận:
							</td>
							<td>
								<textarea name="address" id="address"></textarea>
								<span id="address_error"></span>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="center">
								<button>
									Xác nhận
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
		$('#form-receiver').submit(function(event) {
			event.preventDefault();
			$.ajax({
				url: 'receiver_process_create.php',
				type: 'POST',
				dataType: 'html',
				data: $(this).serializeArray(),
			})
			.done(function() {
				$("#modal-receiver-form").modal("toggle");
				location.reload();
			})
		});
	});
</script>