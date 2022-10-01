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
      <form action="<?php echo base_url();?>transaction/update" method="post">
        <input type="hidden" name="id" value="<?php echo $transaction['transaction_invoice_no'];?>">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Detail Customer</p>
            <button type="submit" class="btn btn-dark btn-sm ms-auto">Update</button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Customer Name</label>
                <input class="form-control" type="text" placeholder="Name" name="name" required value="<?php echo $transaction['name'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Customer Email</label>
                <input class="form-control" type="text" placeholder="Email" name="email" required value="<?php echo $transaction['email'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Customer Phone Number</label>
                <input class="form-control" type="number"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;" placeholder="Phone Number" name="phone_number" required value="<?php echo $transaction['phone_number'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Listing</label>
                <select class="form-control" required name="product">
                  <?php foreach($product as $data_product) { ?>
                    <option value="<?php echo $data_product->product_id;?>" <?php if($transaction['product_id'] == $data_product->product_id){echo"selected";}else{"";}?>><?php echo $data_product->product_name;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Paid Status</label>
                <select class="form-control" required name="paid_status">
                  <option value="Unpaid" <?php if($transaction['paid_status'] == "Unpaid"){echo"selected";}else{"";}?>>Unpaid</option>
                  <option value="Paid" <?php if($transaction['paid_status'] == "Paid"){echo"selected";}else{"";}?>>Paid</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Item Status</label>
                <select class="form-control" required name="item_status">
                  <option value="Preparation" <?php if($transaction['transaction_status'] == "Preparation"){echo"selected";}else{"";}?>>Preparation</option>
                  <option value="Delivery" <?php if($transaction['transaction_status'] == "Delivery"){echo"selected";}else{"";}?>>Delivery</option>
                  <option value="Delivered" <?php if($transaction['transaction_status'] == "Delivered"){echo"selected";}else{"";}?>>Delivered</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>