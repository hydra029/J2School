<?php 
session_start();
if (isset($_SESSION['customer_id'])) {
	header('location:index.php');
} else if (isset($_SESSION['admin_id'])) {
	header('location:admin/root/index_admin.php');
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
		?>
		<?php 
		if (isset($_SESSION['error'])) {
			?>
			<span class="error">
				<?php echo $_SESSION['error'] ?>
			</span>
			<?php 
			unset($_SESSION['error'])	
			?>
			<?php
		}if (isset($_SESSION['success'])) {
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
			<h3 id=header>
				Đăng ký
			</h3>
		</div>
		<div id="div_giua">
			<form method="post" action="sign_up_process.php" onsubmit="kiem_tra();">
				<table class="border">
					<tr>
						<th colspan="2">
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
							<button>
								Đăng ký
							</button>
						</td>
					</tr>
				</table>
			</form>
			<script type="text/javascript">
				function kiem_tra() {
					check = false;
					//name_check
					let ten = document.getElementById('name').value;
					if (ten.length === 0){
						event.preventDefault();
						document.getElementById('name_error').innerHTML = 'Tên không được để trống';
						check = true;
					} else {
						let name_regex = /^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*)*$/
						if (name_regex.test(ten) == false){
							event.preventDefault();
							document.getElementById('name_error').innerHTML = 'Tên không hợp lệ';
							check = true;
						} else {
							document.getElementById('name_error').innerHTML = '';
						}
					}
					//Gender_check
					let gender = document.getElementsByName('gender');
					if (gender[0].checked == true || gender[1].checked == true) {
						document.getElementById('gender_error').innerHTML = '';
					} else {
						event.preventDefault();
						document.getElementById('gender_error').innerHTML = 'Giới tính không được để trống';
					}
					//DoB_check
					let dob = document.getElementById('dob').value;
					if (dob.length === 0){
						event.preventDefault();
						document.getElementById('dob_error').innerHTML = 'Ngày sinh không được để trống';
						check = true;
					} else {
						document.getElementById('dob_error').innerHTML = '';
					}
					//Email_check
					let email = document.getElementById('email').value;
					if (email.length === 0){
						event.preventDefault();
						document.getElementById('email_error').innerHTML = 'Email không được để trống';	
						check = true;
					} else {
						let email_regex = /^\w([\.]?\w)*@[a-z]*\.[a-z]*/;
						if (email_regex.test(email) == false){
							document.getElementById('email_error').innerHTML = 'Email không hợp lệ';
							check = true;
						} else {
							document.getElementById('email_error').innerHTML = '';
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
							document.getElementById('password_error').innerHTML = 'Mật khẩu ít nhất 8 kí tự, bao gồm chữ hoa, chữ thường, số';
							check = true;
						} else {
							document.getElementById('password_error').innerHTML = '';
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