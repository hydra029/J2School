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
$id = $_GET['id'];
$sql_select = "SELECT * FROM types WHERE id = '$id'";
$type = mysqli_fetch_array(mysqli_query($connect_database, $sql_select));
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
	<form action = "process_change_name.php" method = "post">
		<input type="hidden" name="id" value = "<?php echo $id ?>">
		Tên mới
		<br>
		<input type="text" name="name" value = "<?php echo $type['name'] ?>">
		<br>
		<button>Đổi tên</button>
	</form>
</div>



</body>
</html>