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

		<link rel="stylesheet" href="<?=$path?>content/css/onsenui.min.css">
		<link rel="stylesheet" href="<?=$path?>content/css/onsen-css-components.min.css">

		<link rel="stylesheet" href="<?=$path?>content/css/style.css">

		<script src="<?=$path?>content/js/onsenui.min.js"></script>
		<script src="<?=$path?>content/js/angular-onsenui.min.js"></script>
	</head>

	<body>
		<div class="wrap">
			<header>
				<h1>YDP</h1>
			</header>
			<main>
				<h3>まずは落ち着きましょう…</h3>
				<div class="box_menu">
					<h4>案内</h4>
					<ul>
						<li>
							<a href="<?=$path?>map.php">
								<img src="./content/img/tsunami2.png">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="./content/img/tsunami2.png">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="./content/img/tsunami2.png">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="./content/img/tsunami2.png">
							</a>
						</li>
					</ul>
				</div>
					<div class="box_info">
						<p>aaaaaaaaaaaaaaaaaaaaa</p>
					</div>
					<div class="box_twitter">
						<a class="twitter-timeline" href="https://twitter.com/yokohama_saigai">Tweets by yokohama_saigai</a>
						<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
			</main>
			<nav class="tab_bar">
				aaaaa
			</nav>
		</div>
	</body>
</html>
