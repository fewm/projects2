<nav class="col-md-3 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Menu Utama</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="home"?"active":""; ?>" href="<?php echo base_url(); ?>">
          <span data-feather="home"></span>
          Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="staf_kelas_karyawan"?"active":""; ?>" href="<?php echo base_url(); ?>baseweb/staf_kelas_karyawan">
          <span data-feather="layers"></span>
          Staf Kelas Karyawan
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="knoledge"?"active":""; ?>" href="<?php echo base_url(); ?>baseweb/knoledge">
          <span data-feather="users"></span>
          Knowledge
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="administrator"?"active":""; ?>" href="<?php echo base_url(); ?>baseweb/administrator">
          <span data-feather="users"></span>
          Administrator
        </a>
      </li>
    </ul>
	<?php if(empty($this->session->uid)){ ?>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Login</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <form class="warna-form" action="<?php echo base_url();?>login" method="post" >
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
          <a href="<?php echo base_url();?>login/registrasi"><button type="button" class="btn">Registrasi</button></a>
        </form>
      </li>
    </ul>
	<?php }else{ ?>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Menu User</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="edit"?"active":""; ?>" href="<?php echo base_url(); ?>user/edit">
          <span data-feather="home"></span>
          Edit User
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="forum"?"active":""; ?>" href="<?php echo base_url(); ?>user/forum">
          <span data-feather="layers"></span>
          Forum
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo ($page=="managemen_dokumen" or $page=="submit_file")?"active":""; ?>" href="<?php echo base_url(); ?>user/managemen_dokumen">
          <span data-feather="users"></span>
          Manajemen Dokumen
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo ($page=="managemen_video" or $page=="upload_video")?"active":""; ?>" href="<?php echo base_url(); ?>user/managemen_video">
          <span data-feather="video"></span>
          Manajemen Video
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."login/logout"; ?>">
          <span data-feather="video"></span>
          Logout
        </a>
      </li>
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Pesan</span>
      <a class="d-flex align-items-center text-muted <?php echo $page=="pesan"?"active":""; ?>" href="<?php echo base_url(); ?>pesan">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="pesan_baru"?"active":""; ?>" href="<?php echo base_url(); ?>pesan/pesan_baru">
          <span data-feather="mail"></span>
          Pesan Baru
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="kontak_masuk"?"active":""; ?>" href="<?php echo base_url(); ?>pesan/kontak_masuk">
          <span data-feather="inbox"></span>
          Kotak Masuk
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="kontak_keluar"?"active":""; ?>" href="<?php echo base_url(); ?>pesan/kontak_keluar">
          <span data-feather="inbox"></span>
          Kotak Keluar
        </a>
      </li>
    </ul>
	<?php } ?>
  </div>
</nav>