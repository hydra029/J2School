<?php 
require 'check_account.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
	require 'connect.php';
	require 'announce.php';
	$customer_id = $_SESSION['customer_id'];
	$type = $_GET['type'];
	?>
	<div id="div_tong">
		<?php require 'menu.php'; ?>
		<div id="div_tren">
			<?php if ($type == 'change') {
				$num = $_GET['id'];
				$num = $num;
				$sql = "select * from receivers where id = '$num'";
				$result = mysqli_query($connect,$sql);
				$each = mysqli_fetch_array($result);
				?>
				<h1 style="text-align: center; ">
					Đây là trang sửa thông tin người nhận hàng
				</h1>
				<?php
			} else {
				$sql = "select * from receivers where customer_id = '$customer_id'";
				$result = mysqli_query($connect,$sql);
				$rows = mysqli_num_rows($result);
				$rows = (int)$rows;
				$num = $rows + 1;
				$each['name'] = '';
				$each['phone'] = '';
				$each['address'] = '';
				?>
				<h1 style="text-align: center; ">
					Đây là trang thêm thông tin người nhận hàng
				</h1>
				<?php
			} ?>
		</div>
		<div id="div_giua">
			<form method="post" action="receiver_process.php" type="create">
				<table height="300px" class="border" >
					<tr>
						<th colspan="2">
							Thông tin số <?php echo $num ?>
						</th>
					</tr>
					<tr>
						<td>
							Tên người nhận:
						</td>
						<td>
							<input type="text" name="name" value="<?php echo $each['name'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							Số điện thoại người nhận:
						</td>
						<td>
							<input type="text" name="phone" value="<?php echo $each['phone'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							Địa chỉ người nhận:
						</td>
						<td>
							<textarea name="address"><?php echo $each['address'] ?></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="center">
							<button>
								Xác nhận
							</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="div_duoi">
			<?php 
			require 'footer.php';
			mysqli_close($connect);
			?>
		</div>
	</div>
</body>
</html>