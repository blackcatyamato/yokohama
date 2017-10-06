<?php
	if($_GET){
		$name = $_GET["name"];
	}
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="device-width,initial-scale=1">
		<link rel="stylesheet" href="./content/css/style_common.css">
		<link rel="stylesheet" href="./content/css/style_facility.css">
<?php
		print("<title>".$name."-Yokohama Disaster Prevention</title>");
?>
	</head>
		<header>
			<h1>
				YDP
			</h1>
		</header>
	<body>
		<main>
			<?php
				//include "./print_facility_more.php";
			?>
		</main>
	</body>
</html>
