$(document).ready(function() {
	var DOMAIN = "http://localhost/project_inventory/fornt";
	
	addNewRow();
	$("#add").click(function(){
		addNewRow();
	})


	function addNewRow(){
		$.ajax({
			url:DOMAIN+"/include/process.php",
			method: "POST",
			data:{getNewOrderItem:1},
			success: function(data){
				$("#invoice_item").append(data);

				var n = 0;
				$(".number").each(function(){
					$(this).html(++n);
				})

			}
		})
	}
	$("#remove").click(function(){
		$("#invoice_item").children("tr:last").remove();
		calculate(0,0);
	})

	$("#invoice_item").delegate(".pid","change",function(){
		let id = $(this).val();
		let tr = $(this).parent().parent();
		$.ajax({
			url:DOMAIN+"/include/process.php",
			method: "POST",
			dataType:"json",
			data:{getSingleRow:1,id:id},
			success:function(data){
				tr.find(".tqty").val(data['products_stock']);
				tr.find(".qty").val(1);
				tr.find(".prc").val(data['products_price']);
				tr.find(".prdnam").val(data['products_name']);
				tr.find(".amt").html(tr.find(".qty").val() * tr.find(".prc").val());
				calculate(0,0);
			}
		})
		
	})
$("#invoice_item").delegate(".qty","keyup",function(){
	var qty = $(this);
	var tr = $(this).parent().parent();

	if (isNaN(qty.val())) {
		alert("please enter the valid quantity!");
		qty.val(1);
	}
	else{
		if ((qty.val() -0) > (tr.find(".tqty").val()-0)) {
			alert("Sorry! this amount out of stock");
			qty.val(1);
		}
		else{
			tr.find(".amt").html(qty.val() * tr.find(".prc").val());
			calculate(0,0);
		}
	}
})

function calculate(dis,pid){
	var sub_total = 0;
	var vat =0;
	var discount = dis;
	var netTotal =0;
	var paid =pid;
	var due = 0;
	$(".amt").each(function(){
		sub_total= sub_total + ($(this).html()*1);
	})
	vat = 0.15 * sub_total;
	netTotal = sub_total + vat;
	netTotal = netTotal-discount;
	due= netTotal-paid;
	$("#sub_total").val(sub_total);
	$("#vat").val(vat);
	$("#discount").val(discount);
	$("#net_total").val(netTotal);
	$("#paid").val(paid);
	$("#due").val(due);
}
$("#discount").keyup(function(){
	var discount = $(this).val();
	calculate(discount,0);
})
$("#paid").keyup(function(){
	var paid = $(this).val();
	var discount = $("#discount").val();
	calculate(discount,paid);
})


// order Accepting------------
$("#order_form").click(function(){
	var invoice = $("#get_order_data").serialize();
	var paid = $("#paid");
	if ($("#cust_name").val()==="") {
		alert("Please Enter the customer name..");
	}
	else if (paid.val() ==="" || paid.val() === "0"){
		alert("please enter the paid amount");
	}
	else{
		$.ajax({
		url:DOMAIN+"/include/process.php",
		method:"POST",
		data:$("#get_order_data").serialize(),
		success: function(data){

			

			if (data="ORDER_COMPLETED") {
				$("#get_order_data").trigger("reset");
				if (confirm("Do you want to print invoice!")) {
					
					window.location.href = DOMAIN+"/include/invoice_bill.php";
				}
			}
			else{
				alert(data);
			}
		}
	})

	}
	
})
















})