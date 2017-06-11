<html>
	<head>
		<title>Map Maker</title>
		<style>
			#map {
				border: 1px solid black;
			}
		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">
			function saveCoordsTest(coords) {
	        		$.ajax({
					dataType: 'json',
			                type: "POST",
			                url: "save.php",
					data: { coords: JSON.stringify(coords) },
					//data: { coords: coords },
			                //success: function() {
			                //        $("#lengthQuestion").fadeOut('slow');
			                //}
			        });
			        console.log(coords);
			}
		</script>
	</head>

	<body>
			<?php
				if(isset($_GET['map'])) {
					$map = $_GET['map'];
				} else {
					$map = "array";
				}
			?>
			<canvas id="map" width="400" height="400"></canvas><br>
			<script src="<?php echo $map; ?>.js"></script>
			<script src="board2.js"></script>
			<button type="button" onclick="color = 'black';">Black</button>
			<button type="button" onclick="color = 'blue';">Blue</button>
			<button type="button" onclick="color = 'green';">Green</button>
			<button type="button" onclick="color = 'red';">Red</button><p>
			<button type="button" onclick="saveCoordsTest(coords);">Save</button>
	</body>
</html>
