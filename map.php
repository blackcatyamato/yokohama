<?php
	$path = "";
	$lang = "jp";
	$ku = "鶴見区";



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











	if(isset($_GET["ku"])){
		$ku = $_GET["ku"];
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
	<title>マップ</title>
	<style>
		#map{
			width: 600px;
			height: 600px;
		}
	</style>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

</head>

<body>


	<form method="POST">
		<select name="lang">
				<option value ="jp">日本語</option>
				<option value ="en">English</option>
		</select>
		<input type = "submit" value ="送信">
	</form>

	<form method="GET">
		<select name="ku">
			<?php foreach(range(1, $ward_count) as $i): ?>
				<option value="<?=$ward_list[$i]?>"><?=$ward_list[$i]?></option>
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
			var addresses = [//$count
				<?php foreach(range(1, $count) as $i): ?>
					<?="'{$ward[$i]} {$address[$i]} {$name[$i]}'"?>,
				<?php endforeach; ?>
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


<?php


$a = array(12.2,24.4,36.6,48.8);
$b = 25;
 
# $bより大きいものだけを抽出
$c = array_filter($a, function($x) use($b) { return ($x > $b); });
# 抽出したもののなかから、最小値を抽出
$c = min($c);
print($c);


?>


</body>

</html>
