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
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Data Customer</h6>
            </div>
            <!-- <div class="col-6 text-end">
                <a href="<?php echo base_url();?>transaction/add" class="btn btn-outline-dark btn-sm mb-0"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add Customer</a>
            </div> -->
          </div>
            </div>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align:center;vertical-align:middle">Invoice No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align:center;vertical-align:middle">Transaction Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align:center;vertical-align:middle">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Catalog</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Designer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Listing Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Paid Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Item Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 0;
                  foreach($transaction as $data_transaction) {
                    $no++;
                  ?>
                  <tr>
                    <td style="text-align:center;vertical-align:middle">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $no;?></p>
                    </td>
                    <td style="text-align:center;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $data_transaction->transaction_invoice_no;?></p>
                    </td>
                    <td style="text-align:center;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0"><?php echo date("Y-m-d h:i:s", strtotime($data_transaction->created_date));?></p>
                    </td>
                    <td style="text-align:left;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $data_transaction->name;?></p>
                    </td>
                    <td style="text-align:center;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $data_transaction->email;?></p>
                    </td>
                    <td style="text-align:center;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $data_transaction->category_name;?></p>
                    </td>
                    <td style="text-align:center;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $data_transaction->designer_name;?></p>
                    </td>
                    <td style="text-align:left;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $data_transaction->product_name;?></p>
                    </td>
                    <td style="text-align:right;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0">Rp. <?php echo number_format($data_transaction->product_price);?></p>
                    </td>
                    <td class="align-middle text-center text-sm" style="text-align:center;vertical-align:middle">
                      <?php if($data_transaction->paid_status == "Paid") { ?>
                          <span class="badge badge-sm bg-gradient-success">Paid</span>
                      <?php } else { ?>
                          <span class="badge badge-sm bg-gradient-danger">Unpaid</span>
                      <?php } ?>
                    </td>
                    <td class="align-middle text-center text-sm" style="text-align:center;vertical-align:middle">
                      <?php if($data_transaction->transaction_status == "Preparation") { ?>
                          <span class="badge badge-sm bg-gradient-secondary">Preparation</span>
                      <?php } else if($data_transaction->transaction_status == "Delivery") { ?>
                          <span class="badge badge-sm bg-gradient-primary">Delivery</span>
                      <?php } else { ?>
                          <span class="badge badge-sm bg-gradient-success">Delivered</span>
                      <?php } ?>
                    </td>
                      <td class="align-middle" style="text-align:center;vertical-align:middle">
                        <a href="<?php echo base_url();?>transaction/detail/<?php echo $data_transaction->transaction_invoice_no;?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Data">
                          <i class='fa fa-search'></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" >
$(document).ready( function () {
    $('#data-table').DataTable();
    $(".fancybox").fancybox();
} );
</script>