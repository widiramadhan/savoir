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
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <form action="<?php echo base_url();?>admin/save" method="post">
            <div class="card-body">
            <div class="d-flex align-items-center">
                <p class="mb-0 text-uppercase">Account Information</p>
                <button type="submit" class="btn btn-primary text-white bg-dark btn-sm ms-auto">Save</button>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Username</label>
                      <input class="form-control" type="text" name="username" required placeholder="Username">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Password</label>
                      <input class="form-control" type="password" name="password" required placeholder="Password">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Name</label>
                      <input class="form-control" type="text" name="name" required placeholder="Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Email</label>
                      <input class="form-control" type="email" name="email" required placeholder="Ex: test@savoir.com">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Phone Number</label>
                      <input class="form-control" type="number" name="phone_number" required placeholder="Ex: 08xxxxxxx" maxlength="15">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Role</label>
                      <select class="form-control" name="role" required>
                          <option value="" disabled selected>Choose Role</option>
                          <option value="Admin">Admin</option>
                          <option value="Super Admin">Super Admin</option>
                      </select>
                  </div>
                </div>
            </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>