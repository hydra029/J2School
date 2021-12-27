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
			<form method="post" action="sign_in_process.php">
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
							<input type="text" name="email" value="<?php echo $customer_email ?>">
						</td>
					</tr>
					<tr>
						<td>
							Mật khẩu:
						</td>
						<td>
							<input type="password" name="password" value="<?php echo $customer_password ?>">
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
		</div>
<div id="div_duoi">
			<?php 
			require 'footer.php';
			?>
		</div>
	</div>
</body>
</html>