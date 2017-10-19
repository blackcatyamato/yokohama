<?php

/****区一覧********************/
	$stmt = $pdo->query("
				SELECT
					Ward,
					WardCode
				FROM
					shelter_{$lang}
				GROUP BY
					Ward
				ORDER BY
					WardCode ASC
			");
	$i = 1;
	$ward_count = 0;
	foreach($stmt as $row){
		$ward_list[$i] = htmlspecialchars($row["Ward"]);
		$wardCode_list[$i] = htmlspecialchars($row["WardCode"]);

		$i++;
		$ward_count++;
	}

/******************************/


/******************************/
	$stmt = $pdo->prepare("
				SELECT
					Name,
					Definition,
					Address,
					Ward,
					WardCode,
					Lat,
					Lon
				FROM
					shelter_{$lang}
				WHERE
					WardCode LIKE ?
			");
	$stmt->bindValue(1, $ku, PDO::PARAM_STR);
	$stmt->execute();

	$i = 1;
	$count = 0;
	foreach($stmt as $row){
		$name[$i] = htmlspecialchars($row["Name"]);
		$address[$i] = htmlspecialchars($row["Address"]);
		$ward[$i] = htmlspecialchars($row["Ward"]);
		$lat[$i] = round(htmlspecialchars($row["Lat"]), 8);
		$lon[$i] = round(htmlspecialchars($row["Lon"]), 8);
		$i++;
		$count++;
	}

/******************************/
