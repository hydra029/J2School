<?php require '../check_super_admin_login.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" href="../style_validate1.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
	<link rel="stylesheet" type="text/css" href="style_detail_customer_1.css">
</head>

<?php require '../connect_database.php';
$id = $_GET['id'];

$sql_select_customers = "
	SELECT 
	admins.*, 
    IfNULL((SELECT ifnull(COUNT(*), 0)
    FROM activities
    LEFT JOIN admins ON admins.id = activities.admin_id
    WHERE admins.id = '$id' and activities.activity = 'duyệt'
    GROUP BY admins.id),0) as 'count_approve_receipts',
    IfNULL((SELECT ifnull(COUNT(*), 0)
    FROM activities
    LEFT JOIN admins ON admins.id = activities.admin_id
    WHERE admins.id = '$id' and activities.activity = 'hoàn thành'
    GROUP BY admins.id),0) as 'count_success_receipts',
    IfNULL((SELECT ifnull(COUNT(*), 0)
    FROM activities
    LEFT JOIN admins ON admins.id = activities.admin_id
    WHERE admins.id = '$id' and activities.activity = 'hủy'
    GROUP BY admins.id),0) as 'count_reject_receipts',
    IFNULL((SELECT ifnull(COUNT(*), 0)
    FROM activities
    LEFT JOIN admins ON admins.id = activities.admin_id
    WHERE admins.id = '$id' and activities.activity = 'thêm' and activities.object = 'sản phẩm'
    GROUP BY admins.id), 0) as 'count_products_added',
    IFNULL((SELECT ifnull(COUNT(*), 0)
    FROM activities
    LEFT JOIN admins ON admins.id = activities.admin_id
    WHERE admins.id = '$id' and activities.activity = 'thêm' and activities.object = 'thẻ'
    GROUP BY admins.id), 0) as 'count_hashtags_added'
FROM activities
LEFT JOIN admins ON admins.id = activities.admin_id
WHERE admins.id = '$id'
GROUP BY admins.id
";
$query_sql_select_admins = mysqli_query($connect_database, $sql_select_customers);
$each_admin = mysqli_fetch_array($query_sql_select_admins);

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
		<?php if ( $each_admin['level'] == 1 ) { ?>
			<h1 class =  "header" >CHI TIẾT VỀ QUẢN LÍ</h1>
		<?php } else { ?>
			<h1 class =  "header" >CHI TIẾT VỀ NHÂN VIÊN</h1>
		<?php } ?>
	</div>
	<br>
	<?php require '../validate.php' ?>

	<div id="container">	
		<div class="product-details">
		<h1><?php echo $each_admin['name'] ?></h1>
		<br>
		<span class="hint-star star">
			<i class="fa fa-star" aria-hidden="true">Mã: <?php echo $each_admin['id'] ?></i>
		</span>

		<div class="control">
			<form action = "view_activities.php" method = "get">
			<button class="btn">
				<input type="hidden" name="id" value = "<?php echo $id ?>">
				<span class="buy">Xem lịch sử hoạt động</span>
			</button>
			</form>
			<br>
			<form action = "kick_admin.php" method = "get">
			<button class="btn">
				<input type="hidden" name="id" value = "<?php echo $id ?>">
				<span class="buy">Sa thải</span>
			</button>
			</form>
		</div>
				
		</div>
			
		<div class="product-image">
			<img src="https://sc01.alicdn.com/kf/HTB1Cic9HFXXXXbZXpXXq6xXFXXX3/200006212/HTB1Cic9HFXXXXbZXpXXq6xXFXXX3.jpg" alt="Omar Dsoky">
			<div class="info">
				<h2>Chi tiết</h2>
				<ul>
					<li><strong>Email: </strong><?php echo $each_admin['email'] ?></li>
					<li>
						<strong>Chức vụ: </strong>
							<?php if ( $each_admin['level'] == 1 ) { 
									echo 'Quản lí';
								} else {
									echo 'Nhân viên';
								} ?>
					</li>
					<li><strong>Số đơn đã duyệt: </strong><?php echo $each_admin['count_approve_receipts'] ?> đơn</li>
					<li><strong>Số đơn hoàn thành: </strong><?php echo $each_admin['count_success_receipts'] ?> đơn</li>
					<li><strong>Số đơn đã hủy: </strong><?php echo $each_admin['count_reject_receipts'] ?> đơn</li>
					<li><strong>Số sản phẩm đã thêm: </strong><?php echo $each_admin['count_products_added'] ?> sản phẩm</li>
					<li><strong>Số thẻ đã thêm: </strong><?php echo $each_admin['count_hashtags_added'] ?> thẻ</li>
				</ul>
			</div>
		</div>
	</div>
</div>

</body>
</html>