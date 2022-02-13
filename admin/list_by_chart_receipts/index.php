<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" type="text/css" href="style_chart.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
</head>

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
		<h1 class =  "header" >THỐNG KÊ HÓA ĐƠN THEO TRẠNG THÁI</h1>
	</div>
	Thống kê theo
	<select>
		<option disabled selected>Chọn cách thống kê</option>
		<option class="option_day_to_day" value = "1">Ngày chỉ định tới ngày chỉ định</option>
		<option class="option_days_ago" value="2">Số ngày gần đây (tối đa 30)</option>
		<option class="option_month" value="3">Tháng</option>
	</select>
	<br>
	<form>
		<input type="date"  id = "input_day_to_day_1" hidden>
		<br>
		<input type="date"  id = "input_day_to_day_2" hidden>
		<p id = "tips" hidden>Chọn xong rồi click chuột ra ngoài để thấy biểu đồ</p>
		<input type="number"  id = "input_days_ago" hidden>
		<input type="month"  id = "input_month" hidden>
	</form>
	
	<figure class="highcharts-figure">
		<div id="container"></div>
	</figure>


</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("form").keypress(function(event) {
			if ( event.keyCode === 13 ) {
				event.preventDefault()
			}
		})
			$('select').on('change', function (e) {
			var optionSelected = $("option:selected", this);
			var valueSelected = this.value;
			switch ( valueSelected ) {
				case "1":
				$("#input_day_to_day_1").show()
				$("#input_day_to_day_2").show()
				$("#tips").hide()
				$("#input_days_ago").hide()
				$("#input_month").hide()
				break
				case "2":
				$("#input_days_ago").show()
				$("#tips").show()
				$("#input_day_to_day_1").hide()
				$("#input_day_to_day_2").hide()
				$("#input_month").hide()
				break
				case "3":
				$("#input_month").show()
				$("#input_days_ago").hide()
				$("#tips").hide()
				$("#input_day_to_day_1").hide()
				$("#input_day_to_day_2").hide()
				break	
			}

			$("#input_month, #input_days_ago, #input_day_to_day_1, #input_day_to_day_2").change(function(event) {
				switch ( valueSelected ) {
					case "1":
					var day_to_day_1 = $("#input_day_to_day_1").val()
					var day_to_day_2 = $("#input_day_to_day_2").val()
					var header_chart = " từ " + day_to_day_1 + " đến " + day_to_day_2
					$.ajax({
						url: 'get_receipts.php',
						type: 'get',
						dataType: 'json',
						data: {day_to_day_1, day_to_day_2},
					})
					.done(function(response) {
						const array = Object.values(response)
						get_chart(array, days)
					})
					break

					case "2":
					var days = $("#input_days_ago").val()
					var header_chart = " trong " + days + " ngày gần đây"
					$.ajax({
						url: 'get_receipts.php',
						type: 'get',
						dataType: 'json',
						data: {days},
					})
					.done(function(response) {
						const array = Object.values(response)
						get_chart(array, days)
					})
					break

					case "3":
					var month = $("#input_month").val()
					var header_chart = " trong tháng " + month
					$.ajax({
						url: 'get_receipts.php',
						type: 'get',
						dataType: 'json',
						data: {month},
					})
					.done(function(response) {
						const array = Object.values(response)
						get_chart(array, days)
					})
					break

				}
				
				function get_chart(array, days) {
					Highcharts.chart('container', {
						chart: {
							plotBackgroundColor: null,
							plotBorderWidth: null,
							plotShadow: false,
							type: 'pie'
						},
						title: {
							text: 'Thống kê hóa đơn theo trạng thái ' + header_chart
						},
						tooltip: {
							pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
						},
						accessibility: {
							point: {
								valueSuffix: '%'
							}
						},
						plotOptions: {
							pie: {
								allowPointSelect: true,
								cursor: 'pointer',
								dataLabels: {
									enabled: true,
									format: '<b>{point.name}</b>: {point.percentage:.1f} %'
								}
							}
						},
						series: [{
							name: 'Brands',
							colorByPoint: true,
							data: array
						}]
					});
				}
				
			})
		})

	})
</script>
</body>
</html>