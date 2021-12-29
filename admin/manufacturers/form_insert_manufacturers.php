<?php require '../check_super_admin_login.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" href="../style_validate1.css">
</head>  
<body>

<div class="all">
	<div class="left">
		<?php require '../menu.php'; ?>
	</div> 


	<div class="right">
		<div class="top">

		</div>

		<div class = "bot">

			<div class = "header">
				<h1 class =  "header" >Thêm nhà sản xuất</h1>
			</div>
			<br>

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