<?php
	
	/**
	* creat class for adding category into the database
	*/
	class DbOperator
	{
		private $conn;
		function __construct()
		{
			include_once "../database/db.php";
			$db = new Database();
			$this->conn = $db->connect();
		}


		// creat method for adding category

		public function addCategories($parents,$cat_name)
		{
			$status = 1;
			$pre_stm = $this->conn->prepare("INSERT INTO `categories`(`parent_cat`, `category_name`, `status`) VALUES (?,?,?)");
			$pre_stm->bind_param("isi",$parents,$cat_name,$status);
			$result = $pre_stm->execute() or die($this->conn->error);

				if ($result) {
					return "caterory_added";
				}
				else{
					return "wrong";
				}
		}
//get the  all data from db
		public function getAllRecord($table)
		{
			$pre_stm = $this->conn->prepare("SELECT * FROM $table");
			$pre_stm->execute() or die($this->conn->error);
			$result = $pre_stm->get_result();
			$rows = array();
			if ($result->num_rows
			 > 0) {
				while ($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}
			
		}
		// add brands ss

		public function addBrands($brandName)
		{
			$status = 1;
			$pre_stm = $this->conn->prepare("INSERT INTO `brands`(`brand_name`, `status`) VALUES (?,?)");
			$pre_stm->bind_param("si",$brandName,$status);
			$result = $pre_stm->execute() or die($this->conn->error);

				if ($result) {
					return "brand_added";
				}
				else{
					return "wrong";
				}
		}

		public function addProducts($cid,$bid,$products_name,$products_price, $products_stock,$added_date)
		{
			$status = 1;
			$pre_stm = $this->conn->prepare("INSERT INTO `products`(`cid`, `bid`, `products_name`, `products_price`, `products_stock`, `added_date`, `p_status`) 
				VALUES (?,?,?,?,?,?,?)");
			$pre_stm->bind_param("iisdisi",$cid,$bid,$products_name,$products_price, $products_stock,$added_date,$status);
			$result = $pre_stm->execute() or die($this->conn->error);

				if ($result) {
					return "NEW_PRODUCT_ADDED";
				}
				else{
					return "wrong";
				}
		}











	}

	






// $user = new DbOperator();
// echo "<pre>";
// print_r($user->getAllRecord("categories"));

// echo "</pre>";
// echo $user->addCategories(1, "Mobiles");
?>