<?php require '../check_super_admin_login.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
</head>


<?php require '../connect_database.php';
if ( empty($_GET['page']) ) {
	$index_page = 1;
} else {
	$index_page = $_GET['page'];	
}

// lấy ra tổng số hoạt động
$sql_select_count_activity = "SELECT count(*) FROM activities";
$count_activities = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_count_activity))['count(*)'] ;
// số hoạt động trên 1 trang
$activities_per_page = 14;
// số trang skip khi chuyển trang
$activities_skipped = ( $index_page - 1 ) * $activities_per_page;
//lấy ra tổng số trang
$pages = ceil($count_activities / $activities_per_page);

$sql_select_activity = "
	SELECT activities.*, admins.name as 'admin_name'
	FROM activities 
	LEFT JOIN admins on admins.id = activities.admin_id
	ORDER BY id DESC
	LIMIT $activities_per_page OFFSET $activities_skipped
";
$query_sql_select_activity = mysqli_query($connect_database, $sql_select_activity);

?>
	
<body> 
<?php require '../menu.php'; ?>
<div class="top">
<!-- 	<div class = "search">
		<form class = "form_search">
			Tìm kiếm
			<input type="search" name="search" value = "<?php echo $content_search ?>">
			<button>
				<img src="../style/style_image/icon_search.png" width="50px">
			</button>
		</form>
	</div> -->

	<div class = "login">
		<span>Xin chào <?php echo $_SESSION['name'] ?></span>
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
			<th>Người thao tác</th>
			<th>Hành động</th>
			<th>Đối tượng</th>
			<th>Tên đối tượng</th>
			<th>Vào lúc</th>
		</tr>
		<?php foreach ($query_sql_select_activity as $each_activity): ?>
		<tr>
			<td><?php echo $each_activity['id'] ?></td>
			<td><?php echo $each_activity['admin_name'] ?></td>
			<td><?php echo 'đã ' . $each_activity['activity'] ?></td>
			<td><?php echo $each_activity['object'] ?></td>
			<td><?php echo $each_activity['object_name'] ?></td>
			<td><?php echo $each_activity['time'] ?></td>
		</tr>
		<?php endforeach ?>
	</table>
	<?php for ($i=1; $i <= $pages; $i++) {  ?>
		<a href = "?page=<?php echo $i ?>"><?php echo $i ?></a>
	<?php } ?>


</div>


</body>
</html>