<?php
	$path = "";

	$id_test = "%";
	$type = "shelter";
	$lang = "jp";
	$ku = "1";



/***********************************************/
$val1 = null;
$timeout = time() + 1000 * 86400; //現在の時刻 + 1000日 * (24時間 * 60分 * 60秒)

if(isset($_POST["lang"])){
	$val1 = $_POST["lang"];
}

if($val1 != null){

	setcookie("langCookie", $val1, $timeout, "/", "");
	setcookie("langCookie", $val1);

	header("Location: " . $_SERVER['PHP_SELF']);

	if(isset($_COOKIE["langCookie"])){
		$lang = $_COOKIE["langCookie"];
	}


}else{
	if(isset($_COOKIE["langCookie"])){
		$lang = $_COOKIE["langCookie"];
	}
}

/************************************************/


	if(isset($_GET["type"])){
		$type = $_GET["type"];
	}


	if(isset($_GET["ku"])){
		$ku = $_GET["ku"];
	}

	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
	require_once("{$path}content/php/table_select.php");

	$stmt = null;
	$pdo = null;




	$m_lat = 0;
	$m_lon = 0;
	foreach(range(1, $count) as $i):
		$m_lat += $lat[$i];
		$m_lon += $lon[$i];
	endforeach;
	$m_lat = round($m_lat / $count, 8);
	$m_lon = round($m_lon / $count, 8);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>マップ</title>
	<style>
		#map{
			width: 600px;
			height: 600px;
		}
	</style>
	<script src="<?=$path?>content/js/jquery-3.2.1.min.js"></script>

</head>

<body>

<h1><?=$facility_title?></h1>
	<form method="POST">
		<select name="lang">
				<option value ="jp">日本語</option>
				<option value ="en">English</option>
		</select>
		<input type = "submit" value ="送信">
	</form>

	<form method="GET">
		<input type="hidden" name="type" value="<?=$type?>">
		<select name="ku">
			<?php foreach(range(1, $ward_count) as $i): ?>
				<option value="<?=$wardCode_list[$i]?>"><?=$ward_list[$i]?></option>
			<?php endforeach; ?>
		</select>
		<input type = "submit" value ="送信">
	</form>
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
