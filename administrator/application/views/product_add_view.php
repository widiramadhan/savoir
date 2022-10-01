<?php if($this->session->flashdata()) {?>
  <script>
    setTimeout(function() {
      swal({
        title : "<?php echo $this->session->flashdata('title');?>",
        text : "<?php echo $this->session->flashdata('message');?>",
        type: "<?php echo $this->session->flashdata('type');?>",
        timer: 2000,
        showConfirmButton: false
      });  
    },10);
  </script>
<?php } ?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <form action="<?php echo base_url();?>product/save" method="post" enctype='multipart/form-data'>
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Add Listing</p>
            <button type="submit" class="btn btn-dark btn-sm ms-auto">Save</button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Title Listing</label>
                <input class="form-control" type="text" placeholder="Title Listing" name="title" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Catalog</label>
                <select class="form-control" required name="category">
                  <option disabled selected>Choose Catalog</option>
                  <?php foreach($category as $data_category) { ?>
                    <option value="<?php echo $data_category->category_id;?>"><?php echo $data_category->category_name;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Designer</label>
                <select class="form-control" required name="designer">
                  <option disabled selected>Choose Designer</option>
                  <?php foreach($designer as $data_designer) { ?>
                    <option value="<?php echo $data_designer->designer_id;?>"><?php echo $data_designer->designer_name;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Description</label>
                <input class="form-control" type="text" placeholder="Description" name="desc" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Quotes</label>
                <input class="form-control" type="text" placeholder="Quotes" name="quotes" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Price</label>
                <input class="form-control" type="number" placeholder="Price" name="price" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Status</label>
                  <select class="form-control" name="status" required>
                      <option value="" disabled selected>Choose Status</option>
                      <option value="1">Available</option>
                      <option value="0">Sold Out</option>
                  </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Images</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                  <input type="file" class="form-control" name="images_1" required>
              </div>
              <div class="col-md-3">
                  <input type="file" class="form-control" name="images_2">
              </div>
              <div class="col-md-3">
                  <input type="file" class="form-control" name="images_3">
              </div>
              <div class="col-md-3">
                  <input type="file" class="form-control" name="images_4">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>