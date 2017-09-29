<?php
	$path = "";

	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
	require_once("{$path}content/php/table_select.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta chraset="UTF-8">
		<link rel="stylesheet" href="./content/css/reset.css">
		<link rel="stylesheet" href="./content/css/style_common.css">
		<link rel="stylesheet" href="./content/css/style_0.css">
		<title id="ti">横浜防災案内-Yokohama Disaster Prevention</title>
	</head>
	<body>
		<div class="wrap">
			<header>
				<h1>
					YDP
				</h1>
			</header>
			<main>
				<h3>まずは落ち着きましょう…</h3>
				<div class="box_menu">
					<h4>案内</h3>
					<ul>
						<li><a href="#"><img src="./content/img/tsunami2.png"></a></li>
						<li>
						</li>
						<li>
						</li>
						<li>
						</li>
					</ul>
				</div>
				<div class="box_info">
				</div>
				<div class="box_twitter">
					<a class="twitter-timeline" href="https://twitter.com/yokohama_saigai">Tweets by yokohama_saigai</a>
					<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
			</main>
			<footer>
				<p>よこはま</p>
			</footer>
		</div>
					<li>
					</li>
					<li>
					</li>
					<li>
					</li>
				</ul>
			</div>
			<div class="box_info">
			</div>
			<div class="box_twitter">
				<a class="twitter-timeline" href="https://twitter.com/yokohama_saigai">Tweets by yokohama_saigai</a>
				<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</main>
		<footer>
			<p>よこはま</p>
		</footer>
	</body>
</html>
