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
	<input type="date" name="">
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
const days = 31
$(document).ready(function() {
	$.ajax({
		url: 'get_cash_earned.php',
		type: 'get',
		dataType: 'json',
		data: {days},
	})
	.done(function(response) {
		var arrayX = Object.keys(response)
		var arrayY = Object.values(response)
		Highcharts.chart('container', {

		  title: {
		    text: 'Thống kê doanh thu ' + days + ' ngày gần nhất'
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