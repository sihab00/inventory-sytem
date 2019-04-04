
<?php

/**
* creat the class for mange the product, brand and cetagory
*/
class Manage
{
	
	private $conn;
		function __construct()
		{
			include_once "../database/db.php";
			$db = new Database();
			$this->conn = $db->connect();
		}
//get all information for display
	public function getAllRecordsForManage($table){
		if ($table =="categories") {
			$sql = "SELECT p.cid, p.category_name AS category,c.category_name AS parents,p.status FROM categories p LEFT JOIN categories c ON p.parent_cat = c.cid";
			$result =$this->conn->query($sql);
			$rows = array();
			if ($result->num_rows >0) {
				while ($row= $result->fetch_assoc()) {
					$rows[] =$row;
				}
				return $rows;
			}
		}
		elseif ($table == "products") {
			$sql = "SELECT p.pid,p.products_name,c.category_name, b.brand_name,p.products_price,p.products_stock,p.added_date FROM products p,categories c, brands b WHERE p.bid = b.bid AND p.cid= c.cid";
			$result =$this->conn->query($sql);
			$rows = array();
			if ($result->num_rows >0) {
				while ($row= $result->fetch_assoc()) {
					$rows[] =$row;
				}
				return $rows;
			}

		}
		else{
			$sql = "SELECT * FROM $table";
			$result = $this->conn->query($sql);
			$rows = array();
			if ($result->num_rows >0) {
				while ($row = $result->fetch_assoc()) {
					$rows[] =$row;
				}
			}
			return $rows;
		}

	
	}
// query for delete the category and brands;
	public function deleteCategory($table,$pk,$id){
		if ($table == "categories") {
			$pre_stm = $this->conn->prepare("SELECT * FROM categories WHERE parent_cat = ?");
			$pre_stm->bind_param("i",$id);
			$pre_stm->execute() or die($this->conn->error);
			$result = $pre_stm->get_result();
			if ($result->num_rows > 0) {
				return "DEPENDENCY_CATEGORY";
			}
			else
			{
				$sql =$this->conn->prepare("DELETE FROM categories WHERE $pk = ?");
				$sql->bind_param("i",$id);
				$sql->execute() or die($this->conn->error);

				return "category_delete!";
			}

		}
		else{
			$sql =$this->conn->prepare("DELETE FROM $table WHERE $pk = ?");
				$sql->bind_param("i",$id);
				$sql->execute() or die($this->conn->error);

				return "delete!";
		}
	}

// select the single record for edit
	public function getSingleRecord($table,$pk,$id){
		$pre_stm = $this->conn->prepare("SELECT * FROM $table WHERE $pk = ?");
		$pre_stm->bind_param("i", $id);
		$pre_stm->execute() or die($this->conn->error);
		$result = $pre_stm->get_result();
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
		}
		return $row;
	}

	//update for category
	public function updateCategory($parent_cat,$category_name,$id){

		$pre_stm = $this->conn->prepare("UPDATE `categories` 
			SET 
			`parent_cat`=?,
			`category_name`=? WHERE cid = ?");
		$pre_stm->bind_param("isi",$parent_cat,$category_name,$id);
		$result=$pre_stm->execute() or die($this->conn->error);
		if ($result) {

			return "update_complete";
		}
		else{
			return "Wrong";
		}
	}
	//update brand

	public function updateBrand($brandName,$id){
		$sql =$this->conn->prepare("UPDATE brands SET brand_name =? WHERE bid =?");
		$sql->bind_param("si",$brandName,$id);
		$result =$sql->execute() or die($this->conn->error);

		if ($result) {
			return "update_complete";
		}
		else{
			return "wrong";
		}
	}
	//update products
	public function updateProducts($cid,$bid,$product_name,$product_price,$product_stock,$added_date,$id){
		$sql = $this->conn->prepare("UPDATE `products` 
			SET 
			`cid`=?,
			`bid`=?,
			`products_name`=?,
			`products_price`=?,
			`products_stock`=?,
			`added_date`=?
			 WHERE pid =?");

		$sql->bind_param("iisdisi",$cid,$bid,$product_name,$product_price,$product_stock,$added_date,$id);

		$result =$sql->execute() or die($this->conn->error);

		if ($result) {
			return "update_complete";
		}
		else{
			return "wrong";
		}
	}

// insert the order data//

	public function storeOrderOfCustomer($orderDate,$customerName,$arr_tqty,$arr_qty,$arr_price,$arr_pro_name,$sub_total,$vat,$discount,$net_total,$paid,$due,$payment_method)
	{
		$pre_stm =$this->conn->prepare("INSERT INTO `invoice`(
			`customer_name`, `order_date`, `sub_total`, `vat`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES (?,?,?,?,?,?,?,?,?)");
		$pre_stm->bind_param("ssdddddds",$customerName,$orderDate,$sub_total,$vat,$discount,$net_total,$paid,$due,$payment_method);

		$pre_stm->execute() or die($this->conn->error);
		$invoice_no = $pre_stm->insert_id;
		if ($invoice_no != null) {
			print_r($arr_price);
			for ($i=0; $i < count($arr_price); $i++) { 

				$rem_tqty = $arr_tqty[$i] - $arr_qty[$i];
				if ($rem_tqty <= 0) {
					return "ORDER_FAILD_TO_COMPLETED";
				}
				else
				{
					$sql ="UPDATE products SET products_stock = $rem_tqty WHERE products_name = '$arr_pro_name[$i]'";
					$this->conn->query($sql);
				}

				$insert_products = $this->conn->prepare("INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `price`, `qty`) VALUES (?,?,?,?)");
				$insert_products->bind_param("isdd",$invoice_no,$arr_pro_name[$i],$arr_price[$i],$arr_qty[$i]);
				$insert_products->execute() or die($this->conn->error);
			}
			return "ORDER_COMPLETED";
		}
	}






}

// $obj= new Manage();
// // echo $obj->updateBrand("Huawe",3);
// echo "<pre>";
// print_r($obj->getAllRecordsForManage("products"));
// echo $obj->deleteCategory("brands","bid",5);
// echo $obj->updateCategory(0,"Electro",1);
// echo $obj->updateProducts(5,4,"Samsung galaxy1",15000,500,"2019-09-02",4);