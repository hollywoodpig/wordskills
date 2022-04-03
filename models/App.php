<?php
	require 'core/Model.php';

	class App extends Model {
		public function test() {
			print_r($this->db);
		}
	}