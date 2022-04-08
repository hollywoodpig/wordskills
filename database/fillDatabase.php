<?php
	function fillDatabase($db) {
		$db->query('insert into users (name, login, email, password, admin) values ("Зубенко Михаил Петрович", "admin", "admin@admin.admin", "adminWSR", 1)');
		$db->query('insert into app_cats (name) values ("Разное")');
	}