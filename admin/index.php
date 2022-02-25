<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style_validate1.css">
	<link rel="stylesheet" href="index3.css">
</head>
<body>
<?php require 'validate.php'; ?>
<form action = "process_login_admin.php" method="post">
	Tài khoản
	<input type="text" name="email"><br>
	Mật khẩu
	<input type="password" name="password"><br>
	<button>Đăng nhập</button>

</form>

</body>
</html>