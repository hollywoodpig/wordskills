<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/core/Model.php';

	class App extends Model {
		public function test() {
			print_r($this->db);
		}
	}