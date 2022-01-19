<?php 
session_start();
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
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div id="div_tong">
		<?php 
		require 'menu.php';
		if (isset($_SESSION['error'])) {
			?>
			<span class="error">
				<?php echo $_SESSION['error'] ?>
			</span>
			<?php 
			unset($_SESSION['error']);	
		}
		?>
		<?php
		if (isset($_SESSION['success'])) {
			?>
			<span class="success">
				<?php echo $_SESSION['success'] ?>
			</span>
			<?php 
			unset($_SESSION['success'])	
			?>
			<?php
		}
		?>
		<div id="div_tren">
		</div>
		<div id="div_giua">
			<form method="post" action="sign_in_process.php" onsubmit="kiem_tra()">
				<table class="border">
					<tr >
						<th colspan="2">
							<h3>
								Đăng nhập
							</h3>
						</th>
					</tr>
					<tr>
						<td>
							Tài khoản:
						</td>
						<td>
							<input type="text" name="email" id="email" value="<?php echo $customer_email ?>">
							<span class="error_span" id="email_error"></span>
						</td>
					</tr>
					<tr>
						<td>
							Mật khẩu:
						</td>
						<td>
							<input type="password" name="password" id="password" value="<?php echo $customer_password ?>">
							<span class="error_span" id="password_error"></span>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="left">
							<input type="checkbox" name="remember">Ghi nhớ đăng nhập
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
			<script type="text/javascript">
				function kiem_tra() {
					check = false;
					//Email_check
					let email = document.getElementById('email').value;
					if (email.length === 0){
					// 	event.preventDefault();
					// 	document.getElementById('email_error').innerHTML = 'Email không được để trống';	
					// 	check = true;
					// } else {
						let email_regex = /^\w([\.]?\w)*@[a-z]*\.[a-z]*/;
						if (email_regex.test(email) == false){
							event.preventDefault();
							document.getElementById('email_error').innerHTML = 'Email không hợp lệ';
							check = true;
						}
					}
					//password_check
					let password = document.getElementById('password').value;
					if (password.length === 0){
						event.preventDefault();
						document.getElementById('password_error').innerHTML = 'Mật khẩu không được để trống';	
						check = true;
					} else {
						let password_regex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8})/;
						if (password_regex.test(password) == false){
							event.preventDefault();
							document.getElementById('password_error').innerHTML = 'Mật khẩu quá non !!!';
							check = true;
						}
					}
					//check_dung
					if (check) {
						return false;
					}
				}
			</script>
		</div>
		<div id="div_duoi">
			<?php 
			require 'footer.php';
			?>
		</div>
	</div>
</body>
</html>