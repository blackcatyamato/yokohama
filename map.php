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


	<div id="map"></div>

<!--
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
					document.getElementById("longitude").value = (Math.round(lng * 1000000) / 1000000).toFixed(6);

				}
			});
		}


		$('#attrLatLng').click(function(){
			var address = document.getElementById("address").value;
			attrLatLngFromAddress(address);
		});



	});
*/
/*

	var map;
	$(function(){
		map = new google.maps.Map(document.getElementById('map'), { // #sampleに地図を埋め込む
			center: { // 地図の中心を指定
				lat: 34.7019399, // 緯度
				lng: 135.51002519999997 // 経度
			},
			zoom: 19 // 地図のズームを指定
		});

		var geocoder = new google.maps.Geocoder();
		var bounds = new google.maps.LatLngBounds();
		var addresses = [
			'東京都千代田区永田町1丁目7-1',
			'東京都千代田区霞が関2丁目1番1号',
			'東京都千代田区霞が関1-1-1',
			'東京都千代田区霞が関2-1-3'
		];
		geocoder.geocode({'address': addresses}, function(){
			if(status == google.maps.GeocoderStatus.OK) {
				var lat = results[0].geometry.location.lat();
				var lng = results[0].geometry.location.lng();
			}
		});


	});

	google.load('maps', '3.0', {other_params: 'sensor=false'});
	  google.setOnLoadCallback(function(){
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
	    	geocoder.geocode({'address' : address}, function(results, status){
	            // マーカーの表示
	            var icon = "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+(i+1)+"|FF0000|000000";
	            var position = results[0].geometry.location;
	            var marker = new google.maps.Marker({
	                icon: icon,
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
	      });
	    });
	  });
*/



/*
	var addr = ["名古屋市南区","名古屋市東区","名古屋市北区"];
	$(function(){


		map = new google.maps.Map(document.getElementById('map'), { // #sampleに地図を埋め込む
			center: { // 地図の中心を指定
				lat: 34.7019399, // 緯度
				lng: 135.51002519999997 // 経度
			},
			zoom: 19 // 地図のズームを指定
		});


		var geocoder = new google.maps.Geocoder();
		for(var i=0; i<addr.length; i++)
		{
			geocoder.geocode({address: addr[i]},function(results,status){
				if(status == google.maps.GeocoderStatus.OK) {
					/*
					console.log(results[0].geometry.location.D);
					console.log(results[0].geometry.location.k);
					*/
					/*
					var lat = results[0].geometry.location.lat();
					var lng = results[0].geometry.location.lng();
					document.write(lat);
				}
			});
		}
	});
*/
	</script>
-->
	<script>
		var map;
		var marker;
		var geocoder;
		$(function(){
			geocoder = new google.maps.Geocoder();

/*
			geocoder.geocode({
				'address': '東京都千代田区神田小川町3-28-9' // TAM 東京

*/


			var addresses = [
				'東京都千代田区永田町1丁目7-1',
				'東京都千代田区霞が関2丁目1番1号',
				'東京都千代田区霞が関1-1-1',
				'東京都千代田区霞が関2-1-3'
			];
			geocoder.geocode({
				'address': addresses

			}, function(){
				if(status == google.maps.GeocoderStatus.OK) {
					var lat = results[0].geometry.location.lat();
					var lng = results[0].geometry.location.lng();
				}
			});




			}, function(results, status) { // 結果
				if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
					map = new google.maps.Map(document.getElementById('map'), {
						center: results[0].geometry.location, // 地図の中心を指定
						zoom: 19 // 地図のズームを指定
					});
					marker = new google.maps.Marker({
						position: results[0].geometry.location, // マーカーを立てる位置を指定
						map: map // マーカーを立てる地図を指定
					});
				} else { // 失敗した場合
					alert(status);
				}
			});
		});
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJPq59HWpcrOlRQqN8gCOv9JpgaJlkZCA"></script>

</body>

</html>
