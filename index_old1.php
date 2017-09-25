<?php
	$path = "";

	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
	require_once("{$path}content/php/table_select.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./content/css/reset.css">
		<link rel="stylesheet" href="./content/css/style.css">
		<title>横浜防災案内-Yokohama Disaster Prevention</title>
	</head>
	<body>
		<h1>
			YDP
		</h1>
		<table id="tb_Upper">
			<tr>
				<td>
					<div><a href="#">地域拠点</a></div>
				</td>
				<td>
					<div><a href="#">津波避難</a></div>
				</td>
			</tr>
			<tr>
				<td>
					<div><a href="#">応急給水</a></div>
				</td>
				<td>
					<div><a href="#">帰宅困難</a></div>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="lecture">
					<div><a href="#">どうしよう?</a></div>
				</td>
			</tr>
		</table>
		<table id="tb_Middle">
			<tr>
				<td>
					<div>
							お知らせ
					</div>
				</td>
			</tr>
		</table>
		<table id="tb_Lower"
			<tr>
				<td>
					<div>
						twitter
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>