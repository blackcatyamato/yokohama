<?php
	$path = "";

	$aa = null;

	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
	require_once("{$path}content/php/table_select.php");


	$stmt = null;
	$pdo = null;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>横浜防災案内-Yokohama Disaster Prevention</title>
		<link rel="stylesheet" href="<?=$path?>content/css/reset.css">

		<link rel="stylesheet" href="<?=$path?>content/css/style.css">
	</head>

	<body>
		<div class="wrap">
			<header>
				<div class="inner">
					<h1>YDP</h1>
				</div>
			</header>
			<main>
				<h3>まずは落ち着きましょう…</h3>
<div class="panel-heading">
	<h2 class="panel-title"><a name="warn"></a>横浜市域の警報・注意報</h2>
</div>
<div class="panel-body">
	<div id="warning2"></div>
		<noscript>
			<div>
				<p>
					<a href="http://www.city.yokohama.lg.jp/ex/kikikanri/weather/ippan1/index_warning.html">→ 警報・注意報のページへ</a>
				</p>
			</div>
		</noscript>
</div>
<script type="text/javascript" src="http://www.city.yokohama.lg.jp/somu/org/kikikanri/js/jquery.min.js">
</script>
<script type="text/javascript"><!--
	var $warning2Content = $("#warning2")
	$.ajax({
		url: 'http://www.city.yokohama.lg.jp/ex/kikikanri/weather/.cgi/yokohama/warning.cgi?cache='+(new Date()).getTime(),
		type: "GET",
		cache: false,
		dataType: "html",
		success: function(html) {
			$content = $(html).find("marquee");
			$warning2Content.append($content);
		}
	});

	$(function() {
		$('.multiple-item').slick({
			infinite: true,
			dots:true,
			slidesToShow: 8,
			slidesToScroll: 8,
			responsive: [
				{
				breakpoint: 768,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 4,
					}
				},{
				breakpoint: 480,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				}
			]
		});
	});
</script>
<div class="inner">
	<div class="box_menu">
		<h4>案内</h4>
		<ul>
			<li>
				<a href="<?=$path?>map.php">
					<img src="<?=$path?>content/img/tsunami2.png">
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?=$path?>content/img/medical.jpg">
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?=$path?>content/img/tsunami2.png">
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?=$path?>content/img/tsunami2.png">
				</a>
			</li>
		</ul>
	</div>

	<div class="box_info">
		<p>aaaaaaaaaaaaaaa</p>
	</div>

	<div class="box_twitter">
		<a class="twitter-timeline" href="https://twitter.com/yokohama_saigai">Tweets by yokohama_saigai</a>
		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
</div>
			</main>
			<nav class="tab_bar">
				aaaaa
			</nav>
		</div>
	</body>
</html>
