<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	$userModel = new UserModel();
	$userModel->logout();
