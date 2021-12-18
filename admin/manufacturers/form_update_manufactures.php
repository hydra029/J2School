<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../indexx.css">
</head>
<body bgcolor="ABB1BA">

<?php require '../connect_database.php';

$id = $_GET['id'];
$sql_command_select = "select * from manufacturers where id = '$id'";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$array_manufacturers = mysqli_fetch_array($query_sql_command_select);

$count_rows = mysqli_num_rows($query_sql_command_select);
if ($count_rows === 1){
 ?>


<div class="all">
	<div class="top">
		<div class = "login">
			<a href="https://google.com">Đăng nhập</a>
		</div>
	</div> 

	<div class="left">
		<?php require '../menu.php'; ?>
	</div>

	<div class = "right">
		<h1 style = "text-align: center;">Sửa nhà sản xuất</h1>
		<form action = "process_update_manufacturers.php" method = "post">
			<input type="" name="id" value = "<?php echo $array_manufacturers['id'] ?>" hidden>
			Tên nhà sản xuất
			<input type="text" name="name" value="<?php echo $array_manufacturers['name'] ?>"><br>
			Số điện thoại
			<input type="text" name="phone" value="<?php echo $array_manufacturers['phone'] ?>"><br>
			Địa chỉ
			<textarea name = "address"><?php echo $array_manufacturers['address'] ?></textarea><br>
			Hình ảnh
			<input type="text" name="image" value="<?php echo $array_manufacturers['image'] ?>"><br>
			<button>Sửa</button>
		</form>
	</div>

</div>

<?php }else{ ?>
<h1>Không tìm thấy bài theo mã này</h1>
<?php } ?>

</body>
</html>