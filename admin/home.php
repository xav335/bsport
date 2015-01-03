<?php 
require 'classes/StorageManager.php';
session_start();

$storageManager = new StorageManager();
if (!isset($_SESSION['accessGranted']) || !$_SESSION['accessGranted']) {
	$result = $storageManager->grantAccess($_POST['login'], $_POST['mdp']);
	if (!$result){
		header('Location: /admin/?action=error');
	} else {
		$_SESSION['accessGranted'] = true;
	}
}

$result = $storageManager->goldbookUnvalidateGet();
if (empty($result)) {
	$message = 'Tous les messages sont validés';
} else {
	$message = 'Vous avez '. $result[0]['nb'] .' message(s) à valider';
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
					<?php echo $message ?>
				</p>
				<p>
					<a class="btn btn-success pull-right" href="/admin/goldbook-list.php">Modifier</a>
				</p>
			</div>
		</div>
	</div>
</body>
</html>


