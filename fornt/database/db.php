<?php
	/**
	* connect the database
	*/
	class Database
	{
		private $conn;
		public function connect()
		{
			include_once 'constant.php';
			$this->conn= new Mysqli(HOST,USER,PASSWORD,DB);

			if ($this->conn) {
				return $this->conn;
			}
		}
	}

	// $data = new database();

	// $data->connect();
?>