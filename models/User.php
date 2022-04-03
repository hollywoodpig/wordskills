<?php
	require 'core/Model.php';

	class User extends Model {
		public function test() {
			print_r($this->db);
		}
	}