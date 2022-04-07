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
									<td><a href="#" data-modal-open="app-category-delete" data-app-id="1" class="link link_danger">Удалить</a></td>
								</tr>
								<!-- 2 ряд -->
								<tr>
									<td>2</td>
									<td>Не коты</td>
									<td><a href="#" data-modal-open="app-category-delete" data-app-id="2" class="link link_danger">Удалить</a></td>
								</tr>
								<!-- 3 ряд -->
								<tr>
									<td>3</td>
									<td>Что-нибудь</td>
									<td><a href="#" data-modal-open="app-category-delete" data-app-id="3" class="link link_danger">Удалить</a></td>
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
	<!-- удалить категорию заявки -->
	<div class="modal" id="app-category-delete">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Удалить категорию заявки?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<p>Все заявки с данной категорией будут удалены.</p>
				<form style="width: 100%;">
					<input type="hidden" name="app-category-delete-id" id="app-category-delete-id">
					<div class="inline inline_grow">
						<button class="btn btn_danger">Удалить</button>
						<a class="btn btn_danger btn_outline" href="#" data-modal-close>Закрыть</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="assets/js/main.js"></script>
	<script src="assets/js/modal.js"></script>
</body>
</html>