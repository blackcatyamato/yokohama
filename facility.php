<?php
	if($_GET){
		$id = $_GET["id"];
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
		<link rel="stylesheet" href="./content/css/style_header.css">
		<title>施設詳細-Yokohama Disaster Prevention</title>
	</head>
		<?php
			$page = "施設詳細";
			include "./header.php";
		?>
	<body>
		<main>?
			<?php
			$path="";
			$dbh = new PDO("sqlite:{$path}content/db/sqlite.db");
			try{
				$sql = "SELECT Name,Address,Ward,WardCode FROM shelter_jp WHERE id=\"".$id."\"";
				$stmt = $dbh->query($sql);

				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				print("<div class=\"fa_box\">");
				print("<h3>".$result["Name"]."</h3>");
				print("<div class=\"fa_inner\">");
				print("<h4>住所</h4>");
				print("<p>".$result["Address"]."</p>");
				print("</div>");
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
