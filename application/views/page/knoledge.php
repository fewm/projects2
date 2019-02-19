<script type="text/javascript">
	function show_pesan(id){
		var dpesan = $("#pesan"+id).html();
		$(".kotak-detail").html(dpesan);
	}
	$(document).ready(function() {
		$("html, body").animate({ scrollTop: $("#load_more").scrollTop() }, 1000);
	});
</script>
<h2 class="h2">Knowledge
<form class="form-inline my-2 my-lg-0" style="float: right;margin-right:0px;" action="<?php echo base_url()."baseweb/knoledge";?>" method="POST" >
  <input class="form-control mr-sm-2" type="input" name="keyword" value="<?php echo $kword;?>" placeholder="Keywords" aria-label="Search">
  <input class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit" value="Search" />
  <input class="btn btn-outline-success my-2 my-sm-0" name="reset" type="submit" value="Reset" />
</form>
</h2>
<hr />
<h6 class="h6" style="width:100%;text-align:right;">Sort Data Terupdate | <?php echo count($knowledge['data']);?> Data dari Total Data : <?php echo $knowledge['total'];?></h6>
<div class="row">
<div class="table-responsive">
	<?php 
	// var_dump($knowledge);
	if($knowledge['total'] > 0){
		foreach($knowledge['data'] as $val){ 
			$table = explode(".",$val->file);
			$tablecheck = end($table);
			$table = ($tablecheck == "mp4" or $tablecheck == "MP4" or $tablecheck == "mp3" or $tablecheck == "MP3")?"video":"dokumen";
			$description = $table=="video"?$val->email."<br />By : ".$val->name."<br /><font size='1px'>at : ".$val->time_stamp."</font>":"Author Name : ".$val->author_name."<br />Author Website : ".$val->author_website."<br />File Name : ".$val->file."<br />File Size : ".$val->size_file."<br /><font size='1px'>at : ".$val->time_stamp."</font>";
	?>
			<div class="card" style="width:100%;padding:10px;margin-bottom:20px;">
				<div class="row no-gutters">
					<div class="col-auto">
						<?php if($table=="video"){ 
								if($tablecheck=="mp4" or $tablecheck=="MP4"){
							?>
							<a href="<?php echo base_url()."user/play_now/".$val->id;?>" >
								<video controls width="320px" style="cursor:pointer" >
									<source src="<?php echo base_url()."uploads/video/".$val->file;?>" type="video/mp4">
								</video>
							</a>
						<?php
								}else{
						?>									
									<a href="<?php echo base_url()."user/play_now/".$val->id;?>" >
										<audio controls style="cursor:pointer;width:795px;" >
											<source src="<?php echo base_url()."uploads/audio/".$val->file;?>" type="audio/mpeg">
										</audio>
									</a>
						<?php
								}
							}else{ 
						?>
								<a href="<?php echo base_url()."uploads/".$val->file;?>" >
									<img style="width:150px;" src="<?php echo base_url()."assets/img/pdf_download.png";?>" />
								</a>
						<?php
							}
						?>
					</div>
					<div class="col">
						<div class="card-block px-2">
							<h4 class="card-title">
								<?php 
									if($tablecheck == "mp4" or $tablecheck == "MP4"){
										echo $val->download_titel;
									}else{
										echo "<a href='".base_url()."user/play_now_audio/".$val->id."' >".$val->download_titel."</a>";
									}
								?>
							</h4>
							<p class="card-text"><?php echo $description; ?></p>
							<?php 
							if($table=="video") {
								$folder = ($tablecheck=="mp4" or $tablecheck=="MP4")?"video":"audio";
								if($val->author_website=="true"){
							?>
								<a href="<?php echo base_url()."uploads/".$folder."/".$val->file;?>" >Download</a>
							<?php 
								}
							}else{ 
							?>
								<a href="<?php echo base_url()."uploads/".$val->file;?>" >Download</a>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
			</a>
	<?php 
		}
	}
	?>
	<?php
	if($knowledge['show_more']===true){
		$page_next = $page_now+1;
	?>
		<a id="load_more" href="<?php echo base_url()."baseweb/knoledge/".$page_next;?>" class="btn btn-primary" style="width:100%;margin-bottom:10px;">Load More</a>
	<?php
	}
	?>
</div>
</div>