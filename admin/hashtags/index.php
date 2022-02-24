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
require '../connect_database.php';
if ( isset($_GET['page']) ) {
	$index_page = $_GET['page'];
} else {
	$index_page = 1;
}

if ( isset($_GET['search']) ) {
	$content_search = $_GET['search'];
} else {
	$content_search = '';
}

$sql_count_hashtags = "SELECT count(*) FROM types WHERE name LIKE '%$content_search%'";
$count_hashtags = mysqli_fetch_array(mysqli_query($connect_database, $sql_count_hashtags))['count(*)'] ;
$limit_hashtags_per_page = 7;
$count_pages = ceil($count_hashtags / $limit_hashtags_per_page );
$hashtags_skip_by_page = ( $index_page - 1 ) * $limit_hashtags_per_page;


$sql_select = "
	SELECT * FROM types 
	WHERE name LIKE '%$content_search%'
	ORDER BY id DESC
	LIMIT $limit_hashtags_per_page
	OFFSET $hashtags_skip_by_page
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
			<th>Thêm sản phẩm vào thẻ này</th>
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
				<a href = "index_insert_products_to_hashtag.php?type_id=<?php echo $each_type['id']?>">
					Thêm sản phẩm
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

	<?php for ($i=1; $i <= $count_pages ; $i++) { ?>
		<a href="index.php?page=<?php echo $i ?>&search=<?php echo $content_search ?>"><?php echo $i ?></a>
	<?php } ?>
</div>



</body>
</html>