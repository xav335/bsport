<?php
require '../admin/classes/StorageManager.php';
require '../admin/classes/utils.php';
session_start();

$storageManager = new StorageManager();

error_log(date("Y-m-d H:i:s") ." : ". $_POST['datepicker'] ."\n", 3, "../log/spy.log");
error_log(date("Y-m-d H:i:s") ." : ". $_POST['nom'] ."\n", 3, "../log/spy.log");
error_log(date("Y-m-d H:i:s") ." : ". $_POST['email'] ."\n", 3, "../log/spy.log");
error_log(date("Y-m-d H:i:s") ." : ". $_POST['message'] ."\n", 3, "../log/spy.log");
error_log(date("Y-m-d H:i:s") ." : ". $_POST['action'] ."\n", 3, "../log/spy.log");
error_log(date("Y-m-d H:i:s") ." : ". $_POST['newsletter'] ."\n", 3, "../log/spy.log");

if ($_POST["action"] == "sendMail") {
	try {
		$result = $storageManager->goldbookAdd($_POST);
	} catch (Exception $e) {
		error_log(date("Y-m-d H:i:s") ." Erreur: ". $e->getMessage() ."\n", 3, "../log/spy.log");
		exit();
	}

	//$_to = "contact@bsport.fr";
	$_to = "fjavi.gonzalez@gmail.com";
	$sujet = "Bsport - Nv message Livre d'or ";
	//echo "Envoi du message à " . $_to . "<br>";
		
	$entete = "From:Bsport <contact@bsport.fr>\n";
	$entete .= "MIME-version: 1.0\n";
	$entete .= "Content-type: text/html; charset= iso-8859-1\n";
	$entete .= "Bcc: xav335@hotmail.com\n";
		
	$corps = "";
	$corps .= "Bonjour,<br><br>";
	$corps .= "Nv message pour le livre d'or de :<br><b>" . $_POST["nom"] . " " . "</b> (" . $_POST["email"] . ")<br>";
	$corps .= "<b>Message :</b><br>";
	$corps .= $_POST["message"] . "<br><br>";
	$corps = utf8_decode( $corps );
	//echo $corps . "<br>";
		
	// Envoi des identifiants par mail
	mail($_to, $sujet, stripslashes($corps), $entete);
		
	error_log(date("Y-m-d H:i:s") ." : Message envoyé ! \n", 3, "../log/spy.log");
} else {
	error_log(date("Y-m-d H:i:s") ." : Message NON envoyé ! \n", 3, "../log/spy.log");
}
error_log(date("Y-m-d H:i:s") ." xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  \n", 3, "../log/spy.log");
?>