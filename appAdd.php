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
					<img class="logo__img" src="assets/img/logo-light.png" alt="">
				</a>
				<div class="header__inline">
					<a href="profile.php" class="btn">Anon</a>
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
					<form class="form" enctype="multipart/form-data">
						<input required name="title" type="text" class="input input_danger" placeholder="Название заявки">
						<textarea required name="text" class="input" placeholder="Описание заявки"></textarea>
						<select required name="category" class="input">
							<option disabled selected>Категория заявки</option>
							<option value="Коты">Коты</option>
							<option value="Не коты">Не коты</option>
							<option value="Что-нибудь">Что-нибудь</option>
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