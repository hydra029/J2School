<div class="modal" id="modal-signup">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="center">
					Đăng ký
				</h3>
				<div class="alert alert-danger" id="div-error" style="display: none;"></div>
			</div>
			<div class="modal-body">
				<form id="form-signup" method="POST">
					<table class="border left" width="500px">
						<tr>
							<th colspan="2" class="center">
								Điền đầy đủ các thông tin
							</th>
						</tr>
						<tr>
							<td>
								Họ và Tên:
							</td>
							<td>
								<input class="form-control" type="text" name="name" id="name">
							</td>
						</tr>
						<tr>
							<td>
								Giới tính
							</td>
							<td>
								<input type="radio" name="gender" value="male"> Nam
								<input type="radio" name="gender" value="female"> Nữ
							</td>
						</tr>
						<tr>
							<td>
								Ngày sinh:
							</td>
							<td>
								<input class="form-control" type="date" name="dob" id="dob">
							</td>
						</tr>
						<tr>
							<td>
								Email:
							</td>
							<td>
								<input class="form-control" type="text" name="email" id="email">
							</td>
						</tr>
						<tr>
							<td>
								Mật khẩu:
							</td>
							<td>
								<input class="form-control" type="password" name="password" id="password">
							</td>
						</tr>
						<tr>
							<td colspan="2" class="center">
								<button id="btn-submit-signup" type="submit">
									Đăng ký
								</button>
							</td>
						</tr>
					</table>
				</form>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>
						Cancel
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		if(window.location.href.indexOf('#modal-signup') != -1) {
			$('#modal-signup').modal('show');
		}
		$('#form-signup').submit(function(event) {
			event.preventDefault();
		});
		$("#form-signup").validate({
			rules: {
				"name": {
					required: true,
					validname: true
				},
				"gender": {
					required: true,
				},
				"dob": {
					required: true
				},
				"email": {
					required: true,
					email: true
				},
				"password": {
					required: true,
					validpass: true
				}
			},
			messages: {
				"name": {
					required: "Bắt buộc nhập họ và tên"
				},
				"gender": {
					required: "Bắt buộc nhập giới tính"
				},
				"dob": {
					required: "Bắt buộc nhập ngày sinh",
				},
				"email": {
					required: "Bắt buộc nhập eamil",
					email: "Hãy nhập đúng định dạng email"
				},
				"password": {
					required: "Bắt buộc nhập password",
				}
			},
			submitHandler: function(form) {
				$.ajax({
					url: 'sign_up_process.php',
					type: 'POST',
					dataType: 'html',
					data: $("#form-signup").serializeArray(),
				})
				.done(function(response) {
					if (response == 1) {
						$("#modal-signup").modal('hide');
						$.notify("Đăng ký thành công", "success");
					} else {
						$.notify("Tài khoản đã tồn tại", "error");
					}
				})
			}
		});
	});
	$.validator.addMethod("validpass", function (value, element) {
		return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
	}, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
	$.validator.addMethod("validname", function (value, element) {
		return this.optional(element) || /^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]+(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]+)*$/.test(value);
	}, "Hãy nhập họ và tên đầy đủ, viết hoa chữ cái đầu của họ và tên");
</script>