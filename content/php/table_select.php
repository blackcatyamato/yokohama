<?php

/****区一覧********************/
	$stmt = $pdo->query("
				SELECT
					Ward,
					WardCode
				FROM
					{$type}_{$lang}
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
					id,
					Name,
					Address,
					Ward,
					WardCode,
					Lat,
					Lon
				FROM
					{$type}_{$lang}
				WHERE
					id LIKE ? AND
					WardCode LIKE ?

			");
	$stmt->bindValue(1, $id_test, PDO::PARAM_STR);
	$stmt->bindValue(2, $ku, PDO::PARAM_STR);
	$stmt->execute();

	$i = 1;
	$count = 0;
	foreach($stmt as $row){
		$id[$i] = htmlspecialchars($row["id"]);
		$name[$i] = htmlspecialchars($row["Name"]);
		$address[$i] = htmlspecialchars($row["Address"]);
		$ward[$i] = htmlspecialchars($row["Ward"]);
		$lat[$i] = htmlspecialchars($row["Lat"]);
		$lon[$i] = htmlspecialchars($row["Lon"]);

		$i++;
		$count++;
	}

/******************************/
