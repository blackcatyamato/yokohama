<?php

/****区一覧********************/
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


/******************************/
	$stmt = $pdo->prepare("
				SELECT
					Name,
					Definition,
					Address,
					Ward
				FROM
					shelter_jp
				WHERE
					Ward LIKE ?
			");
	$stmt->bindValue(1, $aa, PDO::PARAM_STR);
	$stmt->execute();

	$i = 1;
	$content = 0;
	foreach($stmt as $row){
		$name[$i] = htmlspecialchars($row["Name"]);
		$definition[$i] = htmlspecialchars($row["Definition"]);
		$address[$i] = htmlspecialchars($row["Address"]);
		$ward[$i] = htmlspecialchars($row["Ward"]);

		$i++;
		$content++;
	}

/******************************/


?>