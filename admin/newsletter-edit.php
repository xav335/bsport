<?php include_once 'inc-auth-granted.php';?>
<?php include_once 'classes/utils.php';?>
<?php 
require 'classes/StorageManager.php';

if (!empty($_GET)){ //Modif 
	$action = 'modif';
	$storageManager = new StorageManager();
	$result = $storageManager->newsGet($_GET['id']);
	//print_r($result);
	if (empty($result)) {
		$message = 'Aucun enregistrements';
	} else {
		$labelTitle = 'Actu N°: '. $_GET['id'];
		$id= 			$_GET['id'];
		$titre=  		$result[0]['titre'];
		$date_news= 	traitement_datetime_affiche($result[0]['date_news']);
		$accroche= 		$result[0]['accroche'];
		$contenu= 	$result[0]['contenu'];
	}
} else { //ajout News
	$action = 'add';
	$labelTitle = 'Edition Nouvelle actu ';
	$id= 			null;
	$titre=  		null;
	$date_news= 	null;
	$accroche= 		null;
	$contenu= 	null;
}
?>
<!doctype html>
<html class="no-js" lang="fr">
<head>
	<?php include_once 'inc-meta.php';?>
</head>
<body>	
	<?php require_once 'inc-menu.php';?>

	<div class="container">

		<div class="row">
			<h3><?php echo $labelTitle ?></h3>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<form name="formulaire" class="form-horizontal" method="POST"  action="formprocess.php">
					<input type="hidden" name="reference" value="newsletter">
					<input type="hidden" name="action" value="<?php echo $action ?>">
					<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
					
					<input type="hidden"  name="idImage"  id="idImage" value=""><br>
					<div class="form-group" >
						<label class="col-sm-1">Date :</label>
					    <input class="col-sm-2" type="text" name="datepicker" required id="datepicker" value="<?php echo $date_news?>" >
					</div>
					<div class="form-group" >
						<label class="col-sm-1" for="titre">Titre :</label>
					    <input type="text" class="col-sm-11" name="titre" required  value="<?php echo $titre ?>">
					</div>
					<?php for ($i = 1; $i < 5; $i++) { ?>
					<div class="form-group" style=" border:4px ridge white; padding: 30px 10px 30px 10px; ">
						<label class="col-sm-1" for="titre">Texte <?php echo $i ?> :</label>
					  	
						<input type="text" class="col-sm-10" name="text1"  id="text1" value=""><br>
             			<input type="hidden"  name="url<?php echo $i ?>"  id="url<?php echo $i ?>" value=""><br>
            			<a href="javascript:openCustomRoxy('<?php echo $i ?>')"><img src="/img/ajoutImage.jpg" id="customRoxyImage<?php echo $i ?>" style="max-width:350px;"></a>
						<img src="img/del.png" width="20" alt="Supprimer" onclick="clearImage(<?php echo $i ?>)"/>
 					
					</div>
					<?php }?>
						
					<div class="form-group" >
						<label class="col-sm-1" for="titre">Bas de page :</label>
					    <input type="text" class="col-sm-11" name="bas_page" required  value="">
					</div>	
		            <button class="btn btn-success col-sm-12" type="submit" class="btn btn-default"> Valider </button>
		            
					<div id="roxyCustomPanel" style="display: none;">
  							<iframe src="/admin/fileman2/index.html?integration=custom" style="width:100%;height:100%" frameborder="0"></iframe>
					</div>
					
					
					<script type="text/javascript">
						function openCustomRoxy(idImage){
							$('#idImage').val(idImage);
						 	$('#roxyCustomPanel').dialog({modal:true, width:875,height:600});
						}
						function closeCustomRoxy(){
						  	$('#roxyCustomPanel').dialog('close');
						}
	
						function clearImage(idImage){
							$('#customRoxyImage'+idImage).attr('src', '/img/ajoutImage.jpg');
							$('#url'+idImage).val('');
						}
					</script>
					
					<script type="text/javascript">
						
						$(document).ready(
						  /* This is the function that will get executed after the DOM is fully loaded */
						  function () {
						    $( "#datepicker" ).datepicker({
						    	altField: "#datepicker",
						    	closeText: 'Fermer',
						    	prevText: 'Précédent',
						    	nextText: 'Suivant',
						    	currentText: 'Aujourd\'hui',
						    	monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
						    	monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
						    	dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
						    	dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
						    	dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
						    	weekHeader: 'Sem.',
						    	dateFormat: 'dd/mm/yy'
						    });
						  }
	
						);
			
					</script>
		        </form>
			</div>
		</div>
	</div>
</body>
</html>


