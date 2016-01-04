<?php include_once 'inc-auth-granted.php';?>
<?php include_once 'classes/utils.php';?>
<?php 
require 'classes/Newsletter.php';
require 'classes/Contact.php';

$newsletter = new Newsletter();

if (!empty($_GET)){ //Modif 
	
	$result = $newsletter->newsletterAllGet($_GET['id']);
	//print_r($result);
	if (empty($result)) {
		$message = 'Aucun enregistrements';
	} else {
		$id= 			$_GET['id'];
		$titre=  		$result[0]['titre'];
		$date= 			traitement_datetime_affiche($result[0]['date']);
		$bas_page= 		nl2br($result[0]['bas_page']);
		$detail=		$result[0]['newsletter_detail'];
	}
} else { 
	echo 'Erreur contactez votre administrateur <br> :\n';
	exit();
}
?>
<?php 
	function sendElasticEmail($to, $subject, $body_text, $body_html, $from, $fromName)
	{
		$res = "";
	
		//$data = "username=".urlencode("691f06a3-f0d1-41b6-87c1-b8a769c5c1f1");
		//$data .= "&api_key=".urlencode("691f06a3-f0d1-41b6-87c1-b8a769c5c1f1");
		$data = "username=".urlencode("a906616a-990e-4b85-b6ca-7338ea6d2acb");
                $data .= "&api_key=".urlencode("a906616a-990e-4b85-b6ca-7338ea6d2acb");
		$data .= "&from=".urlencode($from);
		$data .= "&from_name=".urlencode($fromName);
		$data .= "&to=".urlencode($to);
		$data .= "&subject=".urlencode($subject);
		if($body_html)
			$data .= "&body_html=".urlencode($body_html);
		if($body_text)
			$data .= "&body_text=".urlencode($body_text);
	
		$header = "POST /mailer/send HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($data) . "\r\n\r\n";
		$fp = fsockopen('ssl://api.elasticemail.com', 443, $errno, $errstr, 30);
	
		if(!$fp)
			return "ERROR. Could not open connection";
		else {
			fputs ($fp, $header.$data);
			while (!feof($fp)) {
				$res .= fread ($fp, 1024);
			}
			fclose($fp);
		}
		return $res;
	}
//echo sendElasticEmail("test@test.com", "My Subject", "My Text", "My HTML", "youremail@yourdomain.com", "Your Name");

