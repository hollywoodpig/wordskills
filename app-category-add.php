<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - добавление категории заявки</title>
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
		<!-- добавить заявку -->
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Добавление категории заявки</h1>
				</div>
				<div class="section__content">
					<form class="form-inline">
						<input required name="title" type="text" class="input" placeholder="Название категории">
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