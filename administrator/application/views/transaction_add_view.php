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
      <form action="<?php echo base_url();?>transaction/save" method="post">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Add Customer</p>
            <button type="submit" class="btn btn-dark btn-sm ms-auto">Save</button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Customer Name</label>
                <input class="form-control" type="text" placeholder="Name" name="name" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Customer Email</label>
                <input class="form-control" type="text" placeholder="Email" name="email" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Customer Phone Number</label>
                <input class="form-control" type="number"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;" placeholder="Phone Number" name="phone_number" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Listing</label>
                <select class="form-control" required name="product">
                  <option disabled selected>Choose Listing</option>
                  <?php foreach($product as $data_product) { ?>
                    <option value="<?php echo $data_product->product_id;?>"><?php echo $data_product->product_name;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Paid Status</label>
                <select class="form-control" required name="paid_status">
                  <option disabled selected>Choose Paid Status</option>
                  <option value="Unpaid">Unpaid</option>
                  <option value="Paid">Paid</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Item Status</label>
                <select class="form-control" required name="item_status">
                  <option disabled selected>Choose Item Status</option>
                  <option value="Preparation">Preparation</option>
                  <option value="Delivery">Delivery</option>
                  <option value="Delivered">Delivered</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>