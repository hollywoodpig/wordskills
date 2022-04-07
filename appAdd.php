<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if ($userModel->isAdmin()) return $userModel->redirect('admin.php');

	$appModel = new AppModel();

	$appCats = $appModel->getCats();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$userId = $userModel->get('id');
		$catId = $_POST['cat-id'];
		$name = $_POST['name'];
		$text = $_POST['text'];
		$photo = file_get_contents($_FILES['photo']['tmp_name']);
		$created = date('d.m.Y H:i');

		$appModel->addApp($userId, $catId, $name, $text, $photo, $created);
		$appModel->redirect('profile.php');
	}
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - добавление заявки</title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="logo/logo.png" alt="">
				</a>
				<div class="header__inline">
					<a href="profile.php" class="btn"><?= $userModel->get('name') ?></a>
				</div>
			</div>
		</div>
	</header>
	<main class="main">
		<!-- добавить заявку -->
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Добавление заявки</h1>
				</div>
				<div class="section__content">
					<form class="form" method="post" enctype="multipart/form-data">
						<input required name="name" type="text" class="input" placeholder="Название заявки">
						<textarea required name="text" class="input" placeholder="Описание заявки"></textarea>
						<select required name="cat-id" class="input">
							<?php foreach($appCats as $cat): ?>
								<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
							<?php endforeach; ?>
						</select>
						<input required class="input" type="file" name="photo" accept="image/jpg, image/jpeg, image/png, image/bmp" placeholder="Фотография заявки">
						<button class="btn">Добавить</button>
					</form>
				</div>
			</div>
		</section>
	</main>
	<footer class="footer">
		<div class="container">
			<div class="footer__content">
				<small class="text-muted">2022. Никита Кирша</small>
			</div>
		</div>
	</footer>
	
	<script src="assets/js/main.js"></script>
</body>
</html>