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
	?>
	<div id="div_tong">
		<?php 
		require 'menu.php';
		?>
		<div id="div_tren">
			<h1 style="text-align: center; ">
				Đặt hàng
			</h1>
			<form>
				<input type="search" name="tim_kiem" value="" placeholder="tìm kiếm">
			</form>
		</div>
		<div id="div_giua" class="center">
			<form method="post" action="order_process.php">
				<table width="400px" height="300px"	class="border left">
				<tr>
					<td width="60%" class="left">
						Tên người nhận
					</td>
					<td>
						<input type="text" name="receiver_name">
					</td>	
				</tr>
				<tr>
					<td class="left">
						Số điện thoại người nhận:
					</td>
					<td>
						<input type="text" name="receiver_phone">
					</td>	
				</tr>
				<tr>
					<td class="left">
						Địa chỉ người nhận:
					</td>
					<td>
						<input type="text" name="receiver_address">
					</td>	
				</tr>
				<tr>
					<td class="left">
						Ghi chú:
					</td>
					<td>
						<textarea name="note">
							
						</textarea>
					</td>	
				</tr>
				<tr>
					<td colspan="2" class="center">
						<button>
							Đặt hàng
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