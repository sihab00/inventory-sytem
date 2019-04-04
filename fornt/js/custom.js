$(document).ready(function() {
	var DOMAIN = "http://localhost/project_inventory/fornt";

$("#form_register").on("submit",function(){

	var status = false;
	var name =$("#fullname");
	var email =$("#email");
	var pass1 =$("#password1");
	var pass2 =$("#password2");
	var usertype =$("#usertype");


	//regular expression
	var n_patt = new RegExp(/^[A-Za-z ]+$/);
	var e_patt	= new RegExp(/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/);

	if (name.val()=="" || name.val().length <6) {
		name.addClass("border-danger");
		$("#n_error").html("<span class='text-danger'>Please enter the name and name should be minimum 6 charecter..</span>");
		status = false;
	}
	else{

		name.removeClass("border-danger");
		$("#n_error").html("");
		status = true;
	}
	if (!e_patt.test(email.val())) {
		email.addClass("border-danger");
		$("#e_error").html("<span class='text-danger'>Please enter valid email address..</span>");
		status = false;
	}
	else{
		email.removeClass("border-danger");
		$("#e_error").html("");
		status = true;
	}
	if (pass1.val()=="" || pass1.val().length < 8) {
		pass1.addClass("border-danger");
		$("#p1_error").html("<span class='text-danger'>Please enter your password and password must be minimum 8 character..</span>");
		status = false;
	}
	else{
		pass1.removeClass("border-danger");
		$("#p1_error").html("");
		status = true;
	}
	if (pass2.val()=="") {
		pass2.addClass("border-danger");
		$("#p2_error").html("<span class='text-danger'>Please confirm your password..</span>");
		status = false;
	}
	else{
		pass2.removeClass("border-danger");
		$("#p2_error").html("");
		status = true;
	}
	if (usertype.val() == "") {
		usertype.addClass("border-danger");
		$("#u_error").html("<span class='text-danger'>Please select user type..</span>");
		status = false;
	}
	else{
		usertype.removeClass("border-danger");
		$("#u_error").html("");
		status = true;
	}
	if ((pass1.val() == pass2.val()) && status == true) {
		$.ajax({
			url : DOMAIN+"/include/process.php",
			method: "POST",
			data : $("#form_register").serialize(),
			success : function(data){
				if (data == "Email_already_exist!") {
					alert("It seems your email already use!");
				}
				else if (data == "SOME_ERROR") {
					alert("Something Wrong..");
				}
				else{
					window.location.href = encodeURI(DOMAIN+"/index.php?msg=you are able to login!");
				}
			}
		})
	}
	else{
		pass2.addClass("border-danger");
		$("#p2_error").html("<span class='text-danger'>password not matched.</span>");
		status = false;
	}


	})

// for login part

$("#form_login").on("submit",function(){
	

	let email = $("#log_email");
	let pass = $("#log_pass");
	let status = false;


	if (email.val()== "") {

		email.addClass("border-danger");
		$("#e_error").html("<span>Please enter your registered email..</span>");
		status = false;
	}
	else{
		email.removeClass("border-danger");
		$("#e_error").html("");
		status = true;
	}
	if (pass.val()== "") {

		pass.addClass("border-danger");
		$("#p_error").html("<span>Please enter your password..</span>");
		status = false;
	}
	else{
		pass.removeClass("border-danger");
		$("#p_error").html("");
		status = true;
	}
	if (status) {
		
		$.ajax({
			url : DOMAIN+"/include/process.php",
			method: "POST",
			data : $("#form_login").serialize(),
			success : function(data){
				if (data == "NOT REGISTERED") {
					
					email.addClass("border-danger");
					$("#e_error").html("<span>Email is not registered.</span>");
				}else{
					email.removeClass("border-danger");
					$("#e_error").html("");
				}
				if(data == "PASSWORD_NOT_MATCHED") {
					
					pass.addClass("border-danger");
				$("#p_error").html("Password does not matched!");
				}
				else{
					
					pass.removeClass("border-danger");
					$("#p_error").html("");
					
					window.location.href = encodeURI(DOMAIN+"/dashboard.php");
				}
			}
		})
	}

})



// fetch the category//
fetch_category();
function fetch_category(){
	$.ajax({
		url : DOMAIN+"/include/process.php",
		method: "POST",
		data: {getCategory:1},
		success: function(data){
			var roots = "<option value='0'>Root</option>"; 
			var choose = "<option value='0'>Choose one</option>"; 
			$("#parents").html(roots+data);
			$("#products_category").html(choose+data);
		
		}

	})
}


// fetch the brand 
fetch_brand();
function fetch_brand(){
	$.ajax({
		url : DOMAIN+"/include/process.php",
		method: "POST",
		data: {getbrand:1},
		success: function(data){
			var choose = "<option value='0'>Choose one</option>"; 
			$("#products_brand").html(choose+data);
		
		}

	})
}

/// add category

	$("#form_category").on("submit",function(){
		let categoryName = $("#category_name");
		let status = false;

		if (categoryName.val()=="") {
			categoryName.addClass("border-danger");
			$("#c_error").html("<span class='text-danger'>Please enter category name..</span>");
			status = false;
		}
		else{
			categoryName.removeClass("border-danger");
			$("#c_error").html("");
			$.ajax({

				url: DOMAIN+"/include/process.php",
				method: "POST",
				data: $("#form_category").serialize(),
				success: function(data){
					if (data == "caterory_added") {
						fetch_category();
						categoryName.removeClass("border-danger");
						$("#c_error").html("<span class='text-success'>New category added successfully.</span>");
						categoryName.val("");
					}else{
						categoryName.removeClass("border-danger");
						$("#c_error").html("");
					}
				}
			})	
		}
	})
	// add brand 

	$("#form_brands").on("submit",function(){
		let brandName = $("#brand_name");
		let status = false;

		if (brandName.val()=="") {
			brandName.addClass("border-danger");
			$("#b_error").html("<span class='text-danger'>Please enter brand name..</span>");
			status = false;
		}
		else{
			brandName.removeClass("border-danger");
			$("#b_error").html("");

			$.ajax({

				url: DOMAIN+"/include/process.php",
				method: "POST",
				data: $("#form_brands").serialize(),
				success: function(data){
					alert(data);
					if (data == "brand_added") {
						fetch_brand();
						brandName.removeClass("border-danger");
						$("#b_error").html("<span class='text-success'>New brand added successfully.</span>");
						brandName.val("");
					}else{
						brandName.removeClass("border-danger");
						$("#b_error").html("");
					}
				}
			})	
		}
	})

// add products
$("#form_products").on("submit",function(){
	$.ajax({
				url: DOMAIN+"/include/process.php",
				method: "POST",
				data: $("#form_products").serialize(),
				success: function(data){
					if (data == "NEW_PRODUCT_ADDED") {
						alert(data);
					}else{
						console.log(data);
					}
				}
			})	
})



	
});



