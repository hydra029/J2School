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
				<h1 class =  "header" >THỐNG KÊ DOANH THU THEO THỜI GIAN</h1>			
			</div>
			<br>

			<?php require '../validate.php' ?>
			<div class = "list_item">
				<form method="post" action="process_view_cash_earn.php?type=date">
					Thu được 
					<span style="font-size: 25px"><?php 
					if ( isset($_SESSION['cash_count_by_date']) ) {
						echo $_SESSION['cash_count_by_date'];
					}
					 ?></span>
					
					đồng kể từ đầu 
					<input type="date" name="start_date" value="<?php echo $_SESSION['cash_start_date'] ?>">
					đến đầu
					<input type="date" name="end_date" value="<?php echo $_SESSION['cash_end_date'] ?>">
					<button>Xem</button>
				</form>				
			</div>

			<div class = "list_item">
				<form method="post" action="process_view_cash_earn.php?type=month">
					Thu được 
					<span style="font-size: 25px"><?php 
					if ( isset($_SESSION['cash_count_by_month']) ) {
						echo $_SESSION['cash_count_by_month'];
					}
					 ?></span>
					
					đồng kể từ đầu 
					<input type="month" name="start_date" value="<?php echo $_SESSION['cash_start_year_month'] ?>">
					đến đầu 
					<input type="month" name="end_date" value="<?php echo $_SESSION['cash_end_year_month'] ?>">
					<button>Xem</button>
				</form>				
			</div>

			<div class = "list_item">
				<form method="post" action="process_view_cash_earn.php?type=week">
					Thu được 
					<span style="font-size: 25px"><?php 
					if ( isset($_SESSION['cash_count_by_week']) ) {
						echo $_SESSION['cash_count_by_week'];
					}
					 ?></span>
					
					đồng kể từ đầu
					<input type="week" name="start_date" value="<?php echo $_SESSION['cash_start_year_week'] ?>">
					đến đầu 
					<input type="week" name="end_date" value="<?php echo $_SESSION['cash_end_year_week'] ?>">
					<button>Xem</button>
				</form>				
			</div>

</body>
</html>