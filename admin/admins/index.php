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

if ( isset($_GET['search']) ) {
	$content_search = $_GET['search'];
} else {
	$content_search = '';
}

// lấy ra tổng số hoạt động
$sql_select_count_admins = "SELECT count(*) FROM admins WHERE name LIKE '%$content_search%' AND status = 1 ";
$count_admins = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_count_admins))['count(*)'] ;
// số hoạt động trên 1 trang
$admins_per_page = 14;
// số trang skip khi chuyển trang
$admins_skipped = ( $index_page - 1 ) * $admins_per_page;
//lấy ra tổng số trang
$pages = ceil($count_admins / $admins_per_page);

$sql_select_admins = "
	SELECT admins.*, IFNULL(MAX(activities.time), 'Chưa hoạt động lần nào') as 'last_time'
	FROM admins
	LEFT JOIN activities ON admins.id = activities.admin_id
	WHERE admins.name LIKE '%$content_search%' AND admins.status = 1
	GROUP BY admins.id
	LIMIT $admins_per_page OFFSET $admins_skipped
";

$query_sql_select_admins = mysqli_query($connect_database, $sql_select_admins);

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
		<h1 class =  "header" >CÁC NHÂN VIÊN CỦA CỬA HÀNG</h1>
	</div>
	<br>
	<?php require '../validate.php' ?>
	<table class="table">
		<tr>
			<th>Mã</th>
			<th>Tên</th>
			<th>Email</th>
			<th>Chức vụ</th>
			<th>Lần cuối hoạt động</th>
			<th>Xem chi tiết</th>
			<th>Xem lịch sử hoạt động</th>
			<th>Sa thải</th>
		</tr>
		<?php foreach ($query_sql_select_admins as $each_admin): ?>
		<tr>
			<td><?php echo $each_admin['id'] ?></td>
			<td><?php echo $each_admin['name'] ?></td>
			<td><?php echo $each_admin['email'] ?></td>
			<td>
				<?php if ( $each_admin['level'] == 1 ) { 
					echo 'Quản lí';
				} else {
					echo 'Nhân viên';
				} ?>
			</td>
			<td><?php echo $each_admin['last_time'] ?></td>
			<td>
				<a href="detail_admin.php?id=<?php echo $each_admin['id'] ?>">Xem</a>
			</td>
			<td>
				<a href="view_activities.php?id=<?php echo $each_admin['id'] ?>">Xem</a>
			</td>
			<td>
				<?php
				if ( $each_admin['level'] == 1 )  {
					echo '...';
				} else { ?>
					<a href="kick_admin.php?id=<?php echo $each_admin['id'] ?>">Sa thải</a>
			 	<?php } ?>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	<?php for ($i=1; $i <= $pages; $i++) {  ?>
		<a href = "?page=<?php echo $i ?>&search=<?php echo $content_search ?>"><?php echo $i ?></a>
	<?php } ?>


</div>


</body>
</html>