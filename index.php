<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
require('functions.php');
if(isset($_POST['submit'])){
	$gmail = new Checker();
	if(!empty($_POST['mails'])){
		$mails = $_POST['mails'];
	}else{
		$error = 'input is empty.';
	}
	if(isset($mails)){
		$mails = trim($mails);
		$check = $gmail->exist($mails);
	}
}
?>
<!doctype html>
<html dir='ltr' class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
	<style>
		textarea{font-size:13px;}
	</style>
	<title>Gmail Simple Checker</title>
</head>
<body class="bg-light d-flex flex-column h-100">
<main class="h-100">
<?php include('nav.php'); ?>
<div class="d-flex flex-column justify-content-center align-items-center h-100">
<div class="container">
	<div class="row mt-4">
	<div class="col-12 col-md-5 d-table mx-auto">
	<h1 class="h4 text-center mb-3">Simple Gmail Checker</h1>
	<form method="post" action="#">
	  <input class="form-control text-center py-3" placeholder="example@gmail.com" name="mails" rows="12">
	  <button type="submit" name="submit" class="text-uppercase fw-bold btn btn-success mt-3 py-3 d-block w-100">Submit</button>
	</form>
	</div>
	</div>
	<?php if(isset($error)): ?>
	<div class="row mt-3">
	<div class="col">
		<div class="alert alert-danger" role="alert">
			<?php echo $error; ?>
		</div>
	</div>
	</div>
	<?php endif; ?>
	<?php if(isset($check)): ?>
	<div class="row mt-3 text-center">
		<div class="col-12 col-md-5 d-table mx-auto">
			<?php if($check): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $mails; ?> is verified.
				</div>
			<?php else: ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $mails; ?> is not verified.
				</div>
			<?php endif; ?>
		</div>	
	</div>
	<?php endif; ?>
</div>
</div>
</main>
<?php include('footer.php'); ?>
</body>
</html>
