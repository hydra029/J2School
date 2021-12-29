<?php require '../check_admin_login.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" href="../style_validate1.css">
</head>
<body>

<?php 
require '../connect_database.php';
$sql_command_select = "select * from manufacturers";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);



 ?>


<div class="all">
	<div class="left">
		<?php require '../menu.php'; ?>
	</div> 


	<div class="right">
		<div class="top">

		</div>

		<div class = "bot">

			<div class = "header">
				<h1 class =  "header" >Thêm vào sản phẩm</h1>
			</div>
			<br>


			<?php require '../validate.php' ?>
			<form method="post" action = "process_insert_products.php" enctype="multipart/form-data">
				Tên sản phẩm
				<input type="text" name="name"><br>
				Mô tả
				<textarea name = "description"></textarea><br>
				Giá thành
				<input type="text" name="price"><br>
				Hình ảnh
				<input type="file" name="image"><br>
				Nhà sản xuất
				
				
				<select name = "manufacturer_id">
					<?php foreach ($query_sql_command_select as $array_manufacturers): ?>
						<option value = "<?php echo $array_manufacturers['id'] ?>">
							<?php echo $array_manufacturers['name'] ?>
						</option>
					<?php endforeach ?>
				</select>
				

				<button>Thêm</button>

			</form>
	</div>
</div>


</body>
</html>