<?php
	try {
		$db = new PDO('mysql:host=localhost', 'root', 'root', [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	} catch(PDOException $e) {
		echo $e;
	}