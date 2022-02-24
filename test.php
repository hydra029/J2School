<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title></title>
	<style type="text/css">
		#div_tong {
			padding: 15px;
			background: Cornsilk;
			min-height: 100vh;
			max-height: 6000px;
			position: relative;
			margin: auto;
			max-width: 1160px;
		}
		#div_giua > .search {
			width: 20%;
			float: left;
			min-height: 80vh;
			background: green;
			border: 1px solid Sienna;
		}
		#div_giua > .content {
			width: 100%;
			min-height: 100%;
			background: white;
		}
		#div_tren {
			text-align: center;
			min-height: 10vh;
			background: blue;
		}
		#div_giua {
			max-height: 4900px;
			margin-top: 20px;
			min-height: 80vh;
			background: red;
		}
		#div_duoi {
			height: 10vh;
			background: aliceblue;
			text-align: center;
			bottom: 5px;
		}
	</style>
</head>
<body>
	<div id="div_tong" class="container">
		<div id="div_tren"></div>
		<div id="div_giua">
			<div class="search">
				a
			</div>
			<div class="content">
				b
			</div>
		</div>
		<div id="div_duoi"></div>
	</div>
</body>
</html>