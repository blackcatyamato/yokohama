<?php
	$path="";
	$dbh = new PDO("sqlite:{$path}content/db/sqlite.db");
	/*try{
		$sql = "SELECT Name,Address,Ward,WardCode FROM shelter_jp WHERE Definition = \"".$definition."\" AND Name=".$name;
		$stmt = $dbh->query($sql);

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		print("<div id=\"box_upper\">");
		print("<h3>".$result["Name"]."</h3>");
		print("</div>");

		print("<div id=\"box_lower\">");
		print("<h4>住所</h4>");
		print("<p>".$result["Address"]."</p>");
		print("</div>");
	}catch(PDOException $e){
		print("Connection failed:".$e->getMessage());
		die();
	}*/
	$dbh = null;
?>
