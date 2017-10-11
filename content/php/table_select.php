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
					Ward
				FROM
					shelter_{$lang}
				WHERE
					Ward LIKE ?
			");
	$stmt->bindValue(1, $ku, PDO::PARAM_STR);
	$stmt->execute();

	$i = 1;
	$count = 0;
	foreach($stmt as $row){
		$name[$i] = htmlspecialchars($row["Name"]);
		$address[$i] = htmlspecialchars($row["Address"]);
		$ward[$i] = htmlspecialchars($row["Ward"]);


		$i++;
		$count++;
	}

/******************************/
