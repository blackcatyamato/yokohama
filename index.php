<?php
	$path = "";
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
		<link rel="stylesheet" href="<?=$path?>content/css/style_header.css">
	</head>

	<body>
		<div class="wrap">
			<?php
				$page = "トップ";
				include "./header.php";
			?>
			<main>
				<h2>
					<marquee>まずは落ち着きましょう…</marquee>
				</h2>

				<div class="Flowing-alert">
					<div class="panel-heading">
						<h3 class="panel-title"><a name="warn"></a>横浜市域の警報・注意報</h3>
					</div>
					<div class="panel-body">
						<div id="warning2"></div>
							<noscript>
								<div>
									<p>aaaaas
										<a href="http://www.city.yokohama.lg.jp/ex/kikikanri/weather/ippan1/index_warning.html">→ 警報・注意報のページへ</a>
									</p>
								</div>
							</noscript>
					</div>
				</div>

<div class="inner">
	<div class="box_menu">
		<h4>案内</h4>
		<ul>
			<li class="Tunami">
				<a href="<?=$path?>map.php">津波避難
					<img src="<?=$path?>content/img/tsunami2.png">
				</a>
			</li>
			<li class="Item">
				<a href="#">医療・避難道具
					<img src="<?=$path?>content/img/medical.jpg">
				</a>
			</li>
			<li class="Hinan">
				<a href="#">帰宅困難者避難所
					<img src="<?=$path?>content/img/tsunami2.png">
				</a>
			</li>
			<li class="Tbousai">
				<a href="#">地域防災拠点
					<img src="<?=$path?>content/img/tsunami2.png">
				</a>
			</li>
		</ul>
	</div>

	<div class="box_info">
		<p>txcuygftgvhgbjugiyutfguhb</p>
	</div>

	<div class="box_twitter">
		<a class="twitter-timeline" href="https://twitter.com/yokohama_saigai">Tweets by yokohama_saigai</a>
		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
</div>
			</main>
		</div>
	</body>
</html>
