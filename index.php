<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	$userModel = new UserModel();
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
					<img class="logo__img" src="assets/img/logo-light.png" alt="">
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
		<!-- последние решенные заявки -->
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Городской портал - cделаем лучше вместе</h1>
					<!-- счетчик -->
					<div class="app-counter">
						<span class="app-counter__text">Заявок решено:</span>
						<strong class="app-counter__value">5</strong>
					</div>
				</div>
				<div class="section__content">
					<div class="solved-apps">
						<!-- 1 заявка -->
						<div class="app">
							<div class="app__photos">
								<img class="app__img app__img_before" src="https://magazine.skyeng.ru/wp-content/uploads/2019/03/shutterstock_745196731.jpg" alt="">
								<img class="app__img app__img_after" src="https://yt3.ggpht.com/IOezcBl3gW8uGXhQR5ghtYE15stxDcoaNC0UFkZ5gRJ0x6Dl3rN2mrm5VYaKSQ9vDWnt2zzO=s900-c-k-c0x00ffffff-no-rj" alt="">
							</div>
							<div class="app__content">
								<strong class="app__name text-limit" title="У кота появился хозяин">У кота появился хозяин</strong>
								<div class="text-muted text-limit">
									<small class="app__time">2018-09-12</small>
									<small class="app__category" title="Категория: Коты">Категория: Коты</small>
								</div>
							</div>
						</div>
						<!-- 2 заявка -->
						<div class="app">
							<div class="app__photos">
								<img class="app__img app__img_before" src="https://magazine.skyeng.ru/wp-content/uploads/2019/03/shutterstock_745196731.jpg" alt="">
								<img class="app__img app__img_after" src="https://yt3.ggpht.com/IOezcBl3gW8uGXhQR5ghtYE15stxDcoaNC0UFkZ5gRJ0x6Dl3rN2mrm5VYaKSQ9vDWnt2zzO=s900-c-k-c0x00ffffff-no-rj" alt="">
							</div>
							<div class="app__content">
								<strong class="app__name text-limit" title="У кота появился хозяин">У кота появился хозяин</strong>
								<div class="text-muted text-limit">
									<small class="app__time">2018-09-12</small>
									<small class="app__category" title="Категория: Коты">Категория: Коты</small>
								</div>
							</div>
						</div>
						<!-- 3 заявка -->
						<div class="app">
							<div class="app__photos">
								<img class="app__img app__img_before" src="https://magazine.skyeng.ru/wp-content/uploads/2019/03/shutterstock_745196731.jpg" alt="">
								<img class="app__img app__img_after" src="https://yt3.ggpht.com/IOezcBl3gW8uGXhQR5ghtYE15stxDcoaNC0UFkZ5gRJ0x6Dl3rN2mrm5VYaKSQ9vDWnt2zzO=s900-c-k-c0x00ffffff-no-rj" alt="">
							</div>
							<div class="app__content">
								<strong class="app__name text-limit" title="У кота появился хозяин">У кота появился хозяин</strong>
								<div class="text-muted text-limit">
									<small class="app__time">2018-09-12</small>
									<small class="app__category" title="Категория: Коты">Категория: Коты</small>
								</div>
							</div>
						</div>
						<!-- 4 заявка -->
						<div class="app">
							<div class="app__photos">
								<img class="app__img app__img_before" src="https://magazine.skyeng.ru/wp-content/uploads/2019/03/shutterstock_745196731.jpg" alt="">
								<img class="app__img app__img_after" src="https://yt3.ggpht.com/IOezcBl3gW8uGXhQR5ghtYE15stxDcoaNC0UFkZ5gRJ0x6Dl3rN2mrm5VYaKSQ9vDWnt2zzO=s900-c-k-c0x00ffffff-no-rj" alt="">
							</div>
							<div class="app__content">
								<strong class="app__name text-limit" title="У кота появился хозяин">У кота появился хозяин</strong>
								<div class="text-muted text-limit">
									<small class="app__time">2018-09-12</small>
									<small class="app__category" title="Категория: Коты">Категория: Коты</small>
								</div>
							</div>
						</div>
					</div>
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