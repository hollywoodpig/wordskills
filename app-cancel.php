<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - отклонение заявки</title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="assets/img/logo-light.png" alt="">
				</a>
				<div class="header__inline">
					<a href="admin.php" class="btn">Администратор</a>
				</div>
			</div>
		</div>
	</header>
	<main class="main">
		<!-- отклонить заявку -->
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Отклонить заявку "Убейте меня пожалуйста"?</h1>
				</div>
				<div class="section__content">
					<form class="form">
						<textarea class="input" name="refuse" placeholder="Причина отказа "></textarea>
						<div class="inline">
							<button class="btn">Отклонить</button>
							<a class="btn btn_outline" href="admin.php">Вернуться назад</a>
						</div>
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