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
		session_start();
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
			<h3>
				Đăng ký
			</h3>
		</div>
		<div id="div_giua">
			<form method="post" action="sign_up_process.php">
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
							<input type="text" name="name">
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
							<input type="date" name="dob">
						</td>
					</tr>
					<tr>
						<td>
							Email:
						</td>
						<td>
							<input type="text" name="email">
						</td>
					</tr>
					<tr>
						<td>
							Mật khẩu:
						</td>
						<td>
							<input type="password" name="password">
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
		</div>
		<?php 
		require 'footer.php';
		?>
	</div>
</body>
</html>