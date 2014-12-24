<?php include_once 'inc-auth-granted.php';?>
<?php include_once 'classes/utils.php';?>
<?php 
require 'classes/StorageManager.php';

	$storageManager = new StorageManager();
	$accessGranted = $storageManager->getNews(null);
	//print_r($accessGranted);
	if (empty($accessGranted)) {
		$message = 'Aucun enregistrements';
	} else {
		$message = '';
	}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php include_once 'inc-meta.php';?>
</head>
<body>	
	<?php require_once 'inc-menu.php';?>

	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

				<table class="table table-hover table-bordered table-condensed table-striped" >
					<thead>
						<tr>
							<th class="col-md-1" style="">
								ID
							</th>
							<th class="col-md-1" style="">
								Date
							</th>
							<th class="col-md-4" style="">
								Titre
							</th>
							<th class="col-md-6" style="">
								Description
							</th>
							<th class="col-md-1" colspan="2" style="">
								Actions
							</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
						if (!empty($accessGranted)) {
							$i=0;
							foreach ($accessGranted as $value) { 
							$i++;
							?>
							<tr class="<?php if ($i%2!=0) echo 'info'?>">
								<td><?php echo $value['id_news']?></td>
								<td><?php echo traitement_datetime_affiche($value['date_news'])?></td>
								<td><?php echo $value['titre']?></td>
								<td><?php echo $value['description']?></td>
								<td><a href="actu-ajout.php?id=<?php echo $value['id_news'] ?>"><img src="img/modif.png" width="30" alt="Modifier" ></a></td>
								<td><a href="actu-suppr.php?id=<?php echo $value['id_news'] ?>"><img src="img/del.png" width="20" alt="Supprimer"> </a></td>
							</tr>
							<?php } ?>
						<?php } ?>	
					</tbody>
				</table>

				<h3><?php echo $message?></h3>
			</div>
		</div>
	</div>
</body>
</html>


