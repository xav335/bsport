<?php include_once 'inc-auth-granted.php';?>
<?php include_once 'classes/utils.php';?>
<?php 
require 'classes/StorageManager.php';
require 'classes/Newsletter.php';

if (!empty($_GET)){ //Modif 
	$action = 'modif';
	$newsletter = new Newsletter();
	$result = $newsletter->newsletterGet($_GET['id']);
	//print_r($result);
	if (empty($result)) {
		$message = 'Aucun enregistrements';
	} else {
		$id= 			$_GET['id'];
		$titre=  		$result[0]['titre'];
		$date= 			traitement_datetime_affiche($result[0]['date']);
		$bas_page= 		$result[0]['bas_page'];
	}
} else { 
	echo 'Erreur contactez votre administrateur <br> :\n';
	exit();
}
?>

<?php
//$_to = "contact@bsport.fr";
$_to = "fjavi.gonzalez@gmail.com";
$sujet = "Bsport - Newsletter ";
//echo "Envoi du message à " . $_to . "<br>";

$entete = "From:Bsport <contact@bsport.fr>\n";
$entete .= "MIME-version: 1.0\n";
$entete .= "Content-type: text/html; charset= iso-8859-1\n";
$entete .= "Bcc: xav335@hotmail.com,xavier.gonzalez@laposte.net,jav_gonz@yahoo.com\n";

$corps = <<<EOD

<html>
<head>
<meta charset="utf-8" />
<title>Newsletter Bsport</title>
<style type="text/css">
	@import url('http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700');
	
	body {background: #fff;font-family:'PT Sans Narrow', sans-serif;}
	p {font-size:18px; text-align: justify;}
	p.bas {font-size:11px;}
	h1 {font-family:inherit;font-weight:bold;font-style:italic;font-size:36px;line-height:36px;color:#18293c;text-transform:uppercase;margin-bottom:0;}
	h2 {font-family:inherit;font-style:italic;font-size:18px;line-height:18px;color:#d75b00;text-transform:uppercase;margin-top:0;margin-bottom:30px;}
	h2:before {content:'// ';}
	h3 {font-family:inherit;font-weight:bold;font-size:20px;line-height:18px;color:#d75b00;text-transform:uppercase;margin-top:0;margin-bottom:0px;}
	h4 {font-family:inherit;font-style:normal;font-size:18px;line-height:18px;color:#18293c;text-transform:none;margin-top:0;margin-bottom:0px;}

</style>
</head>
<body>
	<table width="640" border="0"  cellpadding="0" cellspacing="0" >
		<tr>
		    <td align="center">
				<div style="text-align:center;  margin-left:auto;margin-right:auto; width: 640px; border: 4px ridge white; padding:20px 20px 20px 20px; ">
					
					<img  src="http://dev.bsport.fr/newsletter/logo.png">
				
					<h1>$titre</h1>
					<br><br>
			
					<h2>La piscine est réparé et à 32° !!</h2>
					<img width="640" src="http://dev.bsport.fr/uploads/bsport3.jpg"><br>
					<p >Notre piscine est enfin réparé, nous avons mis tous les moyens afin que vosu puissiez retrouvé le fleuron de notre club dans un état impeccable.
					Encore toute nos excuses pour ce désagrément et à très bientôt. B'Sportez vous bien !!</p>
					<img  src="http://dev.bsport.fr/newsletter/sep.png">
					<br><br>
					<br><br>
					
					<h2>Les vélos sont trop super</h2>
					<img width="640" src="http://dev.bsport.fr/uploads/bsport5.jpg"><br>
					<p >Des supers vélos de dingue</p>
					<img  src="http://dev.bsport.fr/newsletter/sep.png">
					<br><br>
					<br><br>
					
					<img  src="http://dev.bsport.fr/newsletter/pano.png"><br>
					<p>$bas_page</p>
					<a><img src="http://dev.bsport.fr/newsletter/log2.png"></a><br>
					<p class="bas">Si vous souhaitez vous désinscrire de cette newslettrer suivez le lien suivant : <a href="http://dev.bsport.fr/newsletter/desinscription.php?id=" >désinscription</a></p>
					
				</div>
			</td>
		</tr>	
	</table>	
</body>
</html>

EOD;

//$corps = utf8_decode( $corps );

echo $corps;

// Envoi des identifiants par mail
//mail($_to, $sujet, stripslashes($corps), $entete);