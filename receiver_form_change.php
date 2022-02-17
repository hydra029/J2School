<div class="modal fade" id="modal-receiver-form-change">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 style="text-align: center; ">
					Sửa thông tin người nhận hàng
				</h3>
			</div>
			<div class="modal-body">
				<form id="form-receiver-change">
					<table height="300px" class="border" width="400px">
						<input type="hidden" name="id" id="rcv_id">
						<tr>
							<th colspan="2" class="center">
								Thông tin số <span id="span_rcv_id"></span>
							</th>
						</tr>
						<tr>
							<td class="left">
								Tên người nhận:
							</td>
							<td>
								<input type="text" name="name" id="rcv_name">
							</td>
						</tr>
						<tr>
							<td class="left">
								Số điện thoại người nhận:
							</td>
							<td>
								<input type="text" name="phone" id="rcv_phone">
							</td>
						</tr>
						<tr>
							<td class="left">
								Địa chỉ người nhận:
							</td>
							<td>
								<input type="text" name="address" id="rcv_address">
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
		$('#form-receiver-change').submit(function(event) {
			event.preventDefault();
			$.ajax({
				url: 'receiver_update.php',
				type: 'POST',
				data: $(this).serializeArray(),
			})
			.done(function(response) {
				$("#modal-receiver-form-change").modal(hide);
				$.notify("Thay đổi thành công", "success");
			})
		});
	});
</script>