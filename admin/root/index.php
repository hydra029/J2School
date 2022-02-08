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
		<h1 class =  "header" >TRANG CHỦ</h1>
	</div>

	<figure class="highcharts-figure">
		<div id="container"></div>
		<br>
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
var days = 30
$(document).ready(function() {

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
})

function get_chart(array, array_detail) {
	Highcharts.chart('container_1', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Tổng số sản phẩm bán được trong ' + days + ' ngày'
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
$(document).ready(function() {
	$.ajax({
		url: 'get_cash_earned.php',
		type: 'get',
		dataType: 'json',
		data: {days: 30},
	})
	.done(function(response) {
		var arrayX = Object.keys(response)
		var arrayY = Object.values(response)
		Highcharts.chart('container', {

		  title: {
		    text: 'Thống kê doanh thu 30 ngày gần nhất'
		  },

		  yAxis: {
		    title: {
		      text: 'Doanh thu'
		    }
		  },

		  xAxis: {
	        categories: arrayY
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

		});
		})
	
})
</script>
</body>
</html>