<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/core/Model.php';

	class User extends Model {

		// start session

		public function __construct() {
			parent::__construct();
			session_start();
		}

		// register

		public function register($name, $login, $email, $password) {
			$this->db->prepare('insert into users (name, login, email, password) values (:name, :login, :email, :password)')->execute(['name' => $name, 'login' => $login, 'email' => $email, 'password' => $password]);

			return $this->redirect('login.php');
		}

		// login

		public function login($login, $password) {
			$query = $this->db->prepare("select * from users where login = :login and password = :password");
			$query->execute(['login' => $login, 'password' => $password]);

			$user = $query->fetch();

			if ($user) {
				$_SESSION['user'] = $user;

				if ($this->isAdmin()) return $this->redirect('admin.php');
				if (!$this->isAdmin()) return $this->redirect('profile.php');
			}

			return false;
		}

		// logout

		public function logout() {
			unset($_SESSION['user']);

			return $this->redirect('index.php');
		}

		// is logged

		public function isLogged() {
			if (!empty($_SESSION['user'])) {
				return true;
			}

			return false;
		}

		// is admin

		public function isAdmin() {
			if ($this->isLogged() && !empty($_SESSION['user']['admin'])) {
				return true;
			}

			return false;
		}

		// get field

		public function get($field) {
			if ($this->isLogged()) {
				$userId = $_SESSION['user']['id'];

				$query = $this->db->prepare("select $field from users where id = :id");
				$query->execute(['id' => $userId]);
	
				return $query->fetchColumn();
			}
		}
	}