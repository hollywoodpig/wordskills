<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	$userModel = new UserModel();

	if ($userModel->isLogged()) return $userModel->redirect('profile.php');
	if ($userModel->isAdmin()) return $userModel->redirect('admin.php');

	// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 	$name = $_POST['name'];
	// 	$login = $_POST['login'];
	// 	$email = $_POST['email'];
	// 	$password = $_POST['password'];
	// 	$submit = $_POST['submit'];
	
	// 	if (isset($submit)) {
	// 		$userModel->register($name, $login, $email, $password);
	// 	}
	// }
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - создать аккаунт</title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="assets/img/logo-light.png" alt="">
				</a>
				<div class="header__inline">
					<a href="login.php" class="btn">Войти</a>
					<a href="index.php" class="btn btn_outline">На главную</a>
				</div>
			</div>
		</div>
	</header>
	<main class="main">
		<!-- создать аккаунт -->
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Городской портал - создать аккаунт</h1>
				</div>
				<div class="section__content">
					<div class="alert alert_closed">
						<div class="alert__content">
							<span class="alert__text"></span>
							<button class="btn-close">&times;</button>
						</div>
					</div>
					<!-- создать аккаунт -->
					<form class="form" method="post" id="register-form">
						<input name="name" id="name" type="text" class="input" placeholder="ФИО">
						<input name="login" id="login" type="text" class="input" placeholder="Логин">
						<input name="email" id="email" type="email" class="input" placeholder="Почта">
						<input name="password" id="password" type="password" class="input" placeholder="Пароль">
						<input name="password-repeat" id="password-repeat" type="password" class="input" placeholder="Повторите пароль">
						<div class="label-checkbox">
							<input type="checkbox" name="privacy" id="privacy">
							<label for="privacy">Согласен на обработку персональных данных</label>
						</div>
						<button name="submit" class="btn">Создать аккаунт</button>
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
	<script src="assets/js/registerValidate.js"></script>
</body>
</html>