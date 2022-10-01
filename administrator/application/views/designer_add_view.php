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
      <form action="<?php echo base_url();?>designer/save" method="post">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Add Designer</p>
            <button type="submit" class="btn btn-dark btn-sm ms-auto">Save</button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Designer Name</label>
                <input class="form-control" type="text" placeholder="Judul" name="title" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Description</label>
                <input class="form-control" type="text" placeholder="Deskripsi" name="desc" required>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>