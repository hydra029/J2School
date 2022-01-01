<?php 
require 'check_account.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		td {
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<?php 
	require 'connect.php';
	require 'announce.php';
	if (isset($_GET['page'])) {
		$_SESSION['page'] = $_GET['page'];
	} else {
		$_SESSION['page'] = 'receiver';
	}
	$customer_id = $_SESSION['customer_id'];
	$sql = "select * from receivers where customer_id = '$customer_id'";
	$result = mysqli_query($connect,$sql);
	$rows = mysqli_num_rows($result);
	$num = 0;
	?>
	<div id="div_tong">
		<?php require 'menu.php'; ?>
		<div id="div_tren">
			<h1 style="text-align: center ">
				Đây là trang quản lý thông tin người nhận hàng
			</h1>
		</div>
		<div id="div_giua">
			<?php 
			if ($rows == 0) { ?>
				<h3  class="center">
					Chưa có thông tin người nhận, 
					<span>
						<a href="receiver_form.php">
							mời tạo thêm !
						</a>
					</span>
				</h3>
				<?php
			} else { 
				?>
				<p>
					<a href="receiver_form.php" class="center">
						Tạo thêm
					</a>
				</p>
				<table width="700px" class="border">
					<tr>
						<td>
							STT
						</td>
						<td>
							Tên người nhận:
						</td>
						<td>
							Số điện thoại:
						</td>
						<td width="200px" >
							Địa chỉ:
						</td>
						<td>
							Xoá
						</td>
						<td>
							Sửa
						</td>
						<td>
							Mặc đình
						</td>
					</tr>
					<?php 
					foreach ($result as $each):
						$num ++;
						?>
						<tr>
							<td>
								<?php echo $num ?>
							</td>
							<td>
								<?php echo $each['name'] ?>
							</td>
							<td>
								<?php echo $each['phone'] ?>
							</td>
							<td height="70px">
								<?php echo $each['address'] ?>
							</td>
							<td>
								<a href="receiver_delete_process.php?id=<?php echo $num ?>">
									Xoá
								</a>
							</td>
							<td>
								<a href="receiver_form.php?id=<?php echo $num ?>&type=change">
									Sửa
								</a>
							</td>
							<td class="center">
								<?php if ($each['status'] == 0) { ?>
									<button>
										<a href="receiver_process.php?id=<?php echo $each['id'] ?>&type=1">
											Chọn
										</a>
									</button>
								<?php } else {?>
									Mặc định
								<?php } ?>
							</td>
						</tr>
						<?php
					endforeach;
				}
				?>
			</table>
			<br>
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