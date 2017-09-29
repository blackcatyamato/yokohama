<div id="map"></div>

<style>
	#map{
		width: 300px;
		height: 300px;
	}
</style>

<script>
var map;
function initMap() {
	map = new google.maps.Map(document.getElementById("map"), { // #sampleに地図を埋め込む
		center: { // 地図の中心を指定
			lat: 34.7019399, // 緯度
			lng: 135.51002519999997 // 経度
		},
		zoom: 19 // 地図のズームを指定
	});
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJPq59HWpcrOlRQqN8gCOv9JpgaJlkZCA&callback=initMap"></script>

