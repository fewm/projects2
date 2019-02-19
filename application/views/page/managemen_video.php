<script type="text/javascript">
	function show_pesan(id){
		var dpesan = $("#pesan"+id).html();
		$("#play_now").attr("src","<?php echo base_url()."uploads/video/";?>"+dpesan);
	}
</script>
<h6 class="sidebar-content2 d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted" style="padding: 30px;">
    <span>
		<!-- <button class="btn btn-primary" >download File</button>-->
		<a href="<?php echo base_url(); ?>user/form_video"> <button class="btn" >Upload</button></a>
	</span>
    <a class="d-flex align-items-center text-muted" href="#">
      <span data-feather="plus-circle"></span>
    </a>
</h6>
<div class="row">
<form class="form-inline my-2 my-lg-0" action="<?php echo base_url()."user/managemen_video";?>" method="POST" >
  <input class="form-control mr-sm-2" type="input" name="keyword" value="<?php echo $kword;?>" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
</div>
<div class="row"> 
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h6 class="mb-0">
          <b>Dimainkan Sekarang</b>
      </h6>
    </div>
    <div class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <video controls width="660px" autoplay>
          <source id="play_now" src="<?php echo base_url()."uploads/video/".$video_play_now['file'];?>" type="video/mp4">
        </video>
      </div>
    </div>
  </div>
</div>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h6 class="mb-0">
          <?php echo $kword!=""?"Daftar Video sesuai dengan <b>".$kword."</b>":"Daftar Video";?>
      </h6>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
	<br />
	<br />
		<div class="card-body">
			<div class="row">
				<?php 
				if(!empty($video)){
					foreach($video as $val){ ?>
						<div class="col-sm">
						<a href="<?php echo base_url()."user/play_now/".$val->id;?>" >
							<video controls width="245px" style="cursor:pointer" >
								<source src="<?php echo base_url()."uploads/video/".$val->file;?>" type="video/mp4">
							</video>
						</a>
						<span><br /><?php echo "<h5>".$val->download_titel;?></h5><a href="<?php echo base_url()."user/edit/data_video/".$val->id; ?>"><i class="fas fa-edit" ></i></a> <a href="<?php echo base_url()."user/delete/data_video/".$val->id; ?>"><i class="fas fa-trash" ></i></a><br />
						<?php echo $val->desc."<br />By ".$val->name."<br /><font size='1px'>Upload date : ".$val->time_stamp."</font><br />
						<a href='".base_url()."uploads/video/".$val->file."' target='_blank'> Download </a>";?></span>
						<br />
						<br />
						</div>
				<?php
					}
				}else{
					echo "Tidak ada video";
				}
				?>
			</div>
		</div>
    </div>
  </div>
</div>
</div>

  