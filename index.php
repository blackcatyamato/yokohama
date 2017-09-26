<?php
	$path = "";

	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
	require_once("{$path}content/php/table_select.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta chraset="UTF-8">
		<script type="text/javascript">
			var onot = window.onorientation;
			if(onot==0 || onot==180){
				document.all.tags("head").innerHTML = "<meta name=\"viewport\" content=\"width=640,initial-scale=1\">;
			}else{
				document.all.tags("head").innerHTML = "<meta name=\"viewport\" content=\"width=1280,initial-scale=1\">;
				document.all.tags("head").innerHTML = "<meta name=\"viewport\" content=\"width=1280,initial-scale=1\">;
			}
		</script>
		<link rel="stylesheet" href="./content/css/reset.css">
		<link rel="stylesheet" href="./content/css/style_common.css">
		<link rel="stylesheet" href="./content/css/style_0.css">
		<title>横浜防災案内-Yokohama Disaster Prevention</title>
	</head>
	<body>
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
					<li>
						<img src="./content/img/tsunami.png" width="70%">
					</li>
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