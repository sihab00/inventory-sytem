<?php
	include_once("./database/constant.php");
	if (!isset($_SESSION['userid'])) {
		header("Location:".DOMAIN."/");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Poject2</title>
 
  	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php
		require_once 'template/header.php';

	?>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4">	
				<div class="card mx-auto">
				  <img src="./images/profile.png" class="card-img-top mx-auto" style="width:60%;" alt="...">
				  <div class="card-body">
				    <p class="card-text"><i class="fa fa-user"></i>Profile Info..</p>
				    <p class="card-text"><i class="fa fa-user"></i>Nishad Faruki</p>
				    <p class="card-text">Last Login: xxxx-xx-xx</p>
				    <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i>Edit Profile</a>
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h2>Welcome Admin,</h2>
					<div class="row">
						<div class="col-md-6 ">
							<iframe src="http://free.timeanddate.com/clock/i6mdf7d6/n73/szw110/szh110/hocfff/hbw0/hfc000/cf100/hgr0/fav0/fiv0/mqc0f0/mqs4/mql4/mqw4/mqd86/mhc0f0/mhs2/mhl4/mhw4/mhd86/mmc0f0/mml2/mmd88/hhc00f/hhs3/hhl50/hhw11/hmc00f/hms3/hml80/hmw11/hsc00f/hsl90/hsw6" frameborder="0" width="160" height="160"></iframe>
						</div>
						<div class="col-md-6">
							<div class="card">
							    <div class="card-body">
							        <h5 class="card-title">New Orders</h5>
							        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							        <a href="new_order.php" class="btn btn-primary">New Orders</a>
							    </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row my-5">
			<div class="col-md-4">
				<div class="card">
				    <div class="card-body">
				        <h5 class="card-title">Categories</h5>
				        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				        <a href="#" data-toggle="modal" data-target="#category" class="btn btn-primary">Add</a>
				        <a href="manage_category.php" class="btn btn-primary">Manage Category</a>
				    </div>
			    </div>
			</div>	
			<div class="col-md-4">
				<div class="card">
				    <div class="card-body">
				        <h5 class="card-title">Brands</h5>
				        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#brand" class="btn btn-primary">Add</a>
				        <a href="manage_brand.php" class="btn btn-primary">Manage Brand</a>
				    </div>
			    </div>
			</div>	
			<div class="col-md-4">
				<div class="card">
				    <div class="card-body">
				        <h5 class="card-title">Products</h5>
				        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#products" class="btn btn-primary">Add</a>
				        <a href="manage_product.php" class="btn btn-primary">Manage Product</a>
				    </div>
			    </div>
			</div>	
		</div>
	</div>
<?php
	require_once './template/category.php';
	require_once './template/brand.php';
	require_once './template/products.php';
?>















<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
