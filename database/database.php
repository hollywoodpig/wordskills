<?php
	try {
		// init connection

		$db = new PDO('mysql:host=localhost', 'root', 'root', [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);

		// create db
		
		$db->query('create database if not exists ws');
		$db->query('use ws');

		// create users table

		$db->query('
			create table if not exists users (
				id int auto_increment primary key,
				name varchar(255),
				login varchar(255) unique,
				email varchar(255),
				password varchar(255),
				admin bit default 0
			)
		');

		// create apps table

		$db->query('
			create table if not exists apps (
				id int auto_increment primary key,
				user_id int,
				cat_id int,
				name varchar(255),
				text varchar(255),
				status varchar(255),
				photo varchar(255),
				photo_after varchar(255),
				created varchar(255)
			)
		');

		// create app cats table

		$db->query('
			create table if not exists app_cats (
				id int auto_increment primary key,
				name varchar(255)
			)
		');

		// create relations

		$db->query('alter table apps add index (user_id), add foreign key (user_id) references users(id) on delete cascade on update cascade');
		$db->query('alter table apps add index (cat_id), add foreign key (cat_id) references app_cats(id) on delete cascade on update cascade');
		
	} catch(PDOException $e) {
		echo $e;
	}
