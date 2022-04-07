<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';

	$user = new User();
	
	if (!$user->isLogged()) return $user->redirect('index.php');
	if (!$user->isAdmin()) return $user->redirect('profile.php');
?>

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
					<a href="appCategory.php" class="btn">Управление категориями</a>
					<a href="actions/logout.php" class="btn btn_outline">Выйти</a>
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
									<td>Отклонена</td>
									<td>Суицид</td>
									<td>19.06.18</td>
									<td>Help me, i ain't got no brains, i can feel no pain</td>
									<td><a href="#" class="link link_disabled">Одобрить</a></td>
									<td><a href="#" class="link link_disabled">Отклонить</a></td>
								</tr>
								<!-- 2 ряд -->
								<tr>
									<td>2</td>
									<td>Убейте меня пожалуйста</td>
									<td>Решено</td>
									<td>Суицид</td>
									<td>19.06.18</td>
									<td>Help me, i ain't got no brains, i can feel no pain</td>
									<td><a href="#" class="link link_disabled">Одобрить</a></td>
									<td><a href="#" class="link link_disabled">Отклонить</a></td>
								</tr>
								<!-- 3 ряд -->
								<tr>
									<td>3</td>
									<td>Убейте меня пожалуйста</td>
									<td>Новая</td>
									<td>Суицид</td>
									<td>19.06.18</td>
									<td>Help me, i ain't got no brains, i can feel no pain</td>
									<td><a href="#" data-modal-open="app-approve" data-app-id="3" class="link">Одобрить</a></td>
									<td><a href="#" data-modal-open="app-cancel" data-app-id="3" class="link link_danger">Отклонить</a></td>
								</tr>
								<!-- 4 ряд -->
								<tr>
									<td>4</td>
									<td>Убейте меня пожалуйста</td>
									<td>Новая</td>
									<td>Суицид</td>
									<td>19.06.18</td>
									<td>Help me, i ain't got no brains, i can feel no pain</td>
									<td><a href="#" data-modal-open="app-approve" data-app-id="4" class="link">Одобрить</a></td>
									<td><a href="#" data-modal-open="app-cancel" data-app-id="4" class="link link_danger">Отклонить</a></td>
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
	<!-- отклонить заявку -->
	<div class="modal" id="app-cancel">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Отклонить заявку?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<form style="width: 100%;">
					<input type="hidden" name="app-cancel-id" id="app-cancel-id">
					<div class="space-b">
						<textarea required class="input" name="refuse" placeholder="Причина отказа"></textarea>
					</div>
					<div class="inline inline_grow">
						<button class="btn">Отклонить</button>
						<a class="btn btn_outline" href="#" data-modal-close>Закрыть</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- одобрить заявку -->
	<div class="modal" id="app-approve">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Одобрить заявку?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<form style="width: 100%;" enctype="multipart/form-data">
					<input type="hidden" name="app-approve-id" id="app-approve-id">
					<div class="space-b">
					<input required class="input" type="file" name="photo" accept="image/jpg, image/jpeg, image/png, image/bmp" placeholder="Фотография заявки">
					</div>
					<div class="inline inline_grow">
						<button class="btn">Одобрить</button>
						<a class="btn btn_outline" href="#" data-modal-close>Закрыть</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="assets/js/main.js"></script>
	<script src="assets/js/modal.js"></script>
</body>
</html>