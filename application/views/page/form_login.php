 <script>
  function showalert(){
    alert("Hubungi Teknisi TI untuk mendapatkan password baru");
  }
 </script>
      <link href="<?php echo base_url();?>assets/css/login_style.css" rel="stylesheet">
 <div class="countain" style="padding:5%;">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <img  style="margin-left: 29%;"src="<?php echo base_url()."assets/img/logo.png";?>" width="200" class="d-inline-block align-top" alt="" />
        <div class="card card-signin">
          <div class="card-body">
            <h6 class="card-title text-center">Knowledge Management System</br>
            Tracer Study
            </h6>
            <form class="form-signin" action="<?php echo base_url();?>login" method="post" >
                <label for="username">Username</label>
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
              </div>
                <label for="password">Password</label>
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <a href="" class="custom-control-label" for="customCheck1" onclick="showalert();">Forget password?</a>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>