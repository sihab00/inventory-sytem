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

<div class="container">
  <div class="card text-center">
    <div class="card-header">
      New Orders
    </div>
    <form id="get_order_data" onsubmit="return false">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3" align="right">Order Date</label>
          <input type="tex" readonly id="order_date" name="order_date" class="col-md-7 form-control" value="<?php echo date("Y-m-d");?>">
        </div>
        <div class="row form-group">
          <label class="col-md-3" align="right">Customer Name</label>
          <input type="tex" name="cust_name" id="cust_name" class="col-md-7 form-control" placeholder="Enter Customer Name.." required>
        </div>
        <div class="card">
          <div class="card-body">
            <h5>Make a Order list</h5>
            <table align="center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item Name</th>
                  <th>Total Quantity</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody id="invoice_item">
                <!-- <tr>
                  <td><b id="number">1</b></td>
                  <td>
                    <select name="pid[]" class="form-control form-control-sm">
                      <option>Washig Machine</option>
                    </select>
                  </td>
                  <td><input type="text" name="tqty[]"class="form-control form-control-sm" readonly></td>
                  <td><input type="text" name="qty[]"class="form-control form-control-sm"></td>
                  <td><input type="text" name="price[]"class="form-control form-control-sm" readonly></td>
                  <td>15005</td>
                </tr> -->
              </tbody>
            </table>
            <center style="padding:10px">
              <button id="add" style="width:150px" class="btn btn-success">Add</button>
              <button id="remove" style="width:150px" class="btn btn-danger">Remove</button>
            </center>
          </div>
        </div>
      </div>
        <p></p>
        <div class="row form-group">
          <label class="col-md-3" align="right">Sub Total</label>
          <input type="tex" name="sub_total" id="sub_total" class="col-md-7 form-control" value="" required>
        </div>
        <div class="row form-group">
          <label class="col-md-3" align="right">Vat(15%)</label>
          <input type="tex" name="vat" id="vat" class="col-md-7 form-control" value="" required>
        </div>
        <div class="row form-group">
          <label class="col-md-3" align="right">Discount</label>
          <input type="tex" name="discount" id="discount" class="col-md-7 form-control" value="" required>
        </div>
        <div class="row form-group">
          <label class="col-md-3" align="right">Net Total</label>
          <input type="tex" name="net_total" id="net_total" class="col-md-7 form-control" value="" required>
        </div>
        <div class="row form-group">
          <label class="col-md-3" align="right">Paid</label>
          <input type="tex" name="paid" id="paid" class="col-md-7 form-control" value="">
        </div>
        <div class="row form-group">
          <label class="col-md-3" align="right">Due</label>
          <input type="tex" name="due" id="due" class="col-md-7 form-control" value="" required>
        </div>
        <div class="row form-group">
          <label class="col-md-3" align="right">Payment Method</label>
          <select name="payment_method" id="payment_method" class="form-control col-md-7">
            <option value="cash">Cash</option>
            <option value="card">Card</option>
            <option value="draft">Draft</option>
            <option value="checque">Checque</option>
          </select>
        </div>
        <center>
          <input type="submit" name="order_form" id="order_form" class="btn btn-info" style="width:150px" value="order">
          <input type="submit" name="invoice_print" id="invoice_print" class="btn btn-success d-none" style="width:150px" value="invoice print">
        </center>
    </form>
</div>
















<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/order.js"></script>
</body>
</html>

