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
<!-- 					<input type="search" name="search"> -->
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
				<h1 class =  "header" >THỐNG KÊ ĐƠN HÀNG</h1>			
			</div>
			<br>

			<?php require '../validate.php' ?>
			<div class = "list_item">
				<form method="post" action="process_view_receipts.php?type=date">
					<span style="font-size: 25px"><?php 
					if ( isset($_SESSION['count_by_date']) ) {
						echo $_SESSION['count_by_date'];
					}
					 ?></span>
					
					đơn hàng thành công kể từ 
					<input type="date" name="start_date" value="<?php echo $_SESSION['start_date'] ?>">
					đến
					<input type="date" name="end_date" value="<?php echo $_SESSION['end_date'] ?>">
					<button>Xem</button>
				</form>				
			</div>

			<div class = "list_item">
				<form method="post" action="process_view_receipts.php?type=month">
					<span style="font-size: 25px"><?php 
					if ( isset($_SESSION['count_by_month']) ) {
						echo $_SESSION['count_by_month'];
					}
					 ?></span>
					
					đơn hàng thành công kể từ đầu
					<input type="month" name="start_date" value="<?php echo $_SESSION['start_year_month'] ?>">
					đến
					<input type="month" name="end_date" value="<?php echo $_SESSION['end_year_month'] ?>">
					<button>Xem</button>
				</form>				
			</div>

			<div class = "list_item">
				<form method="post" action="process_view_receipts.php?type=week">
					<span style="font-size: 25px"><?php 
					if ( isset($_SESSION['count_by_week']) ) {
						echo $_SESSION['count_by_week'];
					}
					 ?></span>
					
					đơn hàng thành công kể từ đầu
					<input type="week" name="start_date" value="<?php echo $_SESSION['start_year_week'] ?>">
					đến
					<input type="week" name="end_date" value="<?php echo $_SESSION['end_year_week'] ?>">
					<button>Xem</button>
				</form>				
			</div>

</body>
</html>