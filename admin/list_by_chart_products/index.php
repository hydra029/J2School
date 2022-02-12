<?php require '../check_super_admin_login.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index3.css">
	<link rel="stylesheet" type="text/css" href="style_chart.css">
	<link rel="stylesheet" type="text/css" href="../style_table.css">
</head>

<?php require '../connect_database.php';


?>
<body>

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
		<h1 class =  "header" >THỐNG KÊ DOANH THU THEO THỜI GIAN</h1>
	</div>
	<br>
	<?php require '../validate.php' ?>
	Thống kê theo
	<select>
		<option disabled selected>Chọn cách thống kê</option>
		<option class="option_day_to_day" value = "1">Ngày chỉ định tới ngày chỉ định</option>
		<option class="option_days_ago" value="2">Số ngày gần đây (tối đa 30)</option>
		<option class="option_month" value="3">Tháng</option>
	</select>
	<br>
	<form id = "form_select_date">
		<input type="date" name = "day_to_day_1" id = "input_day_to_day_1" hidden>
		<br>
		<input type="date" name = "day_to_day_2" id = "input_day_to_day_2" hidden>
		<input type="number" name = "days_ago" id = "input_days_ago" hidden>
		<input type="month" name = "month" id = "input_month" hidden>
		<br>
		<button>
			OKe
		</button>
	</form>
	
	<figure class="highcharts-figure">
		<div id="container_1"></div>
	</figure>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('select').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    switch ( valueSelected ) {
    	case "1":
    		$("#input_day_to_day_1").show()
    		$("#input_day_to_day_2").show()
    		$("#input_days_ago").hide()
    		$("#input_month").hide()
    		break
    	case "2":
    		$("#input_days_ago").show()
    		$("#input_day_to_day_1").hide()
    		$("#input_day_to_day_2").hide()
    		$("#input_month").hide()
    		break
    	case "3":
			$("#input_month").show()
    		$("#input_days_ago").hide()
    		$("#input_day_to_day_1").hide()
    		$("#input_day_to_day_2").hide()
    		break	
    }

$("#form_select_date").submit(function(event) {
	event.preventDefault()
	switch ( valueSelected ) {
		case "1":
		var day_to_day_1 = $("#input_day_to_day_1").val()
		var day_to_day_2 = $("#input_day_to_day_2").val()
		var header_chart = " từ " + day_to_day_1 + " đến " + day_to_day_2
		$.ajax({
			url: 'get_products_sold.php',
			type: 'get',
			dataType: 'json',
			data: {day_to_day_1, day_to_day_2},
		})
		.done(function(response) {
			console.log('1')
			const array = Object.values(response[0])
			const array_detail = []
			Object.values(response[1]).forEach((each) => {
				each.data = Object.values(each.data)
				array_detail.push(each)
			})
			setTimeout(function() {get_chart(array, array_detail)}, 1)
		})
		break

		case "2":
		var days = $("#input_days_ago").val()
		var header_chart = " trong " + days + " gần đây"
		$.ajax({
			url: 'get_products_sold.php',
			type: 'get',
			dataType: 'json',
			data: {days},
		})
		.done(function(response) {
			const array = Object.values(response[0])
			const array_detail = []
			Object.values(response[1]).forEach((each) => {
				each.data = Object.values(each.data)
				array_detail.push(each)
			})
			setTimeout(function() {get_chart(array, array_detail)}, 1)
		})
		break

		case "3":
		var month = $("#input_month").val()
		var header_chart = " trong tháng " + month
		$.ajax({
			url: 'get_products_sold.php',
			type: 'get',
			dataType: 'json',
			data: {month},
		})
		.done(function(response) {
			const array = Object.values(response[0])
			const array_detail = []
			Object.values(response[1]).forEach((each) => {
				each.data = Object.values(each.data)
				array_detail.push(each)
			})
			setTimeout(function() {get_chart(array, array_detail)}, 1)
		})
		break

	}
	



function get_chart(array, array_detail) {
	Highcharts.chart('container_1', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Tổng số sản phẩm bán được' + header_chart
		},
		accessibility: {
			announceNewData: {
			enabled: true
		}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: 'Tổng số sản phẩm bán được'
			}
		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y:.f}'
				}
			}
		},

		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}</b> of total<br/>'
		},

		series: [
			{
				name: "Tổng số sản phẩm bán được",
				colorByPoint: true,
				data: array
			}
		],
		drilldown: {
			series: array_detail
		}

	})
}
})

})
})
console.log(a)



</script>

</body>
</html>