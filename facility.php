<?php

	$path="";

	$id_test = 1;
	$type = "shelter";
	$lang = "jp";
	$ku = "1";


	if(isset($_GET["id"])){
		$id_test = $_GET["id"];
	}

	if(isset($_GET["type"])){
		$type = $_GET["type"];
	}


	if(isset($_GET["ku"])){
		$ku = $_GET["ku"];
	}

	try{


		$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
		require_once("{$path}content/php/table_select.php");


		$pdo = null;
		$stmt = null;


		$m_lat = 0;
		$m_lon = 0;
		foreach(range(1, $count) as $i):
			$m_lat += $lat[$i];
			$m_lon += $lon[$i];
		endforeach;
		$m_lat = round($m_lat / $count, 8);
		$m_lon = round($m_lon / $count, 8);



	}catch(PDOException $e){
		print("Connection failed:".$e->getMessage());
		die();
	}




?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="device-width,initial-scale=1">
		<link rel="stylesheet" href="./content/css/reset.css">
		<link rel="stylesheet" href="./content/css/style_common.css">
		<link rel="stylesheet" href="./content/css/style_facility.css">
		<link rel="stylesheet" href="./content/css/style_header.css">
		<title>施設詳細-Yokohama Disaster Prevention</title>
		<style>
			#map{
				width: 600px;
				height: 600px;
			}
		</style>
		<script src="<?=$path?>content/js/jquery-3.2.1.min.js"></script>
	</head>

		<?php
			$page = "施設詳細";
			include "./header.php";
		?>
	<body>
		<main>

			<div class="fa_box">
				<h3><?=$name[1]?><?=$ward[1]?></h3>
				<div class="fa_inner">
				<h4>住所</h4>
				
				<p><?=$address[1]?></p>
				</div>
			</div>
		</main>




	<div id="map"></div>


	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJPq59HWpcrOlRQqN8gCOv9JpgaJlkZCA"></script>
	
	<script>
	var map;
	var marker = [];
	var infoWindow = [];
	var markerData = [ // マーカーを立てる場所名・緯度・経度
		<?php foreach(range(1, $count) as $i): ?>
			{
				name: "<?=$name[$i]?>",
				lat: <?=$lat[$i]?>,
				lng: <?=$lon[$i]?>,
				/*icon: 'tam.png' // TAM 東京のマーカーだけイメージを変更する*/
			},
		<?php endforeach; ?>
	];

	$(function(){
		// 地図の作成
		var mapLatLng = new google.maps.LatLng({lat: markerData[0]["lat"], lng: markerData[0]["lng"]}); // 緯度経度のデータ作成
		map = new google.maps.Map(document.getElementById("map"), { // #sampleに地図を埋め込む
			center: { // 地図の中心を指定
				lat: <?=$m_lat?>,
				lng: <?=$m_lon?>
			},
			zoom: 13 // 地図のズームを指定
		});

		// マーカー毎の処理
		for (var i = 0; i < markerData.length; i++) {
			markerLatLng = new google.maps.LatLng({lat: markerData[i]["lat"], lng: markerData[i]["lng"]}); // 緯度経度のデータ作成
			marker[i] = new google.maps.Marker({ // マーカーの追加
				position: markerLatLng, // マーカーを立てる位置を指定
				map: map // マーカーを立てる地図を指定
			});

			infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
				content: '<div class="sample">' + markerData[i]["name"] + "</div>" // 吹き出しに表示する内容
			});

			markerEvent(i); // マーカーにクリックイベントを追加
		}

		marker[0].setOptions({// TAM 東京のマーカーのオプション設定
			icon: {
				url: markerData[0]["icon"]// マーカーの画像を変更
			}
		});
	});

	// マーカーにクリックイベントを追加
	function markerEvent(i) {
		marker[i].addListener("click", function() { // マーカーをクリックしたとき
			infoWindow[i].open(map, marker[i]); // 吹き出しの表示
		});
	};
	</script>

	</body>
</html>
