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
		});
		$("#form-receiver").validate({
			rules: {
				"name": {
					required: true,
					validname: true
				},
				"phone": {
					required: true,
					validphone: true
				},
				"address": {
					required: true
				}
			},
			messages: {
				"name": {
					required: "Bắt buộc nhập họ và tên"
				},
				"phone": {
					required: "Bắt buộc nhập số điện thoại"
				},
				"address": {
					required: "Bắt buộc nhập địa chỉ",
				}
			},
			submitHandler: function(form) {
				$.ajax({
					url: 'receiver_update.php',
					type: 'POST',
					data: $('#form-receiver-change').serializeArray(),
				})
				.done(function(response) {
					location.reload();
				})
			}
		});
	});
	$.validator.addMethod("validname", function (value, element) {
		return this.optional(element) || /^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]+(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]+)*$/.test(value);
	}, "Hãy nhập họ và tên đầy đủ, viết hoa chữ cái đầu của họ và tên");
	$.validator.addMethod("validphone", function (value, element) {
		return this.optional(element) || /^(\+84|84|0|0084)(([3[2-9])|(5[6|8|9])|(7[0|6|7|8|9])|(8[1-9])|(9[1-4|6-9])){2}[0-9]{7}$/.test(value);
	}, "Hãy nhập đúng số điện thoại");
</script>