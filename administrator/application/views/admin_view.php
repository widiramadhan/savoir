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
                <h6 class="mb-0">Data Admin</h6>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo base_url();?>admin/add" class="btn btn-outline-dark btn-sm mb-0"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add Admin</a>
            </div>
          </div>
            </div>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align:center;vertical-align:middle">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align:center;vertical-align:middle">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align:center;vertical-align:middle">Role</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align:center;vertical-align:middle">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($admin_list as $data_admin) {
                  ?>
                  <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                        <div>
						  	          <a href="<?php echo base_url();?>assets/images/default.png" class="fancybox">
                            	<img src="<?php echo base_url();?>assets/images/default.png" class="avatar avatar-sm me-3" alt="user1" style="width:50px;height:50px;">
							              </a>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $data_admin->admin_name;?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $data_admin->admin_username;?></p>
                          </div>
                        </div>
                      </td>
                      <td style="text-align:center;vertical-align:middle">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data_admin->admin_email;?></p>
                      </td>
                      <td style="text-align:center;vertical-align:middle">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data_admin->admin_phone_number;?></p>
                      </td>
                      <td style="text-align:center;vertical-align:middle">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data_admin->admin_role;?></p>
                      </td>
                      <td class="align-middle text-center text-sm" style="text-align:center;vertical-align:middle">
                        <?php if($data_admin->is_active == 1) { ?>
                                    <span class="badge badge-sm bg-gradient-success">Active</span>
                        <?php } else { ?>
                                    <span class="badge badge-sm bg-gradient-secondary">Not Active</span>
                        <?php } ?>
                      </td>
                      <td class="align-middle" style="text-align:center;vertical-align:middle">
                        <!-- <a href="<?php //echo base_url();?>admin/edit/<?php echo $data_admin->admin_id;?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Data">
                          <i class='fa fa-edit'></i>
                        </a>
                        &nbsp;&nbsp;&nbsp; -->
						            <a href="<?php echo base_url();?>admin/delete/<?php echo $data_admin->admin_id;?>" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete Data" onclick="return confirm('Are you sure delete this data?');">
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