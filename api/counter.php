<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$appModel = new AppModel();

	echo json_encode($appModel->approvedCount());
