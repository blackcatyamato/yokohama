<?php

	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");

	foreach(range(1, 10) as $i):
		$stmt = $pdo->prepare("
				INSERT INTO
					water_jp()
				VALUES()
				");
		$stmt->execute();
	endforeach;

	$stmt = null;
	$pdo = null;
