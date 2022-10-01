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
      <form action="<?php echo base_url();?>product/update" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="id" value="<?php echo $product['product_id'];?>">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Edit Listing</p>
            <button type="submit" class="btn btn-dark btn-sm ms-auto">Update</button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Title Listing</label>
                <input class="form-control" type="text" placeholder="Title Listing" name="title" required value="<?php echo $product['product_name'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Catalog</label>
                <select class="form-control" required name="category">
                  <option disabled selected>Choose Catalog</option>
                  <?php foreach($category as $data_category) { ?>
                    <option value="<?php echo $data_category->category_id;?>" <?php if($product['category_id'] == $data_category->category_id){echo"selected";}else{"";}?>><?php echo $data_category->category_name;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Designer</label>
                <select class="form-control" required name="designer">
                  <?php foreach($designer as $data_designer) { ?>
                    <option value="<?php echo $data_designer->designer_id;?>"  <?php if($product['designer_id'] == $data_designer->designer_id){echo"selected";}else{"";}?>><?php echo $data_designer->designer_name;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Description</label>
                <input class="form-control" type="text" placeholder="Description" name="desc" required value="<?php echo $product['product_description'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Quotes</label>
                <input class="form-control" type="text" placeholder="Quotes" name="quotes" required value="<?php echo $product['product_quotes'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Price</label>
                <input class="form-control" type="number" placeholder="Price" name="price" required value="<?php echo $product['product_price'];?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Status</label>
                  <select class="form-control" name="status" required>
                      <option value="1" <?php if($product['product_stock'] > 0){echo"selected";}else{"";}?>>Available</option>
                      <option value="0" <?php if($product['product_stock'] == 0){echo"selected";}else{"";}?>>Sold Out</option>
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
                <div class="form-group">
                  <?php if($product['product_images_1'] != null){ ?>
                    <a href="<?php echo base_url();?>../assets/images/product/<?php echo $product['product_images_1'];?>" class="fancybox">
                      <img src="<?php echo base_url();?>../assets/images/product/<?php echo $product['product_images_1'];?>" style="width:100%;height:100px;object-fit:cover;">
                    </a>
                  <?php } else { ?>
                    <img src="<?php echo base_url();?>../assets/images/default.png" style="width:100%;">
                  <?php } ?>
                  <br><br>
                  <input type="file" class="form-control" name="images_1">
                </div>
              </div>
              <div class="col-md-3">
                <?php if($product['product_images_2'] != null){ ?>
                    <a href="<?php echo base_url();?>../assets/images/product/<?php echo $product['product_images_2'];?>" class="fancybox">
                      <img src="<?php echo base_url();?>../assets/images/product/<?php echo $product['product_images_2'];?>" style="width:100%;height:100px;object-fit:cover;">
                    </a>
                  <?php } else { ?>
                    <img src="<?php echo base_url();?>../assets/images/default.png" style="width:100%;">
                  <?php } ?>
                  <br><br>
                  <input type="file" class="form-control" name="images_2">
              </div>
              <div class="col-md-3">
                <?php if($product['product_images_3'] != null){ ?>
                  <a href="<?php echo base_url();?>../assets/images/product/<?php echo $product['product_images_3'];?>" class="fancybox">
                    <img src="<?php echo base_url();?>../assets/images/product/<?php echo $product['product_images_3'];?>" style="width:100%;height:100px;object-fit:cover;">
                  </a>
                    <?php } else { ?>
                    <img src="<?php echo base_url();?>../assets/images/default.png" style="width:100%;">
                  <?php } ?>
                  <br><br>
                  <input type="file" class="form-control" name="images_3">
              </div>
              <div class="col-md-3">
                <?php if($product['product_images_4'] != null){ ?>
                  <a href="<?php echo base_url();?>../assets/images/product/<?php echo $product['product_images_4'];?>" class="fancybox">
                    <img src="<?php echo base_url();?>../assets/images/product/<?php echo $product['product_images_4'];?>" style="width:100%;height:100px;object-fit:cover;">
                  </a>
                  <?php } else { ?>
                    <img src="<?php echo base_url();?>../assets/images/default.png" style="width:100%;">
                  <?php } ?>
                  <br><br>
                  <input type="file" class="form-control" name="images_4">
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