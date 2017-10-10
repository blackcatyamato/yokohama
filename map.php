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

	$m_lat = 0;
	$m_lon = 0;

/*
	foreach(range(1, $content) as $i):
		$m_lat += $lat[$i];
		$m_lon += $lon[$i];
	endforeach;
*/

	$m_lat = round($m_lat / $content, 8);
	$m_lon = round($m_lon / $content, 8);
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




		<table border="1">
			<tr>
				<th>住所</th>
				<td>
					<input id="address" name="address" type="text" value="">
				</td>
			</tr>
			<tr>
				<th>緯度</th>
				<td>
					<input id="latitude" name="latitude" type="text" value="">
				</td>
			</tr>
			<tr>
				<th>経度</th>
				<td>
					<input id="longitude" name="longitude" type="text" value="">
				</td>
			</tr>
		</table>
		<input type="button" value="住所から緯度経度を入力する" id="attrLatLng">
	</form>

	<div id="map"></div>


	<script>
/*
	$(function(){

		function attrLatLngFromAddress(address){
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode({'address': address}, function(results, status){
				if(status == google.maps.GeocoderStatus.OK) {
					var lat = results[0].geometry.location.lat();
					var lng = results[0].geometry.location.lng();


					// 小数点第六位以下を四捨五入した値を緯度経度にセット、小数点以下の値が第六位に満たない場合は0埋め
					document.getElementById("latitude").value = (Math.round(lat * 1000000) / 1000000).toFixed(6);
					document.getElementById("longitude").value = (Math.round(lat * 1000000) / 1000000).toFixed(6);

				}
			});
		}


		$('#attrLatLng').click(function(){
			var address = document.getElementById("address").value;
			attrLatLngFromAddress(address);
		});



	});
*/


	var map;
	$(function(){


		var geocoder = new google.maps.Geocoder();
		var bounds = new google.maps.LatLngBounds();
		var addresses = [
			'東京都千代田区永田町1丁目7-1',
			'東京都千代田区霞が関2丁目1番1号',
			'東京都千代田区霞が関1-1-1',
			'東京都千代田区霞が関2-1-3'
		];
		geocoder.geocode({'address': address}, function(results, status){
			if(status == google.maps.GeocoderStatus.OK) {
				var lat = results[0].geometry.location.lat();
				var lng = results[0].geometry.location.lng();
			}
		});



		map = new google.maps.Map(document.getElementById('map'), { // #sampleに地図を埋め込む
			center: { // 地図の中心を指定
				lat: 34.7019399, // 緯度
				lng: 135.51002519999997 // 経度
			},
			zoom: 19 // 地図のズームを指定
		});
	});
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJPq59HWpcrOlRQqN8gCOv9JpgaJlkZCA"></script>

</body>

</html>
