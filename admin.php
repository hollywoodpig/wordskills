<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();
	
	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if (!$userModel->isAdmin()) return $userModel->redirect('profile.php');

	$appModel = new AppModel();

	$apps = $appModel->getAll();
	$appsNotEmpty = !empty($apps);

	$isError = $_GET['error'] ?? '';
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - <?= $userModel->get('name') ?></title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="logo/logo.png" alt="">
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
					<h1 class="section__title">Добро пожаловать, <?= $userModel->get('name') ?>. Вот список всех заявок на сайте:</h1>
				</div>
				<div class="section__content">
					<?php if($isError): ?>
						<div class="alert">
							<div class="alert__content">
								<span class="alert__text">Размер файла слишком большой. Выберите другую фотографию.</span>
								<button class="btn-close">&times;</button>
							</div>
						</div>
					<?php endif; ?>
					<?php if($appsNotEmpty): ?>
						<div class="table">
							<table>
								<tbody>
									<tr>
										<th>Название</th>
										<th>Статус</th>
										<th>Категория</th>
										<th>Время</th>
										<th>Описание</th>
										<th colspan="2">Действие</th>
									</tr>
									<?php foreach($apps as $app): ?>
										<?php
											$notNew = $appModel->getField('status', $app['id']) != 'Новая';
											$isApproved = $appModel->getField('status', $app['id']) == 'Решена';
											$isCancel = $appModel->getField('status', $app['id']) == 'Отклонена';

											$color = '';

											if ($isApproved) {
												$color = 'text-accent';
											} elseif ($isCancel) {
												$color = 'text-danger';
											}
										?>

										<tr>
											<td><?= $app['name'] ?></td>
											<td>
												<p class="<?= $color ?>"><?= $app['status'] ?></p>
												<p><?= $isCancel ? 'Причина: ' . $app['reason'] : '' ?></p>
											</td>
											<td><?= $appModel->getCat($app['cat_id']); ?></td>
											<td><?= $app['created'] ?></td>
											<td><?= $app['text'] ?></td>
											<td><a href="#" data-modal-open="app-approve" data-app-id="<?= $app['id'] ?>" class="link <?= $notNew ? 'link_disabled' : '' ?>">Одобрить</a></td>
											<td><a href="#" data-modal-open="app-cancel" data-app-id="<?= $app['id'] ?>" class="link link_danger <?= $notNew ? 'link_disabled' : '' ?>">Отклонить</a></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<p>Заявок от пользователей пока нет. Как насчет лучше продвигать сайт?</p>
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
	<!-- одобрить заявку -->
	<div class="modal" id="app-approve">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Одобрить заявку?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<form style="width: 100%;" method="post" action="/actions/appApprove.php" enctype="multipart/form-data">
					<input type="hidden" name="app-approve-id" id="app-approve-id">
					<div class="space-b">
						<input required class="input" type="file" name="photoAfter" accept="image/jpg, image/jpeg, image/png, image/bmp" placeholder="Фотография заявки">
					</div>
					<div class="inline inline_grow">
						<button class="btn">Одобрить</button>
						<a class="btn btn_outline" href="#" data-modal-close>Закрыть</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- отклонить заявку -->
	<div class="modal" id="app-cancel">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Отклонить заявку?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<form style="width: 100%;" method="post" action="/actions/appCancel.php">
					<input type="hidden" name="app-cancel-id" id="app-cancel-id">
					<div class="space-b">
						<textarea required class="input" name="reason" placeholder="Причина отказа"></textarea>
					</div>
					<div class="inline inline_grow">
						<button class="btn btn_danger">Отклонить</button>
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