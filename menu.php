<?php 
if (empty($_SESSION['customer_id'])) {
	?>
	<div style=" background: none; padding: 10px 0px;" class="center" id="menu-guest">
		<div class="left" style="float: left;">
			<a href="index.php" class="left">
				Trang chủ
			</a>
		</div>
		<div class="right">
			<a data-toggle="modal" href="#modal-signup" id="btn-signup">
				Đăng ký
			</a>
			|
			<a data-toggle="modal" href="#modal-signin" id="btn-signin">
				Đăng nhập
			</a>
			<?php
			include 'sign_up.php';
			include 'sign_in.php';
			?>
		</div>
	</div>
	<div style=" background: none; display: none; padding: 10px 0px;" class="center" id="menu-customer">
		<div class="left" style="float: left;">
			<a href="index.php" class="left">
				Trang chủ
			</a>
		</div>
		<div class="right"> 
			<a href="cart.php">
				Giỏ hàng
			</a>
			|
			<a href="order.php">
				Đơn hàng
			</a>
			|
			<a href="receiver.php">
				Địa chỉ giao hàng
			</a>
			| Xin chào 
			<a href="user.php">
				<span style="color: red" id="user-name">

				</span>
			</a>
			| 
			<a href="sign_out.php">
				Đăng xuất
			</a> 
		</div>
	</div>
	<?php
} else { ?>
	<div style=" background: none; padding: 10px 0px;" class="center">
		<div class="left" style="float: left;">
			<a href="index.php" class="left">
				Trang chủ
			</a>
		</div>
		<div class="right"> 
			<a href="cart.php">
				Giỏ hàng
			</a>
			|
			<a href="order.php">
				Đơn hàng
			</a>
			|
			<a href="receiver.php">
				Địa chỉ giao hàng
			</a>
			| Xin chào 
			<a href="user.php">
				<span style="color: red" id="user-name">
					<?php echo $_SESSION['customer_name']; ?> 
				</span> 
			</a>
			| 
			<a href="sign_out.php">
				Đăng xuất
			</a> 
		</div>
	</div>
<?php } ?>
