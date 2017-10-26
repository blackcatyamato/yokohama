<?php
	$path = "";

	$id_test = "%";
	$type = "water";
	$lang = "jp";
	$ku = "1";


	if(isset($_GET["type"])){
		$type = $_GET["type"];
	}


	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
	require_once("{$path}content/php/table_select.php");

	$stmt = null;
	$pdo = null;






?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="./content/css/reset.css">
		<link rel="stylesheet" href="./content/css/style_common.css">
		<link rel="stylesheet" href="./content/css/style_1.css">
		<title><?=$facility_title?>-Yokohama Disaster Prevention</title>
	</head>
	<body>
			<?php
				$page = "<?=$facility_title?>";
				include "./header.php";
			?>
		<main id="0">
			<div class="base_list">
				<h2>
					<span style="margin-right:20px;"><?=$facility_title?>一覧</span><!--<span>Disaster&nbspPrevention&nbspBase</span>//-->
				</h2>
				<div class="ward_link">
				<ul>
					<?php foreach(range(1, $ward_count) as $i): ?>
						<li><a href="#<?=$wardCode_list[$i]?>"><?=$ward_list[$i]?></a></li>
					<?php endforeach; ?>
				</ul>
				</div>
				<div class="print">
				<?php
					$definition = "{$type}_{$lang}";
					include "print_1_base.php";
				 ?>
				</div>
			</div>
		</main>
	</body>
</html>
