<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';

	$user = new User();
	$user->logout();
