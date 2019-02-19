<script type="text/javascript">
	function show_pesan(id){
		var dpesan = $("#pesan"+id).html();
		$(".kotak-detail").html(dpesan);
	}
</script>
<h1 class="h2">Managemen User</h1><br>
<div class="row">
<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" name="keyword" id="keyword" placeholder="Search" aria-label="Search">
</form>          
<div class="table-responsive">
	<h6 style="text-align:right;"><a href="<?php echo base_url()."user/add_user/";?>" ><i class="fas fa-plus-circle"></i> Tambah User</a></h6>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Level</th>
        <th>Tanggal</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
		<?php 
		if(isset($user)){
			$no=1;
			$status = array('0'=>"Member",'1'=>"Admin",'2'=>"IT");
			foreach($user as $val){ ?>
				<tr>
				  <td style="padding-top:10px" ><?php echo $no++;?></td>						  
				  <td style="padding-top:10px" ><?php echo $val->username;?></td>						  
				  <td style="padding-top:10px" ><?php echo $val->name;?></td>						  
				  <td style="padding-top:10px" ><?php echo $val->email;?></td>					  
				  <td style="padding-top:10px" ><?php echo $status[$val->status];?></td>					  
				  <td style="padding-top:10px" ><?php echo $val->time_stamp;?></td>					  
				  <td style="padding-top:10px" ><a href="<?php echo base_url()."user/edit_user/".$val->id;?>">Edit</a><?php if($val->status !='2'){?> | <a href="<?php echo base_url()."user/hapus_user/".$val->id;?>">Hapus</a><?php } ?>
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
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#keyword").on("keyup",function(){
			// alert("asdf");
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
			});
		});
	})
</script>