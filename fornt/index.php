<?php
	include_once "./database/constant.php";

	if (isset($_SESSION['userid'])) {
		header("Location:".DOMAIN."/dashboard.php");

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

	<div class="container">
  
	<?php
		if (isset($_REQUEST['msg']) || !empty($_REQUEST['msg'])) {
			
			?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
		  		<p class="text-success"><?php echo $_REQUEST['msg'];?></p>
		  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
			</div>

			<?php
		}
	?>
		<div class="card mx-auto" style="width: 18rem;">
		  <img src="./images/login.png" class="card-img-top mx-auto" style="width:60%;height:200px;" alt="...">
		  <div class="card-body">
		    <form id="form_login" onsubmit="return false">
			  <div class="form-group">
			    <label for="log_email">Email address</label>
			    <input type="email" class="form-control" id="log_email" name="log_email" placeholder="Enter email">
			    <small id="e_error" class="form-text text-muted"></small>
			  </div>
			  <div class="form-group">
			    <label for="log_pass">Password</label>
			    <input type="password" class="form-control" id="log_pass" name="log_pass" placeholder="Password">
			    <small id="p_error" class="form-text text-muted"></small>
			  </div>
			  
			  <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>login</button>
			  <a href="register.php">Register</a>
			</form>
			<div class="card-footer">
				<a href="#">Forget password ?</a>
			</div>
		  </div>
		</div>
	</div>
















<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
