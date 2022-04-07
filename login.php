<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';

	$user = new User();

	if ($user->isLogged()) return $user->redirect('profile.php');
	if ($user->isAdmin()) return $user->redirect('admin.php');

	$isError = false;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$login = $_POST['login'];
		$password = $_POST['password'];
		$submit = $_POST['submit'];
	
		if (isset($submit)) {
			$isError = !$user->login($login, $password);
		}
	}
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - войти</title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="assets/img/logo-light.png" alt="">
				</a>
				<div class="header__inline">
					<a href="register.php" class="btn">Создать аккаунт</a>
					<a href="index.php" class="btn btn_outline">На главную</a>
				</div>
			</div>
		</div>
	</header>
	<main class="main">
		<!-- войти -->
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Городской портал - войти</h1>
				</div>
				<div class="section__content">
					<?php if($isError): ?>
						<div class="alert">
							<div class="alert__content">
								<span class="alert__text">Неправильная пара логин-пароль</span>
								<button class="btn-close">&times;</button>
							</div>
						</div>
					<?php endif; ?>
					<form class="form-inline" method="post">
						<input required name="login" type="text" class="input" placeholder="Логин">
						<input required name="password" type="password" class="input" placeholder="Пароль">
						<button name="submit" class="btn">Войти</button>
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