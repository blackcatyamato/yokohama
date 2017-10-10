<?php
	$path = "";

	$aa = "鶴見区";

	if(isset($_GET["ku"])){
		$aa = $_GET["ku"];

	}

	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
	require_once("{$path}content/php/table_select.php");

	$stmt = null;
	$pdo = null;
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>aa</title>
	<style>
		#map{
			width: 600px;
			height: 600px;
		}
	</style>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

</head>

<body>
	<form method="GET">
		<select name="ku">
			<?php foreach(range(1, $ward_content) as $i): ?>
				<option><?=$ward_list[$i]?></option>
			<?php endforeach; ?>
		</select>
		<input type = "submit" value ="送信">
	</form>

	<div id="map"></div>

	<script>
	$(function(){
		var map = new google.maps.Map(document.getElementById('map'));
		var geocoder = new google.maps.Geocoder();
		var bounds = new google.maps.LatLngBounds();
		var addresses = [
			'東京都千代田区永田町1丁目7-1',
			'東京都千代田区霞が関2丁目1番1号',
			'東京都千代田区霞が関1-1-1',
			'東京都千代田区霞が関2-1-3'
		];

		addresses.map(function(address, i){
			geocoder.geocode(
				{
					"address" : address,
					"region": "jp"
				},
				function(results, status){

					// マーカーの表示
					var position = results[0].geometry.location;
					var marker = new google.maps.Marker({
						position: position,
						map: map
					});

					// 情報ウィンドウの表示
					var content = results[0].formatted_address;
					var infoWindow = new google.maps.InfoWindow({
						content: content,
						position: position,
						size: new google.maps.Size(50,50)
					});

					// マーカーにマウスを乗せた時に情報ウィンドウを表示
					google.maps.event.addListener(marker, 'mouseover', function(){
						infoWindow.open(map, marker);
					});

					// マーカーからマウスが離れた時に情報ウィンドウを非表示
					google.maps.event.addListener(marker, 'mouseout', function(){
						infoWindow.close(map, marker);
					});

					// マーカーが地図の中にいい感じに収まるようにする
					bounds.extend(position);
					map.fitBounds(bounds);

					// 住所が1つの場合、寄り過ぎるので zoom を調整
					if(addresses.length === 1) map.setZoom(18);

				}
			);
		});
	});
	</script>








	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJPq59HWpcrOlRQqN8gCOv9JpgaJlkZCA"></script>

</body>

</html>
