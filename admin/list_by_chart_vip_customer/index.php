<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" type="text/css" href="style_chart.css">
</head>
<body>

<div class="all">
	<div class="left">
		<?php require '../menu.php'; ?>
	</div> 

	<div class="right">
		<div class="top">

			<div class = "search">
				<form class = "form_search">
					Tìm kiếm
					<!-- <input type="search" name="search" value = "<?php echo $content_search ?>"> -->
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
				<h1 class =  "header" >KHÁCH HÀNG THÂN THIẾT</h1>
			</div>

			<figure class="highcharts-figure">
				<div id="container"></div>
			</figure>

		</div>

	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$.ajax({
			url: 'get_cash_vip_customer.php',
			dataType: 'json',
		})
		.done(function(response) {
			var arrayX = Object.keys(response)
			var arrayY = Object.values(response)
			console.log(arrayX)
			console.log(arrayY)
			get_chart(arrayX, arrayY)
		})
})

function get_chart(arrayX, arrayY) {
	Highcharts.chart('container', {
		chart: {
			type: 'cylinder',
			options3d: {
				enabled: true,
				alpha: 15,
				beta: 15,
				depth: 50,
				viewDistance: 25
			}
		},
		title: {
			text: 'Khách hàng thân thiết'
		},
		plotOptions: {
			series: {
				depth: 25,
				colorByPoint: true
			}
		},
		xAxis: {
			title: {
				text: 'Số tiền khách hàng đầu tư'
			},
			categories: arrayX,
			labels: {
				skew3d: true,
				style: {
					fontSize: '16px'
				}
			}
		},
		yAxis: {
			title: {
				text: 'Đồng'
			}
		},
		series: [{
			data: arrayY,
			name: 'Số tiền đầu tư',
			showInLegend: false
		}]
	})
}

</script>
</body>
</html>