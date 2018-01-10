<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Koriandervädret</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
<style>
	.wrapper {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 100vw;
		min-height: 80vh;
	}

	.chart {
		width: 800px;
		height: 600px;
	}

	.smhi { color: #f46242; }
	.yr { color: #70d1cf; }
	h2 { text-align: center; }
</style>
<h1 style="text-align: center;margin-top: 50px;"><span>KORIANDERVÄDRET</span> <span class="smhi">SMHI</span> ❤️ <span class="yr">YR</span></h1>
<div id="now"></div>
<div class="wrapper">
	<div class="chart">
		<canvas width="800" height="600" data-module="weatherchart"></canvas>
	</div>
</div>

<script src="js/main.js"></script>
</body>
</html>