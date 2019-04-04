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
  <div class="container-fluid">
    <table class="table table-hover table-border">
        <thead>
          <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Brand Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Adding Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="get_product">
          <!-- <tr >
            <td>1</td>
            <td>Electronics</td>
            <td>ddd</td>
            <td><a href="" class="btn btn-success">Active</a></td>
            <td><a href="" class="btn btn-danger">Delete</a>
            <a href="" class="btn btn-primary">Edit</a></td>
          </tr> -->
        </tbody>
    </table>

    <div><a href="dashboard.php" class="btn btn-primary">Back</a></div>
  </div>    

<?php

    include_once "./template/update_product.php";
?>













<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/manage.js"></script>
</body>
</html>
