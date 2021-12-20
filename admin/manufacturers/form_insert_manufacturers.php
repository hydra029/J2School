<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../indexx.css">
	<link rel="stylesheet" href="../style_validate.css">
</head>
<body bgcolor="ABB1BA">



<div class = "all">
	<div class="top">
		<div class = "login">
			<a href="https://google.com">Đăng nhập</a>
		</div>
	</div> 

	<div class="left">
		<?php require '../menu.php'; ?>
	</div>

	<div class = "right">
		<h1 style = "text-align: center;">Thêm nhà sản xuất</h1>
		<form action = "process_insert_manufacturers.php" method = "post">
			Tên nhà sản xuất
			<input type="text" name="name"><br>
			Số điện thoại
			<input type="text" name="phone"><br>
			Địa chỉ
			<textarea name = "address"></textarea><br>
			Hình ảnh
			<input type="text" name="image"><br>
			<button>Thêm</button>
		</form>
	</div>
</div>

</body>
</html>