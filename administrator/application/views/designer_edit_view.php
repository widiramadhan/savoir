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
      <form action="<?php echo base_url();?>designer/update" method="post">
        <input type="hidden" name="id" value="<?php echo $designer['designer_id'];?>">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Edit Designer</p>
            <button type="submit" class="btn btn-dark btn-sm ms-auto">Update</button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">designer Name</label>
                <input class="form-control" type="text" placeholder="designer Name" name="title" required value="<?php echo $designer['designer_name'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Description</label>
                <input class="form-control" type="text" placeholder="Description" name="desc" required value="<?php echo $designer['designer_description'];?>">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>