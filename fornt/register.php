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
		<div class="card mx-auto" style="width: 30rem;">
			<h2 class="card-header text-center">Register</h2>
			<div class="card-body">
			 	<form id="form_register" onsubmit="return false">
			 		<div class="form-group">
				      <label for="fullname">Full Name</label>
				      <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name">
				      <small id="n_error" class="form-text text-muted"></small>
				    </div>
			 		<div class="form-group">
				      <label for="email">Email</label>
				      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
				      <small id="e_error" class="form-text text-muted"></small>
				    </div>
				    <div class="form-group">
				      <label for="password1">Password</label>
				      <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
				      <small id="p1_error" class="form-text text-muted"></small>
				    </div>
				    <div class="form-group">
				      <label for="password2">Re-type Password</label>
				      <input type="password" name="password2" class="form-control" id="password2" placeholder="Re-password">
				      <small id="p2_error" class="form-text text-muted"></small>
				    </div>
				    <div class="form-group">
				     	<label for="usertype">User Type</label>
				    	<select name="userType" class="form-control" id="usertype">
				    		<option value="">Choose One</option>
				    		<option value="1">Admin</option>
				    		<option value="0">Other</option>
				    	</select>
				    	<small id="u_error" class="form-text text-muted"></small>
				    </div>
				    <button type="submit" name="register_form" class="btn btn-primary">Register</button>
				    <a href="index.php">login</a>
			 	</form>
			</div>
		</div>
	</div>
















<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
