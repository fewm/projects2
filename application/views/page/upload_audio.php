<script type="text/javascript">
$(document).ready(function(){
	$("#file_upload").change(function() {
	  filename = this.files[0].name;
	  console.log(filename);
	  $("#file_name").html(filename);
	});
});
</script>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2">Upload Audio</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
	  <a href="<?php echo base_url();?>user/managemen_audio">
        <button class="btn btn-sm btn-outline-secondary">Back</button>
	  </a>
    </div>
  </div>
</div>
<?php if(validation_errors()){ ?>
	<div class="alert alert-danger" role="alert" >
		<?php echo validation_errors(); ?>
	</div>
<?php } ?>
<form action="<?php echo base_url();?>user/upload_audio" method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="download_titel" class="form-control" id="exampleFormControlInput1" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput3">Description</label>
    <textarea name="desc" class="form-control" id="exampleFormControlInput2" placeholder="Description"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput4">Tags</label>
    <input type="text" name="tags" class="form-control" id="exampleFormControlInput2" placeholder="Keywords">
  </div>
  <div class="form-group">
    <label >Select Video</label><br />
    <label for="file_upload" class="btn btn-dark" >Brows Audio</label><span id="file_name" style="padding-left:10px;" >No Audio Choose </span><br /><font color="red">*File Type: MP3, MAX Size: 100MB</font>
    <input type="file" name="file_upload" id="file_upload" style="display:none;" class="form-control-file" >
  </div>
  <h6 class="h6">Sharing Option</h6>
  <div class="form-group">
	<label for="exampleFormControlInput8">Acces</label>
    <select class="custom-select" name="acces" id="exampleFormControlInput8">
      <option value="true">Yes</option>
      <option value="false">No</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput8">Allow Download</label>
    <select class="custom-select" name="acces_download" id="exampleFormControlInput8">
      <option value="true">Yes</option>
      <option value="false">No</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Upload</button>
  </div>
</form>