<?php require '../check_super_admin_login.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="style_chart.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
</head>


<?php 
require '../connect_database.php';
$sql_select = "
	SELECT * FROM types ORDER BY id DESC
";
$query_sql_select = mysqli_query($connect_database, $sql_select);

?>
	
<body> 
<?php require '../menu.php'; ?>
<div class="top">
	<div class = "search">
		<form class = "form_search">
			Tìm kiếm
			<input type="search" name="search" value = "<?php echo $content_search ?>">
			<button>
				<img src="../style/style_image/icon_search.png" width="50px">
			</button>
		</form>
	</div>

	<div class = "login">
		<a class = "login" href="https://google.com">Đăng nhập</a>
	</div> 
</div>

<div class = "bot">
	<div class = "header">
		<h1 class =  "header" >QUẢN LÍ GẮN THẺ</h1>
	</div>
	<br>
	<?php require '../validate.php' ?>
	<br>
	<table>
		<tr>
			<th>Mã</th>
			<th>Tên thẻ</th>
			<th>Xem sản phẩm sử dụng thẻ này</th>
			<th>Đổi tên thẻ</th>
			<th>Xóa thẻ</th>
		</tr>
		<?php foreach ($query_sql_select as $each_type) { ?>
		<tr>
			<td>
				<?php echo $each_type['id'] ?>
			</td>	
			<td>
				<?php echo $each_type['name'] ?>
			</td>
			<td>
				<a href = "products_linked_hashtag.php?id=<?php echo $each_type['id'] ?>">
					Xem sản phẩm
				</a>
			</td>
			<td>
				<a href = "form_change_name.php?id=<?php echo $each_type['id'] ?>">
					Đổi tên
				</a>
			</td>
			<td>
				<a href = "delete_type.php?id=<?php echo $each_type['id'] ?>">
					Xóa thẻ
				</a>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>



</body>
</html>