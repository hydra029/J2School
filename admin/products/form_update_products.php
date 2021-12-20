<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../indexx.css">
	<link rel="stylesheet" href="../style_validate.css">
</head>
<body bgcolor="ABB1BA">


<?php 
require '../connect_database.php';
$id = $_GET['id'];
$sql_command_select_products = "select * from products where id = '$id' ";
$query_sql_command_select_products = mysqli_query($connect_database, $sql_command_select_products);

$sql_command_select_manufacturers = "select * from manufacturers";
$query_sql_command_select_manufacturers = mysqli_query($connect_database, $sql_command_select_manufacturers);

$array_products = mysqli_fetch_array($query_sql_command_select_products);


 ?>




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
		<h1 style="text-align: center;">Sửa sản phẩm</h1>
		<form method="post" action = "process_update_products.php" enctype="multipart/form-data">
			<input type="" name="id" value = "<?php echo $array_products['id'] ?>" hidden>
			Tên sản phẩm
			<input type="text" name="name" value = "<?php echo $array_products['name'] ?>"><br>
			Mô tả
			<textarea name = "description"><?php echo $array_products['description'] ?></textarea><br>
			Giá thành
			<input type="text" name="price" value = "<?php echo $array_products['price'] ?>"><br>
			Đổi ảnh mới
			<input type="file" name="image_new"><br>
			Hoặc giữ hình ảnh cũ
			<img src="<?php echo $array_products['image'] ?>" width = "100px"><br>
			<input type="hidden" name="image_old" value="<?php echo $array_products['image'] ?>"><br>
			Nhà sản xuất
			
			
			<select name = "manufacturer_id">
				<?php foreach ($query_sql_command_select_manufacturers as $array_manufacturers): ?>
					<option 
						value = "<?php echo $array_manufacturers['id'] ?>"
						<?php if($array_products['manufacturer_id'] == $array_manufacturers['id']) { ?>
						selected
						<?php } ?>
					>
						<?php echo $array_manufacturers['name'] ?>
					</option>
				<?php endforeach ?>
			</select>
			
			<button>Sửa</button>

		</form>
	</div>
</div>


</body>
</html>