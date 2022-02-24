<?php 
require '../check_admin_login.php';

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
if (empty($_GET['id'])){
	$_SESSION['error'] = 'Chưa nhập id thẻ cần đổi tên';
	header('location:index.php');
	exit;
}

$id = $_GET['id'];
require '../connect_database.php';
$sql_select = "SELECT * FROM types WHERE id = '$id'";
$query_sql_select = mysqli_query($connect_database, $sql_select);
$check_num_rows = mysqli_num_rows($query_sql_select);
if ( $check_num_rows != 1 ) {
	$_SESSION['error'] = 'Sai id thẻ cần đổi tên';
	header('location:index.php');
	exit;
}

$type_name = mysqli_fetch_array($query_sql_select)['name'];


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
		<h1 class =  "header" >ĐỔI TÊN THẺ <?php echo $type_name ?></h1>
	</div>
	<br>
	<?php require '../validate.php' ?>
	<br>
	<form action = "process_change_name.php" method = "post" id="form-change-name">
		<input type="hidden" name="id" value = "<?php echo $id ?>">
		Tên mới
		<br>
		<input type="text" name="name" value = "<?php echo $type_name ?>">
		<br>
		<button>Đổi tên</button>
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
	$("#form-change-name").validate({
		rules: {
			"name": {
				required: true,
				minlength: 3,
				validate_name: true
			}
		},
		messages: {
			"name": {
				required: "Bắt buộc nhập tên",
				minlength: "Hãy nhập ít nhất 3 ký tự"
			}
		}
	})
</script>

</body>
</html>