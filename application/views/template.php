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
    <title>Project S2 - <?=$title?></title>
	<?php require_once 'common/style_loader.php'; ?>
  </head>

  <body>
	<content>
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
	</content>
  </body>
</html>