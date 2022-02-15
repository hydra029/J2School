<?php 
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$num = $_GET['id'];
$sql = "select * from receivers where id = '$num' and customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<h3 style="text-align: center; ">
	Sửa thông tin người nhận hàng
</h3>
<form id="form-receiver-change">
	<table height="300px" class="border" width="400px">
		<input type="hidden" name="id" value="<?php echo $num ?>">
		<tr>
			<th colspan="2" class="center">
				Thông tin số <?php echo $num ?>
			</th>
		</tr>
		<tr>
			<td class="left">
				Tên người nhận:
			</td>
			<td>
				<input type="text" name="name" id="name" value="<?php echo $each['name'] ?>">
			</td>
		</tr>
		<tr>
			<td class="left">
				Số điện thoại người nhận:
			</td>
			<td>
				<input type="text" name="phone" id="phone" value="<?php echo $each['phone'] ?>">
			</td>
		</tr>
		<tr>
			<td class="left">
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
