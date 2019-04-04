$(document).ready(function() {
	var DOMAIN = "http://localhost/project_inventory/fornt";
//manage category
	 manageCatagory()
	function manageCatagory(){
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			data: {manageCatagory:1},
			success: function(data){
				$("#category_body").html(data);
			}
		})	
	}
//Delete the category 

$("body").delegate(".delete_cat","click",function(){
	let did = $(this).attr("did");
	if (confirm("Are you sure want to delete!")) {
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			data: {deleteCategory:1, id:did},
			success: function(data){

				if (data == "DEPENDENCY_CATEGORY") {
					alert("Sorry, you can't delete the category. This category has sub catergory..");
				}
				else if (data == "category_delete") {
					alert("Category Deleted successfully!");
				}
				else if (data == "delete!") {
					alert("Deleted successfully!");
				}
				else{
					alert(data);
				}
			}
		})	
	}
	else{
		alert("no");
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
			console.log(data);
			var roots = "<option value='0'>Root</option>";
			var choose = "<option value=''>Choose</option>";
			$("#parents_cat").html(roots+data);
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

//get the data for update 

$("body").delegate(".edit_cat","click",function(){
	let eid = $(this).attr("eid");
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			dataType:"json",
			data:{editCategory:1, id:eid},
			success: function(data){
				console.log(data);
				$("#cid").val(data['cid']);
				$("#update_category").val(data['category_name']);
				$("#parents_cat").val(data['parent_cat']);	
			}
		})
	})

// update data
	$("#update_form_category").on("submit",function(){
		let categoryName = $("#update_category");
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
				data: $("#update_form_category").serialize(),
				success: function(data){

					if (data=="update_complete") {
						alert("Update the category name successfully done!");
					}
					else{
						alert(data);
					}
					
				}
			})	
		}
	})

				// manage the brand
	manageBrand()
	function manageBrand(){
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			data: {manageBrand:1},
			success: function(data){

				$("#get_brand").html(data);
			}
		})	
	}
	// delete brand
$("body").delegate(".delete_brand","click",function(){
	let did = $(this).attr("did");

	if (confirm("Are you sure want to delete!")) {
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			data: {deleteBrand:1, id:did},
			success: function(data){
				manageBrand()
				if (data == "delete!") {
					alert("Deleted successfully!");
				}
				else{
					alert(data);
				}
			}
		})	
	}
	else{
		alert("no");
	}
	
})

// get data for update band
$("body").delegate(".edit_brand","click",function(){
	let eid = $(this).attr("eid");
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			dataType:"json",
			data:{editBrand:1, id:eid},
			success: function(data){
				$("#brand_id").val(data['bid']);
				$("#update_brand_name").val(data['brand_name']);
			}
		})
	})
// update brand

$("#update_form_brands").on("submit",function(){
		let brandName = $("#update_brand_name");
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
				data: $("#update_form_brands").serialize(),
				success: function(data){
						alert(data);
					window.location.href =DOMAIN+"/manage_brand.php";
				}
			})	
		}
	})

//---------------------Manage Products--------------------

manageProduct()
	function manageProduct(){
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			data: {manageProduct:1},
			success: function(data){
				// alert(data);
				$("#get_product").html(data);
			}
		})	
	}
	//delete the products
$("body").delegate(".delete_product","click",function(){
let did = $(this).attr("did");
	if (confirm("Are you sure want to delete!")) {
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			data: {deleteProduct:1, id:did},
			success: function(data){

				manageProduct()
				if (data == "delete!") {
					alert("Deleted successfully!");
				}
				else{
					alert(data);
				}
			}
		})	
	}
	else{
		alert("no");
	}

	})
//get data for update the products
$("body").delegate(".edit_product","click",function(){
	let eid = $(this).attr("eid");
		$.ajax({
			url: DOMAIN+"/include/process.php",
			method: "POST",
			dataType:"json",
			data:{editProduct:1, id:eid},
			success: function(data){
				$("#product_id").val(data['pid']);
				$("#update_product_name").val(data['products_name']);
				$("#products_category").val(data['cid']);
				$("#products_brand").val(data['pid']);
				$("#product_price").val(data['products_price']);
				$("#product_qty").val(data['products_stock']);
			}
		})
	})

//----------update products-----------
$("#update_form_products").on("submit",function(){
	$.ajax({
				url: DOMAIN+"/include/process.php",
				method: "POST",
				data: $("#update_form_products").serialize(),
				success: function(data){
					alert(data);
				}
			})	
})




});