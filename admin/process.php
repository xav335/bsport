<?php
require 'classes/StorageManager.php';
require 'classes/utils.php';
session_start();

$storageManager = new StorageManager();

//Forms processing
if (!empty($_GET)){
	
	// traitement des news
			try {
				$result = $storageManager->newsGet($_GET['id']);
				echo 
					"<h4>Date : <b>". traitement_datetime_affiche($result[0]['date_news']) ."</b></h4><br>".
					"<h3>".  $result[0]['titre'] ."</h3><br>".
					 $result[0]['contenu'];
			} catch (Exception $e) {
				echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
				exit();
			}
			
}	
	
?>