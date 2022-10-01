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
              <div>
                <h6 class="mb-0">Data Message</h6>
              </div>
            </div>
          </div>
            </div>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align:center;vertical-align:middle">Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align:center;vertical-align:middle">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Message</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
          $no = 0;
					foreach($message as $data_message) {
            $no++;
					?>
                  <tr>
                  <td style="text-align:center;vertical-align:middle">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $no;?></p>
                      </td>
                      <td style="text-align:center;vertical-align:middle">
                        <p class="text-xs font-weight-bold mb-0"><?php echo date("Y-m-d H:i:s", strtotime($data_message->created_date));?></p>
                      </td>
                    <td style="text-align:left;vertical-align:middle">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $data_message->message_name;?></p>
                      </td>
                      <td style="text-align:center;vertical-align:middle">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data_message->message_email;?></p>
                      </td>
                      <td style="text-align:left;vertical-align:middle">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data_message->message_value;?></p>
                      </td>
                      <td class="align-middle" style="text-align:center;vertical-align:middle">
						            <a href="<?php echo base_url();?>message/delete/<?php echo $data_message->message_id;?>" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Are you sure delete this data?');">
                          <i class='fa fa-trash'></i>
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