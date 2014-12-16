<?php 
	require 'classes/StorageManager.php';
	session_start();
	
	if (!isset($_SESSION['accessGranted']) || !$_SESSION['accessGranted']) {
		$storageManager = new StorageManager();
		$accessGranted = $storageManager->grantAccess($_POST['login'], $_POST['mdp']);
		if (!$accessGranted){
			header('Location: /admin/?action=error');
		} else {
			$_SESSION['accessGranted'] = true;
		}
	} 
	
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php include_once 'inc-meta.php';?>
</head>
<body>	
	<?php require_once 'inc-menu.php';?>
  	

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Message du livre d'or à valider</h3>
			</div>
			<div class="panel-body">
				<p>
					sfsdfsdfsdfsd
				</p>
				<p>
					<a class="btn btn-success pull-right" href="http://webchat.freenode.net?channels=zftalk" target="_blank">Modifier</a>
				</p>
			</div>
		</div>
	</div>
</body>
</html>


