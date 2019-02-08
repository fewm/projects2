<script type="text/javascript">
	function show_pesan(id){
		var dpesan = $("#pesan"+id).html();
		$(".kotak-detail").html(dpesan);
	}
</script>
<h6 class="sidebar-content d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted" style="padding: 30px;" >
    <span>
		<!-- <button class="btn btn-primary" >download File</button>-->
		<a href="<?php echo base_url(); ?>user/form_file"> <button class="btn" >Submit File</button></a>
	</span>
    <a class="d-flex align-items-center text-muted" href="#">
      <span data-feather="plus-circle"></span>
    </a>
</h6>
<h1 class="h2">Managemen Ddokumen	</h1><br>
<div class="row">
<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>          
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Judul</th>
        <th>User</th>
        <th>Tanggal</th>
        <th>Detail</th>
        <th>Download</th>
      </tr>
    </thead>
    <tbody>
		<?php 
		if(isset($dokumen)){
			$no=1;
			foreach($dokumen as $val){ ?>
				<tr>
				  <td style="padding-top:10px" ><?php echo $no++;?></td>						  
				  <td style="padding-top:10px" ><?php echo $val->download_titel;?></td>						  
				  <td style="padding-top:10px" ><?php echo $val->name;?></td>						  
				  <td style="padding-top:10px" ><?php echo $val->time_stamp;?></td>						  
				  <td><span class="btn" onclick="show_pesan(<?php echo $val->id;?>)" ><i class="fas fa-eye" ></i></span></td>						  
				  <td><a class="btn" target="_blank" href="<?php echo base_url()."uploads/".$val->file; ?>"><i class="fas fa-file-download" ></i></a></td>					  
				  <td style="display:none;" id="pesan<?php echo $val->id;?>" ><?php echo "File Name: ".$val->file."<br />File Size: ".$val->size_file." KB<br />Author Name: ".$val->author_name."<br />Author Website: ".$val->author_website;?></td>						  
				</tr>
		<?php
			}
		}else{
		?>			
		  <tr>
			<td colspan="6">Tidak ada file</td>
		  </tr>
		<?php
		} 
		?>
    </tbody>
  </table>
</div>
 <div class="kotak-detail">
   Tidak ada detail yang dilihat
 </div>
</div>
        
        