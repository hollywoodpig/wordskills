<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - Администратор</title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="assets/img/logo-light.png" alt="">
				</a>
				<div class="header__inline">
					<a href="app-category-add.php" class="btn">Создать категорию</a>
					<a href="app-category-delete.php" class="btn">Управление категориями</a>
					<a href="logout.php" class="btn btn_outline">Выйти</a>
				</div>
			</div>
		</div>
	</header>
	<main class="main">
		<!-- администратор -->
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Добро пожаловать, Администратор. Вот список всех заявок на сайте:</h1>
				</div>
				<div class="section__content">
					<!-- все заявки -->
					<div class="table">
						<table>
							<tbody>
								<!-- заголовки таблицы -->
								<tr>
									<th>№</th>
									<th>Название</th>
									<th>Статус</th>
									<th>Категория</th>
									<th>Время</th>
									<th>Описание</th>
									<th colspan="2">Действие</th>
								</tr>
								<!-- 1 ряд -->
								<tr>
									<td>1</td>
									<td>Убейте меня пожалуйста</td>
									<td>Новая</td>
									<td>Суицид</td>
									<td>19.06.18</td>
									<td>Help me, i ain't got no brains, i can feel no pain</td>
									<td><a href="app-approve.php" class="link">Одобрить</a></td>
									<td><a href="app-cancel.php" class="link link_danger">Отклонить</a></td>
								</tr>
								<!-- 2 ряд -->
								<tr>
									<td>2</td>
									<td>Убейте меня пожалуйста</td>
									<td>Новая</td>
									<td>Суицид</td>
									<td>19.06.18</td>
									<td>Help me, i ain't got no brains, i can feel no pain</td>
									<td><a href="app-approve.php" class="link">Одобрить</a></td>
									<td><a href="app-cancel.php" class="link link_danger">Отклонить</a></td>
								</tr>
								<!-- 3 ряд -->
								<tr>
									<td>3</td>
									<td>Убейте меня пожалуйста</td>
									<td>Новая</td>
									<td>Суицид</td>
									<td>19.06.18</td>
									<td>Help me, i ain't got no brains, i can feel no pain</td>
									<td><a href="app-approve.php" class="link">Одобрить</a></td>
									<td><a href="app-cancel.php" class="link link_danger">Отклонить</a></td>
								</tr>
								<!-- 4 ряд -->
								<tr>
									<td>4</td>
									<td>Убейте меня пожалуйста</td>
									<td>Новая</td>
									<td>Суицид</td>
									<td>19.06.18</td>
									<td>Help me, i ain't got no brains, i can feel no pain</td>
									<td><a href="app-approve.php" class="link">Одобрить</a></td>
									<td><a href="app-cancel.php" class="link link_danger">Отклонить</a></td>
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