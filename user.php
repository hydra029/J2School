<?php require "check_account.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="notify/notify.js"></script>
	<script src="notify/notify.min.js"></script>
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
			<form id="form-user-change">
				<table class="border" width="300px">
					<tr>
						<td>
							Tên người dùng
						</td>
						<td>
							<input id="name" type="text" name="name" value="<?php echo $user['name'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							Giới tính
						</td>
						<td>
							<input id="male" type="radio" name="gender" value="male" <?php if ($user['gender'] == 'male') {echo 'checked';} ?>> Nam
							<input id="female" type="radio" name="gender" value="female" <?php if ($user['gender'] == 'female') {echo 'checked';} ?>> Nữ
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
							<?php echo $user['email'] ?>
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
							<button>
								Thay đổi
							</button>
						</td>
					</tr>
				</table>
			</form>
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
<script type="text/javascript">
	$(document).ready(function() {
		$("#form-user-change").submit(function(event) {
			event.preventDefault();
			$.ajax({
				url: 'user_process.php',
				type: 'POST',
				data: $(this).serializeArray(),
			})
			.done(function() {
				$.notify("Thay đổi thành công", "success");
			})
		});
	});
</script>