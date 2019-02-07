<script type="text/javascript">
	function show_pesan(id){
		var dpesan = $("#pesan"+id).html();
		$(".kotak-detail").html(dpesan);
	}
</script>
<div class="row">
 <h1 class="h2">Kotak Keluar</h1>
 <div class="table-responsive">
   <table class="table table-striped table-sm">
     <thead>
       <tr>
         <th>#</th>
         <th>Kepada</th>
         <th>Subjek</th>
         <th>Tanggal</th>
       </tr>
     </thead>
     <tbody>
		<?php 
		if(isset($pesan)){
			$no=1;
			foreach($pesan as $val){ ?>
				<tr onclick="show_pesan(<?php echo $val->id;?>)"style="cursor:pointer;">
				  <td><?php echo $no++;?></td>						  
				  <td><?php echo $val->email;?></td>						  
				  <td><?php echo $val->subject;?></td>						  
				  <td><?php echo $val->time_stamp;?></td>					  
				  <td style="display:none;" id="pesan<?php echo $val->id;?>" ><?php echo $val->pesan;?></td>						  
				</tr>
		<?php
			}
		}else{
		?>
			<tr>
				<td colspan="4">Tidak ada kotak keluar</td>
			</tr>
		<?php 
		}
		?>
     </tbody>
   </table>
 </div>
 <div class="kotak-detail">
   Tidak ada pesan yang dipilih
 </div>
</div>