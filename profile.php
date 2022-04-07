<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';

	$user = new User();

	if (!$user->isLogged()) return $user->redirect('index.php');
	if ($user->isAdmin()) return $user->redirect('admin.php');
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Профиль Anon</title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="assets/img/logo-light.png" alt="">
				</a>
				<div class="header__inline">
					<a href="appAdd.php" class="btn">Создать заявку</a>
					<a href="actions/logout.php" class="btn btn_outline">Выйти</a>
				</div>
			</div>
		</div>
	</header>
	<main class="main">
		<!-- профиль -->
		<section class="section">
			<div class="container">
				<div class="section__heading">
					<h1 class="section__title">Добро пожаловать, Anon. Вот ваши заявки:</h1>
				</div>
				<div class="section__content">
					<!-- фильтр -->
					<div class="space-b">
						<form class="form-inline">
							<select class="input" name="status">
								<option selected disabled >Показывать только по статусу</option>
								<option value="Новая">Новая</option>
								<option value="Решена">Решена</option>
								<option value="Отклонена">Отклонена</option>
							</select>
							<button class="btn">Вывести</button>
						</form>
					</div>
					<!-- заявки пользователя -->
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
									<th>Действие</th>
								</tr>
								<!-- 1 ряд -->
								<tr>
									<td><p class="">1</p></td>
									<td><p class="">Убейте меня пожалуйста</a></td>
									<td><p class="">Отклонена</p></td>
									<td><p class="">Суицид</p></td>
									<td><p class="">19.06.18</p></td>
									<td><p class="">Help me, i ain't got no brains, i can feel no pain</p></td>
									<td><a href="#" class="link link_disabled">Удалить</a></td>
								</tr>
								<!-- 2 ряд -->
								<tr>
									<td><p class="">2</p></td>
									<td><p class="">Убейте меня пожалуйста</a></td>
									<td><p class="">Новая</p></td>
									<td><p class="">Суицид</p></td>
									<td><p class="">19.06.18</p></td>
									<td><p class="">Help me, i ain't got no brains, i can feel no pain</p></td>
									<td><a href="#" data-modal-open="app-delete" data-app-id="2" class="link link_danger">Удалить</a></td>
								</tr>
								<!-- 3 ряд -->
								<tr>
									<td><p class="">3</p></td>
									<td><p class="">Убейте меня пожалуйста</a></td>
									<td><p class="">Новая</p></td>
									<td><p class="">Суицид</p></td>
									<td><p class="">19.06.18</p></td>
									<td><p class="">Help me, i ain't got no brains, i can feel no pain</p></td>
									<td><a href="#" data-modal-open="app-delete" data-app-id="3" class="link link_danger">Удалить</a></td>
								</tr>
								<!-- 4 ряд -->
								<tr>
									<td><p class="">4</p></td>
									<td><p class="">Убейте меня пожалуйста</a></td>
									<td><p class="">Новая</p></td>
									<td><p class="">Суицид</p></td>
									<td><p class="">19.06.18</p></td>
									<td><p class="">Help me, i ain't got no brains, i can feel no pain</p></td>
									<td><a href="#" data-modal-open="app-delete" data-app-id="4" class="link link_danger">Удалить</a></td>
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
	<!-- удалить заявку -->
	<div class="modal" id="app-delete">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Удалить заявку?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<p>Данное действие нельзя будет отменить.</p>
				<form style="width: 100%;">
					<input type="hidden" name="app-delete-id" id="app-delete-id">
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