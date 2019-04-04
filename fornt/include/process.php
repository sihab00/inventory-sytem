<?php
include_once ("../database/constant.php");
include_once("users.php");
include_once("DBoperators.php");
include_once("manage.php");

//for register form
if (isset($_POST["fullname"]) AND isset($_POST["email"])) {
	$username = $_POST['fullname'];
	$email = $_POST['email'];
	$password = $_POST['password1'];
	$usertype = $_POST['userType'];

	$user = new User();
	$result =$user->creatUserAccount($username,$email,$password,$usertype);
	echo $result;
	exit();

}

// for loging form

if (isset($_POST['log_email']) AND isset($_POST['log_pass'])) {
	$email = $_POST['log_email'];
	$password = $_POST['log_pass'];

	$user = new User();
	$result = $user->userLogin($email, $password);
	echo $result;
	exit(); 
}
//to fetch the category//

if (isset($_POST["getCategory"])) {
	$obj = new DbOperator();
	$rows = $obj->getAllRecord("categories");
	foreach ($rows as $row) {
		echo "<option value='".$row['cid']."'>".$row["category_name"]."</option>";
	}
	exit();
}
// to fetch the brand
if (isset($_POST["getbrand"])) {
	$obj = new DbOperator();
	$rows = $obj->getAllRecord("brands");
	foreach ($rows as $row) {
		echo "<option value='".$row['bid']."'>".$row["brand_name"]."</option>";
	}
	exit();
}

// add the category to database

	if (isset($_POST['category_name'])) {

		$cat_name =$_POST['category_name'];
		$parents =$_POST['parents'];
		$obj = new DbOperator();
		$result = $obj->addCategories($parents,$cat_name);
		echo $result;
		exit();
	}
// add the brand name

	if (isset($_POST['brand_name'])) {

		$brandName =$_POST['brand_name'];
		$obj = new DbOperator();
		$result = $obj->addBrands($brandName);
		echo $result;
		exit();
		}

// add products 
	if (isset($_POST['date'])AND isset($_POST['product_name'])) {

		$obj = new DbOperator();
		$result = $obj->addProducts(
								$_POST['products_category'],
								$_POST['products_brand'],
								$_POST['product_name'],
								$_POST['product_price'],
								$_POST['product_qty'],
								$_POST['date']);
		echo $result;
		exit();
		}
// manage Category 
	if (isset($_POST['manageCatagory'])) {
		
		$obj = new Manage();
		$rows = $obj->getAllRecordsForManage("categories");
			if (count($rows) >0) {
				$i=0;
				foreach ($rows as $row) {
				?>
				<tr >
			        <td><?php echo ++$i;?></td>
			        <td><?php echo $row['category'];?></td>
			        <td><?php echo $row['parents'];?></td>
			        <td><a href="" class="btn btn-success">Active</a></td>
			        <td><a href="" did="<?php echo $row['cid'];?>" class="btn btn-danger delete_cat">Delete</a>
			        <a href="#" data-toggle="modal" data-target="#category" eid="<?php echo $row['cid'];?>" class="btn btn-primary edit_cat">Edit</a></td>
		    	</tr>

				<?php
			}
			echo $rows;	
			exit();
		}
	}

// delete the category 
	if (isset($_POST['deleteCategory'])) {
		
		$obj = new Manage();
		$result= $obj->deleteCategory("categories","cid",$_POST['id']);

			echo $result;
			exit();
	}

// get data for update the category
	if (isset($_POST['editCategory'])) {
		$u = new Manage();
		$result=$u->getSingleRecord("categories","cid",$_POST['id']);
		echo json_encode($result);
		exit();

	}
// update the category
	if (isset($_POST['update_category'])) {

		
		$obj = new Manage();
		$parents =$_POST['parents_cat'];
		$cat_name =$_POST['update_category'];
		
		$id =$_POST['cid'];
		$result = $obj->updateCategory($parents,$cat_name,$id);
		echo $result;

		exit();
	}
//manage brand
	if (isset($_POST['manageBrand'])) {
		
		$obj = new Manage();
		$rows = $obj->getAllRecordsForManage("brands");
			if (count($rows) >0) {
				$i=0;
				foreach ($rows as $row) {
				?>
				<tr >
			        <td><?php echo ++$i;?></td>
			       
			        <td><?php echo $row['brand_name'];?></td>
			        <td><a href="" class="btn btn-success">Active</a></td>
			        <td><a href="" did="<?php echo $row['bid'];?>" class="btn btn-danger delete_brand">Delete</a>
			        <a href="#" data-toggle="modal" data-target="#brand" eid="<?php echo $row['bid'];?>" class="btn btn-primary edit_brand">Edit</a></td>
		    	</tr>

				<?php
			}
			echo $rows;	
			exit();
		}
	}

