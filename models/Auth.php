<?php
	require 'core/Model.php';

	class Auth extends Model {
		public function register($name, $login, $email, $password) {
			$this->db->prepare('insert into users (name, login, email, password) values (:name, :login, :email, :password)')->execute(['name' => $name, 'login' => $login, 'email' => $email, 'password' => $password]);

			header('Location: login.php');
		}
	}