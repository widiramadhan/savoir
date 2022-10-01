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
      <form action="<?php echo base_url();?>category/update" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="id" value="<?php echo $category['category_id'];?>">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Edit Category</p>
            <button type="submit" class="btn btn-dark btn-sm ms-auto">Update</button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Category Name</label>
                <input class="form-control" type="text" placeholder="Category Name" name="title" required value="<?php echo $category['category_name'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Description</label>
                <input class="form-control" type="text" placeholder="Description" name="desc" required value="<?php echo $category['category_description'];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <a href="<?php echo base_url();?>../assets/images/category/<?php echo $category['category_images'];?>" class="fancybox">
                    <img src="<?php echo base_url();?>../assets/images/category/<?php echo $category['category_images'];?>" style="width:100%;height:300px;object-fit:cover;">
                  </a>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Images</label>
                    <input type="file" class="form-control" name="images">
                  </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" >
$(document).ready( function () {
    $(".fancybox").fancybox();
} );
</script>