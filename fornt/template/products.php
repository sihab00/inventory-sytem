<!-- Modal -->
<div class="modal fade" id="products" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_products" onsubmit="return false">
          <div class="row">
            <div class="col-md-6 col-sm-6 form-group">
              <label for="date">Date</label>
              <input type="text" class="form-control" name="date" id="date" value="<?php echo date("Y-d-m");?>" readonly>
            </div>
            <div class="col-md-6 col-sm-6 form-group">
              <label for="product_name">Product Name</label>
              <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group">
            <label for="products_category">Category</label>
            <select name="products_category" id="products_category" class="form-control">


            </select>
          </div>
          <div class="form-group">
            <label for="products_brand">Brand</label>
            <select name="products_brand" id="products_brand" class="form-control">
            
            </select>
          </div>
          <div class="form-group">
            <label for="product_price">Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price..">
          </div>
          <div class="form-group">
            <label for="product_qty">Quantity</label>
            <input type="text" name="product_qty" id="product_qty" class="form-control" placeholder="Enter product quantity">
          </div>
          <button type="submit" class="btn btn-primary mb-2">Add Products</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>