?>
<?php
$urlSite = $_SERVER['HTTP_HOST'];



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
	h2 {font-family:inherit;font-style:italic;font-size:20px;line-height:18px;color:#d75b00;text-transform:uppercase;margin-top:0;margin-bottom:30px;}
	h3 {font-family:inherit;font-weight:bold;font-size:20px;line-height:18px;color:#d75b00;text-transform:uppercase;margin-top:0;margin-bottom:0px;}
	h4 {font-family:inherit;font-style:normal;font-size:18px;line-height:18px;color:#18293c;text-transform:none;margin-top:0;margin-bottom:0px;}

</style>
</head>
<body>
	<table width="640" border="0"  cellpadding="0" cellspacing="0" >
		<tr>
		    <td align="center">
				<div style="text-align:center;  margin-left:auto;margin-right:auto; width: 640px; border: 4px ridge white; padding:20px 20px 20px 20px; ">
					
					<a href="http://$urlSite"><img  src="http://$urlSite/newsletter/logo.png" alt=""></a>
				
					<h1>$titre</h1>
					<br><br>
EOD;
if(isset($detail)) {
	
	foreach ($detail as $value) {
		$titre = $value['titre'];
		if ($titre !='') {
			$titre = "<h2>$titre</h2>";
		} else {
			$titre= '';
		}
		$link = $value['link'];
		$url = $value['url'];
		if ($url!='' & $url != '/img/ajoutImage.jpg') {
			$url = "<a href=\"". $link ."\"><img width=\"640\" src=\"http://$urlSite". $url ."\" alt=\"\"></a><br>";
		} else {
			$url= '';
		}
		$texte = nl2br($value['texte']);
		if ($titre != '' || $url != '' || $texte != '') {
			$corps .= <<<EOD
					$titre
					$url
					<p >$texte</p>
					<img  src="http://$urlSite/newsletter/sep.png" alt="">
					<br><br><br>
EOD;
		}
	}
}
$corps .= <<<EOD

					<a href="http://$urlSite"><img  src="http://$urlSite/newsletter/pano.png" alt=""></a><br>
					<p>$bas_page</p>
					<a href="http://www.facebook.com/BiSPORT"><img src="http://$urlSite/newsletter/log2.png" alt=""></a><br>
					<p class="bas">Si vous souhaitez vous désinscrire de cette newslettrer suivez le lien suivant : <a href="http://$urlSite/newsletter/desinscription.php?id=" >désinscription</a></p>
					<img src="http://$urlSite/newsletter/track.php?id=XwXwXwXw" alt="">
				</div>
			</td>
		</tr>	
	</table>	
</body>
</html>

EOD;

if (empty($_GET['action']) && empty($_GET['postaction']) ) {
	echo $corps;
}	

//$corps = utf8_decode( $corps );

$sujet = "Bsport - Newsletter ";
$entete = "From:Bsport <contact@bsport.fr>\n";
$entete .= "MIME-version: 1.0\n";
$entete .= "Content-type: text/html; charset= iso-8859-1\n";

// TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST 
if (!empty($_GET['postaction']) && $_GET['postaction']=='preview') {
	echo "<br><br><h3>Newsletter de Test envoyee a contact@bsport.fr !!!! </h3><br><br>
		<a href='javascript:history.back()'>retour</a>";
	
	$_to = "contact@bsport.fr";
	//$_to = "fjavi.gonzalez@gmail.com";
	$entete .= "Bcc: xav335@hotmail.com,fjavi.gonzalez@gmail.com,jav_gonz@yahoo.com\n";
	
	//echo "Envoi du message à " . $_to . "<br>";
	$corpsCode = str_replace('XwXwXwXw', randomChar(), $corps);
	//echo $corps;
	////////////////!!!!!!!!!!!!!!!!!!!!!!!!!!!!////////////
	//mail($_to, $sujet, stripslashes($corps), $entete);
	///////////////////////////////////////////////////////////
	////////////////ELASTIC MAIL ICONEO!!!!!!!!!!////////////
	sendElasticEmail($_to, $sujet, "", stripslashes($corpsCode), "contact@bsport.fr", "Bsport");
	sendElasticEmail("fjavi.gonzalez@gmail.com", $sujet, "", stripslashes($corpsCode), "contact@bsport.fr", "Bsport");
	sendElasticEmail("xav335@hotmail.com", $sujet, "", stripslashes($corpsCode), "contact@bsport.fr", "Bsport");
	sendElasticEmail("jav_gonz@yahoo.com", $sujet, "", stripslashes($corpsCode), "contact@bsport.fr", "Bsport");
	///////////////////////////////////////////////////////////
} elseif (!empty($_GET['postaction']) && $_GET['postaction']=='envoi') { 
// ENVOI EN MASSE ENVOI EN MASSEENVOI EN MASSEENVOI EN MASSEENVOI EN MASSEENVOI EN MASSE
	$id_journal = $newsletter->journalNewsletterAdd($_GET['id']);
	
	$contact = new Contact();
	$result = $contact->contactGetForNewsletter();
	//print_r($result);
	if (!empty($result)) {
		foreach ($result as $value) {
			$_to = $value['email'];
			$regex = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
			if (preg_match( $regex, $_to)) {
				$codeRandom =randomChar();
				$corpsCode = str_replace('XwXwXwXw', $codeRandom, $corps);
				$newsletter->journalNewsletterDetailAdd($id_journal,$_to,$codeRandom,null);
				////////////////!!!!!!!!!!!!!!!!!!!!!!!!!!!!////////////
				//mail($_to, $sujet, stripslashes($corpsCode), $entete);
				///////////////////////////////////////////////////////////
				////////////////ELASTIC MAIL ICONEO!!!!!!!!!!////////////
        			sendElasticEmail($_to, $sujet, "", stripslashes($corpsCode), "contact@bsport.fr", "Bsport");
        			///////////////////////////////////////////////////////////

				echo "envoi OK : ". $value['email'] ."<br>";
			} else {
				$newsletter->journalNewsletterDetailAdd($id_journal,$_to,null,'bad email');
				echo "XXXX envoi KO : ". $value['email'] ."<br>";
			}	
			
			
		}
		echo "<br><br><h3>Newsletter REELLE envoyee à tous les adhérents !!!! </h3><br><br>
		<a href='javascript:history.back()'>retour</a>";
	}	
}	
