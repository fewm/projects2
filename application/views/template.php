<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Project S2 <?php echo isset($title)?"- ".$title:"";?></title>
	<?php 
		require_once 'common/style_loader.php';
	?>
  </head>

  <body>
  <!-- Image and text -->
	<content>
		<?php
		if(isset($this->session->uid)){
		?>
<div class="navbar">
    <img src="<?php echo base_url()."assets/img/logo.png";?>" width="100" class="d-inline-block align-top" alt="" />
   	<h4 style="text-align: right;color:#ffffff !important">
   	Knowledge Management System Tracer Study<br />
   	<font size="4px" >Universitas Budi Luhur</font>
   	</h4>
   	</div>
			<div class="container bg-light">
			  <div class="row">
				<?php require_once 'common/menu.php'; ?>
				<main role="main" class="col-md-9 ml-sm-auto col-lg-9 pt-3 px-4">
					<?php if(isset($_GET['pesan'])){ ?>
						<div class="alert <?php echo $_GET['type']=="error"?"alert-danger":"alert-success"; ?>" role="alert">
							<?php echo $_GET['pesan'];?>
						</div>
					<?php } ?>
					<?php require_once 'page/'.$page.'.php'; ?>
				</main>
			  </div>
			</div>
			
		<?php	
		}else{ 
			require_once 'page/form_login.php'; 
		} ?>
	</content>
  </body>
</html>