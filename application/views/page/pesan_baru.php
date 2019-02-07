<script type="text/javascript">
	$('select').selectpicker({noneSelectedText: 'Insert Placeholder text'});
	setTimeout(function(){
		$('.bootstrap-select').attr("style","width:100% !important");
		$('.filter-option-inner-inner').html("exmple@yourhost.com");
	},300);
</script>
<div class="rows">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
     <h1 class="h2">Pesan Baru</h1>
	</div>
	<?php if(validation_errors()){ ?>
		<div class="alert alert-danger" role="alert" >
		<?php echo validation_errors(); ?>
		</div>
	<?php } ?>
    <form method="POST" action="<?php echo base_url()."pesan/save_pesan";?>">
     <div class="form-group">
       <label for="exampleFormControlInput1">Kepada</label>
       <select class="selectpicker" id="kepada" name="kepada" multiple data-live-search="true" placeholder="exmple@yourhost.com" width="100%">
		<?php
			foreach($user as $val){
				echo '<option value="'.$val->email.'" >'.$val->email.'</option>';
			}
		?>
		</select>
     </div>
     <div class="form-group">
       <label for="exampleFormControlInput2">Subjek</label>
       <input type="text" name="subject" class="form-control" id="exampleFormControlInput2" placeholder="Subjek">
     </div>
     <div class="form-group">
       <label for="exampleFormControlTextarea1">Pesan</label>
       <textarea name="pesan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
     </div>
     <button type="submit" class="btn btn-primary">Kirim</button>
	</form>
</div>