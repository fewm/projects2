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
    <h1 class="h2">Submit File</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
	  <a href="<?php echo base_url();?>user/managemen_dokumen">
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
<form action="<?php echo base_url();?>user/upload_file" method="post" enctype="multipart/form-data" >
    <div class="form-group">
      <label for="exampleFormControlInput3">Email</label>
      <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput2">Author Name</label>
      <input type="text" name="author_name" class="form-control" id="exampleFormControlInput2" placeholder="Author Name">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput4">Author Website</label>
      <input type="text" name="author_website" class="form-control" id="exampleFormControlInput2" placeholder="Author Website">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput5">Title</label>
      <input type="text" name="download_titel" class="form-control" id="exampleFormControlInput5" placeholder="Title">
    </div>
	<!--
    <div class="form-group">
      <label for="exampleFormControlInput6">Version</label>
      <input type="number" class="form-control" id="exampleFormControlInput6" placeholder="Version">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput7">Price</label>
      <input type="number" class="form-control" id="exampleFormControlInput7" placeholder="Price">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput8">Category</label>
      <select class="custom-select" id="exampleFormControlInput8">
        <option selected>Select Category</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput9">License</label>
      <select class="custom-select" id="exampleFormControlInput9">
        <option selected>Select License</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput10">Language</label>
      <select class="custom-select" id="exampleFormControlInput10">
        <option selected>Select Language</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput11">System</label>
      <select class="custom-select" id="exampleFormControlInput11">
        <option selected>Select System</option>
      </select>
    </div>
	-->
    <div class="form-group">
      <label >Select File</label><br />
      <label for="file_upload" class="btn btn-dark" >Brows File</label><span id="file_name" style="padding-left:10px;" >No File Choose</span><br /><font color="red">*File Type: PDF, MAX Size: 20MB</font>
      <input type="file" name="file_upload" id="file_upload" style="display:none;" class="form-control-file" >
    </div>
	<!--
    <div class="form-group">
      <label for="exampleFormControlInput13">Default Screnshoot</label>
      <input type="file" class="form-control-file" id="exampleFormControlInput13">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput14">Additional Screnshoot</label>
      <input type="file" class="form-control-file" id="exampleFormControlInput14">
    </div>
	--><br />
    <button type="submit" class="btn btn-primary">Upload</button>
    </div>
</form>