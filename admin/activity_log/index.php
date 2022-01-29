<?php require '../check_super_admin_login.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" href="../style_validate1.css">
</head>
<body>

<?php require '../connect_database.php';

$sql_select_activity = "SELECT * FROM activities ORDER BY id DESC";
$query_sql_select_activity = mysqli_query($connect_database, $sql_select_activity);
?>


<div class="all">
	<div class="left">
		<?php require '../menu.php'; ?>
	</div> 


	<div class="right">
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
				<h1 class =  "header" >LỊCH SỬ HOẠT ĐỘNG</h1>
			</div>
			<br>
			<?php require '../validate.php' ?>
			<table class="table">
				<tr>
					<th>Mã</th>
					<th>Hoạt động</th>
					<th>Vào lúc</th>
				</tr>
				<?php foreach ($query_sql_select_activity as $each_activity): ?>
				<tr>
					<td><?php echo $each_activity['id'] ?></td>
					<td><?php echo $each_activity['activity'] ?></td>
					<td><?php echo $each_activity['time'] ?></td>
				</tr>
				<?php endforeach ?>
			</table>

		</div>

	</div>

</div>


</body>
</html>