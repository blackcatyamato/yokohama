<?php

/****仮*************************/
	$stmt = $pdo->query("
				SELECT
					Ward,
					WardCode
				FROM
					shelter_jp
				GROUP BY
					Ward
				ORDER BY
					WardCode ASC
			");
	$i = 1;
	$ward_content = 0;
	foreach($stmt as $row){
		$ward_list[$i] = htmlspecialchars($row["Ward"]);

		$i++;
		$ward_content++;
	}




/******************************/



	$stmt = $pdo->prepare("
				SELECT
					Type,
					Definition,
					Name,
					Address,
					Lat,
					Lon,
					Ward,
					WardCode
				FROM
					shelter_jp
				WHERE
					Type LIKE '%' AND
					Ward LIKE ?
			");
	$stmt->bindValue(1, $aa, PDO::PARAM_STR);
	$stmt->execute();

	$i = 1;
	$content = 0;
	foreach($stmt as $row){
		$type[$i] = htmlspecialchars($row["Type"]);
		$definition[$i] = htmlspecialchars($row["Definition"]);
		$name[$i] = htmlspecialchars($row["Name"]);
		$address[$i] = htmlspecialchars($row["Address"]);
		$lat[$i] = htmlspecialchars($row["Lat"]);
		$lon[$i] = htmlspecialchars($row["Lon"]);
		$ward[$i] = htmlspecialchars($row["Ward"]);
		$wardCode[$i] = htmlspecialchars($row["WardCode"]);

		$i++;
		$content++;
	}


?>
