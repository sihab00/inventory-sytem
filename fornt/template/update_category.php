<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_form_category" onsubmit="return false">
          <div class="form-group">
            <input type="hidden" name="cid" id="cid" value="">
            <label>Category Name</label>
            <input type="text" class="form-control" id="update_category" name="update_category" placeholder="Enter Your categorys">
            <small id="c_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Parent Category</label>
            <select class="form-control" id="parents_cat" name="parents_cat">
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="status">Status</label>
            <select id="status">
             
            </select>
          </div> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>