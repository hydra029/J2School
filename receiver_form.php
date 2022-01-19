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
	?>
	<div id="div_tong">
		<?php require 'menu.php'; ?>
		<div id="div_tren">
			<?php if (isset($_GET['type'])) {
				$type = $_GET['type'];
				$num = $_GET['id'];
				$sql = "select * from receivers where id = '$num' and customer_id = '$customer_id'";
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
			<form method="post" action="receiver_update.php" onsubmit="kiem_tra()">
				<table height="300px" class="border" >
					<input type="hidden" name="id" value="<?php echo $num ?>">
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
							<input type="text" name="name" id="name" value="<?php echo $each['name'] ?>">
							<span id="name_error"></span>
						</td>
					</tr>
					<tr>
						<td>
							Số điện thoại người nhận:
						</td>
						<td>
							<input type="text" name="phone" id="phone" value="<?php echo $each['phone'] ?>">
							<span id="phone_error"></span>
						</td>
					</tr>
					<tr>
						<td>
							Địa chỉ người nhận:
						</td>
						<td>
							<textarea name="address" id="address"><?php echo $each['address'] ?></textarea>
							<span id="address_error"></span>
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
					//phone_check
					let so_dien_thoai = document.getElementById('phone').value;
					if (so_dien_thoai.length === 0){
						event.preventDefault();
						document.getElementById('phone_error').innerHTML = 'Số điện thoại không được để trống';
						check = true;
					} else {
						let phone_regex = /^((\+84|84|0)[3|5|7|8|9])+([0-9]{8})\b/
						if (phone_regex.test(so_dien_thoai) == false){
							event.preventDefault();
							document.getElementById('phone_error').innerHTML = 'Số điện thoại không hợp lệ';
							check = true;
						} else {
							document.getElementById('phone_error').innerHTML = '';
						}
					}
					//address_check
					let dia_chi = document.getElementById('address').value;
					if (dia_chi.length === 0){
						event.preventDefault();
						document.getElementById('address_error').innerHTML = 'Tên không được để trống';
						check = true;
					} else {
						document.getElementById('address_error').innerHTML = '';
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
			mysqli_close($connect);
			?>
		</div>
	</div>
</body>
</html>