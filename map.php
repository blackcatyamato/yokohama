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
	foreach(range(1, $content) as $i):
		$m_lat += $lat[$i];
		$m_lon += $lon[$i];
	endforeach;
	$m_lat = round($m_lat / $content, 8);
	$m_lon = round($m_lon / $content, 8);
?>



<form method="GET">
	<select name="ku">
		<?php foreach(range(1, $ward_content) as $i): ?>
			<option><?=$ward_list[$i]?></option>
		<?php endforeach; ?>
	</select>
	<input type = "submit" value ="送信">
</form>

<div id="map"></div>

<style>
	#map{
		width: 600px;
		height: 600px;
	}
</style>

<script>
var map;
var marker = [];
var infoWindow = [];
var markerData = [ // マーカーを立てる場所名・緯度・経度
	<?php foreach(range(1, $content) as $i): ?>
		{
			name: "<?=$name[$i]?>",
			lat: <?=$lat[$i]?>,
			lng: <?=$lon[$i]?>,
			/*icon: 'tam.png' // TAM 東京のマーカーだけイメージを変更する*/
		},
	<?php endforeach; ?>
];

function initMap() {
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
}

// マーカーにクリックイベントを追加
function markerEvent(i) {
    marker[i].addListener("click", function() { // マーカーをクリックしたとき
      infoWindow[i].open(map, marker[i]); // 吹き出しの表示
  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJPq59HWpcrOlRQqN8gCOv9JpgaJlkZCA&callback=initMap"></script>
