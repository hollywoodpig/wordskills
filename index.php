<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();
	$appModel = new AppModel();

	$solvedApps = $appModel->getApproved();
	$solvedAppsNotEmpty = !empty($solvedApps);
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - cделаем лучше вместе</title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="logo/logo.png" alt="">
				</a>
				<div class="header__inline">
					<?php if($userModel->islogged()): ?>
						<?php if($userModel->isAdmin()): ?>
							<a href="admin.php" class="btn"><?= $userModel->get('name'); ?></a>
						<?php else: ?>
							<a href="profile.php" class="btn"><?= $userModel->get('name'); ?></a>
						<?php endif; ?>
					<?php else: ?>
						<a href="login.php" class="btn">Войти</a>
						<a href="register.php" class="btn btn_outline">Создать аккаунт</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	<main class="main">
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Городской портал - cделаем лучше вместе</h1>
					<!-- счетчик -->
					<div class="app-counter">
						<span class="app-counter__text">Заявок решено:</span>
						<strong class="app-counter__value">0</strong>
					</div>
				</div>
				<div class="section__content">
					<!-- последние решенные заявки -->
					<?php if ($solvedAppsNotEmpty): ?>
						<div class="solved-apps">
							<?php foreach($solvedApps as $app): ?>
								<?php
									$photo = 'data:image/png;base64,' . base64_encode($app['photo']);
									$photoAfter = 'data:image/png;base64,' . base64_encode($app['photo_after']);
								?>

								<div class="app">
									<div class="app__photos">
										<img class="app__img app__img_before" src="<?= $photo ?>" alt="<?= $app['name'] . ' до' ?>">
										<img class="app__img app__img_after" src="<?= $photoAfter ?>" alt="<?= $app['name'] . ' после' ?>">
									</div>
									<strong class="app__name text-limit" style="--limit: 2;" title="<?= $app['name'] ?>"><?= $app['name'] ?></strong>
									<div class="text-muted">
										<small class="app__time"><?= $app['created'] ?></small>
										<small class="app__category" title="<?= $appModel->getCat($app['cat_id']) ?>">Категория: <?= $appModel->getCat($app['cat_id']) ?></small>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<p>Пока что решенных заявок нет. Но мы их будем решать, когда они начнут появляться, ага?</p>
					<?php endif; ?>
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
	<script src="assets/js/counter.js"></script>
</body>
</html>