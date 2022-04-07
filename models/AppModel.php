<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Model.php';

	class AppModel extends Model {
		// get all apps

		public function getAll() {
			return $this->db->query('select * from apps')->fetchAll();
		}

		// add app

		public function addApp($userId, $catId, $name, $text, $photo, $created) {
			$this->db->prepare('insert into apps (user_id, cat_id, name, text, photo, created) values (:userId, :catId, :name, :text, :photo, :created)')->execute(['userId' => $userId, 'catId' => $catId, 'name' => $name, 'text' => $text, 'photo' => $photo, 'created' => $created]);

			return $this->redirect('profile.php');
		}

		// get app categories

		public function getCats() {
			return $this->db->query('select * from app_cats')->fetchAll();
		}

		// get app category

		public function getCat($id) {
			$query = $this->db->prepare('select name from app_cats where id = :id');
			$query->execute(['id' => $id]);

			return $query->fetchColumn();
		}

		// add app category

		public function addCat($name) {
			$query = $this->db->prepare('insert into app_cats (name) values (:name)');
			
			return $query->execute(['name' => $name]);
		}
	}