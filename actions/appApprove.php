<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	$userModel = new UserModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if (!$userModel->isAdmin()) return $userModel->redirect('profile.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';
		
		$appModel = new AppModel();

		$id = $_POST['app-approve-id'];
		$photoAfter = file_get_contents($_FILES['photoAfter']['tmp_name']);

		$appModel->approveApp($id, $photoAfter);
		return $appModel->redirect('admin.php');
	}
