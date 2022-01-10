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
					if ( isset($_SESSION['count']) ) {
						echo $_SESSION['count'];
					}
					 ?></span>
					
					đơn hàng thành công kể từ 
					<input type="date" name="start_date">
					đến
					<input type="date" name="end_date">
					<button>Xem</button>
				</form>				
			</div>

		</div>
	</div>
</div>


</body>
</html>