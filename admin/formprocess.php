<?php
require 'classes/StorageManager.php';
require 'classes/Newsletter.php';
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

//print_r($_POST);
//exit();
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
	
	// traitement des newsletters
	if ($_POST['reference'] == 'newsletter'){
		//print_r($_POST); exit();
		$newsletter = new Newsletter();
		if ($_POST['action'] == 'modif' ) { //Modifier
			try {
				if ($_POST['postaction'] !='delBloc') {
					$result = $newsletter->newsletterModify($_POST);
				}
				if ($_POST['postaction'] == 'preview' ) {
					header('Location: /admin/mailnewslettercore.php?id='. $_POST['id']);
				} elseif ($_POST['postaction']=='addBloc') {
					header('Location: /admin/newsletter-edit.php?addBloc=1&id='. $_POST['id']);
				} elseif ($_POST['postaction']=='delBloc') {
					$newsletter->newsletterDetailUniqueDelete($_POST['idbloc']);
					header('Location: /admin/newsletter-edit.php?id='. $_POST['id']);
				} else {
					header('Location: /admin/newsletter-list.php');
				}	
				$newsletter = null;
			} catch (Exception $e) {
				echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
				exit();
			}
	
		} else {  //ajouter
			try {
				$result = $newsletter->newsletterAdd($_POST);
				$newsletter = null;
				header('Location: /admin/newsletter-edit.php?id='.$result);
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
	if ($_GET['reference'] == 'newsletter'){ //supprimer
		$newsletter = new Newsletter();
		if ($_GET['action'] == 'delete'){
			try {
				$result = $newsletter->newsletterDelete($_GET['id']);
				$newsletter = null;
				header('Location: /admin/newsletter-list.php');
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