// delete the brand 
	if (isset($_POST['deleteBrand'])) {
		
		$obj = new Manage();
		$result= $obj->deleteCategory("brands","bid",$_POST['id']);

			echo $result;
			exit();
	}
	// get data for update
	if (isset($_POST['editBrand'])) {
	$u = new Manage();
	$result=$u->getSingleRecord("brands","bid",$_POST['id']);
	echo json_encode($result);
	exit();

	}

	 // update the brand name

	if (isset($_POST['update_brand_name'])) {

		$brandName =$_POST['update_brand_name'];
		$obj = new Manage();
		$result = $obj->updateBrand($brandName,$_POST['brand_id']);
		echo $result;
		exit();
	}
	
	//------------Manage Products---------

	if (isset($_POST['manageProduct'])) {
		
		$obj = new Manage();
		$rows = $obj->getAllRecordsForManage("products");
			if (count($rows) >0) {
				$i=0;
				foreach ($rows as $row) {
				?>
				<tr >
			        <td><?php echo ++$i;?></td>
			       
			        <td><?php echo $row['products_name'];?></td>
			        <td><?php echo $row['category_name'];?></td>
			        <td><?php echo $row['brand_name'];?></td>
			        <td><?php echo $row['products_price'];?></td>
			        <td><?php echo $row['products_stock'];?></td>
			        <td><?php echo $row['added_date'];?></td>
			        <td><a href="" class="btn btn-success">Active</a></td>
			        <td><a href="" did="<?php echo $row['pid'];?>" class="btn btn-danger delete_product">Delete</a>
			        <a href="#" data-toggle="modal" data-target="#products" eid="<?php echo $row['pid'];?>" class="btn btn-primary edit_product">Edit</a></td>
		    	</tr>

				<?php
			}
			echo $rows;	
			exit();
		}
	}

	// delete the products
	if (isset($_POST['deleteProduct'])) {
		
		$obj = new Manage();
		$result= $obj->deleteCategory("products","pid",$_POST['id']);

			echo $result;
			exit();
	}
	// get data for update product
	if (isset($_POST['editProduct'])) {
	$u = new Manage();
	$result=$u->getSingleRecord("products","pid",$_POST['id']);
	echo json_encode($result);
	exit();

	}

	//update products
	if (isset($_POST['date'])AND isset($_POST['update_product_name'])) {

		$cid =$_POST['products_category'];
		$bid =$_POST['products_brand'];
		$product_name=$_POST['update_product_name'];
		$product_price=$_POST['product_price'];
		$product_stock=$_POST['product_qty'];
		$added_date=$_POST['date'];
		$id= $_POST['product_id'];

		$obj = new Manage();
		$result = $obj->updateProducts($cid,$bid,$product_name,$product_price,$product_stock,$added_date,$id);

		echo $result;
		exit();
		}

// -----------------------------Order part---------------
// get order 
	if (isset($_POST['getNewOrderItem'])) {
		$obj = new DbOperator();
		$rows = $obj->getAllRecord("products");
		?>
		<tr>
          <td><b class="number">1</b></td>
          <td>
            <select name="pid[]" class="form-control form-control-sm pid">
            	<option value="">Choose One</option>
            	<?php
            		foreach ($rows as $row) {
            			?>
            			<option value="<?php echo $row['pid'];?>"><?php echo $row['products_name']; ?></option>
            			<?php
            		}
            	?>
              
            </select>
          </td>
          <td><input type="text" name="tqty[]" class="form-control form-control-sm tqty" readonly></td>
          <td><input type="text" name="qty[]" class="form-control form-control-sm qty"></td>
          <td><input type="text" name="price[]" class="form-control form-control-sm prc" readonly></td>
          <td style="display:none"><input type="text" name="pro_name[]" class="form-control form-control-sm prdnam" readonly></td>
          <td>TK<span class="amt">0</span></td>
        </tr>
		<?php
		exit();
	}

//get the price and quantity for order//
	if (isset($_POST['getSingleRow'])) {
		$obj = new Manage();
		$result=$obj->getSingleRecord("products","pid",$_POST['id']);
		echo json_encode($result);
		exit();
	}

if (isset($_POST['order_date']) AND isset($_POST['cust_name'])) {
	print_r($_POST);
	$orderDate= $_POST['order_date'];
	$customerName= $_POST['cust_name'];

	//get the arrey data from invoice_item

	$arr_tqty= $_POST['tqty'];
	$arr_qty= $_POST['qty'];
	$arr_price= $_POST['price'];
	$arr_pro_name= $_POST['pro_name'];


// 
	$sub_total =$_POST['sub_total'];
	$vat =$_POST['vat'];
	$discount =$_POST['discount'];
	$net_total =$_POST['net_total'];
	$paid =$_POST['paid'];
	$due =$_POST['due'];
	$payment_method =$_POST['payment_method'];

	$obj = new Manage();
	echo $obj->storeOrderOfCustomer($orderDate,$customerName,$arr_tqty,$arr_qty,$arr_price,$arr_pro_name,$sub_total,$vat,$discount,$net_total,$paid,$due,$payment_method);

}



















?>
