<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();
	$appModel = new AppModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if ($userModel->isAdmin()) return $userModel->redirect('admin.php');

	$apps = $userModel->getApps();
	$appsNotNull = !empty($apps);
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Профиль <?= $userModel->get('name'); ?></title>
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
					<h1 class="section__title">Добро пожаловать, <?= $userModel->get('name'); ?>. Вот ваши заявки:</h1>
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
					<?php if ($appsNotNull): ?>
						<div class="table">
							<table>
								<tbody>
									<tr>
										<th>№</th>
										<th>Название</th>
										<th>Статус</th>
										<th>Категория</th>
										<th>Время</th>
										<th>Описание</th>
										<th>Действие</th>
									</tr>
									<?php foreach($apps as $app): ?>
										<tr>
											<td><?= $app['id'] ?></td>
											<td><?= $app['name'] ?></td>
											<td><?= $app['status'] ?></td>
											<td><?= $appModel->getCat($app['cat_id']) ?></td>
											<td><?= $app['created'] ?></td>
											<td><?= $app['text'] ?></td>
											<td><a href="#" data-modal-open="app-delete" data-app-id="<?= $app['id'] ?>" class="link link_danger">Удалить</a></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<p>У вас пока нет заявок. Как насчет создать одну?</p>
					<?php endif; ?>
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