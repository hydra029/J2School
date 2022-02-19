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
				<h3>
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
								<input class="form-control" type="text" name="email" id="email" value="<?php echo $customer_email ?>">
							</td>
						</tr>
						<tr>
							<td>
								Mật khẩu:
							</td>
							<td>
								<input class="form-control" type="password" name="password" id="password" value="<?php echo $customer_password ?>">
							</td>
						</tr>
						<tr>
							<td colspan="2" class="left">
								<input type="checkbox" name="remember"> Ghi nhớ đăng nhập
							</td>
						</tr>
						<tr>
							<td colspan="2" class="right">
								<button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script> -->
<script type="text/javascript">
	$(document).ready(function() {
		if(window.location.href.indexOf('#modal-signin') != -1) {
			$('#modal-signin').modal('show');
		}
		$("#form-signin").validate({
			rules: {
				"email": {
					required: true,
					email: true
				},
				"password": {
					required: true,
				}
			},
			messages: {
				"email": {
					required: "Bắt buộc nhập username",
					email: "Hãy nhập đúng định dạng email"
				},
				"password": {
					required: "Bắt buộc nhập password",
				}
			},
			summitHandler: function(form) {
				e.preventDefault();
				alert(1);
				$.ajax({
					url: 'sign_in_process.php',
					type: 'POST',
					dataType: 'html',
					data: $("#form-signin").serializeArray(),
				})
				.done(function(response) {
					if (response == 1) {
						$("$div-error").text() = "Sai thông tin đăng nhập";
						$("$div-error").show();
					} else {
						$("#modal-signin").modal('toggle');
						$("#menu-customer").show();
						$("#menu-guest").hide();
						$(".btn-cus").show();
						$("#span-name").text(response);
					}
				})
			}
		});
	});
</script>