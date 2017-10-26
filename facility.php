<?php
	$path="";

	$id_test = 1;
	$type = "shelter";
	$lang = "jp";
	$ku = "%";


	if(isset($_GET["id"])){
		$id_test = $_GET["id"];
	}

	if(isset($_GET["type"])){
		$type = $_GET["type"];
	}

	if(isset($_GET["lang"])){
		$lang = $_GET["lang"];
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
		<link rel="stylesheet" href="<?=$path?>content/css/jquery.mmenu.all.css">
		<title>施設詳細-Yokohama Disaster Prevention</title>
		<style>
			#map{
				width: 600px;
				height: 600px;
				margin: 0 auto;
			}
		</style>

		<style>
		header{
			background:white;
			height: 70px;
			text-align: center;
			border-bottom: 1px solid gray;
		}

		header h1{
			padding-top: 5px;
			padding-left: 5px;
		}

		header a{
			display: inline-block;
			line-height: 0;
		}

		header picture source{
			height: 60px;
			max-width: 100%;
		}

		header picture img{
			height: 60px;
			width: 90%;
		}
		</style>

		<style>
		.pagetop {
		    display: none;
		    position: fixed;
		    bottom: 30px;
		    right: 15px;
		}
		.pagetop a {
		    display: block;
		    background-color: #555;
		    text-align: center;
		    color: #222;
		    font-size: 12px;
		    text-decoration: none;
		    padding: 5px 10px;
			filter:alpha(opacity=50);
		    -moz-opacity: 0.5;
		    opacity: 0.5;
		}
		.pagetop a:hover {
		    display: block;
		    background-color: #b2d1fb;
		    text-align: center;
		    color: #fff;
		    font-size: 12px;
		    text-decoration: none;
		    padding:5px 10px;
			filter:alpha(opacity=50);
		    -moz-opacity: 0.5;
		    opacity: 0.5;
		}
		</style>


		<style>
		.menu-btn {
			position: fixed;
			top: 0;
			right: 20px;
			width: 60px;
			height: 60px;
			display: block;
			z-index: 50;
		}

		.menu-btn span{
			position: absolute;
			left: 10px;
			width: 40px;
			height: 6px;
			background: #777;
			border-radius: 2px;
		}

		.menu_border1 {
			top:9px;
		}

		.menu_border2 {
			top:24px;
		}

		.menu_border3 {
			top:39px;
		}

		#menu a:hover{
/*			background: #AAA;*/
		}

		.menu-btn:hover{
/*			background: #AAA;*/
		}
		</style>

		<script src="<?=$path?>content/js/jquery-3.2.1.min.js"></script>
		<script src="<?=$path?>content/js/jquery.mmenu.all.js"></script>

		<script src="<?=$path?>content/js/script.js"></script>
	</head>

		<?php
			$page = "施設詳細";
			include "./header.php";
		?>
	<body>
	<div class="wrap">


			<nav id="menu">
				<ul>
					<li><span style="color: #BBB;">リスト</span></li>
					<li><a href="<?=$path?>region_dp_base_list.php?type=tsunami">津波避難</a></li>
					<li><a href="<?=$path?>region_dp_base_list.php?type=water">医療・避難道具</a></li>
					<li><a href="<?=$path?>region_dp_base_list.php?type=temporary">帰宅困難者避難所</a></li>
					<li><a href="<?=$path?>region_dp_base_list.php?type=shelter">地域防災拠点</a></li>
					<li><span style="color: #BBB;">マップ</span></li>
					<li><a href="<?=$path?>map.php?type=tsunami" target="_blank">津波避難</a></li>
					<li><a href="<?=$path?>map.php?type=water" target="_blank">医療・避難道具</a></li>
					<li><a href="<?=$path?>map.php?type=temporary" target="_blank">帰宅困難者避難所</a></li>
					<li><a href="<?=$path?>map.php?type=shelter" target="_blank">地域防災拠点</a></li>
				</ul>
			</nav>

			<a class="menu-btn" href="#menu">
				<span class="menu_border1"></span>
				<span class="menu_border2"></span>
				<span class="menu_border3"></span>
			</a>


		<main>
			<div class="fa_box">
				<h3><?=$name[1]?>(<?=$ward[1]?>)</h3>
				<div class="fa_inner">
				<h4>住所</h4>
				<p><?=$address[1]?></p>
				<div id="map"></div>
				</div>
			</div>
		</main>

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
	</div>
	</body>
</html>
