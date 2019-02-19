<div class="ror">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $title; ?></h1>
    </div>
	<?php if(validation_errors()){ ?>
		<div class="alert alert-danger" role="alert" >
		<?php echo validation_errors(); ?>
		</div>
	<?php } ?>
    <form method="POST" action="<?php echo base_url()."user/save_add";?>">
	  <input type="hidden" name="id" readonly value="<?php echo $val!=""?$val['id']:'';?>" />
      <div class="form-group">
        <label for="exampleFormControlInput1">Username</label>
        <input type="text" name="username" <?php echo $val!=""?"readonly":'';?> value="<?php echo $val!=""?$val['username']:'';?>" class="form-control" id="exampleFormControlInput1" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput2">Your Name</label>
        <input type="text" name="nama" value="<?php echo $val!=""?$val['name']:'';?>" class="form-control" id="exampleFormControlInput2" placeholder="Your Name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput3">Email</label>
        <input type="email" name="email" value="<?php echo $val!=""?$val['email']:'';?>" class="form-control" id="exampleFormControlInput2" placeholder="Email">
      </div>
      <div class="form-group" style="display:<?php echo $this->session->level !="1"?'block;':'none;';?>" >
        <label for="exampleFormControlInputselect">User Level</label>
        <select name="status" class="custom-select" id="exampleFormControlInputselect">
			<?php $valsel = $val!=""?$val['status']:'';?>
			<option value="0" <?php echo $valsel=='0'?"selected":"";?> >Member</option>
			<option value="1" <?php echo $valsel=='1'?"selected":"";?> >Admin</option>
			<option value="2" <?php echo $valsel=='2'?"selected":"";?> >IT</option>
		</select>
      </div>
	  <?php if($val!=""){ ?>
      <div class="form-group">
        <label for="exampleFormControlInput4">Password Lama</label>
        <input type="password" name="old_password" class="form-control" id="exampleFormControlInput2" placeholder="Password">
      </div>
	  <?php } ?>
      <div class="form-group">
        <label for="exampleFormControlInput4">Password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlInput2" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput5">Verify Password</label>
        <input type="password" name="confirm_password" class="form-control" id="exampleFormControlInput5" placeholder="Verify Password">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>