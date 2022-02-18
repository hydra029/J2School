<?php 
require 'check_account.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="notify/notify.js"></script>
	<script src="notify/notify.min.js"></script>
	<style type="text/css">
		td {
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<?php 
	require 'connect.php';
	$customer_id = $_SESSION['customer_id'];
	$sql = "select * from receivers where customer_id = '$customer_id'";
	$result = mysqli_query($connect,$sql);
	$rows = mysqli_num_rows($result);
	$num = 0;
	?>
	<div id="div_tong" class="container">
		<?php require 'menu.php'; ?>
		<div id="div_tren">
			<h1 style="text-align: center ">
				Quản lý thông tin người nhận hàng
			</h1>
		</div>
		<div id="div_giua">
			<?php 
			if ($rows == 0) { ?>
				<h3 class="center">
					Chưa có thông tin người nhận, 
					<span>
						<a  data-toggle="modal" href="#modal-receiver-form" id="btn-crt-rcv">
							mời tạo thêm !
						</a>
					</span>
				</h3>
				<?php
			} else { 
				?>
				<p class="center">
					<a  data-toggle="modal" href="#modal-receiver-form" id="btn-crt-rcv" class="center">
						Tạo thêm
					</a>
				</p>
				<div id="div_table">
					<table width="700px" class="border" id="table1">
						<tr>
							<td>
								<b>
									STT
								</b>
							</td>
							<td>
								<b>
									Tên người nhận:
								</b>
							</td>
							<td>
								<b>
									Số điện thoại:
								</b>
							</td>
							<td width="200px">
								<b>
									Địa chỉ:
								</b>
							</td>
							<td>
								<b>
									Xoá
								</b>
							</td>
							<td>
								<b>
									Sửa
								</b>
							</td>
							<td>
								<b>
									Mặc định
								</b>
							</td>
						</tr>
						<?php 
						foreach ($result as $each):
							$num ++;
							?>
							<tr>
								<td>
									<span id="span-<?php echo $num ?>"><?php echo $num ?></span>
								</td>
								<td>
									<span class="span-name"><?php echo $each['name'] ?></span>
								</td>
								<td>
									<span class="span-phone"><?php echo $each['phone'] ?></span>
								</td>
								<td height="70px">
									<span class="span-address"><?php echo $each['address'] ?></span>
								</td>
								<td>
									<a href="receiver_delete_process.php?id=<?php echo $num ?>">
										Xoá
									</a>
								</td>
								<td>
									<a data-toggle="modal" href="#modal-receiver-form-change" id="btn-receiver-form" data-id="<?php echo $each['id'] ?>">
										Sửa
									</a>
								</td>
								<td class="center">
									<?php if ($each['status'] == 2) { ?>
										<button style="display: none;">
											<a data-toggle="modal" href="#modal-receiver" class="btn-receiver" data-id="<?php echo $each['id'] ?>" data-type="dfl">
												<span>
													Chọn
												</span>
											</a>
										</button>
										<span class="span-dfl">
											Mặc định
										</span>
									<?php } else {?>
										<button>
											<a data-toggle="modal" href="#modal-receiver" class="btn-receiver" data-id="<?php echo $each['id'] ?>" data-type="dfl">
												<span>
													Chọn
												</span>
											</a>
										</button>
										<span style="display: none;" class="span-dfl">
											Mặc định
										</span>
									<?php } ?>
								</td>
							</tr>
							<?php
						endforeach;
					}
					?>
				</table>
			</div>
			<br>
		</div>
		<div id="div_duoi">
			<?php 
			require 'footer.php';
			include 'receiver_form.php';
			include 'receiver_form_change.php';
			?>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-receiver").click(function() {
			event.preventDefault();
			let btn = $(this);
			let parent_tr = btn.parents("tr");
			let parent_tb = btn.parents("table");
			let id = btn.data('id');
			let type = btn.data('type');
			$.ajax({
				url: 'receiver_process.php',
				type: 'GET',
				data: {id, type},
			})
			.done(function(response) {
				parent_tb.find('button').show();
				parent_tr.find('button').hide();
				parent_tb.find('.span-dfl').hide();
				parent_tr.find('.span-dfl').show();
				$.notify("Thay đổi địa chỉ mặc định thành công", "success");
			})
		});
		$("#btn-receiver-delete").click(function() {
			event.preventDefault();
			let btn = $(this);
			let id = btn.data('id');
			$.ajax({
				url: 'receiver_delete_process.php',
				type: 'POST',
				data: {id},
			})
			.done(function() {
				location.reload();
			})
		});
		$("#btn-receiver-form").click(function() {
			event.preventDefault();
			let btn = $(this);
			let id = btn.data('id');
			$.ajax({
				url: 'receiver_data.php',
				type: 'POST',
				dataType: 'json',
				data: {id},
			})
			.done(function(response) {
				$("#span_rcv_id").text(response["id"]);
				$("#rcv_id").attr('value', response["id"]);
				$("#rcv_name").attr('value', response["name"]);
				$("#rcv_phone").attr('value', response["phone"]);
				$("#rcv_address").attr('value', response["address"]);
			})
		});
	});
</script>
<script type="text/javascript">
	if ("<?php echo $_SESSION['notify'] ?>" != "") {
		$.notify("<?php echo $_SESSION['notify'] ?>", "success");
		<?php unset($_SESSION['notify']) ?>
	}
</script>