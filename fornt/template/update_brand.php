<!-- Modal -->
<div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_form_brands" onsubmit="return false">
          <div class="form-group">
            <label>Brand Name</label>
            <input type="hidden" name="brand_id" id="brand_id">
            <input type="text" class="form-control" id="update_brand_name" name="update_brand_name" placeholder="Enter Your brand name">
            <small id="b_error" class="form-text text-muted"></small>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>