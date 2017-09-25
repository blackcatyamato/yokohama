<?php
	$stmt = $pdo->query("
				SELECT
					Type,
					Definition,
					Name,
					Address,
					Let,
					Lon,
					Ward,
					WardCode
				FROM
					hinanjo
			");

	$i = 1;
	foreach((array)$stmt as $row){

		$type[$i] = htmlspecialchars($row["Type"]);
		$definition[$i] = htmlspecialchars($row["Definition"]);
		$name[$i] = htmlspecialchars($row["Name"]);
		$address[$i] = htmlspecialchars($row["Address"]);
		$let[$i] = htmlspecialchars($row["Let"]);
		$lon[$i] = htmlspecialchars($row["Lon"]);
		$kana[$i] = htmlspecialchars($row["Kana"]);
		$ward[$i] = htmlspecialchars($row["Ward"]);
		$wardCode[$i] = htmlspecialchars($row["WardCode"]);


		$i++;

	}

?>