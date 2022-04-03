<?php
	require 'core/Model.php';

	class Auth extends Model {
		public function test() {
			print_r($this->db);
		}
	}