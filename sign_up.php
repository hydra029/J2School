<div class="modal" id="modal-signup">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form-signup">
				<table class="border" width="500px">
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
							<input type="text" name="name" id="name">
							<span class="error_span" id="name_error"></span>
						</td>
					</tr>
					<tr>
						<td>
							Giới tính
						</td>
						<td>
							<input type="radio" name="gender" value="male"> Nam
							<input type="radio" name="gender" value="female"> Nữ
							<span class="error_span" id="gender_error"></span>
						</td>
					</tr>
					<tr>
						<td>
							Ngày sinh:
						</td>
						<td>
							<input type="date" name="dob" id="dob">
							<span class="error_span" id="dob_error"></span>
						</td>
					</tr>
					<tr>
						<td>
							Email:
						</td>
						<td>
							<input type="text" name="email" id="email">
							<span class="error_span" id="email_error"></span>
						</td>
					</tr>
					<tr>
						<td>
							Mật khẩu:
						</td>
						<td>
							<input type="password" name="password" id="password">
							<span class="error_span" id="password_error"></span>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="center">
							<button id="btn-submit-signup">
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
<script type="text/javascript">
	$(document).ready(function() {
		if(window.location.href.indexOf('#modal-signup') != -1) {
			$('#modal-signup').modal('show');
		}
		$('#form-signup').submit(function(event) {
			event.preventDefault();
			$.ajax({
				url: 'sign_up_process.php',
				type: 'POST',
				dataType: 'html',
				data: $(this).serializeArray(),
			})
			.done(function(response) {
				if (response !== 1) {
					$("$div-error").text(response);
					$("$div-error").show();
				} else {
					$("#modal-signup").toggle();
					$("#menu-customer").show();
					$("#menu-guest").hide();
				}
			})
		});
	});
</script>