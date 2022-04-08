<?php
	function fillDatabase($db) {
		$db->query('insert into users (name, login, email, password, admin) values ("зубенко михаил петрович", "admin", "admin@admin.admin", "adminWSR", 1)');
		$db->query('insert into app_cats (name) values ("разное")');
	}