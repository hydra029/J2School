<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<style type="text/css">
		.highcharts-figure,
		.highcharts-data-table table {
		  min-width: 320px;
		  max-width: 800px;
		  margin: 1em auto;
		}

		.highcharts-data-table table {
		  font-family: Verdana, sans-serif;
		  border-collapse: collapse;
		  border: 1px solid #ebebeb;
		  margin: 10px auto;
		  text-align: center;
		  width: 100%;
		  max-width: 500px;
		}

		.highcharts-data-table caption {
		  padding: 1em 0;
		  font-size: 1.2em;
		  color: #555;
		}

		.highcharts-data-table th {
		  font-weight: 600;
		  padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
		  padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
		  background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
		  background: #f1f7ff;
		}

		input[type="number"] {
		  min-width: 50px;
		}
	</style>
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
				<h1 class =  "header" >THỐNG KÊ HÓA ĐƠN THEO TRẠNG THÁI</h1>
			</div>

			
			<figure class="highcharts-figure">
				<div id="container"></div>
			</figure>

		</div>

	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
const days = 31
$(document).ready(function() {
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
		
function get_chart(array, days) {
	Highcharts.chart('container', {
	  chart: {
	    plotBackgroundColor: null,
	    plotBorderWidth: null,
	    plotShadow: false,
	    type: 'pie'
	  },
	  title: {
	    text: 'Thống kê hóa đơn theo trạng thái trong ' + days + ' gần đây'
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
</script>
</body>
</html>