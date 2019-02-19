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
	  <?php if($this->session->level!='2'){ ?>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="knoledge"?"active":""; ?>" href="<?php echo base_url(); ?>baseweb/knoledge">
          <span data-feather="users"></span>
          Knowledge
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="forum"?"active":""; ?>" href="<?php echo base_url(); ?>user/forum">
          <span data-feather="layers"></span>
          Forum
        </a>
      </li>
	  <?php } ?>
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Menu User</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column">
	  <?php if($this->session->level !='0'){ ?>
      <li class="nav-item">
        <a class="nav-link <?php echo ($page=="managemen_user" or $page=="add" or $page=="edit")?"active":""; ?>" href="<?php echo base_url(); ?>user/managemen_user">
          <span data-feather="video"></span>
          Manajemen User
        </a>
      </li>
	  <?php } ?>
	  <?php if($this->session->level < '1'){ ?>
      <li class="nav-item">
        <a class="nav-link <?php echo $page=="edit"?"active":""; ?>" href="<?php echo base_url(); ?>user/edit">
          <span data-feather="home"></span>
          Edit User
        </a>
      </li>
	  <?php } ?>
	  <?php if($this->session->level !='2'){ ?>
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
        <a class="nav-link <?php echo ($page=="managemen_audio" or $page=="upload_audio")?"active":""; ?>" href="<?php echo base_url(); ?>user/managemen_audio">
          <span data-feather="video"></span>
          Manajemen Audio
        </a>
      </li>
	  <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."login/logout"; ?>">
          <span data-feather="video"></span>
          Logout
        </a>
      </li>
    </ul>
	<?php if($this->session->level !='2'){ ?>
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