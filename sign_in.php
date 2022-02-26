<?php 
if (isset($_SESSION['customer_id'])) {
	header('location:index.php');
} else if (isset($_SESSION['admin_id'])) {
	header('location:admin/root/index_admin.php');
}
require 'connect.php';
$customer_email = '';
$customer_password = '';
if (isset($_COOKIE['remember'])) {
	$token = $_COOKIE['remember'];
	$sql = "select * from customers where token = '$token'";
	$result = mysqli_query($connect,$sql);
	$customer = mysqli_fetch_array($result);
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
		$customer_email = $customer['email'];
		$customer_password = $customer['password'];
		$customer_name = $customer['name'];
	}
}
?>
<div class="modal" id="modal-signin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="center">
					Đăng nhập
				</h3>
				<div class="alert alert-danger" id="div-error" style="display: none;"></div>
			</div>
			<div class="modal-body">
				<form id="form-signin">
					<table class="border left" width="400px" >
						<tr>
							<td>
								Tài khoản:
							</td>
							<td>
								<input class="form-control" type="text" name="email" id="email1" value="<?php echo $customer_email ?>">
							</td>
						</tr>
						<tr>
							<td>
								Mật khẩu:
							</td>
							<td>
								<input class="form-control" type="password" name="password" id="password1" value="<?php echo $customer_password ?>">
							</td>
						</tr>
						<tr>
							<td class="left">
								<input type="checkbox" name="remember" id="remember"> Ghi nhớ đăng nhập
							</td>
							<td class="right">
								<a data-toggle="modal" href="#modal-code" id="code">
									Quên mật khẩu
								</a>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="right">
								<button type="submit">
									Đăng nhập
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
<div class="modal" id="modal-code">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="center">
					Quên mật khẩu
				</h3>
			</div>
			<div class="modal-body">
				<form id="form-code">
					<table class="border left" width="400px" >
						<tr>
							<td>
								Tài khoản:
							</td>
							<td>
								<input class="form-control" type="text" name="email" id="email2">
								<input type="hidden" name="type" id="type" value="code">
							</td>
						</tr>
						<tr>
							<td colspan="2" class="center">
								<button type="submit">
									Nhận mã xác nhận
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
<div class="modal" id="modal-forgot">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>
					Quên mật khẩu
				</h3>
			</div>
			<div class="modal-body">
				<form id="form-forgot">
					<table class="border left" width="400px" >
						<tr>
							<td>
								Tài khoản:
							</td>
							<td>
								<input class="form-control" type="text" name="email" id="email3">
							</td>
						</tr>
						<tr>
							<td>
								Mã xác nhận:
							</td>
							<td>
								<input class="form-control" type="text" name="code" id="code">
							</td>
						</tr>
						<tr>
							<td>
								Mật khẩu mới:
							</td>
							<td>
								<input class="form-control" type="password" name="password" id="password3">
							</td>
						</tr>
						<tr>
							<td colspan="2" class="right">
								<button type="submit">
									Thay đổi
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
		if(window.location.href.indexOf('#modal-signin') != -1) {
			$('#modal-signin').modal('show');
		}
		$('#code').click(function(event) {
			$('#modal-code').show();
			$('#modal-signin').modal('hide');
		});
		$('#form-code').submit(function(event) {
			event.preventDefault();
		});
		$("#form-code").validate({
			rules: {
				"email": {
					required: true,
					email: true
				}
			},
			messages: {
				"email": {
					required: "Bắt buộc nhập email",
					email: "Hãy nhập đúng định dạng email"
				}
			},
			submitHandler: function(form) {
				$.ajax({
					url: 'forgot.php',
					type: 'POST',
					dataType: 'html',
					data: $("#code").serializeArray(),
				})
				.done(function(response) {
					if (response == 1) {
						$('#modal-forgot').show();
						$('#modal-code').modal('hide');
						$('#email3').text($('#email1').text());
						$.notify("Mời kiểm tra email của bạn", "info");
					} else {
						$.notify("Sai tài khoản hoặc mật khẩu", "error");
					}
				})
			}
		});
		$('#forgot').submit(function(event) {
			event.preventDefault();
		});
		$("#forgot").validate({
			rules: {
				"email": {
					required: true,
					email: true
				},
				"code": {
					required: true
				},
				"password": {
					required: true,
					validpass: true
				}
			},
			messages: {
				"email": {
					required: "Bắt buộc nhập email",
					email: "Hãy nhập đúng định dạng email"
				},
				"code": {
					required: "Bắt buộc nhập mã xác nhận"
				},
				"password": {
					required: "Bắt buộc nhập password"
				}
			},
		},
		submitHandler: function(form) {
			$.ajax({
				url: 'forgot.php',
				type: 'POST',
				dataType: 'html',
				data: $("#forgot").serializeArray(),
			})
			.done(function(response) {
				if (response == 1) {
					$.notify("Sai tài khoản hoặc mật khẩu", "error");
				} else {
					$("#modal-signin").modal('toggle');
					$("#menu-customer").show();
					$("#menu-guest").hide();
					$(".btn-cus").show();
					$("#user-name").text(response);
					$.notify("Đăng nhập thành công", "success");
				}
			})
		}
		$('#form-signin').submit(function(event) {
			event.preventDefault();
		});
		$("#form-signin").validate({
			rules: {
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
				"email": {
					required: "Bắt buộc nhập email",
					email: "Hãy nhập đúng định dạng email"
				},
				"password": {
					required: "Bắt buộc nhập password",
				}
			},
			submitHandler: function(form) {
				$.ajax({
					url: 'sign_in_process.php',
					type: 'POST',
					dataType: 'html',
					data: $("#form-signin").serializeArray(),
				})
				.done(function(response) {
					if (response == 1) {
						$.notify("Sai tài khoản hoặc mật khẩu", "error");
					} else {
						$("#modal-signin").modal('toggle');
						$("#menu-customer").show();
						$("#menu-guest").hide();
						$(".btn-cus").show();
						$("#user-name").text(response);
						$.notify("Đăng nhập thành công", "success");
					}
				})
			}
		});
	});
		$.validator.addMethod("validpass", function (value, element) {
			return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
		}, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
	</script>