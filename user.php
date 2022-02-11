<?php require "check_account.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<title></title>
</head>
<body>
	<div id="div_tong" class="container">
		<div id="div_tren">
			<?php 
			require 'connect.php';
			require 'menu.php';
			$customer_id = $_SESSION['customer_id'];
			$sql = "select * from customers where id = '$customer_id'";
			$result = mysqli_query($connect,$sql);
			$user = mysqli_fetch_array($result);
			?>
		</div>
		<div id="div_giua">
			<table class="border" width="300px">
				<tr>
					<td>
						Tên người dùng
					</td>
					<td>
						<input type="text" name="name" value="<?php echo $user['name'] ?>">
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
						<input type="date" name="dob" id="dob" value="<?php echo $user['dob'] ?>">
					</td>
				</tr>
				<tr>
					<td>
						Email:
					</td>
					<td>
						<input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">
					</td>
				</tr>
				<tr>
					<td>
						Mật khẩu:
					</td>
					<td>
						<input type="password" name="password" id="password" value="<?php echo $user['password'] ?>">
					</td>
				</tr>
				<tr>
					<td colspan="2" class="center">
						<button id="btn-change-signup">
							Thay đổi
						</button>
					</td>
				</tr>
			</table>
		</div>
		<div id="div_duoi" class="container">
			<div>
				<?php
				mysqli_close($connect);
				require 'footer.php';
				?>
			</div>
		</div>
	</div>
</body>
</html>