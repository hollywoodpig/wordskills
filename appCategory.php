<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Список категорий заявок</title>
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
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Категории заявок:</h1>
				</div>
				<div class="section__content">
					<div class="space-b">
						<form class="form-inline">
							<input required name="title" type="text" class="input" placeholder="Название категории">
							<button class="btn">Добавить</button>
						</form>
					</div>
					<!-- категории заявок -->
					<div class="table">
						<table>
							<tbody>
								<!-- заголовки таблицы -->
								<tr>
									<th>№</th>
									<th>Название</th>
									<th>Действие</th>
								</tr>
								<!-- 1 ряд -->
								<tr>
									<td>1</td>
									<td>Коты</td>
									<td><a href="appCategoryDelete.php" class="link link_danger">Удалить</a></td>
								</tr>
								<!-- 2 ряд -->
								<tr>
									<td>2</td>
									<td>Не коты</td>
									<td><a href="appCategoryDelete.php" class="link link_danger">Удалить</a></td>
								</tr>
								<!-- 3 ряд -->
								<tr>
									<td>3</td>
									<td>Что-нибудь</td>
									<td><a href="appCategoryDelete.php" class="link link_danger">Удалить</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</main>
	<footer class="footer">
		<div class="container">
			<div class="footer__content">
				<small class="">2022. Никита Кирша</small>
			</div>
		</div>
	</footer>
	
	<script src="assets/js/main.js"></script>
</body>
</html>