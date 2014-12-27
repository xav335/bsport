<?php
require 'classes/StorageManager.php';
session_start();

$storageManager = new StorageManager();
//Security
if (!isset($_SESSION['accessGranted']) || !$_SESSION['accessGranted']) {
	$result = $storageManager->grantAccess($_POST['login'], $_POST['mdp']);
	if (!$result){
		header('Location: /admin/?action=error');
	} else {
		$_SESSION['accessGranted'] = true;
	}
}

//Forms processing
if (!empty($_POST)){
	
	// traitement des news
	if ($_POST['reference'] == 'news'){
		if ($_POST['action'] == 'modif') { //Modifier la news
			try {
				$result = $storageManager->newsModify($_POST);
				header('Location: /admin/news-list.php');
			} catch (Exception $e) {
				echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
				exit();
			}
			
		} else {  //ajouter une news
			try {
				$result = $storageManager->newsAdd($_POST);
				header('Location: /admin/news-edit.php?id='.$result);
			} catch (Exception $e) {
				echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
				exit();
			}
		}
		
	}
	
	// traitement des livre d'or
	if ($_POST['reference'] == 'goldbook'){
		if ($_POST['action'] == 'modif') { //Modifier 
			try {
				$result = $storageManager->goldbookModify($_POST);
				header('Location: /admin/goldbook-list.php');
			} catch (Exception $e) {
				echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
				exit();
			}
				
		} else {  //ajouter 
			try {
				$result = $storageManager->goldbookAdd($_POST);
				header('Location: /admin/goldbook-edit.php?id='.$result);
			} catch (Exception $e) {
				echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
				exit();
			}
		}
	
	}
	
} elseif (!empty($_GET)) { // GET GET GET
	if ($_GET['reference'] == 'news'){ //supprimer
		if ($_GET['action'] == 'delete'){
			try {
				$result = $storageManager->newsDelete($_GET['id']);
				header('Location: /admin/news-list.php');
			} catch (Exception $e) {
				echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
				exit();
			}
		}	
	}
	if ($_GET['reference'] == 'goldbook'){ //supprimer
		if ($_GET['action'] == 'delete'){
			try {
				$result = $storageManager->goldbookDelete($_GET['id']);
				header('Location: /admin/goldbook-list.php');
			} catch (Exception $e) {
				echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
				exit();
			}
		}
	}
} else {
	header('Location: /admin/');
}

?>