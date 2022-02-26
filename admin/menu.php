<link rel="stylesheet" type="text/css" href="../style_menu.css">
<body id="body-pd">
<div class="l-navbar" id="navbar">
	<nav class="nav">
		<div>
			<div class="nav__brand">
				<ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
				<a href="../root/index.php" class="nav__logo">Admin</a>
			</div>
			<div class="nav__list">
				<a href="../root/index.php" class="nav__link active">
					<ion-icon name="home-outline" class="nav__icon"></ion-icon>
					<span class="nav__name">Trang chủ</span>
				</a>
				<div  class="nav__link collapse">
					<ion-icon name="folder-outline" class="nav__icon"></ion-icon>
					<span class="nav__name">Nhà cung cấp</span>

					<ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

					<ul class="collapse__menu">
						<a href="../manufacturers/index_manufacturers.php" class="collapse__sublink">Nhà&nbspsản&nbspxuất</a>
						<a href="../manufacturers/form_insert_manufacturers.php" class="collapse__sublink">Thêm&nbspnhà&nbspsản&nbspxuất</a>
					</ul>
				</div>
				<div  class="nav__link collapse">
					<ion-icon name="folder-outline" class="nav__icon"></ion-icon>
					<span class="nav__name">Vùng nội bộ</span>

					<ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

					<ul class="collapse__menu">
						<a href="../receipts/index.php" class="collapse__sublink">Quản&nbsplí&nbsphóa&nbspđơn</a>
						<a href="../list_by_chart_receipts/index.php" class="collapse__sublink">Thống&nbspkê&nbsphóa&nbspđơn</a>
						<a href="../list_by_chart_cash_earn/index.php" class="collapse__sublink">Thống&nbspkê&nbspthu&nbspnhập</a>
						<a href="../products/index_products.php" class="collapse__sublink">Quản&nbsplí&nbspsản&nbspphẩm</a>
						<a href="../products/form_insert_products.php" class="collapse__sublink">Thêm&nbspsản&nbspphẩm</a>
						<a href="../list_by_chart_products/index.php" class="collapse__sublink">Thống&nbspkê&nbspsản&nbspphẩm</a>
						<a href="../hashtags/index.php" class="collapse__sublink">Quản&nbsplí&nbspgắn&nbspthẻ</a>
						<a href="../hashtags/index_insert_hashtags_to_product.php" class="collapse__sublink">Thêm&nbspthẻ&nbspvào&nbspsản&nbspphẩm</a>
						<a href="../admins/index.php" class="collapse__sublink">Quản&nbsplí&nbspnhân&nbspviên</a>
						<a href="../print_pdf/index.php" class="collapse__sublink">In&nbspbáo&nbspcáo</a>
					</ul>

				</div>
				<div  class="nav__link collapse">
					<ion-icon name="folder-outline" class="nav__icon"></ion-icon>
					<span class="nav__name">Khách hàng</span>

					<ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

					<ul class="collapse__menu">
						<a href="../customers/index.php" class="collapse__sublink">Quản&nbsplí&nbspkhách&nbsphàng</a>
						<a href="../list_by_chart_vip_customer/index.php" class="collapse__sublink">Thống&nbspkê&nbspkhách&nbsphàng</a>
					</ul>
				</div>
				<a href="../activity_log/index.php" class="nav__link">
					<ion-icon name="chatbubbles-outline" class="nav__icon"></ion-icon>
					<span class="nav__name">Lịch&nbspsử&nbsphoạt&nbspđộng</span>
				</a>
			</div>
		</div>

		<a href="../process_log_out_admin.php" class="nav__link">
			<ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
			<span class="nav__name">Đăng xuất</span>
		</a>
	</nav>
</div>

<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
<!-- ===== MAIN JS ===== -->
<script type="text/javascript">
	const showMenu = (toggleId, navbarId, bodyId)=>{
		const toggle = document.getElementById(toggleId),
		navbar = document.getElementById(navbarId),
		bodypadding = document.getElementById(bodyId)

		if(toggle && navbar){
			toggle.addEventListener('click', ()=>{
				navbar.classList.toggle('expander')

				bodypadding.classList.toggle('body-pd')
			})
		}
	}
	showMenu('nav-toggle','navbar','body-pd')

	const linkColor = document.querySelectorAll('.nav__link')
	function colorLink(){
		linkColor.forEach(l=> l.classList.remove('active'))
		this.classList.add('active')
	}
	linkColor.forEach(l=> l.addEventListener('click', colorLink))
	const linkCollapse = document.getElementsByClassName('collapse__link')
	var i

	for(i=0;i<linkCollapse.length;i++){
		linkCollapse[i].addEventListener('click', function(){
			const collapseMenu = this.nextElementSibling
			collapseMenu.classList.toggle('showCollapse')

			const rotate = collapseMenu.previousElementSibling
			rotate.classList.toggle('rotate')
		})
	}
</script>