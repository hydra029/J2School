<style type="text/css">
	a {
		text-decoration: none;

	}
	a:link {
		color: blue;
	}
	a:visited {
		color: blue;
	}
	a:hover {
		color: red;			
		text-decoration: underline;
	}
	a:active {
		color: yellow;
	}
	ul {
		list-style-type: none;
		padding: 0;
	}
	ul li ul li {
		background: ghostwhite;
		border-color: black;	
	}
	ul li ul {
		display: none;
		width: 700px;
	}
	ul > li:hover ul {
		margin-top: 0;
		display: block;
		position: absolute;
		top: 51px;
		left: -1px;
	}
	ul li {	
		float: left;
		position:  relative;
		background: lightgray;
		width: 150px;
		border: 1px solid black;
		height: 50px;
	}
	#div_tong {

		min-height: 800px;
		max-height: 6000px;
		position: relative;
	}
	#div_tren {
		text-align: center;
		height: 150px;
	}
	#div_giua {
		min-height: 500px;
		max-height: 4900px;

	}
	#div_duoi {
		height: 100px;
		text-align: center;
		position: relative;
		bottom: 0px;

	}
	p {
		text-align: center;
	}
	.right {
		text-align: right;
	}	
	.left {
		text-align: left;
	}
	.center {
		text-align: center;
	}
	.border {
		border: 1px solid black;
	}
	.no_border {
		border: none;
	}
	table {
		margin: auto	;
	}
	.error {
		color: red;
		text-align: left;
	}

	.success {
		color: green;
	}
</style>

<ul>
	<li> 
		<a href="#">
			<p>
				Menu
			</p>
		</a>
		<ul>
			<li> 
				<a href="index.php">
					<p>
						Trang chủ
					</p>
				</a> 
			</li>	
			<?php 
			if (isset($_SESSION['customer_id'])) {
				?>
				<li> 
					<a href="cart.php">
						<p>
							Giỏ hàng
						</p>
					</a> 
				</li>
				<li> 
					<a href="order.php?status=2">
						<p>
							Hoá đơn
						</p>
					</a> 
				</li>
				<li> 
					<a href="sign_out.php">
						<p>
							Đăng xuất
						</p>
					</a> 
				</li>
			<?php } else { ?>
				<li> 
					<a href="sign_in.php">
						<p>
							Đăng nhập
						</p>
					</a> 
				</li>
				<li> 
					<a href="sign_up.php">
						<p>
							Đăng ký
						</p>
					</a> 
				</li>
				<?php
			}
			?>
		</ul>
	</li>
</ul>
<br>
<br>
<br>