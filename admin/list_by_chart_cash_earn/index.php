<?php require '../check_super_admin_login.php'; 

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


<?php require '../connect_database.php';


?>
	
<body> 
<?php require '../menu.php'; ?>
<div class="top">
	<!-- <div class = "search">
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
		<h1 class =  "header" >THỐNG KÊ DOANH THU THEO THỜI GIAN</h1>
	</div>
	<br>
	<?php require '../validate.php' ?>
	
	Thống kê theo
	<select>
		<option disabled selected>Chọn cách thống kê</option>
		<option class="option_year" value = "1">Thống kê theo năm</option>
		<option class="option_days_ago" value="2">Số ngày gần đây (tối đa 30)</option>
		<option class="option_month" value="3">Tháng</option>
	</select>
	<br>
	<form>
		<input type="date"  id = "input_day_to_day_1" hidden>
		<br>
		<select id="input_year" hidden>
			<option disabled selected>Chọn năm</option>
			<?php for ( $i = date("Y"); $i > date("Y") - 5; $i-- ) { ?>
			<option><?php echo $i ?></option>
			<?php } ?>
		</select>
		<input type="number"  id = "input_days_ago" hidden>
		<input type="month"  id = "input_month" hidden>
	</form>
	
	<figure class="highcharts-figure">
		<div id="container"></div>
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
    		$("#input_year").show()
    		$("#tips").hide()
    		$("#input_days_ago").hide()
    		$("#input_month").hide()
    		break
    	case "2":
    		$("#input_days_ago").show()
    		$("#tips").show()
    		$("#input_year").hide()
    		$("#input_month").hide()
    		break
    	case "3":
			$("#input_month").show()
    		$("#input_days_ago").hide()
    		$("#tips").hide()
    		$("#input_year").hide()
    		break	
    }

$("#input_month, #input_days_ago, #input_year").change(function(event) {
	switch ( valueSelected ) {
		case "1":
		var year = $("#input_year").val()
		var header_chart = " theo năm " + year
		$.ajax({
			url: 'get_cash_earned.php',
			type: 'get',
			dataType: 'json',
			data: {year},
		})
		.done(function(response) {
			var arrayX = Object.keys(response)
			var arrayY = Object.values(response)
			get_chart(arrayX, arrayY)
		})
		break

		case "2":
		var days = $("#input_days_ago").val()
		var header_chart = " trong " + days + " ngày gần đây"
		$.ajax({
			url: 'get_cash_earned.php',
			type: 'get',
			dataType: 'json',
			data: {days},
		})
		.done(function(response) {
			var arrayX = Object.keys(response)
			var arrayY = Object.values(response)
			get_chart(arrayX, arrayY)
		})
		break

		case "3":
		var month = $("#input_month").val()
		var header_chart = " trong tháng " + month
		$.ajax({
			url: 'get_cash_earned.php',
			type: 'get',
			dataType: 'json',
			data: {month},
		})
		.done(function(response) {
			var arrayX = Object.keys(response)
			var arrayY = Object.values(response)
			get_chart(arrayX, arrayY)
		})
		break
	}

	function get_chart(arrayX, arrayY) {
	Highcharts.chart('container', {

		title: {
			text: 'Thống kê doanh thu ' + header_chart
		},

		yAxis: {
			title: {
				text: 'Doanh thu'
			}
		},

		xAxis: {
			categories: arrayX
		},

		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle'
		},

		plotOptions: {
			series: {
				label: {
					connectorAllowed: false
				},
			}
		},

		series: [{
			name: 'Doanh thu',
			data: arrayY
		}],

		responsive: {
			rules: [{
				condition: {
					maxWidth: 500
				},
				chartOptions: {
					legend: {
						layout: 'horizontal',
						align: 'center',
						verticalAlign: 'bottom'
					}
				}
			}]
		}

	})
}

})

})
})
</script>

</body>
</html>