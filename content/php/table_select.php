<?php
	$stmt = $pdo->query("
				SELECT
					Type,
					Definition,
					Name,
					Address,
					Lat,
					Lon,
					Kana,
					Ward,
					WardCode
				FROM
					hinanjo
			");

	$i = 1;
	$count = 0;
	foreach($stmt as $row){

		$type[$i] = htmlspecialchars($row["Type"]);
		$definition[$i] = htmlspecialchars($row["Definition"]);
		$name[$i] = htmlspecialchars($row["Name"]);
		$address[$i] = htmlspecialchars($row["Address"]);
		$lat[$i] = htmlspecialchars($row["Lat"]);
		$lon[$i] = htmlspecialchars($row["Lon"]);
		$kana[$i] = htmlspecialchars($row["Kana"]);
		$ward[$i] = htmlspecialchars($row["Ward"]);
		$wardCode[$i] = htmlspecialchars($row["WardCode"]);


		$i++;
		$count++;
	}

?>
