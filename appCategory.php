<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if (!$userModel->isAdmin()) return $userModel->redirect('profile.php');

	$appModel = new AppModel();

	$appCats = $appModel->getCats();
	$appCatsNotEmpty = !empty($appCats);
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css">
	<title>Городской портал - список категорий заявок</title>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<a href="index.php" class="logo">
					<img class="logo__img" src="assets/img/logo-light.png" alt="">
				</a>
				<div class="header__inline">
					<a href="admin.php" class="btn"><?= $userModel->get('name') ?></a>
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
					<!-- добавить категорию заявки -->
					<div class="space-b">
						<form class="form-inline" method="post" action="actions/appCategoryAdd.php">
							<input required name="name" type="text" class="input" placeholder="Название категории">
							<button class="btn">Добавить</button>
						</form>
					</div>
					<!-- категории заявок -->
					<?php if ($appCatsNotEmpty): ?>
						<div class="table">
							<table>
								<tbody>
									<tr>
										<th>№</th>
										<th>Название</th>
										<th>Действие</th>
									</tr>
									<?php foreach($appCats as $cat): ?>
										<tr>
											<td><?= $cat['id'] ?></td>
											<td><?= $cat['name'] ?></td>
											<td><a href="#" data-modal-open="app-category-delete" data-app-id="<?= $cat['id'] ?>" class="link link_danger">Удалить</a></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<p>К сожалению, категорий заявок пока нет. Как насчет создать одну? Это выше.</p>
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