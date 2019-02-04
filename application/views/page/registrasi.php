<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2">Registrasi</h1>
</div>
<?php if(validation_errors()){ ?>
	<div class="alert alert-danger" role="alert" >
	<?php echo validation_errors(); ?>
	</div>
<?php } ?>
<form method="POST" action="<?php echo base_url()."login/do_registrasi";?>">
  <div class="form-group">
    <label for="exampleFormControlInput1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput2">Your Name</label>
    <input type="text" class="form-control" name="nama" id="exampleFormControlInput2" placeholder="Your Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput3">Email</label>
    <input type="email" class="form-control" name="email" id="exampleFormControlInput3" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput4">Password</label>
    <input type="password" class="form-control" name="password" id="exampleFormControlInput4" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput5">Verify Password</label>
    <input type="password" class="form-control" name="confirm_password" id="exampleFormControlInput5" placeholder="Verify Password">
  </div>
  <button type="submit" class="btn btn-primary">Kirim</button>
</form>