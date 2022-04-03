<?php
	class Model {
		protected $db;

		public function __construct() {
			require 'database/database.php';
			$this->db = $db;
		}
	}