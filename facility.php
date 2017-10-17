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
		<link rel="stylesheet" href="./content/css/reset.css">
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
		<main>﻿
			<?php
			$path="";
			$dbh = new PDO("sqlite:{$path}content/db/sqlite.db");
			try{
				$sql = "SELECT Name,Address,Ward,WardCode FROM hinanjo WHERE Type = \"地域防災拠点\" AND Name=\"".$name."\"";
				$stmt = $dbh->query($sql);

				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				print("<div class=\"ft_box\">");
				print("<h3>".$result["Name"]."</h3>");
				print("<h4>住所</h4>");
				print("<p>".$result["Address"]."</p>");
				print("</div>");
			}catch(PDOException $e){
				print("Connection failed:".$e->getMessage());
				die();
			}
			$dbh = null;
		?>

		</main>
	</body>
</html>
