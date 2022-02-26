<?php 
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
?>
<div class="modal fade" id="modal-receiver-form">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<?php 
				$sql = "select * from receivers where customer_id = '$customer_id' and status <> '2'";
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
					<table height="300px" class="border left" width="400px">
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
								<input type="text" name="name" id="name" class="form-control">
							</td>
						</tr>
						<tr>
							<td class="left">
								Số điện thoại người nhận:
							</td>
							<td>
								<input type="text" name="phone" id="phone" class="form-control">
							</td>
						</tr>
						<tr>
							<td class="left">
								Địa chỉ người nhận:
							</td>
							<td>
								<textarea name="address" id="address" class="form-control"></textarea>
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
					url: 'receiver_process_create.php',
					type: 'POST',
					dataType: 'html',
					data: $('#form-receiver').serializeArray(),
				})
				.done(function() {
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