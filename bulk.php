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
		$mails = $gmail->extractMails($_POST['mails']);
	}else{
		$error = 'textbox is empty.';
	}
	if(isset($mails)){
		foreach($mails as $mailsVal){
			$mailsVal = trim($mailsVal);
			$check = $gmail->exist($mailsVal);
			if($check){
				$valid[] = $mailsVal;
			}else{
				$notvalid[] = $mailsVal;
			}
		}
	}
}
?>
<!doctype html>
<html dir='ltr' class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
	<style>
		textarea{font-size:13px;}
	</style>
	<title>Gmail Bulk List Checker</title>
</head>
<body class="bg-light d-flex flex-column h-100">
<?php include('nav.php'); ?>
<main class="h-100">
<div class="container mt-3">
	<div class="row">
	<div class="col-12 col-md-5 d-table mx-auto">
	<h1 class="h4 text-center">Bulk Gmail Checker</h1>
	<form method="post" action="#">
	  <textarea class="form-control" name="mails" rows="12"></textarea>
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
	<?php if(isset($mails)): ?>
	<div class="row row-cols-1 row-cols-md-2 mt-3">
	<div class="col">
	<div class="alert alert-success" role="alert">
	  <h3>Success</h3>
	  <?php if(isset($valid)): ?>
<textarea class="form-control" rows="12">
<?php foreach($valid as $validVal): ?>
<?php echo $validVal; ?>&#13;
<?php endforeach; ?>
</textarea>
	  <?php else: ?>
	  0 record
	  <?php endif; ?>
	</div>
	</div>
	<div class="col">
	<div class="alert alert-danger" role="alert">
	  <h3>Error</h3>
	  <?php if(isset($notvalid)): ?>
<textarea class="form-control" rows="12">
<?php foreach($notvalid as $notvalidVal): ?>
<?php echo $notvalidVal; ?>&#13;
<?php endforeach; ?>
</textarea>
	  <?php else: ?>
	  0 record
	  <?php endif; ?>
	</div>
	</div>
	</div>
	<?php endif; ?>
</div>
<?php include('footer.php'); ?>
</main>
</body>
</html>
